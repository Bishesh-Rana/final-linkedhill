<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use App\Mail\UserRegistrationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Actions\Fortify\ResetUserPassword;

class CustomerAuthController extends Controller
{
    public function signup()
    {
        // return view('website.customer.auth.signup');
        return view('website.customer.auth.login');
    }

    public function signin()
    {
        return view('website.customer.auth.login');
        // return view('website.customer.auth.signup');
    }

    public function registerform()
    {
        return view('website.customer.auth.register');
    }
    public function forgot()
    {
        return view('website.customer.auth.forgotpassword');
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
                'phone' => $request->mobile,
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
            Mail::to($request->email)->send(new UserRegistrationMail());
            $message = "Your OTP for ".config('app.name')." Customer Registration is :".$customer->otp;
            $this->sendSMS($request->mobile,$customer->name,$message);
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
            if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if(auth()->user()->hasRole('Agent')){
                    \Auth::logout();
                    return redirect()->back()->with('error','Email not Found');
                }
                if(auth()->user()->hasRole('Admin')){
                    \Auth::logout();
                    return redirect()->back()->with('error','Email not Found');
                }
                if(auth()->user()->hasRole('Super Admin')){
                    \Auth::logout();
                    return redirect()->back()->with('error','Email not Found');
                }
                return redirect()->route('admin.dashboard');
            }            
            return back()->with('error', 'Email and Password do not match')->withInput($request->only('email'));
        } else {
            //if the customer have not verified their email
            return redirect()->back()->with('error', 'Please verify your email first');
        }
    }

    public function resetpasswordmail(Request $request){
        $request->validate(['email' => 'required|email']);

        $user = User::where('email',$request->email)->first();
        if(empty($user)){
            return back()->with('error', 'Your email is not found');
        }else{
            $code = $this->getOtp();
            $user->update(['otp'=>$code]);
            Mail::to($request->email)->send(new PasswordResetMail($request->email,$code));
            return back()->with('success',"We sent you password reset link");
        }
 
        

        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );



     
        // return $status === Password::RESET_LINK_SENT
        //             ? back()->with(['status' => __($status)])
        //             : back()->withErrors(['email' => __($status)]);

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
