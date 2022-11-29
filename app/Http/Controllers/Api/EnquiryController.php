<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
