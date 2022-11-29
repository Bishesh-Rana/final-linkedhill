<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdvertisementController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.advertisement.index');
    }

    public function getAdvertisements()
    {
        $advertisements = Advertisement::select('id', 'image', 'title', 'section')->latest();
        return DataTables::of($advertisements)
            ->addColumn('image', function ($advertisement) {
                return '<img src=' .  $advertisement->image . '  class="news_img" align="center" />';
            })

            ->addColumn('action', function ($advertisement) {
                return view('admin.advertisement.datatables._actions', compact('advertisement'));
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
        $advertisement = new Advertisement();
        return view('admin.advertisement.form', compact('advertisement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {

        try {
            Advertisement::create($request->validated());
            return redirect(route('advertisements.index'))->with('message', 'Advertisement created successfuly.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {

        return view('admin.advertisement.form', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, Advertisement $advertisement)
    {
        try {
            $advertisement->update($request->validated());
            return back()->with('message', 'Advertisement updated successfuly.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {

        try {
            $advertisement->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
