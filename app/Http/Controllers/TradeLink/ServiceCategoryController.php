<?php

namespace App\Http\Controllers\Tradelink;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::latest()->get();
        return view('tradelink.serviceCategory.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $serviceCategory = ServiceCategory::create([
            'name'=>$request->name ,
            'slug'=>$request->slug,
            'image'=>"default.png"
        ]);

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/tradelink/serviceCategory/',$name);
            $serviceCategory->image = $name;
        }


        $serviceCategory->save();

        return back()->with('message','Service Category Created Successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->update([
           'name'=>$request->name ,
            'slug'=>$request->slug
        ]);

        if($request->hasFile('image')){

            $oldfile = public_path().'/tradelink/serviceCategory/'.$serviceCategory->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/tradelink/serviceCategory/',$name);
            $serviceCategory->image = $name;
        }

        $serviceCategory->save();

        return back()->with('message','Category updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();
    }
}
