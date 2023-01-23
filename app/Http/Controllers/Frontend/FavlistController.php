<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavouriteList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavlistController extends Controller
{
    public function addToFavList($id)
    {
        $data = FavouriteList::where(['user_id'=>Auth::user()->id,'property_id'=>$id])->first();

        if(!$data)
        {
            FavouriteList::create([
                'user_id' => Auth::user()->id,
                'property_id' => $id,
            ]);


        }

    }
}
