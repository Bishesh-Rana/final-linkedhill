<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\City;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Website;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\FavouriteList;
use App\Models\TradelinkAdmin;
use App\Models\ServiceCategory;
use App\Models\TradelinkSlider;
use Database\Seeders\FaqSeeder;
use App\Http\Resources\FaqResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\SliderResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\FavouriteListResource;
use App\Http\Resources\ServiceVendorResource;
use App\Http\Resources\PropertyDetailResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ServiceProviderResource;
use App\Http\Resources\TradelinkSliderResource;

class ApiController extends Controller
{
    public $limit = 6;
    public function getSliders()
    {
        $sliders = Slider::where('hide','1')->get();
        return $this->returnResponse(SliderResource::collection($sliders));
    }
    public function getFaq()
    {
        $faqs = Faq::select('id', 'question', 'answer')->where('featured', true)->paginate();
        return $this->returnResponse(FaqResource::collection($faqs), $paginate = true);
    }

    public function getTestimonial(Request $request)
    {
        $testimonail = Testimonial::select('id', 'name', 'image', 'message')->where('featured', true)->paginate($request->limit ?? $this->limit);
        return $this->returnResponse($testimonail, $paginate = true);
    }
    public function getContacts(Request $request)
    {
        $contacts = Website::select(
            'name',
            'phone',
            'email',
            'fb_url',
            'twitter_url',
            'instagram_url',
            'youtube_url',
            'short_intro',
            'short_description'
        )
            ->first();
        return $this->returnResponse($contacts, $paginate = false);
    }



    public function vendorForService()
    {
        $service = Service::with('vendors')->find(request('service_id'));
        return new ServiceVendorResource($service);
    }

    public function serviceProviders()
    {
        $providers = TradelinkAdmin::where('id', '!=', 1)->where('status', 1)->latest()->get();
        return ServiceProviderResource::collection($providers);
    }
    public function getCities(Request $request)
    {
        $cities = Property::selectRaw('count(*) as total,cities.name as name,cities.image,cities.id')
            ->groupBy('properties.city_id')
            ->join('cities', 'cities.id', 'properties.city_id')
            ->orderBy('total', 'DESC')
            ->paginate($request->limit ?? $this->limit);
        return  $this->returnResponse(CityResource::collection($cities), $paginate = true);
    }

    public function allCity(Request $request)
    {
        $cities = City::select('id', 'name')
            ->where('name', 'like', "%" . $request->name . "%")
            ->orderBy('name', 'ASC')
            // ->limit(15)
            ->get();
        return  $this->returnResponse(CategoryResource::collection($cities));
    }
    public function getMeta($meta = [])
    {
        return [
            'meta_title' => $meta['meta_title'] ?? config('websites.name'),
            'meta_keyword' => $meta['meta_keyword'] ?? config('websites.meta_keyword'),
            'meta_description' => $meta['meta_description'] ?? config('websites.meta_description'),
            'meta_keyphrase' =>  $meta['meta_keyphrase'] ?? config('websites.meta_description'),
            'og_image' => $meta['image'] ?? config('websites.og_image'),
            'og_url' => route('home'),
            'og_site_name' => config('websites.name'),
            'twitter' => config('websites.twitter'),
        ];
    }

    public function ourPolicy()
    {
        $pagedata = Menu::where('slug', 'privacy-policy')->where('active', true)->first();
        $meta = $this->getMeta($pagedata);
        return response()->json(['pagedata'=> $pagedata, 'meta'=> $meta]);
    }

    public function termsConditions()
    {
        $pagedata = Menu::where('slug', 'terms-and-conditions')->where('active', true)->first();
        $meta = $this->getMeta($pagedata);

    }

}
