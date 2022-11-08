<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }



    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);


        $admin =\App\Models\Admin::where('email',$request->email)->first();



        if(! \App\Models\Admin::where('email',$request->email)->exists())
        {
            return redirect(url('admin/login'))->with('error_message',"Email does not exists");
        }



        $pass =$request->password;
        if(!Hash::check($pass ,$admin->password))
        {
            return redirect()->back()->with('error_message','Password does not match');
        }



        if (auth()->attempt(['email'=>$request->email , 'password'=>$request->password],$request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }


        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function adminLogin(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);


        $admin =\App\Models\Admin::where('email',$request->email)->first();

        if(! \App\Models\Admin::where('email',$request->email)->exists())
        {
            return redirect(url('admin/login'))->with('error_email',"Email does not exists");
        }



        $pass =$request->password;
        if(!Hash::check($pass ,$admin->password))
        {
            return redirect()->back()->with('error_password','Password does not match');
        }

        if (auth()->attempt(['email'=>$request->email , 'password'=>$request->password],$request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }


        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(Request $request)
    {
//        auth()->logout();
        Auth::logout();

        return redirect('/');
    }


}
