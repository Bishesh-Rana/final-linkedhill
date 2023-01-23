<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TradelinkRequest;
use App\Models\Tradelink;
use App\Models\TradelinkCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TradelinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tradelink.index');
    }

    public function getTradelink()
    {
        $tradelink = Tradelink::select('id', 'name', 'phone', 'image')->latest();
        return DataTables::of($tradelink)
            ->addColumn('image', function ($tradelink) {
                return '<img src=' . $tradelink->image . '  class="news_img" align="center" />';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('tradelink.edit', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Blog"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteTradelink(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
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
        $tradelink = new Tradelink();
        $categories = TradelinkCategory::orderBy('title', 'asc')->where('parent_id', '<>', null)->select('title', 'id')->get();
        return view('admin.tradelink.form', compact('tradelink', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TradelinkRequest $request)
    {
        try {
            Tradelink::create($request->validated());
            return back()->with('message', 'Tradelink created successfully');
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
        $tradelink = Tradelink::findorfail($id);
        $categories = TradelinkCategory::orderBy('title', 'asc')->where('parent_id', '<>', null)->select('title', 'id')->get();
        return view('admin.tradelink.form', compact('tradelink', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TradelinkRequest $request, $id)
    {
        $tradelink = Tradelink::findorfail($id);
        try {
            $tradelink->update($request->validated());
            return back()->with('message', 'Tradelink  updated successfully');
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
    public function destroy($id)
    {
        $tradelink = Tradelink::findorfail($id);
        try {
            $tradelink->delete();
            return back()->with('message', 'Tradelink  deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('message', $th->getMessage())->withInput();
        }
    }
}
