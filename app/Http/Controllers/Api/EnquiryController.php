<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnquiryRequest;
use App\Http\Resources\EnquiryResource;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data =  Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'subject' => ['required', 'max:190'],
                'message' => ['required', 'max:300'],
            ])->validate();
            Enquiry::create($data);
            return $this->successResponse('Enquiry Posted successfully. ', 'Enquiry Posted successfully. ');
        } catch (ValidationException $exception) {
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function index()
    {
       $enquiries = [];
        if(auth()->user()->roles[0]->name=='Super Admin' || auth()->user()->roles[0]->name=='Admin'){
            $enquiries = Enquiry::orderBy('created_at','DESC')->get();       
        }
        else{
            $user = auth()->user();           
            $properties = auth()->user()->properties;
            foreach ($properties as $key => $property) {
                $enquiries = Enquiry::where('property_id',$property->id)->orderBy('created_at','DESC')->get();
            }
        }
        if(count($enquiries)>0){
            foreach($enquiries as $data)
            {
                $data->setAttribute('propety_name',null);
                if($data->getProperty !=null && $data->getProperty->count() >0)
                {
                    $data['property_name']=$data->getProperty->title;
                }
            } 
        }
        return EnquiryResource::collection($enquiries);
    }
}
