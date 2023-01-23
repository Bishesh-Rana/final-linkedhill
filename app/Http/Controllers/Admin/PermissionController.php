<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_permissions = [];
        if(auth()->user()->can('permission-list')){
            $permissions = Permission::latest()->get();
        }elseif(auth()->user()->can('staffpermission-list')){
            $permissions = Permission::get();
            foreach($permissions as $permission){
                // dd($permission);
                if(auth()->user()->can($permission->name)){
                    array_push($latest_permissions,$permission);
                }
            }
            $permissions = (array) $latest_permissions;
        }else{
            $permissions = Permission::where('name','this');
        }
        

        return view('admin.permission.index', compact('permissions'));
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

        Permission::create([
            'name' => Str::slug($request->name, '-'),
        ]);

        return back()->with('message', 'Permission created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return response()->json($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:90',
        ]);

        // update the Product
        $permission->update($data);

        return back()->with('message', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
    }
}
