<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TradelinkCategoryRequest;
use App\Models\DeviceCredential;
use App\Models\TradelinkCategory;
use Illuminate\Http\Request;

class TradelinkCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = TradelinkCategory::whereNull('parent_id')->with('child')->orderBy('order', 'ASC')->get();
        return view('admin.tradelinkCategory.index', compact('categories'));
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
    public function store(TradelinkCategoryRequest $request)
    {
        try {
            TradelinkCategory::create($request->validated());
            return back()->with('message', 'Tradelink Category created successfully');
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
    public function update(TradelinkCategoryRequest $request, TradelinkCategory $tradelinkCategory)
    {
        try {
            $tradelinkCategory->update($request->validated());
            return back()->with('message', 'Tradelink Category updated successfully');
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
    public function destroy(TradelinkCategory $tradelinkCategory)
    {
        $tradelinkCategory->delete();
    }


    public function updateCateagoryOrder(Request $request)
    {
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['menuItem'])) {
            foreach ($arr['menuItem'] as $key => $value) {  //id //parent_id
                TradelinkCategory::where('id', $key)
                    ->update(['order' => $order, 'parent_id' => ($value == 'null') ? NULL : $value]);
                $order++;
            }
        }
        return true;
    }
}
