<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Support\Arr;
use App\Models\FeatureValue;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use Yajra\DataTables\Facades\DataTables;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::orderBy('position')->get();
        return view('admin.feature.index',compact('features'));
    }

    public function getFeatures()
    {
        $feature = Feature::select('id', 'image', 'title')->latest();
        return DataTables::of($feature)
            ->addColumn('image', function ($feature) {
                return '<img src=' . $feature->image . '  class="news_img" align="center" />';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('feature.edit', $p->id) . '" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit City"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteFeature(' . $p->id . ')" class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create()
    {
        $feature = new Feature();
        $categories = PropertyCategory::get();
        $selectedCategories = [];

        return view('admin.feature.form', compact('feature', 'categories', 'selectedCategories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {       
        $data = $request->validated();
        $data['showOnFilter'] = $request->showOnFilter=='on'?'1':'0'; 
        DB::beginTransaction();
        try {
            $feature =  Feature::create(Arr::except($data, 'category_id'));
            $feature->category()->sync($data['category_id']);
            DB::commit();

            $feature_id = Feature::where('title','=',$request->title)->value('id');
            $values = $request->value;
                $values = explode(',',$values);
                if(!empty($values)){
                    foreach($values as $value){
                        FeatureValue::create(['feature_id'=>$feature_id,'value'=>$value]);
                    }
                }
            return redirect()->route('feature.index')->with('message', 'Feature Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('message', $th->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $feature = Feature::findorfail($id);
        $categories = PropertyCategory::get();
        $selectedCategories = $feature->category()->pluck('property_categories.id')->toArray();


        return view('admin.feature.form', compact('feature', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $id)
    {
        $feature = Feature::findorfail($id);
        $data = $request->validated();
        $data['showOnFilter'] = $request->showOnFilter;      
        DB::beginTransaction();
        try {
            $feature->update(Arr::except($data, 'category_id'));
            $feature->category()->sync($data['category_id']);
            DB::commit();
            
            $values = $request->value;
            $values = explode(',',$values);
            if(!empty($values)){
                FeatureValue::where('feature_id',$feature->id)->delete();
                foreach($values as $value){
                    FeatureValue::create(['feature_id'=>$feature->id,'value'=>$value]);
                }
            }
            return redirect()->route('feature.index')->with('message', 'Feature Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('message', $th->getMessage())->withInput();
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
        $feature = Feature::findOrFail($id);
        $feature->delete();
    }

    public function updateFeatureOrder(Request $request){
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['purposeItem'])) {
            foreach ($arr['purposeItem'] as $key => $value) {  //id //parent_id
                Feature::where('id', $key)
                    ->update([
                        'position' => $order,
                        'parent_id' => ($value == 'null') ? NULL : $value
                    ]);
                $order++;
            }
        }
        return true;
    }
}
