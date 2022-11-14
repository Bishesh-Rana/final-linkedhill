<?php

namespace App\Http\Controllers\Website;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use App\Models\Property;

class FilterController extends Controller
{
    public function basicFilter(Request $request){
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
       return view('website.index.replace',compact('feature_values'));
    }

    public function advanceFilter(Request $request){
        $feature_values = [];
        $features = [];
        foreach($request->category_ids as $cat_id){
            $category = PropertyCategory::findOrFail($cat_id);
            $all_feature = $category->features->where('showOnFilter',1);
            foreach($all_feature as $feature){
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
       return view('website.index.advance',compact('feature_values'));
    }
    public function filterProperty(Request $request){
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
       return view('website.index.allProperty',compact('feature_values'));
    }
}
