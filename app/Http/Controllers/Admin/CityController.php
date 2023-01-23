<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Property;
use App\Models\Province;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $cities = City::latest()->get();
        return view('admin.city.index', compact('cities', 'provinces'));
    }

    public function getCities()
    {
        $cities = City::select('id', 'name', 'province_id', 'district')->with(['province:id,eng_name'])->withCount('properties','areas')->latest();
        return DataTables::of($cities)
            ->editColumn('province_id', function ($cities) {
                $province = $cities->province->eng_name;
                return $province;
            })
            ->editColumn('district', function ($cities) {
                $district = $cities->districts->en_name;
                return $district;
            })

            ->addColumn('viewArea', function ($cities) {
                return
                    '<a href="' . route('all.areas', ['city_name' => $cities->name, 'city_id' => $cities->id]) . '" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="View Area"><span class="material-icons">list_alt</span>(' .$cities->areas_count . ')</a>';
            })
            ->addColumn('viewCity', function ($cities) {
                return
                    '<a href="' . route('properties.index', ['city_name' => $cities->name, 'city_id' => $cities->id]) . '" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="View Properties"><span class="material-icons">format_list_bulleted</span>(' . $cities->properties_count . ')</a>';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="#" class="btn btn-xs info" data-original-title="Add Area in City" data-toggle="modal"  data-placement="top" title="Add Area in City" data-target="#addArea-' . $p->id . '"><i class="material-icons">add</i></a>' . ' ' .
                    '<a href="' . route('city.edit', $p->id) . '" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit City"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteCity(' . $p->id . ',' . count($p->areas) . ')" class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['province', 'viewArea', 'viewCity', 'action'])
            ->make(true);
    }

    public function all_areas($name, $id)
    {
        $areas = Area::where('city_id', $id)->get();
        return view('admin.city.area', compact('name', 'areas'));
    }



    public function getPropertyByCity($id)
    {

        $properties = Property::select('id', 'title', 'status', 'property_address', 'admin_id')->where('city_id', $id)->latest();



        return DataTables::of($properties)
            ->addColumn('image', function ($properties) {
                $url = $properties->images->first->name;
                return '<img src=' . $url->name . '  class="news_img" align="center" />';
            })
            ->addColumn('status', function ($property) {
                $a = $property->status == "1" ? " Approved " : " Unapproved ";
                return '<span class="label label-info">' . $a . '</span>';
            })
            ->addColumn('action', function (Property $property) {
                return view('admin.property.datatables._actions', compact('property'))->render();
            })
            ->rawColumns(['status', 'image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City();
        $provinces = Province::all();
        $cities = City::latest()->get();
        return view('admin.city.form', compact('cities', 'provinces', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        try {
            City::create($request->validated());
            return redirect()->route('city.index')->with('message', 'City  created successfully');
        } catch (\Throwable $th) {
            return   redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function storeArea(Request $request)
    {
        $area = Area::create([
            'city_id' => $request->city_id,
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        if ($area) {
            return back()->with('message', 'Area added successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $provinces = Province::all();
        $districts = District::all();
        $cities = City::latest()->get();
        return view('admin.city.form', compact('cities', 'provinces', 'city', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {

        $city = City::find($id);
        try {
            $city->update($request->validated());
            return redirect()->route('city.index')->with('message', 'City  updated successfully');
        } catch (\Throwable $th) {
            return  redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function areaUpdate(Request $request, $id)
    {
        $area = Area::find($id);
        $area->name = $request->name;
        $area->slug = $request->slug;
        $area->save();
        return back()->with('message', 'Area name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city =  City::findorfail($id);

        try {
            $city->delete();
            return redirect()->route('city.index')->with('message', 'City  deleted successfully');
        } catch (\Throwable $th) {
            return  redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function destroyArea($id)
    {
        $area = Area::find($id);
        $area->delete();
    }
    public function getDistricts($id)
    {
        $districts = District::where('province', $id)->get();
        return response()->json(['districts' => $districts]);
    }
}
