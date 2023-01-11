<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\City;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Amenity;
use App\Models\Purpose;
use App\Models\Property;
use App\Models\RoadType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use App\Models\PropertyAmenity;
use App\Models\PropertyCategory;
use App\Models\PropertyFacility;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\UnitResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PurposeResource;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PropertyTypeResource;
use App\Http\Resources\PropertyDetailResource;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PropertyCategoryResource;

class PropertyController extends Controller
{
    public $limit = 5;
    public function test(Request $request)
    {
    }
    public function featuredProperties()
    {
        $properties = Property::where(['status' => 1, 'feature' => "on"])->latest()->limit(1)->get();
        return PropertyResource::collection($properties);
    }

    public function propertyByCategory()
    {
        $category_id = request('category_id');
        $properties = PropertyCategory::find($category_id)->properties;
        return PropertyResource::collection($properties);
    }

    public function propertyByCity()
    {
        $city_id = request('city_id');
        $properties = City::find($city_id)->properties;
        return PropertyResource::collection($properties);
    }

    public function getPropertyDetail(Request $request)
    {
        $property = Property::findOrFail($request->id);

        // return new PropertyResource($property);

        return $this->returnResponse(new PropertyResource($property));

    }

    /********   Post Property *******/

    public function purpose()
    {
        $purpose = Purpose::all();
        return PurposeResource::collection($purpose);
    }

    public function propertyType()
    {
        $types = Type::all();
        return $this->returnResponse(PropertyTypeResource::collection($types));
    }

    public function propertyStatus()
    {
        $purpose = Purpose::get();
        return $this->returnResponse(PropertyTypeResource::collection($purpose));
    }


    public function getArea()
    {
        $area = Area::all();
        return AreaResource::collection($area);
    }

    public function getUnits()
    {
        $units = Unit::all();
        return UnitResource::collection($units);
    }

    public function roadType()
    {
        $roadType = RoadType::all();
        return UnitResource::collection($roadType);
    }

    public function amenties()
    {
        $amenties = Amenity::all();
        return UnitResource::collection($amenties);
    }


    public function postProperty(Request $request)
    {
        $user = auth()->guard('api')->user();
        // return $user->isadmin();
        
        if($user->isadmin()){
            $user_id = $request->client;
           
        }
        else{
            $user_id = (auth()->user()->isStaff())? auth()->user()->isStaff() : auth()->user()->id;
        }     
        
        $property = new Property();
        $property->user_id = $user_id;
        $property->category_id = $request->category_id;
        $property->property_status = $request->property_purpose;  // purpose/status
        $property->type = $request->type;
        $property->title = $request->title;
        $property->slug = Str::slug($property->title);
        $property->property_detail = $request->property_detail;

        $property->property_address = $request->property_address;
        $property->map_location = $request->map_location;
        $property->city_id = $request->city_id;
        $property->area_id = $request->area_id;

        $property->total_area = $request->total_area;
        $property->total_area_unit = $request->total_area_unit_id;
        $property->built_up_area = $request->built_up_area;
        $property->built_up_area_unit = $request->built_up_area_unit_id;
        $property->property_facing = $request->property_facing;
        $property->road_access = $request->road_access;
        $property->road_access_unit = $request->road_access_unit;
        $property->road_type = $request->road_type_id;

        $sync = collect($request['features'])
            ->filter(fn ($item) => $item)
            ->map(function ($item, $key) {
                return [
                    'feature_id' => $key,
                    'value' => $item == "1" ? true : $item,
                ];
            })->toArray();
        
        $property->features()->sync($sync);

        if(!empty($request->facility)){
            foreach($request->facility as $fac){
                PropertyFacility::create(['property_id'=>$property->id,'title'=>$fac]);
            }
        }

        if (isset($request['property_images'])) {
            $this->uploadImage($request['property_images'], $property->id ,$user_id);
        }

        $property->price = $request->price;
        $property->price_label = $request->price_label;

        $property->owner_name = $request->owner_name;
        $property->owner_address = $request->owner_address;
        $property->owner_phone = $request->owner_phone;

        $property->youtube_video_id = $request->youtube_url;

        $property->feature = $request->feature;

        $property->save();

        if ($request->amenties) {
            foreach ($request->amenties as $amenty) {
                $data_val = new PropertyAmenity();
                $data_val->user_id = Auth::user()->id;
                $data_val->property_id = $property->id;
                $data_val->amenity_id = $amenty;
                $data_val->save();
            }
        }
        

        return response(['status' => true, 'message' => "Property added successfully"], 200);
    }


