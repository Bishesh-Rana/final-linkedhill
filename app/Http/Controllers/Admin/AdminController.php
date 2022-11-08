<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebsiteRequest;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function setting()
    {
        $data = Admin::find(1);
        $website = Website::first();
        return view('admin.setting', compact('data', 'website'));
    }

    public function settingSubmit(WebsiteRequest $request)
    {
        $website = Website::first();
        $website->update($request->validated());
        $website->address = $request->address;
        $website->save();

        return back()->with('message', 'Website updated successfully');
    }

    public function subscribers()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscriber', compact('subscribers'));
    }

    public function deleteSubscriber(Subscriber $subscriber)
    {
        $subscriber->delete();
    }
}
