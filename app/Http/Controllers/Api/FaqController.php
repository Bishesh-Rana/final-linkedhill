<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Resources\FaqResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('order')->get();
        return $this->successResponse(FaqResource::collection($faqs));
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
    public function store(FaqRequest $request)
    {

        $data = Faq::create($request->all());

        return response()->json(['title'=>'success',',message'=>'FAQ created successfully.']);
        
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
    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->all());

        if (!$request->featured) {
            $faq->featured = false;
        }

        $faq->save();

        return response()->json(['title'=>'success','message'=>'FAQ updated successfully.']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return response()->json(['title'=>'success','message'=>'FAQ deleted successfully.']);
    }

    // restore

    public function getDeletedFaqs(){
        $faqs = Faq::onlyTrashed()->get();
        return $this->successResponse($faqs);
    }
    public function restoreFaqs($id){
         Faq::withTrashed()->find($id)->restore();
         return response()->json(['title'=>'success','message'=>'FAQ restored successfully.']);
    }
    public function hardDeleteFaq($id){
        faq::withTrashed()->find($id)->forceDelete();
        return response()->json(['title'=>'success','message'=>'FAQ deleted successfully.']);
    }
}
