<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function getTestimonial()
    {
        $testimonial = Testimonial::select('id', 'image', 'name', 'message')->latest();
        return DataTables::of($testimonial)
            ->addColumn('image', function ($testimonial) {
                $url = $testimonial->image;
                return '<img src=' . $url . '  class="news_img" align="center" />';
            })
            ->editColumn('message', function ($testimonial) {
                return substr(strip_tags($testimonial->message), 0, 70) . '.....';
            })
            ->addColumn('action', function ($testimonial) {
                return view('admin.testimonial.datatables._actions', compact('testimonial'))->render();
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
        $testimonial  = new Testimonial();

        return view('admin.testimonial.form', compact('testimonial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Testimonial::create($request->all());
            return redirect(route('testimonial.index'))->with('message', 'Testimonial created successfuly.');
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
    public function edit(Testimonial  $testimonial)
    {

        return view('admin.testimonial.form', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $testimonial->update($request->all());
            return back()->with('message', 'Testimonial updated successfuly.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {



        //        $oldfile = public_path().'/images/testimonial/'.$testimonial->image;
        //        if(\File::exists($oldfile)){
        //            \File::delete($oldfile);
        //        }

        $testimonial->delete();
    }

    public function deletedTestimonials()
    {
        return view('admin.trash.testimonial.index');
    }

    public function getDeletedTestimonials()
    {
        $testimonial = Testimonial::select('id', 'image', 'name', 'message')->onlyTrashed()->latest();
        return DataTables::of($testimonial)
            ->addColumn('image', function ($testimonial) {
                $url = $testimonial->image;
                return '<img src=' . $url . '  class="news_img" align="center" />';
            })
            ->editColumn('message', function ($testimonial) {
                return substr(strip_tags($testimonial->message), 0, 70) . '.....';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('restoreTestimonial', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Restore Testimonial"><i class="fa fa-recycle" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteCity(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function restoreTestimonial($id)
    {
        Testimonial::withTrashed()->find($id)->restore();
        return back()->with('message', 'Restored Successfully');
    }

    public function hardDeleteTestimonial($id)
    {

        Testimonial::withTrashed()->find($id)->forceDelete();
    }
}
