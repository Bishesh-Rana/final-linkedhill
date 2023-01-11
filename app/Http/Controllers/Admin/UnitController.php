<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderBy('order')->get();
        return view('admin.unit.index',compact('units'));
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
    public function store(Request $request)
    {
        $unit = Unit::create([
            'name' => $request->name,

        ]);

        if ($unit)
        {
            return back()->with('message','Unit created successfully');
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
    public function update(Request $request, $id)
    {

        $unit =  Unit::where('id', $id)->update([
            'name' => $request->name,

        ]);

        if ($unit)
        {
            return back()->with('message','Unit updated successfully');
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
        $unit = Unit::find($id);
        $unit->delete();
    }

    public function updateUnit(Request $request){
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['unitItem'])) {
            foreach ($arr['unitItem'] as $key => $value) {  //id //parent_id
                Unit::where('id', $key)
                    ->update([
                        'order' => $order,
                        // 'parent_id' => ($value == 'null') ? NULL : $value
                    ]);
                $order++;
            }
        }
        return true;
    }
}
