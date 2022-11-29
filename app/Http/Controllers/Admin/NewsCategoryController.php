<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where(['type' => 'news', 'parent_id' => null])->latest()->get();
        return  view('admin.news.category', compact('categories'));
    }

    public function subCategory($id)
    {
        $this->data['name'] = Category::find($id)->name;
        $this->data['subcategories'] = Category::find($id)->children;
        return view('admin.news.sub_categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::where(['type' => 'news', 'parent_id' => null])->latest()->get();
        return view('admin.news.create_category', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Category::create($request->all());
        if ($data) {
            return redirect(route('news-category.index'))->with('message', 'News Category created successfully');
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
        $this->data['news_category'] = Category::find($id);
        $this->data['categories'] = Category::where(['parent_id' => null, 'type' => 'news'])->latest()->get();
        return view('admin.news.edit_category', $this->data);
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
        $category = Category::find($id);
        $category->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'feature' => $request->feature,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description
        ]);


        return back()->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
