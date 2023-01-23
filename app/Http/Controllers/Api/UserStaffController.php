<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserAgent;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\Admin\AgencyRequest;
use Illuminate\Validation\ValidationException;

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
    function updateUserStatus(Request $request)
    {
        $user = User::find($request->id);
        if ($user->id === auth()->user()->id) {
            return response()->json(['fail'=> 'Sorry! you cannot deactivate your own account.']);
        }

        $user->update(['is_active' => $request->is_active]);

        if ($request->is_active === '1') {
            return response()->json(['success'=> 'User activated successfully.']);
        }

        return response()->json(['statsu'=>'success','message'=> 'User deactivated successfully.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return User::all();
        $staff = User::findOrFail($id);

        if ($staff->id === auth()->user()->id) {
            return response()->json(['message'=> 'Sorry! You cannot delete your own account.']);
        }
        // $staff->deleteImage();
        $staff->delete();
        // $staff->roles()->detach();
        return response()->json(['success' => 'User deleted successfully.']);
    }

    public function createAgent(AgencyRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = (new CreateNewUser())->create([
                'name' => $request->agency_name,
                'email' => $request->email,
                'phone' => $request->agency_phone,
                'password' => $request->email,
                'password_confirmation' => $request->email,
            ]);

            $user->assignRole(['3']);

            $agent = AgencyDetail::create([
                'status' => 1,
                'user_id' => $user->id,
                'agency_name' => $request->agency_name,
                'agency_email' => $request->email,
                'website' => $request->website,
                'address' => $request->address,
                'agency_phone' => $request->agency_phone,
                'agency_mobile' => $request->agency_mobile,
            ]);
           
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/logo/', $name);
                $agent->logo = $name;
            }

            if ($request->hasFile('other_document')) {
                $file = $request->file('other_document');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/documents/', $name);
                $agent->other_document = $name;
            }
            $agent->save();
            DB::commit();
            return response()->json(['status'=>'true','message'=> 'Agent created successfully.']);
        } catch (ValidationException $th) {
            DB::rollBack();
            return response()->json(['status'=>'error','message'=> implode(",", collect($th->errors())->flatten()->toArray())]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status'=>'fail', 'message'=>$th->getMessage()]);
        }
    }
    public function updateAgent(Request $request ,$id)
    {
        $agencyData = AgencyDetail::find($id);
        $agencyData->status = $request->status;

        if ($agencyData->save()) {
            if ($request->status == "verified") {
                DB::table('properties')
                    ->where("user_id", '=',  $agencyData->agent->id)
                    ->update(['hasAgent' => 1]);
                    $user = User::where('id',$agencyData->user_id)->first();
                    $time = Carbon::now();
                    $user->update(['email_verified_at'=>$time]);
                    Mail::to($user->email)->send(new VerifiedMail());
            } else {
                DB::table('properties')
                    ->where("user_id", '=',  $agencyData->agent->id)
                    ->update(['hasAgent' => 0]);
            }
        }
        return response()->json(['status'=>'success', 'message'=>'Agency Status Updated Successfully']);
    }

    public function agents(){
        $agents = AgencyDetail::where('status', '1')->with('agent')->get();
        return $this->successResponse($agents);
    }
    public function deleteAgent($id){
        $agent = AgencyDetail::find($id);
        $agent->delete();
        $agent->agent->delete();
        return response()->json(['status'=>'success','message'=>'Agency Deleted Successfully']);
    }
    public function getDeletedAgency(){
        $agents = AgencyDetail::onlyTrashed()->get();
        return $this->successResponse($agents);
    }
    public function restoreAgency($id){
        AgencyDetail::withTrashed()->find($id)->restore();
        return response()->json(['status'=>'success', 'message'=>'Agency restored Successfully']);
    }
    public function hardDeleteAgency($id)
    {
        AgencyDetail::withTrashed()->find($id)->forceDelete();
        return response()->json(['status'=>'success','message'=>'Agency  deleted Successfully']);
    }
       
}
