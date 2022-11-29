<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PricingRequest;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pricings = Pricing::when($request->trashed, function ($query) {
            return $query->withTrashed();
        })->get();
        return view('admin.pricings.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricing = new Pricing();
        return view('admin.pricings.form', compact('pricing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricingRequest $request)
    {
        $data = $request->validated();
        try {
            Pricing::create($data);
            request()->session()->flash('success', 'Pricing Created successfully');
            return redirect()->route('pricings.index');
        } catch (\Throwable $th) {
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back()->withInput();
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
        return redirect()->route('pricings.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricing = Pricing::findorfail($id);
        return view('admin.pricings.form', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricingRequest $request, $id)
    {
        $pricing = Pricing::findorfail($id);
        $data = $request->validated();
        try {
            $pricing->update($data);
            request()->session()->flash('success', 'Pricing Created successfully');
            return redirect()->route('pricings.index');
        } catch (\Throwable $th) {
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back()->withInput();
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
        $pricing = Pricing::findorfail($id);
        $pricing->delete();
        request()->session()->flash('success', 'Pricing deleted successfully');
        return redirect()->back();
    }
}
