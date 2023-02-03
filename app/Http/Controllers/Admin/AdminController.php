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
use App\Models\Enquiry;
use App\Models\Property;

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
        $user->password=bcrypt($request->password);      
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

    public function enquries()
    {
        $enquiries = [];
        if(auth()->user()->roles[0]->name=='Super Admin' || auth()->user()->roles[0]->name=='Admin'){
            $enquiries = Enquiry::orderBy('created_at','DESC')->get();
            
        }
        else{
            $user = auth()->user();           
            $properties = auth()->user()->properties;
            foreach ($properties as $key => $property) {
                $enquiries = Enquiry::where('property_id',$property->id)->orderBy('created_at','DESC')->get();
            }
        }
        if(count($enquiries)>0){
            foreach($enquiries as $data)
            {
                $data->setAttribute('muji',null);
                if($data->getProperty !=null && $data->getProperty->count() >0)
                {
                    $data['muji']=$data->getProperty->title;
                }
            
            } 

        }
        return view('admin.enquiry', compact('enquiries'));
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
