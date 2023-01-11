<?php

namespace App\Http\Controllers\TradeLink;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tradelink\TradelinkWebsiteRequest;
use App\Models\TradelinkAdmin;
use App\Models\TradelinkSubscriber;
use App\Models\TradelinkWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TradelinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:tradelink_admin');
                    }
    public function index()
    {
        return view('tradelink.index');
    }

    public function changePassword()
    {

        return view('tradelink.auth.change_password');
    }

    public function updatePassword(Request  $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $opass =$request->get('old_password');
        $dbpass = Auth::guard('tradelink_admin')->user()->password;
        if(!Hash::check($opass ,$dbpass)){
            return redirect()->back()->with('error_message','Old Password is wrong');
        }

        $new_password =$request->get('new_password');

        $user = Auth::guard('tradelink_admin')->user();
        $user->password=bcrypt($new_password);
        if($user->save()){
            return redirect()->back()->with('message',' Password Changed Successfully .');
        }
    }

    public function editProfile()
    {
        return view('tradelink.auth.change_profile');
    }

    public function updateProfile(Request  $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $admin = TradelinkAdmin::findOrFail(1);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->hasFile('image')){

            $oldfile = public_path().'/tradelink/profile/'.$admin->getRawOriginal('image');
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();

            $file->move(public_path().'/tradelink/profile/',$name);
            $admin->image = $name;
        }



        $admin->save();

        return redirect()->back()->with('message',' Profile Updated Successfully .');

    }

    public function settings()
    {
        $data = TradelinkWebsite::first();
        return view('tradelink.settings',compact('data'));
    }

    public function updateSettings(TradelinkWebsiteRequest $request)
    {
        $data = TradelinkWebsite::first();
        $data->update($request->all());

        if($request->hasFile('logo')){

            $oldfile = public_path().'/tradelink/'.$data->logo;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('logo');
            $name =time().$file->getClientOriginalName();

            $file->move(public_path().'/tradelink/',$name);
            $data->logo = $name;
            $data->save();
        }



        return redirect()->back()->with('message','Website Updated Successfully .');

    }

    public function subscribeUs(Request $request)
    {
        $this->validate($request, [

            'email' => 'required',
        ]);
        $data = TradelinkSubscriber::create(
            ['email'=>$request->email]
        );

        if ($data)
        {
            return back()->with('success', 'Thank you for subscribing us.');
        }
    }

    public function getSubscribers()
    {
        $subscribers = TradelinkSubscriber::all();
        return  view('tradelink.subscribers',compact('subscribers'));
    }

    public function deleteSubscriber(Request $request)
    {
        $subscriber = TradelinkSubscriber::find($request->id);
        $subscriber->delete();
    }
}
