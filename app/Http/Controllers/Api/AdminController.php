<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   
    public function subscribers()
    {
        $subscribers = Subscriber::all();
        return $subscribers;
        return $this->successResponse($subscribers);
    }
    public function deleteSubscriber($id){
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return response(['status'=>'success','message' =>'Subscriber deleted Successfully.']);
    }
}
