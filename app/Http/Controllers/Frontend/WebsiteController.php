<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnquiryRequest;
use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\AgencyDetail;
use App\Models\Blog;
use App\Models\City;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Province;
use App\Models\Purpose;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\Type;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends CommonController
{
    public function index()
    {

        $this->website['blogs'] = Blog::where('type', 'blog')->where('featured',true)->latest()->limit(3)->get();
        $this->website['properties'] = Property::where(['status'=>1,'feature'=>"on",'hasAgent'=>1])->latest()->limit(6)->get();
        $this->website['properties'] = Property::where(['status' => 1, 'feature' => 1])->latest()->limit(6)->get();
        $this->website['cities'] = City::limit(4)->where('feature_in_homepage', true)->get();
        $this->website['trending_properties'] = Property::where(['status' => 1, 'feature' => "on", 'hasAgent' => 1])->orderBy('view_count', 'desc')->limit(6)->get();
        $this->website['premium_properties'] =  Property::where(['status' => 1, 'feature' => "on", 'premium_property' => 1, 'hasAgent' => 1])->latest()->limit(6)->get();
        $this->website['sliders'] = Slider::orderBy('order', 'asc')->where('hide', 1)->get();
        $this->website['agencies'] = AgencyDetail::latest()->limit(5)->get();
        $this->website['property_categories'] = PropertyCategory::get();
        $this->website['services'] = Service::latest()->limit(8)->get();
        $this->website['provinces'] = Province::all();
        $this->website['purposes'] = Purpose::orderBy('order','ASC')->get();
        $this->website['property_types'] = Type::all();
        $this->website['advertisement'] = Advertisement::where('page', 'home')->get();

        return view('frontend.index', $this->website);
    }

    public function signUp()
    {
        return view('frontend.auth.register');
    }


    public function termsAndConditions()
    {
        $website = Website::first();
        $page = Page::find(3);
        return view('frontend.single_page', compact('website', 'page'));
    }

    public function blogSingle($id, $slug)
    {
        $blog = $this->website['blog'] = Blog::find($id);
        $blog->viewCount = $blog->viewCount + 1;
        $blog->save();
        $this->website['latest_blogs'] = Blog::limit(6)->latest()->get();
        return view('frontend.blog_single', $this->website);
    }

    public function newsSingle($id, $slug)
    {
        $blog = $this->website['blog'] = Blog::find($id);
        $blog->viewCount = $blog->viewCount + 1;
        $blog->save();
        $this->website['latest_blogs'] = Blog::limit(6)->latest()->get();
        return view('frontend.news_single', $this->website);
    }

    public function policy()
    {
        $website = Website::first();
        $page = Page::find(2);
        return view('frontend.single_page', compact('page', 'website'));
    }

    public function ourCompany()
    {
        $website = Website::first();
        $teams = Team::latest()->get();
        $page = Page::find(1);
        return view('frontend.our_company', compact('page', 'website', 'teams'));
    }

    public function properties()
    {
        $addresses = [];
         
        $all_cities = City::get();
        foreach($all_cities as $city){
            array_push($addresses,$city->name);
        }
        $all_properties = Property::get();
        foreach($all_properties as $property){
            array_push($addresses,$property->property_address);
        }
        $this->website['properties'] = Property::all();
        $this->website['provinces'] = Province::all();
        $this->website['purposes'] = Purpose::all();
        $this->website['property_types'] = Type::all();
        $this->website['recommended_properties'] = [];
        $this->website['title'] = "All Properties";
       
        $this->website['addresses']= array_unique($addresses) ;
        return view('frontend.properties', $this->website);
    }

    public function blogs()
    {
        $this->website['blogs'] = Blog::where('type', 'blog')->latest()->get();
        return view('frontend.blogs', $this->website);
    }


// top header//

    public function propertytype(Request $request,$slug)
    {

        $website = Website::first();
        $property = Property::get();
        $data=Property::where('type',$slug)->get();


        return view('website.pages.property', compact('website','property'))
        ->with('data',$data);
    }

// End top header //



    public function news()
    {
        $this->website['blogs'] = Blog::where('type', 'news')->latest()->get();
        return view('frontend.news', $this->website);
    }

    public function contactUs()
    {
        $website = Website::first();
        return view('frontend.contact_us', compact('website'));
    }

    public function propertyDetail($id, $slug)
    {
        $website = Website::first();
        $property = Property::findOrFail($id);
        $property->view_count =  $property->view_count + 1;
        $property->save();

        $related_properties = Property::where('city_id', $property->city_id)->get();
        $recommended_properties = Property::where('property_status', $property->property_status)->get();

        $property_categories = PropertyCategory::get();
        return view('frontend.property.property_detail', compact('property', 'property_categories', 'related_properties', 'recommended_properties', 'website'));
    }

    public function subscribe_us(Request $request)
    {
        $data = Subscriber::create(
            ['email' => $request->email]
        );

        if ($data) {
            return redirect('/#subscribe')->with('success', 'Thank you for subscribing us.');
        }
    }


    public function storeEnquiry(EnquiryRequest $request)
    {
        $data = Enquiry::create($request->all());

        if ($data) {
            return back()->with('message', 'Your message sent successfully !');
        }
    }
    public function search(Request $request)
    {

        $search_query = $request->search_query;
        $property_status = request('property_status');
        $property_type = request('property_type');
        $cities = request('cities');
        $categories = request('category_id');
        $minimum_price = (int)request('min_price');
        $max_price = (int)request('max_price');
        $total_area = (int)request('total_area');
        $total_bed_room = (int)request('total_bed_room');
        $total_bathroom = (int)request('total_bathroom');

        $query = Property::where('property_status', $property_status)->orWhere('title', 'LIKE', "%$search_query%")->orWhere('zipcode', 'LIKE', "%$search_query%");

        if (request('property_type')) {
            $query = $query->where('type', $property_type);
        }
        if ($request->cities) {
            $query = $query->whereIn('city_id', $cities);
        }
        if ($request->category_id) {
            $query = $query->whereIn('category_id', $categories);
        }
        if ($request->min_price) {
            $query = $query->where('price', '>', $minimum_price);
        }

        if ($request->max_price) {
            $query = $query->where('price', '<', $max_price);
        }

        if ($request->total_area) {
            $query = $query->where('total_area', '<=', $total_area);
        }

        if ($request->total_bed_room) {
            $query = $query->where('total_bed_room', $total_bed_room);
        }

        if ($request->total_bathroom) {
            $query = $query->where('total_bathroom', $total_bathroom);
        }


        $this->website['purposes'] = Purpose::all();
        $this->website['property_types'] = Type::all();
        $this->website['properties'] = $query->get();
        return view('frontend.search_result', $this->website);
    }

    public function sideFilter(Request $request)
    {
        $search_query = $request->search_query;
        $property_status = request('property_status');
        $property_type = request('property_type');
        $min_price = (int)request('min_price');
        $max_price = (int)request('max_price');
        $min_total_area = (int)request('min_total_area');
        $max_total_area = (int)request('max_total_area');
        $min_total_bedroom = (int)request('min_total_bedroom');
        $max_total_bedroom = (int)request('max_total_bedroom');
        $min_total_bathroom = (int)request('min_total_bathroom');
        $max_total_bathroom = (int)request('max_total_bathroom');

        // dd($request->all());
        $query = Property::where('property_status', $property_status);

        if ($request->search_query != null) {
            $query = $query->where('title', 'LIKE', "%$search_query%")
                ->orWhere('zipcode', 'LIKE', "%$search_query%");
        }

        if ($request->property_type != null) {
            $query = $query->where('type', $request->property_type);
        }

        $query = $query->where('price', '>', $min_price);

        if ($request->max_price > 0) {
            $query = $query->where('price', '<', $max_price);
        }

        if ($request->min_total_area != null) {
            $query = $query->where('total_area', '>=', $min_total_area);
        }
        if ($request->max_total_area != null) {
            $query = $query->where('total_area', '<=', $max_total_area);
        }

        if ($request->min_total_bedroom != null) {
            $query = $query->where('total_bed_room', '>=', $min_total_bedroom);
        }

        if ($request->max_total_bedroom != null) {
            $query = $query->where('total_bed_room', '<=', $max_total_bedroom);
        }


        if ($request->min_total_bathroom != null) {
            $query = $query->where('total_bathroom', $min_total_bathroom);
        }

        if ($request->max_total_bathroom != null) {
            $query = $query->where('total_bathroom', $max_total_bathroom);
        }

        $this->website['purposes'] = Purpose::all();
        $this->website['property_types'] = Type::all();
        $this->website['properties'] = $query->get();
        return view('frontend.search_result', $this->website);
    }

    public function comingSoon()
    {
        return view('website.index');
    }

    public function featuredProperties()
    {
        $this->website['properties'] = Property::where(['status' => 1, 'feature' => "on", 'hasAgent' => 1])->latest()->get();
        $this->website['provinces'] = Province::all();
        $this->website['purposes'] = Purpose::all();
        $this->website['property_types'] = Type::all();
        $this->website['recommended_properties'] = [];
        $this->website['title'] = "Featured Properties";
        return view('frontend.properties', $this->website);
    }

    public function trendingProperties()
    {
        $this->website['properties'] = Property::where(['status' => 1, 'feature' => "on", 'hasAgent' => 1])->orderBy('view_count', 'desc')->get();
        $this->website['provinces'] = Province::all();
        $this->website['purposes'] = Purpose::all();
        $this->website['property_types'] = Type::all();
        $this->website['recommended_properties'] = [];
        $this->website['title'] = "Trending Properties";
        return view('frontend.properties', $this->website);
    }

    public function faq()
    {
        $this->website['faqs'] = Faq::where('featured', 1)->latest()->get();
        return view('frontend.faq', $this->website);
    }

    public function privacyPolicy()
    {
        $website = Website::first();
        $page = Page::find(2);
        return view('frontend.single_page', compact('website', 'page'));
    }
}
