<?php

namespace App\Http\Controllers\Website;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\City;
use App\Models\Menu;
use App\Models\Type;
use App\Models\Unit;
use App\Models\User;
use App\Models\Slider;
use App\Models\Enquiry;
use App\Models\Pricing;
use App\Models\Purpose;
use App\Models\Service;
use App\Models\Website;
use App\Models\Facility;
use App\Models\Property;
use App\Models\Province;
use App\Models\RoadType;
use App\Models\Subscriber;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use App\Models\AgencyDetail;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\FavouriteList;
use App\Models\PropertyCategory;
use App\Models\PropertyFacility;
use App\Http\Controllers\Controller;
use App\Notifications\PropertyInquery;

class HomeController extends Controller
{
    use CommonTrait;

    public function index()
    {


        $this->website['blogs'] = Blog::where('type', 'blog')->orderBy('order')->limit(4)->get();
        $this->website['news'] = Blog::where('type', 'news')->orderBy('order')->limit(4)->get();
        $this->website['properties'] = Property::where(['status' => 1, 'feature' => 1])->latest()->limit(6)->get();

        $this->website['cities'] = City::limit(10)->where('feature_in_homepage', true)->get();
        $this->website['roadtypes'] = RoadType::get();

        $addresses = [];
        
        $this->website['all_cities'] = City::get();
        foreach($this->website['all_cities'] as $city){
            array_push($addresses,$city->name);
        }
        foreach($this->website['properties'] as $property){
            array_push($addresses,$property->property_address);
        }
        $addresses = array_unique($addresses);
        $this->website['addresses'] = $addresses;
        $this->website['trending_properties'] = Property::where(['status' => 1, 'feature' => 1, 'hasAgent' => 1])->orderBy('view_count', 'desc')->limit(6)->get();
        $this->website['premium_properties'] =  Property::where(['status' => 1, 'feature' => 1, 'premium_property' => 1, 'hasAgent' => 1])->latest()->limit(6)->get();
        $this->website['sliders'] = Slider::orderBy('order', 'asc')->where('hide', 1)->get();
        $this->website['agencies'] = AgencyDetail::latest()->limit(5)->get();

        $this->website['property_categories'] = PropertyCategory::orderBy('order')->get();


        $this->website['services'] = Service::latest()->limit(8)->get();
        $this->website['provinces'] = Province::all();
        $this->website['purposes'] = Purpose::orderBy('order')->get();
        $this->website['facilities'] = Facility::orderBy('order')->get();


        $this->website['property'] = Property::all();

        $this->website['propertyCat'] = PropertyCategory::orderBy('order')->get();
        $feature_values = [];
        $features = [];
        $id = PropertyCategory::where('name',"=","House")->value('id');
        $category = PropertyCategory::findOrFail($id);
        $all_feature = $category->features->where('showOnFilter',1);
        $all_feature = collect($all_feature);
        $all_feature = $all_feature->sortBy('position');
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
       $this->website['feature_values'] = $feature_values;


        $this->website['property_types'] = Type::all();
        $this->website['pricings'] = Pricing::latest()->get();
        $this->website['units'] = Unit::all();
        $this->website['advertisement'] = Advertisement::where('page', 'home')->get();
        $this->website['meta'] = $this->getMeta();
        return view('website.index', $this->website);
    }




