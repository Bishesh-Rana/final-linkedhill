<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.index');
    }

    public function logout()
    {
        Auth::guard()->logout();

        return redirect('/');
    }

    public function changePassword()
    {
        return view('frontend.auth.change_password');
    }

    public function updatePassword(Request $request)
    {
        $password = Auth::user()->password;
        if ($password != null){
            $this->validate($request, [
                'old_password' => 'required|min:6',
                'new_password' => 'required|min:6',

            ]);

            $opass =$request->get('old_password');
            $dbpass = Auth::user()->password;

            if(!Hash::check($opass ,$dbpass)){
                return redirect()->back()->with('error_message','Old Password is wrong');
            }

            $new_password =$request->get('new_password');

            $user = Auth::user();
            $user->password=bcrypt($new_password);
            $user->save();

            return back()->with('message','Password updated successfully');
        }


        $this->validate($request, [
            'new_password' => 'required|min:6',
        ]);
        $user = Auth::user();
        $user->password=bcrypt($request->new_password);;
        $user->save();

        return back()->with('message','Password updated successfully');
    }

    public function changeProfile()
    {
        return view('frontend.auth.change_profile');

    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('profile')){

            $oldfile = public_path().'/images/profile/'.$user->profile;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('profile');
            $name =time().$file->getClientOriginalName();

            $file->move(public_path().'/images/profile/',$name);
            $user->profile = $name;
        }

        $user->save();

        return redirect()->back()->with('message',' Profile Updated Successfully .');

    }
}
