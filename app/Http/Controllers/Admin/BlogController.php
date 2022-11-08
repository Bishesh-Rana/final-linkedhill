<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    public function getBlogs()
    {
        $blogs = Blog::select('id', 'image', 'title', 'description')->where('type', 'blog')->latest();
        return DataTables::of($blogs)
            ->addColumn('image', function ($blogs) {
                return '<img src=' . $blogs->image . '  class="news_img" align="center" />';
            })
            ->editColumn('description', function ($blog) {
                return substr(strip_tags($blog->description), 0, 70) . '.....';
            })
            ->addColumn('action', function ($blog) {
                return
                    view('admin.blog.datatables._actions', compact('blog'));
            })->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $blog = new Blog();
        $categories = Category::where(['type' => 'blog'])->latest()->get();
        return view('admin.blog.form', compact('blog', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $blog = Blog::create($request->validated());
        $blog->categories()->sync($request->category_id);
        return redirect(route('blog.index'))->with('message', 'Blog created successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $blog = Blog::find($id);
        $this->data['blog'] = true;
        $this->data['edit'] = true;
        $this->data['categories'] = Category::where(['type' => 'blog'])->latest()->get();
        return view('admin.blog.create', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::where(['type' => 'blog'])->latest()->get();

        return view('admin.blog.form', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update($request->validated());
        $blog->categories()->sync($request->category_id);

        return redirect()->route('blog.index')->with('message', 'Blog updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findorfail($id);
        $blog->delete();
    }

    public function deletedBlogs()
    {
        return view('admin.trash.blog.index');
    }

    public function getDeletedBlogs()
    {
        $blogs = Blog::select('id', 'image', 'title', 'description')->where('type', 'blog')->onlyTrashed()->latest();
        return DataTables::of($blogs)
            ->addColumn('image', function ($blogs) {
                $url = $blogs->image;
                return '<img src=' . $url . '  class="news_img" align="center" />';
            })
            ->editColumn('description', function ($blog) {
                return substr(strip_tags($blog->description), 0, 70) . '.....';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('restoreBlog', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Restore Blog"><i class="fa fa-recycle" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteCity(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function restoreBlog($id)
    {
        Blog::withTrashed()->find($id)->restore();
        return back()->with('message', 'Restored Successfully');
    }

    public function hardDeleteBlog($id)
    {
        Blog::withTrashed()->find($id)->forceDelete();
    }
}
