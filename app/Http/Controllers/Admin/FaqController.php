<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['faqs'] = Faq::latest()->get();
        return view('admin.faq.index', $this->data);
    }

    public function getFaq()
    {
        $faq = Faq::select('id', 'question', 'answer')->latest();
        return DataTables::of($faq)
            ->editColumn('answer', function ($faq) {
                return substr(strip_tags($faq->answer), 0, 70) . '.....';
            })
            ->addColumn('action', function ($faq) {
                return view('admin.faq.datatables._actions', compact('faq'))->render();
            })->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {

        $data = Faq::create($request->all());
        return redirect(route('faq.index'))->with('message', 'Faq created successfully');
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
    public function edit(Faq $faq)
    {

        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {

        $faq->update($request->all());

        if (!$request->featured) {
            $faq->featured = false;
        }

        $faq->save();

        return back()->with('message', 'Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id)->delete();
    }

    public function deletedFaqs()
    {
        return view('admin.trash.faq.index');
    }

    public function getDeletedFaqs()
    {
        $faq = Faq::select('id', 'question', 'answer')->onlyTrashed()->latest();
        return DataTables::of($faq)
            ->editColumn('answer', function ($faq) {
                return substr(strip_tags($faq->answer), 0, 70) . '.....';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('restoreFaq', $p->id) . '" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Restore Faq"><i class="fa fa-recycle" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteFaq(' . $p->id . ')" class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function restoreFaq($id)
    {
        Faq::withTrashed()->find($id)->restore();
        return back()->with('message', 'Faq restore Successfully');
    }

    public function hardDeleteFaq($id)
    {
        Faq::withTrashed()->find($id)->forceDelete();
    }
}
