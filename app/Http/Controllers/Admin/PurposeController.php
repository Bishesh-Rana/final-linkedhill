<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purposes = Purpose::latest()->get();
        return view('admin.purpose.index',compact('purposes'));
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
        $this->validate($request, [
            'name' => 'required|max:90',
        ]);
        $purpose = Purpose::create([
            'name' => $request->name,

        ]);

        if ($purpose)
        {
            return back()->with('message','Purpose created successfully');
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
        $this->validate($request, [
            'name' => 'required|max:90',
        ]);

        $purpose =  Purpose::where('id', $id)->update([
            'name' => $request->name,

        ]);

        if ($purpose)
        {
            return back()->with('message','Purpose updated successfully');
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
        $purpose = Purpose::find($id);
        $purpose->delete();
    }
    public function updatePurposeOrder(Request $request)
    {
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['purposeItem'])) {
            foreach ($arr['purposeItem'] as $key => $value) {  //id //parent_id
                Purpose::where('id', $key)
                    ->update([
                        'order' => $order,
                        'parent_id' => ($value == 'null') ? NULL : $value
                    ]);
                $order++;
            }
        }
        return true;
    }
}
