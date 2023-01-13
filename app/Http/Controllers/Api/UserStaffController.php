<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::visible()->latest()->get();
        return  $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
                    return response(['status'=>'fail','message'=> "Your don't have permission to create"]);
                }else{
                    $staff->assignRole($request->roles);
                } 
            }
                                 
        }else{
            if ($request->roles) {
                $staff->assignRole($request->roles);
            }
        }
        return response(['status'=>'true', 'message'=> 'Staff created successfully.']);
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
        $staff = User::findOrFail($id);
        return $staff;
       
        if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin') ){
            $data = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'profile' => 'nullable',
                'mobile' => 'required|max:15',
                'phone' => 'nullable|max:15',
                'roles' => 'required',
                'is_active' => 'nullable',
                // 'user_id' => 'required'
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
            return response(['status'=>'fail','message'=> "Your don't have permission to update"]);
        }

        $staff->update($data);
        if ($request->roles) {
            $staff->syncRoles([]);
            $staff->assignRole($request->roles);
        }

        return response(['status'=>'true', 'message'=> 'Staff updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = User::findOrFail($id);
        if ($staff->id === auth()->user()->id) {
            return back()->with('message', 'Sorry! You cannot delete your own account.');
        }
        // $staff->deleteImage();
        $staff->delete();
        // $staff->roles()->detach();
        return back()->with('success', 'User deleted successfully.');
    }
}
