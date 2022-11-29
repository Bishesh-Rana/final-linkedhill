<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{
    protected function my_validation($validation) {

        $validator = Validator::make(request()->all(), $validation);



        if($validator->fails()) {

            return ['status' => false, 'message' => $validator->errors()];

        }

        return ['status' => true];

    }
}
