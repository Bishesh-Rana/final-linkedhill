<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use App\Mail\AgencyActivationMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\AgencyRegistrationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;

class AgentRegistrationController extends Controller
{
    public function getAgentRegistration(){
        return view('website.agent.registration');
    }
    public function getAgentLogin(){
        return view('website.agent.login');
    }

    protected function getOtp()
    {
        return rand(100000, 999999);
    }

    public function postAgentLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $check = User::where('email', $request->email)->first();
        if ($check == null) {
            return back()->with('error', 'Email does not exist!');
        }
        if(!$check->hasAgency == null){
            if($check->hasAgency->status == 'Not Verified'){
                return redirect()->back()->with('error', 'You are not verified');
            }elseif($check->hasAgency->status == 'Blocked'){
                return back()->with('error', 'You are blocked. Plz contact to admin');
            }elseif($check->hasAgency->status == 'Rejected'){
                return back()->with('error', 'You are Rejected. Plz contact to admin');
            }else{
                if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('admin.dashboard');
                    // return redirect()->back();
                }
                //if unsuccessful then return back to login
                return back()->with('error', 'Email and Password do not match')->withInput($request->only('email'));
            }
        }else{
            return back()->with('error','Email not found');
        }

       

       
    }
    
    public function postAgentRegistration (Request $request){
        $validator = $this->validate(request(), [
            'type' => 'required',
            'name' => 'required',
            'mobile' => 'required|unique:users|max:14',
            'email' => 'required|unique:users|max:255',
            'phone' => 'max:14',
            'idnumber' => "required",
            'pan' => 'required',
            'password' => 'min:8',

            // 'companyRegistration'=>'required',
            // 'taxClearance' => 'required',
            // 'company_reg_no' => 'required',
        ]);
        $otp = $this->getOtp();
        \DB::beginTransaction();
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'profile' => $request->logo,
                'password' => Hash::make($request->password),
                'otp' => $otp,
            ]);
            $user->assignRole(['3']);
            $agent = AgencyDetail::create([
                'status' => 2,
                'logo' => $request->logo,
                'type' => $request->type,
                'user_id' => $user->id,
                'agency_name' => $request->name,
                'agency_email' => $request->email,
                'website' => $request->website,
                'address' => $request->address,
                'agency_phone' => $request->phone,
                'agency_mobile' => $request->mobile,
                'company_reg_no' => $request->company_reg_no,
                'pan' => $request->pan,
                'company_registration' => $request->companyRegistration,
                'tax_clearance' => $request->taxClearance,
                'comapny_reg_no' => $request->company_reg_no,
                'national_id' => $request->idnumber,
            ]);
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $name = time() . $file->getClientOriginalName();
            //     $file->move(public_path() . '/images/logo/', $name);
            //     $agent->logo = $name;
            // }

            // if ($request->hasFile('pan')) {
            //     $file = $request->file('pan');
            //     $name = time() . $file->getClientOriginalName();
            //     $file->move(public_path() . '/documents/', $name);
            //     $agent->other_document = $name;
            // }
            // $agent->save();
            
        \DB::commit();
        $maildata = [
            'email'             => $request->email,
            'name'              => $request->name,
            'otp'              => $otp,
        ];
        $user = User::where('email',$request->email)->first();

        //mail goes to admin
        Mail::to('nectardigit@gmail.com')->send(new AgencyActivationMail($user));
        $request->session()->flash('success', "Registration Application Submitted Successfully.");
        return redirect()->back();
         } catch (\Exception $e) {
            \DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function sendSMS($phone,$user,$message)
    {
        $args = http_build_query(array(
            'token' => 'v2_L6IV9g500Hz6Otonk2Z8aU20cxq.XTdY',
            'from'  => 'InfoSMS',
            'to'    =>  $phone,
            'text'  => 'Dear ' . $user . ',' . $message
        ));
    
        $url = "http://api.sparrowsms.com/v2/sms/";
    
        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }


}
