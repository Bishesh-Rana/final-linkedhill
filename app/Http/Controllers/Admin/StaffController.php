<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role as Role;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('roles.name', '!=', 'Super Admin');
        })->latest()->get();

        return view('admin.staffs.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $roles = Role::all();
        return view('admin.staffs.create', compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profile' => 'nullable',
            'mobile' => 'required|max:15',
            'phone' => 'nullable|max:15',
            'roles' => 'required'
        ]);

        $staff = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'profile' => $request->profile,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'user_id' => auth()->user()->id,
            ]
        );
        if(auth()->user()->hasRole('Agent')){
            foreach($request->roles as $role){
                if($role == 1 || $role == 2){
                    return redirect()->back()->with('message', "Your don't have permission to create");
                }else{
                    $staff->assignRole($request->roles);
                } 
            }
                                 
        }else{
            if ($request->roles) {
                $staff->assignRole($request->roles);
            }
            
        }
        return redirect(route('staffs.index'))->with('message', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function edit(User $staff)
    {

        $roles = Role::all();
        return view('admin.staffs.create', compact('staff', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $staff)
    {
        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile' => 'nullable',
            'mobile' => 'required|max:15',
            'phone' => 'nullable|max:15',
            'roles' => 'required',
            'is_active' => 'nullable'
        ]);
        if ($staff->id === auth()->user()->id && $request->is_active === '0') {
            return back()->with('fail', 'Sorry! you cannot deactivate your own account.');
        }

        $staff->update($data);
        if ($request->roles) {
            $staff->assignRole($request->roles);
        }

        return redirect(route('staffs.index'))->with('message', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $staff)
    {

        if ($staff->id === auth()->user()->id) {
            return back()->with('message', 'Sorry! You cannot delete your own account.');
        }

        // $staff->deleteImage();
        $staff->delete();
        // $staff->roles()->detach();
        return back()->with('success', 'User deleted successfully.');
    }

    /***
     * Status of Product Active/Deactive
     *
     */

    public function isActive(Request $request)
    {
        $user = User::find($request->id);
        if ($user->id === auth()->user()->id) {
            return back()->with('fail', 'Sorry! you cannot deactivate your own account.');
        }

        $user->update(['is_active' => $request->is_active]);

        if ($request->is_active === '1') {
            return back()->with('success', 'User activated successfully.');
        }

        return back()->with('success', 'User deactivated successfully.');
    }
}
