<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TradelinkAdmin;
use App\Models\VendorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function showSignupForm()
    {

        $services = Service::latest()->get();
        return view('tradelink.vendor.register',compact('services'));
    }

    public function register(Request $request)
    {

        $this->validate($request, array(
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
            'service_id' => 'required',
        ),[
            'service_id.required' =>"Select At least One Service"
        ]);

        $data = new TradelinkAdmin();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->hasFile('document')){

            $file=$request->file('document');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/tradelink/document/',$name);
            $data->document = $name;
        }

        if($request->hasFile('image')){

            $filee=$request->file('image');
            $namee =time().$filee->getClientOriginalName();
            $filee->move(public_path().'/tradelink/profile/',$namee);
            $data->image = $namee;
        }


        $data->password = Hash::make('$request->password');
        $data->save();

        $data2 = new  VendorService();
        foreach ($request->service_id as $item)
        {
            $data2 = new  VendorService();
            $data2->vendor_id = $data->id;
            $data2->service_id = $item;
            $data2->save();
        }

        return back()->with('message','Registration done successfully !');


    }

    public function vendors()
    {
        $vendors = TradelinkAdmin::where('id','!=',1)->get();
        return view('tradelink.vendor.index',compact('vendors'));
    }

    public function edit($id)
    {
        $vendor = TradelinkAdmin::find($id);
        return view('tradelink.vendor.edit',compact('vendor'));
    }

    public function update($id,Request $request)
    {
        $vendor = TradelinkAdmin::find($id);
        $vendor->status = $request->status;
        $vendor->save();
        return back();
    }

    public function destroy(Request $request)
    {

        $vendor = TradelinkAdmin::find($request->id);

        $oldfile1 = public_path().'/tradelink/document/'.$vendor->document;
        if(\File::exists($oldfile1)){
            \File::delete($oldfile1);
        }

        $oldfile2 = public_path().'/tradelink/profile/'.$vendor->image;
        if(\File::exists($oldfile2)){
            \File::delete($oldfile2);
        }

        $vendor->delete();

    }
}
