<?php

namespace App\Http\Controllers\Website;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function basicFilter(Request $request){
        $features = [];
        foreach($request->category_ids as $cat_id){
        $category = PropertyCategory::findOrFail($cat_id);
        foreach($category->features as $feature){
            array_push($features,$feature);
        }
       }
       return($features);   
    }
}
