<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.serviceCategory.index', compact('categories'));
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
        $this->validate($request, [
            'name' => 'required|max:200',
            'slug' => 'required',
            'image' => 'nullable'
        ]);
        $serviceCategory = ServiceCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image
        ]);
        $serviceCategory->save();

        return back()->with('message', 'Service Category Created Successfully');
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
        $this->validate($request, [
            'name' => 'required|max:200',
            'slug' => 'required',

        ]);
        $serviceCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image
        ]);

        $serviceCategory->save();

        return back()->with('message', 'Category updated successfully');
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
