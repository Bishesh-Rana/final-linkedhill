<?php

namespace App\Http\Controllers\api;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyFaqResource;

class PropertyFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $propertyId)
    {
        $property = Property::findorfail($propertyId);
        $faqs = $property->faqs()->get();
        return $this->successResponse(PropertyFaqResource::collection($faqs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function frequentlyAskedQuestion(Request $request, $id)
    {
        $property = Property::findorfail($id);
        $data = $this->validate($request, $this->getRules());
        try {
            $property->faqs()->delete();
            foreach ($data['questions'] as $key => $item) {
                $property->faqs()->create([
                    'question' => $item,
                    'answer' => $data['answers'][$key]
                ]);
            }
            return response(['status'=> 'success', ' message'=>'FAQ updated successfully']);
        } catch (\Throwable $th) {
            return response(['status'=>'fail', 'message'=>$th->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findorFail($id);
        $delete = $property->delete();
        return $this->successResponse($delete);
    }
    private function getRules()
    {
        return [

            'questions' => ['required', 'array'],
            'questions.*' => ['string'],
            'answers' => ['required', 'array'],
            'answers.*' => ['string'],
        ];
    }
}
