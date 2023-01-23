<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgencyRequest;
use App\Models\Admin;
use App\Models\AgencyDetail;
use App\Models\AgencyProperty;
use App\Models\User;
use App\Models\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = UserAgent::where('user_id',Auth::user()->id)->pluck('agent_id')->toArray();
        $agents = AgencyDetail::where("status","verified")->where("user_id",'!=',Auth::user()->id)->get();
        return view('frontend.dashboard.agent.index',compact('agents','ids'));
    }

    public function myAgency()
    {
        $agencies = Auth::user()->appliedAgencies;


        return view('frontend.dashboard.agent.myAgency',compact('agencies'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hasAccount = false;

        if(Auth::user()->hasAgency)
        {
            $hasAccount = true;
            $message_verified= "Your agency is verified by Admin";
            $message = "You have requested to add your agency. Please wait for Admin approval.";
            return view('frontend.dashboard.agent.create',compact('message','hasAccount','message_verified'));
        }else{
            return view('frontend.dashboard.agent.create',compact('hasAccount'));
        }


    }

    /**
     *  Apply as agent
     */

    public function applyAsAgent(Request $request)
    {
        $user =  Auth::user();
        $user->agents()->sync(
           $request->agent_id
        );

        return back()->with('message','Applied to agent successfully');


    }


    public function assignPropertyToAgentSubmit(Request $request)
    {

        $data = AgencyProperty::where(['property_id'=>$request->property_id])->first();

        if ($data){
            return back()->with('message','Property already assign to agency ');
        }
        $item = new AgencyProperty();
        $item->property_id = $request->property_id;
        $item->agency_id = $request->agency_id;
        $item->owner_id = Auth::user()->id;
        $item->save();

        return back()->with('message','Property assign to agency succesfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = AgencyDetail::create($request->all());

        if($request->hasFile('logo')){
            $file=$request->file('logo');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/images/logo/',$name);
            $agent->logo=$name;
        }

        if($request->hasFile('other_document')){
            $file=$request->file('other_document');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/documents/',$name);
            $agent->other_document=$name;
        }
        $agent->save();
        return back();

    }

    public function assignPropertyToAgent()
    {
        $agency_property = Auth::user()->agency_property;
//        $agency_property = Auth::user()->agency_property;
        $properties = Auth::user()->properties;
        $agencies = Auth::user()->appliedAgencies;
        return view('frontend.dashboard.agent.assign_agency',compact('properties','agencies','agency_property'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = AgencyProperty::find($id);
        $data->delete();
    }

    public function deleteMyAgency(Request  $request)
    {
       UserAgent::find($request->id)->delete();
    }
}
