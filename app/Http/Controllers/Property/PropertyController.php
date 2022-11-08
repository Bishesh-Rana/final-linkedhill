<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Requests\PropertyRequest;
use App\Models\Amenity;
use App\Models\Area;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyImage;
use App\Models\Purpose;
use App\Models\RoadType;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PropertyController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.property.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->requiredData();

        return view('admin.property.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {

        $data = $request->validated();
        $sync = collect($data['features'])
            ->filter(fn ($item) => $item)
            ->map(function ($item, $key) {
                return [
                    'feature_id' => $key,
                    'value' => $item == "1" ? true : $item,
                ];
            })->toArray();
        try {
            DB::beginTransaction();
            $property =  Property::create(Arr::except($data, 'features', 'property_images', 'amenities'));
            if (isset($data['property_images'])) {
                $this->uploadImage($data['property_images'], $property->id);
            }
            $property->features()->sync($sync);
            $property->amenities()->sync($data['amenities'] ?? []);
            DB::commit();
            request()->session()->flash('message', 'property added successfully');
            return redirect()->route('properties.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            request()->session()->flash('message', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findorfail($id);
        return view('admin.property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->requiredData($id);

        return view('admin.property.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        // dd($request->all);

        $property = Property::findorfail($id);

        $data = $request->all();



        $sync = collect($data['features'])
            ->filter(fn ($item) => $item)
            ->map(function ($item, $key) {
                return [
                    'feature_id' => $key,
                    'value' => $item == "1" ? "true" : $item,
                ];
            })->toArray();
        try {
            DB::beginTransaction();
            $property->update(Arr::except($data, 'features', 'property_images', 'amenities'));
            if (isset($data['property_images'])) {
                $this->uploadImage($data['property_images'], $property->id);
            }

            if($request->category_id==2)
            {
                $data['bed']='0';
                $data['bath']='0';
            }

            $property->fill($data);
            $property->save();
            $property->features()->sync($sync);
            $property->amenities()->sync($data['amenities'] ?? []);
            DB::commit();
            request()->session()->flash('message', 'property updated successfully');
            return redirect()->route('properties.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findorfail($id);
        try {
            $property->delete();
            $property->amenities()->delete();
            request()->session()->flash('message', 'property deleted successfully');
            return redirect()->back()->withInput();
        } catch (\Throwable $th) {
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    private function requiredData($id = null): array
    {
        return [

            'bed' => Property::get(),


            'purposes' => Purpose::get(),
            'amenties' => Amenity::get(),
            'property_types' => Type::get(),
            'property_categories' => PropertyCategory::with('features')->get(),
            'units' => Unit::pluck('name', "id"),
            'road_types' => RoadType::pluck('name', "id"),
            'cities' => City::select('id', 'name')->pluck('name', 'id'),
            'areas' => [],
            'property' => $id ? Property::findorfail($id) : new Property(),
            'selectedFeatures' => DB::table('feature_property')->select('feature_id', 'value')->where('property_id', $id ?? 0)->get(),
            'selectedAmenities' => DB::table('property_amenities')->select('amenity_id')->where('property_id', $id ?? 0)->pluck('amenity_id')->toArray(),
        ];
    }
    public function deletedProperty(Request $request)
    {
        return view('admin.trash.property.index');
    }
    public function getDeletedProperties()
    {
        $properties = Property::select('id', 'title', 'bed', 'bath', 'status', 'property_address', 'admin_id')
            ->onlyTrashed()
            ->latest();


        return DataTables::of($properties)
            ->addColumn('image', function ($properties) {
                $url = $properties->images->first->name;
                return '<img src=' . $url->name . '  class="news_img" align="center" />';
            })
            ->addColumn('status', function ($property) {
                $a = $property->status == "1" ? " Approved " : " Unapproved ";
                return '<span class="label label-info">' . $a . '</span>';
            })
            ->addColumn('faq', function ($property) {
                $a = $property->status == "1" ? " Approved " : " Unapproved ";
                return '<span class="label label-info">' . $a . '</span>';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('restoreProperty', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Restore Property"><i class="fa fa-recycle"></i></a>' . ' ' .
                    '<button onclick="deleteProperty(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })
            ->rawColumns(['image', 'action', 'faq', 'Status'])
            ->rawColumns(['status', 'image', 'action'])
            ->make(true);
    }

    public function restoreProperty($id)
    {
        Property::withTrashed()->find($id)->restore();
        return back()->with('message', 'Property Restored Successfully');
    }

    public function hardDeleteProperty($id)
    {
        Property::withTrashed()->find($id)->forceDelete();
        $images = PropertyImage::where('property_id', $id)->get();

        foreach ($images as $image) {
            $oldfile = public_path() . '/images/property/' . $image->name;
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
        }
    }

    public function getProperties()
    {
        $properties = Property::select('id', 'title', 'bath', 'bed', 'negotiable', 'status', 'property_address', 'admin_id')
        ->superAdmin()
        ->when(request('city_id'),fn($query)=>$query->where('city_id',request('city_id')))->latest();
        return DataTables::of($properties)
            ->addColumn('image', function ($properties) {
                $url =  count($properties->images) > 0  ? $properties->images->first->name->name : asset('images/default/no-property.png');
                return '<img src=' . $url . '  class="news_img" align="center" />';
            })
            ->addColumn('status', function ($property) {
                $a = $property->status == "1" ? " Approved " : " Unapproved ";
                return auth()->user()->hasAnyRole('Super Admin', 'Admin') ? '<a  href=' .  route('toggleStatus', $property->id) . '><span class="label label-info">' . $a . '</span>' : '<span class="label label-info">' . $a . '</span>';
            })

            ->addColumn('action', function (Property $property) {
                return view('admin.property.datatables._actions', compact('property'))->render();
            })
            ->addColumn('faq', function ($property) {
                return "<a  href=" .  route('property-faqs', $property->id) . ">faqs</a>";
            })

            ->rawColumns(['status', 'image', 'faq', 'action'])
            ->make(true);
    }

    private function uploadImage(array $images, $propertyId)
    {
        if (count($images)) {
            foreach ($images as $property_image) {
                $name = time() . $property_image->getClientOriginalName();
                $property_image->move(public_path() . '/images/property/', $name);

                PropertyImage::create([
                    'name' => asset('images/property/' . $name),
                    'user_id' => auth()->id(),
                    'property_id' => $propertyId,
                ]);
            }
        }
    }

    public function deletePropertyImage(Request $request, $id)
    {
        $property = PropertyImage::find($id);
        $property->delete();
        return response()->json([
            'message' => 'Image Deleted Successfully',
        ]);
    }
    public function toggleStatus($id)
    {
        $property = Property::find($id);
        $property->status = !$property->status;
        $property->save();
        request()->session()->flash('message', 'property status changed successfully');
        return redirect()->back();
    }
}
