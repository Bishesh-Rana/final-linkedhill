<?php

namespace App\Http\Controllers\Tradelink;

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
        ));

        $data = new TradelinkAdmin();
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->hasFile('document')){

            $file=$request->file('document');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/tradelink/document/',$name);
            $data->document = $name;
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
}
