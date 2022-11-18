<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Website;
use App\Models\Subscriber;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\WebsiteRequest;

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
        $user->profile = $request->image;
        $user->save();
        if(auth()->user()->hasRole('Agent')){
            $agent = AgencyDetail::where('user_id',$id)->first();
            $agent->agency_name = $request->name;
            $agent->agency_phone = $request->phone;          
            $agent->national_id = $request->national_id;
            $agent->company_reg_no = $request->company_reg_no;
            $agent->logo=$request->image;
            $user->profile = $request->image;
            $agent->pan = $request->pan;
            $agent->company_registration = $request->companyRegistration;
            $agent->tax_clearance = $request->taxClearance;


            if ($request->hasFile('image')) {
                if(File::exists($agent->logo)){
                    unlink($agent->logo);
                }
            }

            if ($request->hasFile('pan')) {
                if(File::exists($agent->pan)){
                    unlink($agent->pan);
                }
            }
            if ($request->hasFile('companyRegistration')) {
                if(File::exists($agent->company_registration)){
                    unlink($agent->company_registration);
                }
            }
            if ($request->hasFile('taxClearance')) {
                if(File::exists($agent->tax_clearance)){
                    unlink($agent->tax_clearance);
                }
            }
            $user->save();
            $agent->save();
        }
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
