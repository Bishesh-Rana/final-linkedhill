<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FavouriteList;
use App\Http\Controllers\Controller;

class FavoritePropertyController extends Controller
{
    public function index(){
        $favorite_properties = FavouriteList::with('property')->where('user_id',auth()->user()->id)->get();
        return view('admin.property.favoriteProperty',compact('favorite_properties'));
    }
}
