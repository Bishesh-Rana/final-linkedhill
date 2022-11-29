<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeviceCredentialResource;
use App\Models\DeviceCredential;
use Illuminate\Http\Request;

class DeviceCredentialController extends Controller
{
    public function device()
    {
        $deviceCredential =  DeviceCredential::where('userId', request()->user()->id)->latest()->paginate(20);
        return $this->returnResponse(DeviceCredentialResource::collection($deviceCredential), $paginate = true);
    }
}
