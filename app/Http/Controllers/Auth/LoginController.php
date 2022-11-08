<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $user =User::where(['email'=>$request->email])->first();

        if (!$user)
        {
            return redirect()->back()->with('error-email','Invalid Email');
        }

        if(! User::where('email',$request->email)->where('is_blocked',0)->exists())
        {
            return redirect()->back()->with('error-email','Invalid Email');
        }
        $pass =$request->password;


        if(!Hash::check($pass ,$user->password))
        {
            return redirect()->back()->with('error-password','Password does not match');
        }

        if (Auth::guard()->attempt(['email'=>$request->email , 'password'=>$request->password,'is_blocked'=>0],$request->remember))
        {

            return redirect()->intended(route('homepage'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
