<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Website;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\WebsiteRequest;
use Spatie\Permission\Models\Role;

class AdminController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile($id){
        $admin = User::findOrFail($id);
        return view('admin.profile.profile',compact('admin'));
    }

    public function purchasedProperty(){
        
    }

    public function updateProfile($id, Request $request){
        $user = User::findOrFail($id);
        if($request->password != $request->password_confirmation){
            return redirect()->back()->with('error', 'password do not match');
        }
        $user->update(array_filter($request->all()));
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function setting()
    {
        $data = Admin::find(1);
        $website = Website::first();
        return view('admin.setting', compact('data', 'website'));
    }

    public function settingSubmit(WebsiteRequest $request)
    {
        $website = Website::first();
        $website->update($request->validated());
        $website->address = $request->address;
        $website->save();

        return back()->with('message', 'Website updated successfully');
    }

    public function subscribers()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscriber', compact('subscribers'));
    }

    public function deleteSubscriber(Subscriber $subscriber)
    {
        $subscriber->delete();
    }
}