    public function updateProperty(Request $request)
    {
        $user = auth()->guard('api')->user();
        // return $user->isadmin();

        $property = Property::findorfail($request->id);
        if($user()->isadmin()){
            $user_id = $request->client;
        }
        else{
            $user_id = $property->user_id;
        }    

        $property->user_id = $user_id;
        $property->category_id = $request->category_id;
        $property->property_status = $request->property_purpose;  // purpose/status
        $property->type = $request->type;
        $property->title = $request->title;
        $property->slug = Str::slug($property->title);
        $property->property_detail = $request->property_detail;

        $property->property_address = $request->property_address;
        $property->map_location = $request->map_location;
        $property->city_id = $request->city_id;
        $property->area_id = $request->area_id;

        $property->total_area = $request->total_area;
        $property->total_area_unit = $request->total_area_unit_id;
        $property->built_up_area = $request->built_up_area;
        $property->built_up_area_unit = $request->built_up_area_unit_id;
        $property->property_facing = $request->property_facing;
        $property->road_access = $request->road_access;
        $property->road_access_unit = $request->road_access_unit;
        $property->road_type = $request->road_type_id;

        $sync = collect($request['features'])
            ->filter(fn ($item) => $item)
            ->map(function ($item, $key) {
                return [
                    'feature_id' => $key,
                    'value' => $item == "1" ? true : $item,
                ];
            })->toArray();
        
        $property->features()->sync($sync);

        if(!empty($request->facility)){
            foreach($request->facility as $fac){
                PropertyFacility::create(['property_id'=>$property->id,'title'=>$fac]);
            }
        }

        if (isset($request['property_images'])) {
            $this->uploadImage($request['property_images'], $property->id ,$user_id);
        }

        $property->price = $request->price;
        $property->price_label = $request->price_label;

        $property->owner_name = $request->owner_name;
        $property->owner_address = $request->owner_address;
        $property->owner_phone = $request->owner_phone;

        $property->youtube_video_id = $request->youtube_url;

        $property->feature = $request->feature;

        $property->save();

        if ($request->amenties) {
            foreach ($request->amenties as $amenty) {
                $data_val = new PropertyAmenity();
                $data_val->user_id = Auth::user()->id;
                $data_val->property_id = $property->id;
                $data_val->amenity_id = $amenty;
                $data_val->save();
            }
        }
        return response(['status' => true, 'message' => "Property added successfully"], 200);
    }

    public function deleteProperty(Request $request){
        $property = Property::findOrFail($request->id);
        $property->delete();
        $property->amenities()->delete();
        $property->images()->delete();
        return response(['status' => true, 'message' => "Property deleted successfully"], 200);
    }

    private function uploadImage(array $images, $propertyId , $user_id)
    {
        if (count($images)) {
            foreach ($images as $property_image) {
                $name = time() . $property_image->getClientOriginalName();
                $property_image->move(public_path() . '/images/property/', $name);
                PropertyImage::create([
                    'name' => asset('images/property/' . $name),
                    'user_id' => $user_id,
                    'property_id' => $propertyId,
                ]);
            }
        }
    }

    public function addPropertyImage(Request $request)
    {
        $property_id = request('property_id');

        if ($request->property_images) {
            foreach ($request->property_images as $property_image) {
                $name = time() . $property_image->getClientOriginalName();
                $property_image->move(public_path() . '/images/property/', $name);

                $data = new PropertyImage();
                $data->name = $name;
                $data->user_id = Auth::user()->id;
                $data->property_id = $property_id;
                $data->save();
            }
        }

        return response(['status' => true, 'message' => "Image added successfully."], 200);
    }

    /***********   Post Property ***********/
    public function getCategories()
    {
        $categories = PropertyCategory::select('id', 'name as title', 'image')->latest()->get();
        $default = ['id' => 0, 'title' => 'All', 'image' => null];
        return $this->returnResponse($categories->prepend($default));
    }
    public function properties(Request $request)
    {
        $properties = Property::select('properties.*')
            ->when(!in_array($request->category_id, ['0', null]), fn ($query) => $query->where('category_id', $request->category_id))
            ->when($request->type == 'featured', fn ($query) => $query->where('feature', 1))
            ->when($request->type == 'listed', fn ($query) => $query->where('feature', 0))
            ->with('area_unit', 'property_category:id,name', 'images')
            ->paginate($request->limit ?? $this->limit);


        return $this->returnResponse(PropertyResource::collection($properties), $paginate = true);
    }

    public function property(Request $request)
    {

        try {
            Validator::make($request->all(), ['id' => ['required', 'exists:properties,id']])->validate();
            $property = Property::with('area_unit', 'property_category:id,name', 'images', 'features:id,title,image')->findorfail($request->id);
            return $this->successResponse(new PropertyDetailResource($property));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return $this->notFoundResponse();
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function getPropertyFeatures(request $request){

        // return($request->category_ids[0]);
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
       return $this->successResponse( $feature_values);
    }
}
