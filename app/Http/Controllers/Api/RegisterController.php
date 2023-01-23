<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends CommonController
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image'=>'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'token' => 'nullable',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->getMessages() as $field_name => $messages) {
                $errors = $messages[0];
            }
            return response()->json(['status' => false, 'code' => 400, 'message' => $errors], 400);
        }

        $user = $this->saveUser($request);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/images/profile/',$name);
            $user->profile=$name;
        }

        if ( ! $user->access_token) {
            $token = $user->access_token = $user->createToken('authToken')->accessToken;
        }
        $user->save();

        return (new UserResource($user))->additional(['status' => true, 'message' => "Registration successful."], 200);

    }

    public function saveUser(Request $request)
    {
        $user              =  new User();
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->password    = bcrypt($request->password);
//        if($request->hasFile('image')){
//            $file=$request->file('image');
//            $name =time().$file->getClientOriginalName();
//            $file->move(public_path().'/images/users/',$name);
//            $user->image=$name;
//
//        }
        $user->save();

        return $user;
    }
}
