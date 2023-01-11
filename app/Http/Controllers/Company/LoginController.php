<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm(){
        return view('company.login');
    }
    public function login(){
        dd('ssuucceessss');
    }
}
