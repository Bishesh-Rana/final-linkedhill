<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TradelinkLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:tradelink_admin',['except'=>['logout']]);
    }

    public function showLoginForm()
    {
        return view('tradelink.auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);


        $admin =\App\Models\TradelinkAdmin::where('email',$request->email)->where('id',1)->first();



        if(! \App\Models\TradelinkAdmin::where('email',$request->email)->where('id',1)->exists())
        {
            return redirect(url('tradelink/login'))->with('error_message',"Email does not exists");
        }



        $pass =$request->password;
        if(!Hash::check($pass ,$admin->password))
        {
            return redirect()->back()->with('error_message','Password does not match');
        }



        if (Auth::guard('tradelink_admin')->attempt(['email'=>$request->email , 'password'=>$request->password],$request->remember))
        {
            return redirect()->intended(route('tradelink.dashboard'));
        }





        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
//        Auth::guard('tradelink_admin')->logout();
        Auth::logout();
        return redirect('/');
    }
}
