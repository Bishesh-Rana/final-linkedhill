<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Carbon\Carbon;
use App\Mail\VerifiedMail;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\Admin\AgencyRequest;
use Illuminate\Validation\ValidationException;


class AgencyController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $data;
  
    public function index()
    {
        $agencies = AgencyDetail::where('status',1)->with('agent')->get();
        // dd($agencies);
        $pageHeading = "Verified Agency";
        return view('admin.agency.agency', compact('pageHeading','agencies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgencyRequest $request)
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
            request()->session()->flash('success', 'Agent created successfully');
            return redirect(route('nonVerified'));
        } catch (ValidationException $th) {
            DB::rollBack();
            request()->session()->flash('error', implode(",", collect($th->errors())->flatten()->toArray()));
            return redirect()->back()->withInput();
        } catch (\Throwable $th) {
            DB::rollBack();
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage())->withInput();
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
        $this->data['agency'] = AgencyDetail::where('id', $id)->first();
        return view('admin.agency.agency_detail', $this->data);
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

    public function blockAgency(Request $request)
    {
        $agent = User::find($request->user_id);
        $agent->is_blocked = $request->is_blocked;
        $agent->block_remark = $request->block_remark;
        $agent->save();

        $agency = AgencyDetail::where('user_id', $request->user_id)->first();
       
        // $agency->block_remark = $request->block_remark;
        if( $request->is_blocked == '0'){
            $agency->status = 1;
            $agency->status_remarks = $request->block_remark;
        }
        else{
            $agency->status = 3;
            $agency->status_remarks = $request->block_remark;

        }

        
        $agency->save();

        return back()->with('message', 'Action Performed Successfully');
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

        return back()->with('message', 'Agency Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = AgencyDetail::find($id);
        $agency->delete();
    }

    public function deletedAgency()
    {

        $this->data['agencies'] = AgencyDetail::with('agent')->onlyTrashed()->latest()->get();
        return view('admin.trash.agency.index', $this->data);
    }

    public function getDeletedAgency()
    {
    }

    public function restoreAgency($id)
    {
        AgencyDetail::withTrashed()->find($id)->restore();
        return back()->with('message', 'Agency Restored Successfully');
    }

    public function hardDeleteAgency($id)
    {

        $agency = AgencyDetail::find($id);
        AgencyDetail::withTrashed()->find($id)->forceDelete();

        $oldLogo = public_path() . '/images/logo/' . $agency->logo;
        if (\File::exists($oldLogo)) {
            \File::delete($oldLogo);
        }

        $oldfile = public_path() . '/documents/' . $agency->other_document;
        if (\File::exists($oldfile)) {
            \File::delete($oldfile);
        }
    }
}
