<?php

namespace App\Http\Controllers\Website;

use App\Models\Menu;
use App\Models\User;
use App\Models\Purpose;
use App\Models\Property;
use App\Models\Feature;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\PropertyCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

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
        $properties =  Property::filter()
        ->when(request('bed'), function($query, $var) {
            $query->whereHas('features', function ($que) use ($var){
                $feature_id = Feature::where('title','=','Bedroom')->value('id');
                $que->where('feature_id',$feature_id)->where('value','>=',$var);
            });
        }) // tej sir leh sikaunu vako

        ->when(request('bath'), function($query, $var) {
            $query->whereHas('features', function ($que) use ($var){
                $feature_id = Feature::where('title','=','Bathroom')->value('id');
                $que->where('feature_id',$feature_id)->where('value','>=',$var);
            });
        })
        ->when(request('parking'), function($query, $var) {
            $query->whereHas('features', function ($que) use ($var){
                $feature_id = Feature::where('title','=','Parking')->value('id');
                $que->where('feature_id',$feature_id)->where('value','>=',$var);
            });
        })
        ->when(request('property_address'), fn ($query) => $query->where('property_address', '=', request('property_address'))) 
        ->when(request('start_prize'), fn ($query) => $query->where('start_price', '>=', request('start_prize')))  
        ->when(request('end_prize'), fn ($query) => $query->where('start_price', '<=', request('end_prize')))
        ->when(request('property_facing'), function($query, $var) {
            $query->whereHas('features', function ($que) use ($var){
                $feature_id = Feature::where('title','=','Facing Direction')->value('id');
                dd($var);
                $que->where('feature_id',$feature_id)->where('value','=',$var);
            });
        })     
        ->paginate(5);
        // dd($properties);
        $meta = $this->getMeta();
        $advertisements = $this->getAd('property'); 
        $purposes = Purpose::all();
        $property = Property::all();
        $propertyCat = PropertyCategory::all();

        $pagedata = new Menu();
        return view('website.pages.propertylist', compact('pagedata', 'meta', 'properties','advertisements', 'filter' , 'purposes','property','propertyCat'))->with('meta', $this->getMeta());
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
