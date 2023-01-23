<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use App\Models\Website;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebsiteRequest;

class AdminController extends Controller
{
    public function getSetting(){
        $website = Website::first();
        return response()->json(['status'=>'success','data'=>$website]);
    }

    public function updateSetting(WebsiteRequest $request){
        $website = Website::first();
        $website->update($request->validated());
        $website->address = $request->address;
        $website->save();
        return response()->json(['status'=>'success','data'=>$website]);
    }

    public function subscribers()
    {
        $subscribers = Subscriber::all();
        // return $subscribers;
        return $this->successResponse($subscribers);
    }
    public function deleteSubscriber($id){
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return response()->json(['status'=>'success','message' =>'Subscriber deleted Successfully.']);
    }
    public function unitsList(){
        $units = Unit::orderBy('order')->get();
        return $this->successResponse($units);      
    }
    public function createUnit(Request $request){
        $unit = Unit::create([
            'name' => $request->name,

        ]);

        if ($unit)
        {
            return response()->json(['status'=>'success','message'=>'Unit created successfully.']) ;
        }
    }
    public function updateUnit(Request $request ,$id){
        $unit =  Unit::where('id', $id)->update([
            'name' => $request->name,

        ]);

        if ($unit)
        {
            return response()->json(['status'=>'success','message'=>'Unit updated successfully.']) ;
        }
    }
    public function deleteUnit($id){
        $unit = Unit::find($id);
        $unit->delete();
        return response()->json(['status'=>'success','message'=>'Unit deleted successfully.']);
    }
       
}
