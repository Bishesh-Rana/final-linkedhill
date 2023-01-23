<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Validation\Rule;
use App\Models\DeviceCredential;
use App\Mail\AgencyActivationMail;
use Illuminate\Support\Facades\DB;
use App\Mail\AgentRegistrationMail;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use App\Actions\Fortify\UpdateUserProfileInformation;

class LoginController extends Controller
{
    public function login(Request $request)
    {
     
        $validation = Validator::make($request->all(), [
            'password' => 'required|string',
            'email' => 'required|exists:users,email',
        ]);
      

        if ($validation->fails()) {
            return $this->validationError($validation);
        }

        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                "status" => false,
                "code" => 401,
                'message' => ['Username/Mobile or password credentials do not match our records'],
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        
        $user->access_token = $user->createToken('AuthToken')->accessToken;
        
        $user->save();
        DeviceCredential::storeData($user->id);

        

        return $this->successResponse(new UserResource($user));
    }

    public function logout(Request $request)
    {
        $user = User::find(request()->user()->id);
        $user->update([
            'access_token' => null,
        ]);
        foreach ($user->tokens as $token) {
            $token->revoke();
        }
        return $this->successResponse('successfull logged out');
    }

    public function signup(Request  $request)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'referral_code' => ["nullable", "exists:users,referral_code"],
            ])->validate();
            if ($request->referalCode) {
            }
            $user = (new CreateNewUser())->create($request->all());
            $user->assignRole(['5']); //Customer

            $user->access_token = $user->createToken('AuthToken')->accessToken;
            $user->referred_by = $this->referalPart($request->referral_code);
            $user->save();
            DeviceCredential::storeData($user->id);
            DB::commit();
            return $this->returnResponse(new UserResource($user->refresh()));
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    public function postAgentRegistration (Request $request){
        $validator = $this->validate(request(), [
            'type' => 'required',
            'name' => 'required',
            'mobile' => 'required|unique:users|max:14',
            'email' => 'required|unique:users|max:255',
            'phone' => 'max:14',
            'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg',
            'pan' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'min:8',
            'confirm_password' => 'min:8',
            'companyRegistration' => 'nullable|mimes:pdf',
            'taxClearance' => 'nullable|mimes:pdf',
        ]);
        if($request->password != $request->confirm_password){
            return redirect()->back()->with('error','Password do not match');
        }
        $otp = $this->getOtp();
        \DB::beginTransaction();
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'otp' => $otp,
            ]);

            // $role = $request->type;

            $user->assignRole(['3']);

            $agent = AgencyDetail::create([
                'status' => 2,
                'type' => $request->type,
                'user_id' => $user->id,
                'agency_name' => $request->name,
                'agency_email' => $request->email,
                'website' => $request->website,
                'address' => $request->address,
                'agency_phone' => $request->phone,
                'agency_mobile' => $request->mobile,
                'company_reg_no' => $request->company_reg_no,
                'national_id' => $request->idnumber,

            ]);
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/logo/', $name);
                $logo = env('APP_URL') . 'images/logo/' . $name;
                $agent->logo = $logo;
                $user->profile = $logo;
            }

            if ($request->hasFile('pan')) {
                $file = $request->file('pan');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/pan/', $name);
                $agent->pan = env('APP_URL') . 'images/pan/' . $name;
            }
            if ($request->hasFile('companyRegistration')) {
                $file = $request->file('companyRegistration');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/documents/', $name);
                $agent->company_registration = env('APP_URL') . 'documents/' . $name;
            }
            if ($request->hasFile('taxClearance')) {
                $file = $request->file('taxClearance');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/documents/', $name);
                $agent->tax_clearance = env('APP_URL') . 'documents/' . $name;
            }

            $agent->save();
            $user->save();
            
        \DB::commit();
        $maildata = [
            'email'             => $request->email,
            'name'              => $request->name,
            'otp'              => $otp,
        ];
        $user = User::where('email',$request->email)->first();

        //mail goes to admin
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AgencyActivationMail($user));
        $request->session()->flash('success', "Registration Application Submitted Successfully.");

        //mail to agent
        Mail::to($request->email)->send(new AgentRegistrationMail());

        return $this->returnResponse(new UserResource($user->refresh()));

        } catch (\Exception $e) {
            \DB::rollback();
            return response(['status' => false, 'message' => "Registration failed !!"], 200);
        }
    }

    public function postAgentLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $users = user::all(); 
        $check = User::where('email', $request->email)->first();
        if ($check == null) {
            return response(['status'=> false, 'message'=>'Email does not exist!']);
        }
        if($check->agentStaff != null){
            if($check->agentStaff->status == 'Not Verified'){
                return response(['status' => false, 'message' => "You are not verified. Please contact admin.]"], 200);
            }elseif($check->agentStaff->status == 'Blocked'){
                return response(['status' => false, 'message' => 'You are blocked. Please contact to admin']);
            }elseif($check->agentStaff->status == 'Rejected'){
                return response(['status' => false, 'message' => 'You are Rejected. Please contact to admin']);
            }
            elseif($check->agentStaff->is_active == '0'){
                return redirect()->back()->with(['status' => false, 'message' => 'You are not verified']);
            }elseif($check->agentStaff->is_blocked == '0'){
                return response(['status' => false, 'message' => 'You are blocked. Please contact to admin']);
            }
            else{
                return response(['status' =>'test', 'message'=> $check->hasAgency->status]);
                if (\Auth::guard('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
                }
                return response(['status' => false, 'message' => 'Email and Password do not match']);
            }       
        }
        if($check->hasAgency != null ){
            if($check->hasAgency->status == 'Not Verified'){
                return redirect()->back()->with(['status' => false, 'message' => 'You are not verified']);
            }elseif($check->hasAgency->status == 'Blocked'){
                return response(['status' => false, 'message' => 'You are blocked. Please contact to admin']);
            }elseif($check->hasAgency->status == 'Rejected'){
                return response(['status' => false, 'message' => 'You are Rejected. Please contact to admin']);
            }else{
                if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    $user = User::where('email', $request->email)->first();
        
                    $user->access_token = $user->createToken('AuthToken')->accessToken;
                    
                    $user->save();
                    DeviceCredential::storeData($user->id);
                
                    return $this->successResponse(new UserResource($user));
                }
                return response(['status' => false, 'message' => 'Email and Password do not match']);
            }
        }else{
            return response(['status' => false, 'message' =>'Email not found']);
        }   

       
    }

    public function profile(Request $request)
    {
        try {
            Validator::make(
                $request->all(),
                ['id' => ['required', 'exists:users,id']]
            )->validate();

            $user = User::find($request->id);
            return $this->returnResponse(new UserResource($user));
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    public function update(Request $request)
    {
        // return auth()->user();
        $user = User::find(request()->user()->id);
        try {
            $data =   Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class, 'email')->ignore($user->id),
                ],
                'phone' => [
                    'nullable',
                    'numeric',
                    'digits_between:10,15',
                    Rule::unique(User::class, 'phone')->ignore($user->id),
                ],
                'password' => ['required']
            ])->validate();
            if (!Hash::check(request('password'), $user->password)) {
                return response()->json(['status' => false, 'code' => 400, 'message' => 'Old password is wrong'], 400);
            }
            (new UpdateUserProfileInformation())->update($user, $request->all());

            return $this->returnResponse(new UserResource($user->refresh()));
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    private function referalPart($referalCode)
    {
        return $referalCode ?  User::firstWhere('referral_code', $referalCode)->id : null;
    }

    public function uploadProfileImage(Request $request)
    {
        $user = User::find(request()->user()->id);
        try {
            Validator::make($request->all(), [
                'image' => ['required']
            ])->validate();
            $profile =  (new UploadService())->storeBase64Image($request->image);
            $user->update(['profile' => $profile]);
            return $this->returnResponse(new UserResource($user->refresh()));
        } catch (ValidationException $exception) {
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
