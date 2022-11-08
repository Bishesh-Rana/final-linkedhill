<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $this->data['blogs'] = Blog::where(['type' => 'news'])->latest()->get();
        return view('admin.news.index', $this->data);
    }

    public function getNews()
    {
        $news = Blog::select('id', 'image', 'title', 'description')->where('type', 'news')->latest();
        return DataTables::of($news)
            ->addColumn('image', function ($news) {
                $url = $news->image;
                return '<img src=' . $url . '  class="news_img" align="center" />';
            })
            ->editColumn('description', function ($news) {
                return substr(strip_tags($news->description), 0, 70) . '.....';
            })
            ->addColumn('action', function ($news) {
                return view('admin.news.datatables._actions', compact('news'));
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

        $news = new Blog();
        $categories = Category::where(['type' => 'news'])->latest()->get();
        return view('admin.news.form', compact('news', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try {
            $blog = Blog::create(array_merge($request->validated(), ['type' => 'news']));
            $blog->categories()->sync($request->category_id);
            return redirect(route('news.index'))->with('message', 'News created successfuly.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Blog::find($id);
        $categories = Category::where(['type' => 'blog'])->latest()->get();

        return view('admin.news.form', compact('news', 'categories'));
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
        return back()->with('message', 'News updated successfuly.');
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

    public function deletedNews()
    {
        return view('admin.trash.news.index');
    }

    public function getDeletedNews()
    {
        $blogs = Blog::select('id', 'image', 'title', 'description')->where('type', 'news')->onlyTrashed()->latest();
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
                    '<a href="' . route('restoreBlog', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Restore News"><i class="fa fa-recycle" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteCity(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['image', 'action'])
            ->make(true);
    }
}
