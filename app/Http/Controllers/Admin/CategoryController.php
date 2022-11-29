<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BlogCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['categories'] = Category::where(['parent_id'=>null,'type'=>'blog'])->latest()->get();
        return view('admin.blog.categories',$this->data);
    }


    public function subCategory($id)
    {
        $this->data['name'] = Category::find($id)->name;
        $this->data['subcategories'] = Category::find($id)->children;
        return view('admin.blog.sub_categories',$this->data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::where(['parent_id'=>null,'type'=>'blog'])->latest()->get();
        return view('admin.blog.create_blog_category',$this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $request)
    {
        $data = Category::create($request->all());
        if($data){
            return redirect(route('blog-category.index'))->with('message','Blog Category created successfully');
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
        $this->data['blog_category'] = Category::find($id);
        $this->data['categories'] = Category::where(['parent_id'=>null,'type'=>'blog'])->latest()->get();
        return view('admin.blog.edit_category',$this->data);
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
            'parent_id' =>$request->parent_id,
            'name' =>$request->name,
            'slug' =>$request->slug,
            'feature' => $request->feature,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description
        ]);


        return back()->with('message','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
