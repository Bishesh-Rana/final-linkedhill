{{--@extends('frontend.dashboard.layouts.master')--}}
{{--@section('title','Post Property')--}}
{{--@push('css')--}}
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">--}}
{{--<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">--}}
{{--<link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">--}}
{{--@endpush--}}
{{--@section('content')--}}
    {{--<style>--}}

    {{--</style>--}}

    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header card-header-icon">--}}
                        {{--<b>POST &nbsp; PROPERTY</b>--}}
                    {{--</div>--}}
                    {{--<div class="card-content">--}}
                        {{--<form action="{{route('property.store')}}"  method="post">--}}
                            {{--@csrf--}}
                            {{--<!-- panel-group -->--}}
                            {{--<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">--}}

                            {{--<!--  BASIC DETAILS  ---->--}}
                            {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading" role="tab" id="headingOne">--}}
                                    {{--<h4 class="panel-title">--}}
                                        {{--<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                            {{--<i class="more-less glyphicon glyphicon-minus"></i>--}}
                                            {{--<span class="material-icons"> hvac </span> Basic Details--}}
                                        {{--</a>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                                {{--<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">--}}
                                    {{--<div class="panel-body">--}}
                                            {{--<div class="form-group col-md-6">--}}
                                                {{--<label class="label-style">Purpose to Post Property</label>--}}
                                                {{--<div class="radio">--}}
                                                   {{--@foreach($purposes as $purpose)--}}
                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="property_status" value="{{$purpose->name}}"><span class="circle"></span><span class="check"></span> {{$purpose->name}}--}}
                                                    {{--</label>--}}
                                                    {{--@endforeach--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group col-md-6">--}}
                                                {{--<label class="label-style">Property Type</label>--}}
                                                {{--<div class="radio">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="type" checked="true"><span class="circle"></span><span class="check"></span> Residential--}}
                                                    {{--</label>--}}

                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="type" ><span class="circle"></span><span class="check"></span> Commercial--}}
                                                    {{--</label>--}}

                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="type" ><span class="circle"></span><span class="check"></span> Agriculture--}}
                                                    {{--</label>--}}

                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group col-md-12">--}}
                                            {{--<label class="label-style">Property Category</label>--}}
                                            {{--<div class="radio">--}}
                                                {{--<label>--}}
                                                    {{--<input type="radio" name="property_category" checked="true"><span class="circle"></span><span class="check"></span> House--}}
                                                {{--</label>--}}

                                                {{--<label>--}}
                                                    {{--<input type="radio" name="property_category" ><span class="circle"></span><span class="check"></span> Flat--}}
                                                {{--</label>--}}

                                                {{--<label>--}}
                                                    {{--<input type="radio" name="property_category" ><span class="circle"></span><span class="check"></span> Land--}}
                                                {{--</label>--}}

                                                {{--<label>--}}
                                                    {{--<input type="radio" name="property_category" ><span class="circle"></span><span class="check"></span> Office Space--}}
                                                {{--</label>--}}


                                                {{--<label>--}}
                                                    {{--<input type="radio" name="property_category" ><span class="circle"></span><span class="check"></span> Shop Space--}}
                                                {{--</label>--}}

                                                {{--<label>--}}
                                                    {{--<input type="radio" name="property_category" ><span class="circle"></span><span class="check"></span> Apartment--}}
                                                {{--</label>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group  label-floating">--}}
                                                {{--<label class="label-style">--}}
                                                    {{--Enter Title--}}
                                                    {{--<small>*</small>--}}
                                                {{--</label>--}}
                                                {{--<input class="form-control" name="name" type="text"  />--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group  label-floating">--}}
                                                {{--<label class="label-style">--}}
                                                    {{--Enter Slug--}}
                                                    {{--<small>*</small>--}}
                                                {{--</label>--}}
                                                {{--<input class="form-control" name="name" type="text"  />--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-12">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label class="label-style">--}}
                                                   {{--Property Details--}}
                                                    {{--<small>*</small>--}}
                                                {{--</label>--}}
                                                {{--<textarea  class="form-control arka-tinymce" name="short_description">{{old('short_description')}}</textarea>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- /BASIC DETAILS  ---->--}}

                            {{--<!---- ADDRESS ------->--}}
                            {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading" role="tab" id="headingTwo">--}}
                                    {{--<h4 class="panel-title">--}}
                                        {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
                                            {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                                            {{--<span class="material-icons">add_location_alt</span> Address--}}
                                        {{--</a>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                                {{--<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">--}}
                                    {{--<div class="panel-body">--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group" style="margin-top:10px;">--}}
                                                {{--<label class="label-style">Select City </label>--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="1">Kathamndu</option>--}}
                                                    {{--<option value="2">Bhaktapur</option>--}}
                                                    {{--<option value="3">Lalitpur</option>--}}
                                                    {{--<option value="3">Butwal</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group" style="margin-top:10px;">--}}
                                                {{--<label class="label-style">Select Area </label>--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="1">Lazimpat</option>--}}
                                                    {{--<option value="2">Baluwatar</option>--}}
                                                    {{--<option value="3">Lainchour</option>--}}
                                                    {{--<option value="3">Bhaktapur Municipality</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                {{--<label class="label-style">--}}
                                                    {{--Enter Address/Landmark--}}
                                                    {{--<small>*</small>--}}
                                                {{--</label>--}}
                                                {{--<input class="form-control" name="name" type="text"  />--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                {{--<label class="label-style">--}}
                                                    {{--Google Map Iframe--}}

                                                {{--</label>--}}
                                                {{--<input class="form-control" name="name" type="text" />--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!---- /ADDRESS ------->--}}

                            {{--<!--  TOTAL AREA & ROAD --->--}}
                            {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading" role="tab" id="headingThree">--}}
                                    {{--<h4 class="panel-title">--}}
                                        {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                                            {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                                            {{--<span class="material-icons">add_road</span> Total Area & Road Detail--}}
                                        {{--</a>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                                {{--<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">--}}
                                    {{--<div class="panel-body">--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<label class="label-style">Total Area</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<label class="label-style">Built Up Area</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<div class="form-group  label-floating">--}}
                                                {{--<input class="form-control" name="name" type="text"  />--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<div class="form-group" style="margin-top:10px;">--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="2">Sq. Meter</option>--}}
                                                    {{--<option value="3">Sq. Feet</option>--}}
                                                    {{--<option value="3">Acer</option>--}}
                                                    {{--<option value="3">Ropani-Aana-Paisa-Daam</option>--}}
                                                    {{--<option value="3">Bigha-Kattha-Dhur-Haat</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-md-3">--}}
                                            {{--<div class="form-group  label-floating">--}}
                                                {{--<input class="form-control" name="name" type="text"  />--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<div class="form-group" style="margin-top:10px;">--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="2">Sq. Meter</option>--}}
                                                    {{--<option value="3">Sq. Feet</option>--}}
                                                    {{--<option value="3">Acer</option>--}}
                                                    {{--<option value="3">Ropani-Aana-Paisa-Daam</option>--}}
                                                    {{--<option value="3">Bigha-Kattha-Dhur-Haat</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group" style="margin-top:10px;">--}}
                                                {{--<label class="label-style">Property Facing</label>--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="1">South</option>--}}
                                                    {{--<option value="2">North</option>--}}
                                                    {{--<option value="3">East</option>--}}
                                                    {{--<option value="3">West</option>--}}
                                                    {{--<option value="3">South-East</option>--}}
                                                    {{--<option value="3">South-West</option>--}}
                                                    {{--<option value="3">North-East</option>--}}
                                                    {{--<option value="3">North-West</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="clearfix"></div>--}}
                                        {{--<br>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="form-group  label-floating">--}}
                                                {{--<label class="label-style">--}}
                                                    {{--Road Access--}}
                                                    {{--<small>*</small>--}}
                                                {{--</label>--}}
                                                {{--<input class="form-control" name="name" type="text"  placeholder="e.g 34,45"/>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="form-group" style="margin-top:15px;">--}}
                                                {{--<label class="label-style">Road Length</label>--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select Road Length Unit" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}

                                                    {{--<option value="1">Feet</option>--}}
                                                    {{--<option value="2">Meter</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="form-group" style="margin-top:15px;">--}}
                                                {{--<label class="label-style">Road  Type</label>--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select Road Type" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}


                                                    {{--<option value="1">Paved</option>--}}
                                                    {{--<option value="2">Gravelled</option>--}}
                                                    {{--<option value="2">Alley</option>--}}
                                                    {{--<option value="2">Blacktopped</option>--}}
                                                    {{--<option value="2">Soil Stabilized</option>--}}

                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--  TOTAL AREA & ROAD --->--}}


                                {{--<!--  UPLOAD IMAGES   --->--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading" role="tab" id="headingFour">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">--}}
                                                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                                                {{--<span class="material-icons">perm_media</span> Upload Images--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                    {{--<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<div class="col-md-12">--}}

                                                {{--<div class="form-group  label-floating">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Youtube Id--}}
                                                        {{--<small>*</small>--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="text"/>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                            {{--<div class="col-md-6">--}}
                                                {{--<div class="form-group  label-floating">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Youtube Id--}}
                                                        {{--<small>*</small>--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="text"/>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-6"></div>--}}


                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                                {{--<!--  /UPLOAD IMAGES  --->--}}

                                {{--<!---  OTHER DETAIL ----->--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading" role="tab" id="headingFive">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">--}}
                                                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                                                {{--<span class="material-icons">playlist_add</span> Other Details of Property--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                    {{--<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<div class="col-md-12">--}}
                                                {{--<label class="label-style">Building Detail</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4">--}}
                                                {{--<input type="text" class="form-control" placeholder="Built Year">--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4">--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Month" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="">Month</option>--}}
                                                    {{--<option value="1">January</option>--}}
                                                    {{--<option value="2">February</option>--}}
                                                    {{--<option value="2">March</option>--}}
                                                    {{--<option value="2">April</option>--}}
                                                    {{--<option value="2">May</option>--}}
                                                    {{--<option value="2">June</option>--}}
                                                    {{--<option value="2">July</option>--}}
                                                    {{--<option value="2">August</option>--}}
                                                    {{--<option value="2">September</option>--}}
                                                    {{--<option value="2">October</option>--}}
                                                    {{--<option value="2">November</option>--}}
                                                    {{--<option value="2">December</option>--}}


                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4">--}}
                                                {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Furnishing" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                    {{--<option value="">Furnishing</option>--}}
                                                    {{--<option value="1">Full Furnished</option>--}}
                                                    {{--<option value="2">Semi Furnished</option>--}}
                                                    {{--<option value="2">Unfurnished</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}

                                            {{--<div class="clearfix"></div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Number of Kitchen--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Number of Living Room--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Number of Bedroom--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Number of Bathroom--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Total Number of Floor--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Parking for Car--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:15px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Parking for Bike--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="clearfix"></div>--}}
                                            {{--<div class="col-md-12">--}}
                                                {{--<label class="label-style">Amenities </label>--}}
                                            {{--</div>--}}

                                                {{--<div class="col-md-3">--}}
                                                    {{--<div class="checkbox checkbox-inline">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox" name="optionsCheckboxes">Balcony--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="col-md-3">--}}
                                                    {{--<div class="checkbox checkbox-inline">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox" name="optionsCheckboxes">Garage--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="col-md-3">--}}
                                                    {{--<div class="checkbox checkbox-inline">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox" name="optionsCheckboxes">Solar Water--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="col-md-3">--}}
                                                    {{--<div class="checkbox checkbox-inline">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox" name="optionsCheckboxes">Solar Water--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="col-md-3">--}}
                                                    {{--<div class="checkbox checkbox-inline">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox" name="optionsCheckboxes">Swimming Pool--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="checkbox checkbox-inline">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="optionsCheckboxes">Microwave--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="checkbox checkbox-inline">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="optionsCheckboxes">Jacuzzi--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="checkbox checkbox-inline">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="optionsCheckboxes">Garden--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="checkbox checkbox-inline">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="optionsCheckboxes">Modular Kitchen--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="checkbox checkbox-inline">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="optionsCheckboxes">Electricity Backup--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                            {{--<div class="col-md-3">--}}

                                                {{--<div class="checkbox checkbox-inline">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="optionsCheckboxes">Gym--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!---  /OTHER DETAIL ----->--}}


                                {{--<!---  Price ----->--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading" role="tab" id="headingSeven">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">--}}
                                                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                                                {{--<span class="material-icons">monetization_on</span> Price--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                    {{--<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">--}}
                                        {{--<div class="panel-body">--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<div class="form-group  label-floating" style="margin-top:10px;">--}}
                                                    {{--<label class="label-style">--}}
                                                        {{--Price--}}
                                                        {{--<small>*</small>--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control" name="name" type="number"  />--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-6">--}}
                                                {{--<div class="form-group" style="margin-top:10px;">--}}
                                                    {{--<label class="label-style">Price Label </label>--}}
                                                    {{--<select class="form-control select2 select2-hidden-accessible"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>--}}
                                                        {{--<option value="1">Per Month</option>--}}
                                                        {{--<option value="2">Per Aana</option>--}}
                                                        {{--<option value="3">Per Ropani</option>--}}
                                                        {{--<option value="3">Per Daam</option>--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!---  /Price ----->--}}


                                {{--<!---  OWNER DETAIL ----->--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading" role="tab" id="headingEight">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseThree">--}}
                                                {{--<i class="more-less glyphicon glyphicon-plus"></i>--}}
                                                {{--<span class="material-icons">person</span> Owner Detail--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                    {{--<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<div id="mydetail" class="tab-pane fade in active">--}}

                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="form-group  label-floating">--}}
                                                            {{--<label class="label-style">--}}
                                                                {{--Name--}}
                                                            {{--</label>--}}
                                                            {{--<input class="form-control" name="name" type="text"  />--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="form-group  label-floating">--}}
                                                            {{--<label class="label-style">--}}
                                                                {{--Address--}}
                                                            {{--</label>--}}
                                                            {{--<input class="form-control" name="name" type="text"  />--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="form-group  label-floating">--}}
                                                            {{--<label class="label-style">--}}
                                                               {{--Contact Phone--}}
                                                            {{--</label>--}}
                                                            {{--<input class="form-control" name="name" type="text"  />--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}


                                                {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!---  /OWNER DETAIL ----->--}}

                                {{--<br>--}}
                                {{--<div class="panel panel-default" style="margin-left: 5px">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="terms"> <b style="color: #696969">Is Active</b>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                            {{--</div>--}}
                            {{--<!-- /panel -group-->--}}

                                {{--<div class="form-footer text-right">--}}
                                    {{--<div class="checkbox pull-left">--}}
                                    {{--</div>--}}
                                    {{--<button type="submit" class="btn  btn-fill btn-success float-right">Post Property</button>--}}
                                {{--</div>--}}
                        {{--</form>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}


{{--@endsection--}}

{{--@push('script')--}}

{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>--}}

{{--<script>--}}
    {{--@if(Session::has('message'))--}}
         {{--toastr.info("{{Session::get('message')}}",'',{--}}
        {{--"closeButton": false,--}}
        {{--"debug": false,--}}
        {{--"newestOnTop": false,--}}
        {{--"progressBar": true,--}}
        {{--"positionClass": "toast-top-right",--}}
        {{--"preventDuplicates": false,--}}
        {{--"onclick": null,--}}
        {{--"showDuration": "300",--}}
        {{--"hideDuration": "1000",--}}
        {{--"timeOut": "5000",--}}
        {{--"extendedTimeOut": "1000",--}}
        {{--"showEasing": "swing",--}}
        {{--"hideEasing": "linear",--}}
        {{--"showMethod": "fadeIn",--}}
        {{--"hideMethod": "fadeOut"--}}
    {{--});--}}
    {{--@endif--}}

    {{--function convertToSlug(title)--}}
    {{--{--}}
        {{--return title--}}
            {{--.toLowerCase()--}}
            {{--.replace(/ /g,'-')--}}
            {{--.replace(/&/g,'and')--}}
            {{--.replace(/[^\w-]+/g,'');--}}

    {{--}--}}

    {{--$('#name').on('keyup',function(){--}}
        {{--var title=$(this).val();--}}
        {{--var slug=convertToSlug(title);--}}
        {{--$('#slug').val(slug);--}}
    {{--});--}}

{{--</script>--}}

{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--$('#datatables').DataTable({--}}
{{--//            "pagingType": "full_numbers",--}}
            {{--"lengthMenu": [--}}
                {{--[10, 25, 50, -1],--}}
                {{--[10, 25, 50, "All"]--}}
            {{--],--}}
            {{--responsive: true,--}}
            {{--language: {--}}
                {{--search: "_INPUT_",--}}
                {{--searchPlaceholder: "Search records",--}}
            {{--}--}}

        {{--});--}}


        {{--var table = $('#datatables').DataTable();--}}





    {{--});--}}

    {{--function deleteCity(id) {--}}
        {{--var csrf_token = $('meta[name="csrf-token"]').attr('content');--}}

        {{--swal({--}}
            {{--title: 'Are you sure?',--}}
            {{--text: "You won't be able to revert this!",--}}
            {{--type: 'warning',--}}
            {{--showCancelButton: true,--}}
            {{--confirmButtonColor: '#3085d6',--}}
            {{--cancelButtonColor: '#d33',--}}
            {{--confirmButtonText: 'Yes, delete it!'--}}
        {{--}).then(function () {--}}

            {{--$.ajax({--}}
                {{--url:'{!!URL::to('admin/city/')!!}' + '/' + id,--}}
                {{--type : "POST",--}}
                {{--data : {'_method' : 'DELETE', '_token' : csrf_token},--}}

                {{--success:function(){--}}

                    {{--console.log('success');--}}
                    {{--location.reload();--}}
                {{--},--}}
                {{--error:function(){--}}
                    {{--swal({--}}
                        {{--title: 'Oops...',--}}
                        {{--text: data.message,--}}
                        {{--type: 'error',--}}
                        {{--timer: '1500'--}}
                    {{--})--}}
                {{--}--}}
            {{--});--}}

        {{--});--}}

    {{--}--}}

    {{--function toggleIcon(e) {--}}
        {{--$(e.target)--}}
            {{--.prev('.panel-heading')--}}
            {{--.find(".more-less")--}}
            {{--.toggleClass('glyphicon-plus glyphicon-minus');--}}
    {{--}--}}
    {{--$('.panel-group').on('hidden.bs.collapse', toggleIcon);--}}
    {{--$('.panel-group').on('shown.bs.collapse', toggleIcon);--}}



{{--</script>--}}

    {{--<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>--}}

    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$(".select2").select2();--}}
        {{--});--}}
    {{--</script>--}}


{{--<script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>--}}
{{--<script>--}}
    {{--var uppy = Uppy.Core()--}}
        {{--.use(Uppy.Dashboard, {--}}
            {{--inline: true,--}}
            {{--target: '#drag-drop-area'--}}
        {{--})--}}
        {{--.use(Uppy.Tus, {endpoint: 'https://master.tus.io/files/'}) //you can put upload URL here, where you want to upload images--}}

    {{--uppy.on('complete', (result) => {--}}
        {{--console.log('Upload complete! We’ve uploaded these files:', result.successful)--}}
    {{--})--}}
{{--</script>--}}

{{--@endpush--}}