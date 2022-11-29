<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Area;
use App\Models\City;
use App\Models\FavouriteList;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyCategory;
use App\Models\PropertyImage;
use App\Models\Purpose;
use App\Models\RoadType;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OldPropertyController extends CommonController
{
    public function index()
    {
        $this->website['properties'] = Property::where('user_id',Auth::user()->id)->get();
        return view('frontend.dashboard.property.all_property',$this->website);
    }

    public function propertyByCity(City $city , $slug)
    {
        $properties = $city->properties;
        return view('frontend.property.property_by_city',compact('properties','city'));
    }

    public function propertyByCategory(PropertyCategory $propertyCategory , $slug)
    {
        $properties = $propertyCategory->properties;
        return view('frontend.property.property_by_category',compact('properties','propertyCategory'));
    }



    public function propertyDetail($id)
    {
        $property = Property::find($id);
        return view('frontend.dashboard.property.property_detail',compact('property'));

    }


    public function create()
    {
        $this->website['purposes'] = Purpose::all();
        $this->website['amenties'] = Amenity::latest()->get();
        $this->website['property_types'] = Type::all();
        $this->website['property_categories'] = PropertyCategory::latest()->get();
        $this->website['units'] = Unit::all();
        $this->website['road_types'] = RoadType::all();
        $this->website['cities'] = City::all();
        $this->website['areas'] = Area::all();
        return view('frontend.dashboard.property.add_property',$this->website);
    }

    public function store(Request $request)
    {

        $property = new Property();
        $property->user_id = Auth::user()->id;
        $property->category_id = $request->category_id;
        $property->property_status = $request->property_status;
        $property->type = $request->type;
        $property->title = $request->title;
        $property->slug = $request->slug;
        $property->property_detail = $request->property_detail;

        $property->property_address = $request->property_address;
        $property->map_location = $request->map_location;
        $property->city_id = $request->city_id;
        $property->area_id = $request->area_id;

        $property->total_area = $request->total_area;
        $property->total_area_unit = $request->total_area_unit;
        $property->built_up_area = $request->built_up_area;
        $property->built_up_area_unit = $request->built_up_area_unit;
        $property->property_facing = $request->property_facing;
        $property->road_access = $request->road_access;
        $property->road_access_unit = $request->road_access_unit;
        $property->road_type = $request->road_type;

        $property->built_year = $request->built_year;
        $property->built_year_month = $request->built_year_month;
        $property->furnished = $request->furnished;
        $property->total_kitchen = $request->total_kitchen;
        $property->total_living_room = $request->total_living_room;
        $property->total_bed_room = $request->total_bed_room;
        $property->total_bathroom = $request->total_bathroom;
        $property->total_floor = $request->total_floor;
        $property->car_parking = $request->car_parking;
        $property->bike_parking = $request->bike_parking;

        $property->price = $request->price;
        $property->price_label = $request->price_label;

        $property->owner_name = $request->owner_name;
        $property->owner_address = $request->owner_address;
        $property->owner_phone = $request->owner_phone;

        $property->youtube_video_id = $request->youtube_video_id;

        if($request->feature){
            $property->feature = $request->feature;
        }else{
            $property->feature = 'off';
        }

        $property->save();

        if ($request->property_images)
        {
            foreach ($request->property_images as $property_image)
            {
                $name = time() . $property_image->getClientOriginalName();
                $property_image->move(public_path() . '/images/property/', $name);

                $data = new PropertyImage();
                $data->name = $name;
                $data->user_id = Auth::user()->id;
                $data->property_id = $property->id;
                $data->save();



            }
        }

        if($request->amenties)
        {
            foreach ($request->amenties as $amenty){
                $data_val = new PropertyAmenity();
                $data_val->user_id = Auth::user()->id;
                $data_val->property_id = $property->id;
                $data_val->amenity_id = $amenty;
                $data_val->save();
            }
        }

        return back()->with('message','Property  saved successfully.');


    }


    public function edit($id)
    {

        $this->website['property'] = Property::find($id);
        $this->website['purposes'] = Purpose::all();
        $this->website['amenties'] = Amenity::latest()->get();
        $this->website['property_types'] = Type::all();
        $this->website['property_categories'] = PropertyCategory::latest()->get();
        $this->website['units'] = Unit::all();
        $this->website['road_types'] = RoadType::all();
        $this->website['cities'] = City::all();
        $this->website['areas'] = Area::all();
        return view('frontend.dashboard.property.edit',$this->website);

    }

    public function editAssignedProperty($id)
    {
        $this->website['property'] = Property::find($id);
        return view('frontend.dashboard.property.edit_assign_property',$this->website);
    }

    public function update(Request $request, Property $property)
    {

        $property->category_id = $request->category_id;
        $property->property_status = $request->property_status;
        $property->type = $request->type;
        $property->title = $request->title;
        $property->slug = $request->slug;
        $property->property_detail = $request->property_detail;

        $property->property_address = $request->property_address;
        $property->map_location = $request->map_location;
        $property->city_id = $request->city_id;
        $property->area_id = $request->area_id;

        $property->total_area = $request->total_area;
        $property->total_area_unit = $request->total_area_unit;
        $property->built_up_area = $request->built_up_area;
        $property->built_up_area_unit = $request->built_up_area_unit;
        $property->property_facing = $request->property_facing;
        $property->road_access = $request->road_access;
        $property->road_access_unit = $request->road_access_unit;
        $property->road_type = $request->road_type;

        $property->built_year = $request->built_year;
        $property->built_year_month = $request->built_year_month;
        $property->furnished = $request->furnished;
        $property->total_kitchen = $request->total_kitchen;
        $property->total_living_room = $request->total_living_room;
        $property->total_bed_room = $request->total_bed_room;
        $property->total_bathroom = $request->total_bathroom;
        $property->total_floor = $request->total_floor;
        $property->car_parking = $request->car_parking;
        $property->bike_parking = $request->bike_parking;

        $property->price = $request->price;
        $property->price_label = $request->price_label;

        $property->owner_name = $request->owner_name;
        $property->owner_address = $request->owner_address;
        $property->owner_phone = $request->owner_phone;

        $property->youtube_video_id = $request->youtube_video_id;

        if($request->feature){
            $property->feature = $request->feature;
        }else{
            $property->feature = 'off';
        }

        $property->save();

        if ($request->property_images)
        {
            foreach ($request->property_images as $property_image)
            {
                $name = time() . $property_image->getClientOriginalName();
                $property_image->move(public_path() . '/images/property/', $name);

                $data = new PropertyImage();
                $data->name = $name;
                $data->user_id = Auth::user()->id;
                $data->property_id = $property->id;
                $data->save();

            }
        }

        if($request->amenties)
        {
            foreach ($property->amenties as $a)
            {
                $data_amenity = PropertyAmenity::find($a->id);
                $data_amenity->delete();
            }

            foreach ($request->amenties as $amenty){
                $data_val = new PropertyAmenity();
                $data_val->user_id = Auth::user()->id;
                $data_val->property_id = $property->id;
                $data_val->amenity_id = $amenty;
                $data_val->save();
            }
        }

        return back()->with('message','Property  Updated successfully.');

    }

    public function updatePropertyDetailByAgency(Request $request, $id)
    {
        $data = Property::find($id);
        $data->title_by_agency = $request->title_by_agency;
        $data->price_by_agency = $request->price_by_agency;
        $data->price_label_by_agency = $request->price_label_by_agency;
        $data->property_detail_by_agency = $request->property_detail_by_agency;
        $data->map_location_by_agency = $request->map_location_by_agency;

        if($data->allow_edit == 0)
        {
            $data->allow_edit = "requested";
        }

        $data->save();
        return back();

    }

    public function delete_image($id)
    {
        $data = PropertyImage::find($id);

        $oldfile = public_path().'/images/property/'.$data->name;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        $data->delete();
    }

    public function pending()
    {
        $this->website['properties'] = Property::where('status',0)->get();
        return view('frontend.dashboard.property.all_property',$this->website);
    }

    public function assignedProperty()
    {
        $this->website['properties'] = Auth::user()->assignedAgency;
        return view('frontend.dashboard.property.fav_property',$this->website);


    }

    public function favProperty()
    {
        $this->website['properties'] = Auth::user()->favProperties;
        return view('frontend.dashboard.property.fav_property',$this->website);

    }

    public function deleteFromFavList($id)
    {
        $data = FavouriteList::find($id);
        $data->delete();

    }

    public function changeAllowStatus($id)
    {

        $property = Property::find($id);


        if($property->allow_edit == "requested")
        {
            $data = Property::find($id);
            $data->allow_edit = '1';
            $data->save();
        }


        if($property->allow_edit == '1')
        {
            $property->allow_edit = "requested";
            $property->save();
        }
    }
}
