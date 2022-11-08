<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AgencyDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;
use App\Actions\Fortify\CreateNewUser;

class AgentRegistrationController extends Controller
{
    public function getAgentRegistration(){
        return view('website.agent.registration');
    }
    public function postAgentRegistration (Request $request){
        $validator = $this->validate(request(), [
            'name' => 'required',
            'mobile' => 'required|unique:users|max:20',
            'email' => 'required|unique:users|max:255',
            'password' => 'min:8',
        ]);


        \DB::beginTransaction();
        try{
            $user = (new CreateNewUser())->create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->password,
                'password_confirmation' => $request->password,
            ]);
            $user->assignRole(['3']);

            $agent = AgencyDetail::create([
                'status' => 2,
                'type' => $request->type,
                'user_id' => $user->id,
                'agency_name' => $request->name,
                'agency_email' => $request->email,
                'website' => $request->website,
                'address' => $request->address,
                'agency_phone' => $request->agency_phone,
                'agency_mobile' => $request->mobile,
                'company_reg_no' => $request->company_reg_no,
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


        // $maildata = [
        //     'email'             => $agent->agency_email,
        //     'name'              => $agent->agency_name,
        // ];
        // Mail::send('emails/user_registration_mail', $maildata, function ($message) use ($maildata) {
        //     $message->to($maildata['email'], $maildata['name'])
        //         ->subject('New Agent Registration');
        //     $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        // });
        \DB::commit();
        $request->session()->flash('success', "Registration Application Submitted Successfully.");
        return redirect()->back();
         } catch (\Exception $e) {
            \DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
    }


}
