<?php

namespace App\Http\Controllers\Website;

use App\Models\City;
use App\Models\Menu;
use App\Models\Unit;
use App\Models\User;
use App\Models\Feature;
use App\Models\Purpose;
use App\Models\Facility;
use App\Models\Property;
use App\Traits\CommonTrait;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\PropertyCategory;
use App\Models\PropertyFacility;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class PropertyController extends Controller
{
    use CommonTrait;
    public function propertyDetail($id, $slug)
    {
        $user = auth()->user();
        // if (!empty($user) && !$user->access_token) {
        //     $user->access_token = $user->createToken('authToken')->accessToken;
        //     $user->save();
        // }
        $property = Property::where(['slug' => $slug, 'id' => $id])->with(['images', 'amenities', 'faqs', 'features'])->firstorfail();
        $property->increment('view_count');
        $related = Property::latest()->where('area_id', '=', $property->area_id)->with('city')->limit(3)->get();
        $advertisement =  Advertisement::where('page', 'home')->limit(1)->get();
        $count = DB::table('properties')->groupBy('type')->selectRaw('count(*) as total,type')->get();
        return view('website.pages.detail', compact('property', 'related', 'count', 'advertisement'))
            ->with('meta', $this->getMeta($property));
    }


    public function search(Request $request)
    {
        // dd($request->all());
        $filter = $request->all();
        $properties =  Property::filter()->where('status',1) 
        ->when(request('properties'), function($query, $properties) {
            foreach($properties  as $key=>$value){
                    if($value == 'any'){
                        //do nothing
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
        // ->when(request('property_address'), fn ($query) => $query->where('property_address', '=', request('property_address')))
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
        // ->when(request('sorting'),function($query, $var){
        //     switch($var){
        //         case "low":
        //             $query->orderBy('start_price');
        //             break;
        //         case "hign":
        //             $query->orderBy('start_price',"DESC");
        //             break;
        //         case 'latest':
        //             $query->orderBy('created_at','DESC');
        //             break;
        //         case 'oldest':
        //             $query->orderBy('created_at');
        //             break;
        //         default:
        //             $query->orderBy('created_at');
        //     }
        // }) 
        ->orderBy('order')->paginate(5);
        $meta = $this->getMeta();
        $advertisements = $this->getAd('property'); 
        $purposes = Purpose::all();
        $property = Property::all();
        $propertyCat = PropertyCategory::orderBy('order')->get();
        $facilities = Facility::orderBy('order')->get();
        $units = Unit::orderBy('order')->get();
        $feature_values = [];
        $features = [];
        $id = PropertyCategory::where('name',"=","House")->value('id');
        $category = PropertyCategory::findOrFail($id);
        $all_feature = $category->features->where('showOnFilter',1);
        $all_feature = collect($all_feature);
        $all_feature = $all_feature->sortBy('position');

        $addresses = [];
        
        $all_cities = City::get();
        foreach($all_cities as $city){
            array_push($addresses,$city->name);
        }
        $all_properties = Property::get();
        foreach($all_properties as $property){
            array_push($addresses,$property->property_address);
        }
        $addresses = array_unique($addresses);

        foreach($all_feature as $key=> $feature){
            array_push($features,$feature);
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
        $pagedata = new Menu();
        return view('website.pages.propertylist', compact('addresses','facilities','pagedata', 'units','meta', 'properties','advertisements', 'filter' , 'purposes','property','propertyCat','feature_values'))->with('meta', $this->getMeta());
    }

    public function getMeta($meta = [])
    {
        return [
            'meta_title' => $meta['title'] ?? config('websites.name'),
            'meta_keyword' => $meta['meta_keyword'] ?? config('websites.meta_keyword'),
            'meta_description' => $meta['property_detail'] ?? config('websites.meta_description'),
            'meta_keyphrase' =>  $meta['meta_keyphrase'] ?? config('websites.meta_description'),
            'og_image' => $meta['image'] ?? config('websites.og_image'),
            'og_url' => route('home'),
            'og_site_name' => config('websites.name'),
            'twitter' => config('websites.twitter'),
        ];
    }
}