    public function getMenu(Request $request, $slug)
    {

        $pagedata = Menu::where('slug', $slug)->where('active', true)->first();
        $purposes = Purpose::all();
        $roadtypes = RoadType::get();
        $property = Property::all();
        $filter = [];
        $propertyCat = PropertyCategory::orderBy('order')->get();
        if ($pagedata != null) {
            $pagevalue = @$pagedata->type;
            $meta = $this->getMeta($pagedata);
            switch ($pagevalue) {
                case 'home':
                    return redirect()->route('home');
                case 'faq':
                    $faqs = Faq::select('id', 'question', 'answer')->latest()->get();
                    return view('website.pages.faq', compact('pagedata', 'meta','faqs'));
                case 'about':
                    return view('website.pages.about', compact('pagedata', 'meta'));
                    break;
                case 'blog':
                    $blogs = Blog::latest()
                        ->where('type', 'blog')
                        ->paginate(3)
                        ->appends($request->all());
                    $trending = $this->trending();
                    $advertisements = $this->getAd('blog');

                    return view('website.pages.blog', compact('pagedata', 'meta', 'blogs', 'trending', 'advertisements'));
                    break;
                case 'news':
                    $blogs = Blog::latest()
                        ->where('type', 'news')
                        ->paginate(3)
                        ->appends($request->all());
                    $trending = $this->trending('news');
                    $advertisements = $this->getAd('news');

                    return view('website.pages.blog', compact('pagedata', 'meta', 'blogs', 'trending', 'advertisements'));
                    break;
                case 'service':
                    return view('website.pages.about', compact('pagedata', 'meta'));
                    break;

                case 'contact':
                    return view('website.pages.contact', compact('pagedata', 'meta'));
                    break;

                case 'basic':
                    return view('website.pages.about', compact('pagedata', 'meta'));
                case 'property':

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
                        

                    $properties = Property::where(['status' => 1])->with(['faqs', 'images'])->latest()->paginate(3);
                    $advertisements = $this->getAd('property');
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
                $facilities = PropertyFacility::get();
                $units = Unit::get();

                    return view('website.pages.propertylist', compact('roadtypes','facilities','addresses','units','feature_values','pagedata', 'meta', 'properties', 'advertisements', 'purposes','property','propertyCat','filter'));
                    break;
                default:
                    return redirect()->route('home');
                    break;
            }
        } else {
            return redirect()->route('home');
        }
    }
    protected function trending($type = 'blog')
    {
        return Blog::select('*')
            // ->where('created_at', '>', now()->subdays(12))
            ->where('type', $type)
            ->orderBy('viewCount', 'desc')
            ->limit(3)
            ->get();
    }



// ---------------end-top-heade---------//



    public function subscribe_us(Request $request)
    {
        $data = Subscriber::updateOrCreate(
            ['email' => $request->email],
            ['email' => $request->email]
        );
        if ($data) {
            return response()->json(['message' => 'Subscribe Successfully']);
        }
    }

    public function storeEnquiry(Request $request)
    {
         // $this->validate($request, [
        //     'g-recaptcha-response' => 'required',
        // ]);
        $data = Enquiry::create(
            [
                'email' => $request->email,
                'name' => $request->name,
                'contact_info' => $request->contact_info,
                'subject' => $request->subject,
                'message' => $request->message,
                'property_id' => $request->propertyId
            ]
        );
        if ($data->property_id) {
            $property = Property::find($data->property_id);
            User::where('id', $property->user_id ?? 1)->first()->notify(new PropertyInquery($data));
            return response()->json(['message' => 'Enquiry Sent Successfully']);
        }
        if ($data) {
            $request->session()->flash('success','Enquiry Sent Successfully');
            return redirect()->back();
            // return response()->json(['message' => 'Enquiry Sent Successfully']);
        }
    }
    public function blogSingle($slug)
    {
        $blog = Blog::where('slug', $slug)->firstorfail();
        $blog->increment('viewCount');
        $trending = $this->trending($blog->type);
        $advertisements = $this->getAd($blog->type);
        $latest = Blog::latest()->where('id', '<>', $blog->id)->limit(3)->get();
        return view('website.pages.singleblog', compact('blog', 'latest', 'trending', 'advertisements'))
            ->with('meta', $this->getMeta($blog));;
    }
    public function propertyDetail($id, $slug)
    {

        $property = Property::where('slug', $slug)->with(['images', 'amenities', 'faqs'])->firstorfail();
        $property->increment('view_count');
        $related = Property::latest()->where('area_id', '=', $property->area_id)->with('city')->limit(3)->get();
        return view('website.pages.detail', compact('property', 'related'))
            ->with('meta', $this->getMeta($property));
    }

    private function parseDescription($value)
    {
        if (!$value) {
            return null;
        }

        return Str::limit(strip_tags($value), 100, '...');
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

    public function favorite(Request $request){
        if(!auth()->user()){
            return response()->json([
                'error' => "Please Login first",
            ]);
        }else{
            $favorite_property = FavouriteList::where(['user_id'=>auth()->user()->id,'property_id'=>$request->property_id])->first();
            if(!empty($favorite_property)){
                $favorite_property->delete();
                return response()->json([
                    'success'=>"Property remove from favorite list",
                ]);
            }else{
                FavouriteList::create(['user_id'=>auth()->user()->id,'property_id'=>$request->property_id]);
                return response()->json([
                    'success'=>"Property added to favorite list",
                ]);
            }
        }
    }
}
