<?php

namespace App\Http\Controllers\Website;

use App\Models\City;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        // return $request->all();  
        $filter = $request->all();
        $properties =  Property::filter()->where(['status'=>1,'activeStatus'=>1])
        ->when(request('properties'), function($query, $properties) {
            foreach($properties  as $key=>$value){
                if($value == 'any'){
                }
                else{
                    $query->whereHas('features', function ($que) use ($key,$value){  
                        if((int) $value == 0){
                                $que->where('feature_id',$key)->where('value','=',$value);
                        }else{
                            $value = (int) $value;
                            $que->where('feature_id',$key)->where('value','>=',$value);
                        }              
                    });
                }
                    
            }                     
        })
        ->when(request('property_address'), function($query,$var){
            $cities = City::get();
            $cities_name = [];
            foreach($cities as $city){
                array_push($cities_name,$city->name);
            }
            foreach($var as $v){
                if(in_array($v,$cities_name)){
                    $city_id = City::where('name',$v)->value('id');
                    $query->where('city_id','=',$city_id);
                }else{
                    $query->where('property_address','=',$v);
                }
            }
            
        }) 
        ->when(request('start_prize'), fn ($query) => $query->where('start_price', '>=', request('start_prize')))  
        ->when(request('end_prize'), fn ($query) => $query->where('start_price', '<=', request('end_prize')))
        ->when(request('roadtype'), fn ($query) => $query->where('road_type', '=', request('roadtype')))
        ->when(request('facing'), fn ($query) => $query->where('property_facing', '=', request('facing')))
        ->when(request('facility'), function($query, $var) {
            $query->whereHas('facility', function ($que) use ($var){   
            foreach($var as $v){ 
                $que->where('title','=',$v);
            }                        
            });
        })
        ->when(request('area'),function($query,$var){
            $unit = request('unit');
            $query->where('total_area','>=',$var)->where('total_area_unit','=',$unit);
        })
        ->when(request('listedby'), function($query,$var){
            switch($var){
                case "owner":
                    $query->orderBy('owner_name');
                    break;
                case "agent":
                    $query->whereHas('agent',function($que){
                        $que->orderBy('owner_id');
                    });
                    break;
                default:
                    $query->whereHas('agent',function($que){
                        $que->orderBy('owner_id');
                    });

            }
        })
        ->orderBy('order')->paginate(10);
        
        // $property =  Property::filter() ->paginate(20);
        // return $properties;

        return $this->returnResponse(PropertyResource::collection($properties)->sortBy('order'));
    }
}
