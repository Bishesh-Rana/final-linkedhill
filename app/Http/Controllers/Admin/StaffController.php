<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role as Role;
use App\Models\Admin;
use App\Models\AgencyDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
        // if(auth()->user()->roles[0]->name=='Super Admin' || auth()->user()->roles[0]->name=='Admin'){
        //     // $enquiries = Enquiry::all();
        //     $users = User::all();
        //     // dd($users);
        // }
        // else{

        // }

        // if(auth()->user()->can('user-list')){
        //     $users = User::whereHas('roles', function (Builder $query) {
        //         $query->where('roles.name', '!=', 'Super Admin');
        //     })->latest()->get();
        // }else{
        //     if(auth()->user()->can('staff-list')){
        //         $users = User::where('user_id', auth()->user()->id)->get();
        //     }
        // }
        $users = User::visible()->latest()->get();
        return view('admin.staffs.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $latest_roles = [];
        if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin') ){
            $roles = $roles;
            $users = User::where( 'user_id',)
            -> where('is_active','1') -> get();
            $agents = AgencyDetail:: where( 'status','1')
            ->orWhere('type', ['Builder/ Developer','Real Estate Company'])
            -> get();
        }else{
            foreach($roles as $role){
                if(auth()->user()->hasRole($role)){
                    array_push($latest_roles,$role);
                }
            }
            $roles = (object) $latest_roles;
            // dd($roles);
        }
        $agents = AgencyDetail:: where( 'status','1')
        ->orWhere('type', ['Builder/ Developer','Real Estate Company'])
        -> get();

        
        return view('admin.staffs.create', compact('roles','agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd(time());
        $currentTime = Carbon::now();
        // dd( $currentTime->toDateTimeString());

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profile' => 'nullable',
            'mobile' => 'required|max:15',
            'phone' => 'nullable|max:15',
            'roles' => 'required'
        ]);
        if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin') ){
            $staff = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'profile' => $request->profile,
                    'mobile' => $request->mobile,
                    'phone' => $request->phone,
                    'user_id' => $request->user_id,
                    'is_active' => '1',
                    'email_verified_at' => $currentTime->toDateTimeString(),
                ]
            );
        }
        else{
            $staff = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'profile' => $request->profile,
                    'mobile' => $request->mobile,
                    'phone' => $request->phone,
                    'user_id' => auth()->user()->id,
                    'is_active' => '0',
                ]
            );
        }

        if(auth()->user()->can('staff-create')){
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
        $latest_roles = [];
        if(auth()->user()->hasRole('Super Admin')){
            $roles = $roles;
        }else{
            foreach($roles as $role){
                if(auth()->user()->hasRole($role)){
                    array_push($latest_roles,$role);
                }
            }
            $roles = (object) $latest_roles;
        }
        $agents = AgencyDetail:: where( 'status','1')
        ->orWhere('type', ['Builder/ Developer','Real Estate Company'])
        -> get();
        return view('admin.staffs.create', compact('staff', 'roles', 'agents'));
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
       
        if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin') ){
            $data = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'profile' => 'nullable',
                'mobile' => 'required|max:15',
                'phone' => 'nullable|max:15',
                'roles' => 'required',
                'is_active' => 'nullable',
                'user_id' => 'required'
            ]);
        }
        else{
            $data = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'profile' => 'nullable',
                'mobile' => 'required|max:15',
                'phone' => 'nullable|max:15',
                'roles' => 'required',
                'is_active' => 'nullable'
            ]);
        }
        if ($staff->id === auth()->user()->id && $request->is_active === '0') {
            return back()->with('fail', 'Sorry! you cannot deactivate your own account.');
        }

        $staff->update($data);
        if ($request->roles) {
            $staff->syncRoles([]);
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
