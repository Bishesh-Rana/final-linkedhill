<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markRead($id, $property_id)
    {
        $admin = Admin::first();
        $data = $admin->notifications()->where('id', $id)->first();
        $data->read_at = Carbon::now();
        $data->save();

        return redirect(route('properties.show', $property_id));
    }
}
