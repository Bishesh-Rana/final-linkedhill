<?php

namespace App\Http\Controllers\Website;

use App\Actions\Fortify\ResetUserPassword;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomerAuthController extends Controller
{
    public function signup()
    {
        return view('website.customer.auth.signup');
    }
    public function register(Request $request)
    {
        $validator = $this->validate(request(), [
            'name' => 'required',
            'mobile' => 'required|unique:users|max:20',
            'email' => 'required|unique:users|max:255',
            'password' => 'min:8',
        ]);

        \DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'otp' => $this->getOtp(),
            ];
            $customer = User::create($data);
            $customer->assignRole(['5']);
            $maildata = [
                'email'             => $customer->email,
                'name'              => $customer->name,
                'otp'              => $customer->otp,
            ];
            Mail::send('emails/user_registration_mail', $maildata, function ($message) use ($maildata) {
                $message->to($maildata['email'], $maildata['name'])
                    ->subject('Activation Email');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
            $message = "Your OTP for ".config('app.name')." Customer Registration is :".$customer->otp;
            $this->sendSMS($customer->mobile,$customer->name,$message);
            \DB::commit();
            $request->session()->flash('success', "An OTP has been sent to your email.");
            return redirect()->route('getOtp',$customer->id);
            return redirect()->back();
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function verify($id,Request $request){
        $customer = User::where('id',$id)->first();
        $otp = $request->otp;
        if($customer->otp == $otp){
            $customer->update([
                'email_verified_at' => Carbon::now(),
            ]);
        }else{
            return redirect()->back()->with('error', 'otp do not mactch');
        }
        return redirect()->route('customer.signup')->with('success','your account is verified');
    }

    public function verityOtp($id){
        $customer = User::where('id',$id)->first();
        return view('Website.customer\auth.verifyOtp',compact('customer'));
    }

    public function Otp($id){
        dd('bishesh');
        $customer = User::where('id',$id)->first();
        $otp = $this->getOtp();
        $customer->update([
            'otp' => $otp,
        ]);
        $message = "Your OTP for ".config('app.name')." Customer Registration is :".$otp;
        $this->sendSMS($customer->mobile,$customer->name,$message);
        return view('Website.customer\auth.verifyOtp',compact('customer'));
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

    protected function getOtp()
    {
        return rand(100000, 999999);
    }
    public function login(Request $request)
    {
        // dd(\Auth::guard('web')->user());
        //valid the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //if success then redirect to location
        $check = User::where('email', $request->email)->first();

        if ($check == null) {
            return back()->with('error', 'Email does not exist!');
        }

        //if email verified or not
        if (isset($check->email_verified_at)) {

            //Attempt to log the customer in

            if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard');
                // return redirect()->back();
            }
            //if unsuccessful then return back to login
            return back()->with('error', 'Email and Password do not match')->withInput($request->only('email'));
        } else {

            //if the customer have not verified their email
            return redirect()->back()->with('error', 'Please verify your email first');
        }
    }

    public function resetPassword(Request $request, $code)
    {
        $user = User::where('otp', $code)->firstorfail();
        return view('website.customer.auth.resetpassword', ['code' => $code]);
    }

    public function updatePassword(Request $request)
    {
        $data = $this->validate($request, [
            'code' => ['required', 'exists:users,otp'],
        ]);
        try {
            $user =     User::where('otp', $data['code'])->firstorfail();
            (new ResetUserPassword())->reset($user, $request->all());
            return redirect('/');
        } catch (\Throwable $th) {
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
