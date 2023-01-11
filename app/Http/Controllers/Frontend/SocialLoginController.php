<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function getFacebookCallback() {

        $data = Socialite::driver('facebook')->stateless()->user();
        $user = \App\Models\User::where('email', $data->email)->first();
        if(!is_null($user)) {
            $user->name        = $data->user['name'];
            $user->social_id   = $data->user['id'];
            $user->social_from = 'facebook';
            $user->save();

        } else {
            $user = \App\Models\User::where('email', $data->user['id'])->first();
            if(is_null($user)) {
                // Create a new user
                $user              = new \App\Models\User();
                $user->social_id   = $data->user['id'];
                $user->name        = $data->user['name'];
                $user->social_from = 'facebook';
                $user->email       = $data->email;
                $user->save();

            }
        }
        $user->assignRole(['5']);
        Auth::login($user);
        return redirect(url('/'))->with('success_message', 'Successfully logged in!');
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function getGoogleCallback() {
        $data = Socialite::driver('google')->user();
        $user = \App\Models\User::where('email', $data->email)->first();
        if(!is_null($user)) {
            $user->name        = $data->user['name'];
            $user->social_id   = $data->user['id'];
            $user->social_from = 'facebook';
            $user->save();
        } else {
            $user = \App\Models\User::where('social_id', $data->user['id'])->first();
            if(is_null($user)) {

                // Create a new user
                $user              = new \App\Models\User();
                $user->social_id   = $data->user['id'];
                $user->name        = $data->user['name'];
                $user->social_from = 'facebook';
                $user->email       = $data->email;
                $user->save();

            }
        }

        $user->assignRole(['5']);
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Successfully logged in!');

    }

    public function logout() {
        auth()->logout();

        return back()->with('success', 'You are logged out.');
    }
}
