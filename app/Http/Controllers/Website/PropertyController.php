<?php

namespace App\Http\Controllers\Website;

use App\Models\Menu;
use App\Models\User;
use App\Models\Purpose;
use App\Models\Property;
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
        // dd($request->purpose);
        $filter = $request->all();
        $properties =  Property::filter()
        ->when(request('property_address'), fn ($query) => $query->where('property_address', '=', request('property_address')))     
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
