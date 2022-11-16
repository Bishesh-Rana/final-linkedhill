<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyCategoryRequest;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PropertyCategory::latest()->get();
        return view('admin.propertyCategory.index', compact('categories'));
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
    public function store(PropertyCategoryRequest $request)
    {
        try {
            PropertyCategory::create($request->validated());
            return back()->with('message', 'Property Category created successfully');
        } catch (\Throwable $th) {
            return back()->with('message', $th->getMessage())->withInput();
        }
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
    public function update(PropertyCategoryRequest $request, PropertyCategory $propertyCategory)
    {
        try {
            $propertyCategory->update($request->validated());
            return back()->with('message', 'Property Category created successfully');
        } catch (\Throwable $th) {
            return back()->with('message', $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        try{
            $propertyCategory = PropertyCategory::findOrFail($request->id);
            $propertyCategory->delete();
        }catch (\Throwable $th) {
            return response()->json([
                'error' => "You have to delete linked property first",
            ]);
        }
        
    return response()->json([
        'error' => "there is related data",
    ]);
    }

    public function updateCategoryOrder(Request $request){
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['categoryItem'])) {
            foreach ($arr['categoryItem'] as $key => $value) {  //id //parent_id
                PropertyCategory::where('id', $key)
                    ->update([
                        'order' => $order,
                        'parent_id' => ($value == 'null') ? NULL : $value
                    ]);
                $order++;
            }
        }
        return true;
    }
}
