<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function filter(Request $request){
        $feature_values = [];
        $features = [];
        foreach($request->category_ids as $cat_id){
            $category = PropertyCategory::findOrFail($cat_id);
            $all_feature = $category->features->where('showOnFilter',1);
            foreach($all_feature as $key=> $feature){
                array_push($features,$feature);
            }
       }

       foreach($features as $feature){
            $values = [];
            if($feature->value){
                foreach($feature->value as $val){
                    array_push($values,$val->value);
                }
            }
            $feature_values[$feature->id]=$values;
       }

       return response()->json([
            'data'=> $feature_values,
            'message' => "feature values",
       ],200);
    }
}
