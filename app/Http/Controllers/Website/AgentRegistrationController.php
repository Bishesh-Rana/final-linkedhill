<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use App\Mail\AgencyActivationMail;
use Illuminate\Support\Facades\DB;
use App\Mail\AgentRegistrationMail;
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
        if(auth()->user()){
            // return redirect()->intended(route('admin.dashboard'));
            return redirect()->intended(route('properties.create'));
        }
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
                }
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
