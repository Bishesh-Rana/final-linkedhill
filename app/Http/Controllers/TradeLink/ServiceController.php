<?php

namespace App\Http\Controllers\Tradelink;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('tradelink.service.index',compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service_categories = ServiceCategory::all();

        return view('tradelink.service.create',compact('service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $service= Service::create([
            'service_category_id'=>$request->service_category_id,
            'name'=>$request->name ,
            'slug'=>$request->slug,
            'image'=>"default.png",
        ]);

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/tradelink/service/',$name);
            $service->image = $name;
        }

        if($request->feature){
            $service->feature = $request->feature;
        }else{
            $service->feature = 'off';
        }

        $service->save();

        return back()->with('message','Service  Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $service_categories = ServiceCategory::all();
        return view('tradelink.service.edit',compact('service_categories','service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->service_category_id = $request->service_category_id;
        $service->name = $request->name;
        $service->slug = $request->slug;

        if($request->hasFile('image')){

            $oldfile = public_path().'/tradelink/service/'.$service->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/tradelink/service/',$name);
            $service->image = $name;
        }

        if($request->feature){
            $service->feature = $request->feature;
        }else{
            $service->feature = 'off';
        }

        $service->save();

        return back()->with('message','Service Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $oldfile = public_path().'/tradelink/service/'.$service->image;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        $service->delete();
    }
}
