<?php

namespace App\Http\Controllers\Website;

use App\Models\Menu;
use App\Models\User;
use App\Models\Feature;
use App\Models\Purpose;
use App\Models\Facility;
use App\Models\Property;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\PropertyCategory;
use App\Models\PropertyFacility;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class PropertyController extends Controller
{
    use CommonTrait;
    public function propertyDetail($id, $slug)
    {
        $user = auth()->user();
        if (!empty($user) && !$user->access_token) {
            $user->access_token = $user->createToken('authToken')->accessToken;
            $user->save();
        }
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
        // $property = Property::with('features')->latest()->first();
        // dd($property);
        // $properties = Property::with('features')->where('category_id', $request->category_id)->get();
        // dd(collect($properties)->toArray());
        // $collections = collect($properties)->map(function($row, $index){
        //       if(count($row->features) <= 0){
        //         return null;
        //       }else{
        //         return $row;

        //       }
        // });

        // dd(collect($collections)->whereNotNull()->toArray());
        // Arr::get($filter, 'properties')
        $properties =  Property::filter() 
        ->when(request('properties'), function($query, $properties) {
            foreach($properties  as $key=>$value){
                    $query->whereHas('features', function ($que) use ($key,$value){  
                        if((int) $value == 0){
                            $que->where('feature_id',$key)->where('value','=',$value);
                        }else{
                            $value = (int) $value;
                            $que->where('feature_id',$key)->where('value','>=',$value);
                        }              
                    });
            }                     
        })
        ->when(request('property_address'), fn ($query) => $query->where('property_address', '=', request('property_address'))) 
        ->when(request('start_prize'), fn ($query) => $query->where('start_price', '>=', request('start_prize')))  
        ->when(request('end_prize'), fn ($query) => $query->where('start_price', '<=', request('end_prize')))
        ->when(request('facing'), fn ($query) => $query->where('property_facing', '=', request('facing')))
        ->when(request('facility'), function($query, $var) {
            $query->whereHas('facility', function ($que) use ($var){   
            foreach($var as $v){ 
                $que->where('title','=',$v);
            }                        
            });
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
        ->when(request('sorting'),function($query, $var){
            switch($var){
                case "low":
                    $query->orderBy('start_price');
                    break;
                case "hign":
                    $query->orderBy('start_price',"DESC");
                    break;
                case 'latest':
                    $query->orderBy('created_at','DESC');
                    break;
                case 'oldest':
                    $query->orderBy('created_at');
                    break;
                default:
                    $query->orderBy('created_at');
            }
        }) 
        ->paginate(5);
        $meta = $this->getMeta();
        $advertisements = $this->getAd('property'); 
        $purposes = Purpose::all();
        $property = Property::all();
        $propertyCat = PropertyCategory::orderBy('order')->get();
        $facilities = Facility::get();
        $units = Unit::get();
        $feature_values = [];
        $features = [];
        $id = PropertyCategory::where('name',"=","House")->value('id');
        $category = PropertyCategory::findOrFail($id);
        $all_feature = $category->features->where('showOnFilter',1);
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
        return view('website.pages.propertylist', compact('facilities','pagedata', 'units','meta', 'properties','advertisements', 'filter' , 'purposes','property','propertyCat','feature_values'))->with('meta', $this->getMeta());
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
