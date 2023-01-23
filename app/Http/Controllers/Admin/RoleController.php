<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('role-list')){
            $roles = Role::latest()->get();
        }elseif(auth()->user()->can('staffrole-list')){
            $roles = Role::where('user_id',auth()->user()->id)->get();           
        }
        else{
            $roles = Role::where('id','this');
        }
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        if(auth()->user()->can('role-create')){
            $permissions = Permission::get()
                ->groupBy(function ($item, $key) {
                    return explode('-', $item->name)[0];
                })
                ->sortBy(function ($permission, $key) {
                    return count($permission);
                });
        }elseif(auth()->user()->can('staffrole-create')){
            $latest_permission = [];
            $permissions = Permission::get();
            foreach($permissions as $permission){
                if(auth()->user()->can($permission)){
                    array_push($latest_permission,$permission);
                }
            }

            // $permissions = (object) $latest_permission;

            $permissions = $permissions
                ->groupBy(function ($item, $key) {
                    return explode('-', $item->name)[0];
                })
                ->sortBy(function ($permission, $key) {
                    return count($permission);
                });
            
        }else{
            $permissions = Permission::where('name','this')->get();
        }
            
        
        $selectedPermission = [];
        return view('admin.roles.create', compact('permissions', 'role','selectedPermission'));
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
            'permissions' => 'required|distinct'
        ]);

        $role  = Role::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
        ]);

        if ($request->permissions) {
            $role->permissions()->attach($request->permissions);
        }

        return redirect(route('roles.index'))->with('message', 'Role created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $selectedPermission = $role->permissions()->pluck('id')->toArray();

        $permissions = Permission::get()
            ->groupBy(function ($item, $key) {
                return explode('-', $item->name)[0];
            })
            ->sortBy(function ($permission, $key) {
                return count($permission);
            });
        return view('admin.roles.create', compact('role', 'permissions', 'selectedPermission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        // return $request->all();
        $this->validate($request, [
            'name' => 'required|max:90',
            'permissions' => 'required|distinct'
        ]);
        $data = $request->only(['name']);

        // update the Product
        $role->update($data);
        $role->permissions()->sync([]);
        $role->permissions()->sync($request->permissions);

        return redirect(route('roles.index'))->with('message', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $role->delete();
        $role->permissions()->detach();

        // return back()->with('success', 'Role has been deleted successfully.');
    }
}
