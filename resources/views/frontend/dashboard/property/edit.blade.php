@extends('frontend.dashboard.layouts.master')
@section('title','Edit Property')
@push('css')


    <link href="{{asset('dashboard/fileinputs/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{asset('dashboard/fileinputs/themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <style>

        .kv-file-upload{
            display: none !important;
        }

        .kv-file-content {
            width: 150px;
            height: 180px;
        }

        .file-footer-caption,.file-upload-indicator{
            display: none !important;
        }

        .file-footer-buttons{
            text-align: center !important;
        }

        .krajee-default .file-footer-buttons {
            float: none !important;
        }


        .custom-image input[type=file] {
            opacity: 5;
            position: relative;
        }
        .property-image{
            width: 150px;
            height: 150px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Property :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i> Edit Property : {{$property->title}}
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#panel2" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">travel_explore</i> SEO
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <form id="dropzoneForm" class="dropzone"  action="{{route('property.update',$property->id)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="tab-content">
                                <div class="tab-pane active" id="panel1">
                                    <!-- panel-group -->
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                        <!--  BASIC DETAILS  ---->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="more-less glyphicon glyphicon-minus"></i>
                                                        <span class="material-icons"> hvac </span> Basic Details
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="form-group col-md-6">
                                                        <label class="label-style">Purpose to Post Property</label>
                                                        <div class="radio">
                                                            @foreach($purposes as $purpose)
                                                                <label>
                                                                    <input type="radio" name="property_status" value="{{$purpose->name}}" @if($property->property_status == $purpose->name) checked="true" @endif ><span class="circle"></span><span class="check"></span> {{$purpose->name}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="label-style">Property Type</label>
                                                        <div class="radio">
                                                            @foreach($property_types as $property_type)
                                                                <label>
                                                                    <input type="radio" name="type" @if($property->type == $property_type->name) checked="true" @endif  value="{{$property_type->name}}"><span class="circle"></span><span class="check"></span> {{$property_type->name}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="label-style">Property Category</label>
                                                        <div class="radio">
                                                            @foreach($property_categories as $property_category)
                                                                <label>
                                                                    <input type="radio" name="category_id" @if($property->category_id == $property_category->id) checked="true" @endif value="{{$property_category->id}}"><span class="circle"></span><span class="check"></span> {{$property_category->name}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group  label-floating">
                                                            <label class="label-style">
                                                                Enter Title
                                                                <span class='required-error'>*</span>
                                                            </label>
                                                            <input class="form-control" name="title" id="title" value="{{$property->title}}" type="text"  data-parsley-trigger="keyup"  required/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group  label-floating">
                                                            <label class="label-style">
                                                                Enter Slug
                                                                <span class='required-error'>*</span>
                                                            </label>
                                                            <input class="form-control" name="slug" value="{{$property->slug}}" id="slug" type="text"  data-parsley-trigger="keyup"  required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label-style">
                                                                Property Details
                                                                <span class='required-error'>*</span>
                                                            </label>
                                                            <textarea  class="form-control summernote" name="property_detail">{!! $property->property_detail !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /BASIC DETAILS  ---->

                                        <!---- ADDRESS ------->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <span class="material-icons">add_location_alt</span> Address
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-top:10px;">
                                                            <label class="label-style">Select City </label>
                                                            <select class="form-control select2 select2-hidden-accessible" name="city_id"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                @foreach($cities as $city)
                                                                    <option value="{{$city->id}}" @if($city->id == $property->city_id) selected @endif>{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-top:10px;">
                                                            <label class="label-style">Select Area </label>
                                                            <select class="form-control select2 select2-hidden-accessible" name="area_id"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                @foreach($areas as $area)
                                                                    <option value="{{$area->id}}" @if($area->id == $property->area_id) selected @endif>{{$area->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Enter Address/Landmark
                                                                <span class='required-error'>*</span>
                                                            </label>
                                                            <input class="form-control" name="property_address" value="{{$property->property_address}}" type="text" data-parsley-trigger="keyup"  required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Enter Zipcode
                                                                <span class='required-error'>*</span>
                                                            </label>
                                                            <input class="form-control" name="zipcode" value="{{$property->zipcode}}" type="text" data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-type-message="Enter Valid Zipcode" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Google Map Iframe
                                                            </label>
                                                            <textarea class="form-control"  name="map_location" row="2">{{$property->map_location}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!---- /ADDRESS ------->


                                        <!--  TOTAL AREA & ROAD --->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <span class="material-icons">add_road</span> Total Area & Road Detail
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <div class="col-md-6">
                                                        <label class="label-style">Total Area <span class="required-error">*</span></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="label-style">Built Up Area</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- Total area --}}
                                                        <div class="form-group  label-floating">
                                                            <input class="form-control" name="total_area" value="{{$property->total_area}}" type="text" data-parsley-trigger="keyup"  required/>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group" style="margin-top:10px;">
                                                            <select class="form-control select2 select2-hidden-accessible" name="total_area_unit" data-placeholder="Select Unit" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                @foreach($units as $unit)
                                                                    <option value="{{$unit->id}}" @if($unit->id == $property->total_area_unit) selected @endif>{{$unit->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating">
                                                            {{--  built up area--}}
                                                            <input class="form-control" name="built_up_area" value="{{$property->built_up_area}}" type="text"  />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group" style="margin-top:10px;">
                                                            <select class="form-control select2 select2-hidden-accessible" name="built_up_area_unit"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                @foreach($units as $unit)
                                                                    <option value="{{$unit->id}}" @if($unit->id == $property->built_up_area_unit) selected @endif>{{$unit->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-top:10px;">
                                                            <label class="label-style">Property Facing</label>
                                                            <select class="form-control select2 select2-hidden-accessible" name="property_facing" data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                <option value="South" @if($property->property_facing == "South") selected @endif>South</option>
                                                                <option value="North" @if($property->property_facing == "North") selected @endif>North</option>
                                                                <option value="East" @if($property->property_facing == "East") selected @endif>East</option>
                                                                <option value="West" @if($property->property_facing == "West") selected @endif>West</option>
                                                                <option value="South-East" @if($property->property_facing == "South-East") selected @endif>South-East</option>
                                                                <option value="South-West" @if($property->property_facing == "South-West") selected @endif>South-West</option>
                                                                <option value="North-East" @if($property->property_facing == "North-East") selected @endif>North-East</option>
                                                                <option value="North-West" @if($property->property_facing == "North-West") selected @endif>North-West</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <br>
                                                    <div class="col-md-4">
                                                        <div class="form-group  label-floating">
                                                            <label class="label-style">
                                                                Road Access

                                                            </label>
                                                            <input class="form-control" name="road_access" value="{{$property->road_access}}" type="text"  placeholder="e.g 34,45"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group" style="margin-top:15px;">
                                                            <label class="label-style">Road Length</label>
                                                            <select class="form-control select2 select2-hidden-accessible" name="road_access_unit"  data-placeholder="Select Road Length Unit" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                <option value="1" @if($property->road_access_unit == 1) selected @endif>Feet</option>
                                                                <option value="2" @if($property->road_access_unit == 2) selected @endif>Meter</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group" style="margin-top:15px;">
                                                            <label class="label-style">Road  Type</label>
                                                            <select class="form-control select2 select2-hidden-accessible" name="road_type" data-placeholder="Select Road Type" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                @foreach($road_types as $road_type)
                                                                    <option value="{{$road_type->id}}" @if($road_type->id == $property->road_type) selected @endif>{{$road_type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--  TOTAL AREA & ROAD --->

                                        <!--  UPLOAD IMAGES   --->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFour">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <span class="material-icons">perm_media</span> Upload Images
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <label class="label-style"> Image Upload </label>
                                                        <div class="file-loading">
                                                            <input id="file-5" name="property_images[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-theme="fas">
                                                        </div>
                                                        @if ($errors->has('property_images'))
                                                            <span class="error-message">
                                                            *{{ $errors->first('property_images') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div style="margin-top: 20px">
                                                            @foreach($property->images as $image)
                                                                <div class="col-md-3 property-image" id="proimage-{{$image->id}}">
                                                                    <a href="{{$image->name}}" data-lightbox="example{{$image->id}}"><img class="img-style" src="{{$image->name}}"  /></a>
                                                                    <button class="btn btn-simple btn-danger delButton" value="{{$image->id}}"><i class="material-icons">close</i></button>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                    <input type="hidden" value="{{count($property->images)}}" id="countImages">

                                                    <div class="col-md-12">
                                                        <div class="form-group  label-floating">
                                                            <label class="label-style">
                                                                Youtube Id
                                                                {{--<small>*</small>--}}
                                                            </label>
                                                            <input class="form-control" name="youtube_video_id" value="{{$property->youtube_video_id}}" type="text"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--  /UPLOAD IMAGES  --->

                                        <!---  OTHER DETAIL ----->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFive">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <span class="material-icons">playlist_add</span> Other Details of Property
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <label class="label-style">Building Detail</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="{{$property->built_year}}" placeholder="Built Year" name="built_year">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control select2 select2-hidden-accessible"  name="built_year_month" data-placeholder="Month" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                            <option value="January" @if($property->built_year_month == "January")selected @endif>January</option>
                                                            <option value="February" @if($property->built_year_month == "February")selected @endif>February</option>
                                                            <option value="March" @if($property->built_year_month == "March")selected @endif>March</option>
                                                            <option value="April" @if($property->built_year_month == "April")selected @endif>April</option>
                                                            <option value="May" @if($property->built_year_month == "May")selected @endif>May</option>
                                                            <option value="June" @if($property->built_year_month == "June")selected @endif>June</option>
                                                            <option value="July" @if($property->built_year_month == "July")selected @endif>July</option>
                                                            <option value="August" @if($property->built_year_month == "August")selected @endif>August</option>
                                                            <option value="September" @if($property->built_year_month == "September")selected @endif>September</option>
                                                            <option value="October" @if($property->built_year_month == "October")selected @endif>October</option>
                                                            <option value="November" @if($property->built_year_month == "November")selected @endif>November</option>
                                                            <option value="December" @if($property->built_year_month == "December")selected @endif>December</option>


                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control select2 select2-hidden-accessible" name="furnished"  data-placeholder="Furnishing" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                                                            <option value="Full Furnished" @if($property->furnished == "Full Furnished") selected @endif>Full Furnished</option>
                                                            <option value="Semi Furnished" @if($property->furnished == "Semi Furnished") selected @endif>Semi Furnished</option>
                                                            <option value="Unfurnished" @if($property->furnished == "Unfurnished") selected @endif>Unfurnished</option>
                                                        </select>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Number of Kitchen
                                                            </label>
                                                            <input class="form-control" name="total_kitchen" value="{{$property->total_kitchen}}" type="number" min="0" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Number of Living Room
                                                            </label>
                                                            <input class="form-control" name="total_living_room" value="{{$property->total_living_room}}" type="number" min="0"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Number of Bedroom
                                                            </label>
                                                            <input class="form-control" name="total_bed_room" value="{{$property->total_bed_room}}" type="number" min="0"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Number of Bathroom
                                                            </label>
                                                            <input class="form-control" name="total_bathroom" value="{{$property->total_bathroom}}" type="number" min="0"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Total Number of Floor
                                                            </label>
                                                            <input class="form-control" name="total_floor" value="{{$property->total_floor}}" type="number" min="0"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Parking for Car
                                                            </label>
                                                            <input class="form-control" name="car_parking" value="{{$property->car_parking}}" type="number" min="0" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group  label-floating" style="margin-top:15px;">
                                                            <label class="label-style">
                                                                Parking for Bike
                                                            </label>
                                                            <input class="form-control" name="bike_parking" value="{{$property->bike_parking}}" type="number" min="0"/>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="col-md-12">
                                                        <label class="label-style">Amenities </label>
                                                    </div>

                                                    @foreach($amenties as $amenty)
                                                        <div class="col-md-3">
                                                            <div class="checkbox checkbox-inline">
                                                                <label>
                                                                    <input type="checkbox" name="amenties[]" value="{{$amenty->id}}" @foreach($property->amenties as $a) @if($amenty->id == $a->amenity_id) checked @endif @endforeach> {{$amenty->name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!---  /OTHER DETAIL ----->

                                        <!---  Price ----->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingSeven">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <span class="material-icons">monetization_on</span> Price
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                                                <div class="panel-body">

                                                    <div class="col-md-6">
                                                        <div class="form-group  label-floating" style="margin-top:10px;">
                                                            <label class="label-style">
                                                                Price
                                                                <span class='required-error'>*</span>
                                                            </label>
                                                            <input class="form-control" name="price" value="{{$property->price}}" type="number" data-parsley-trigger="keyup"  required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-top:10px;">
                                                            <label class="label-style">Price Label </label>
                                                            <select class="form-control select2 select2-hidden-accessible"  name="price_label" data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                                                <option value="Per Month" @if($property->price_label == "Per Month") selected @endif>Per Month</option>
                                                                <option value="Per Aana" @if($property->price_label == "Per Aana") selected @endif>Per Aana</option>
                                                                <option value="Per Ropani" @if($property->price_label == "Per Ropani") selected @endif>Per Ropani</option>
                                                                <option value="Per Daam" @if($property->price_label == "Per Daam") selected @endif>Per Daam</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!---  /Price ----->

                                        <!---  OWNER DETAIL ----->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingEight">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <span class="material-icons">person</span> Owner Detail
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                                                <div class="panel-body">
                                                    <div id="mydetail" class="tab-pane fade in active">

                                                        <div class="col-md-4">
                                                            <div class="form-group  label-floating">
                                                                <label class="label-style">
                                                                    Name  <span class='required-error'>*</span>
                                                                </label>
                                                                <input class="form-control" name="owner_name" value="{{$property->owner_name}}" type="text"  data-parsley-trigger="keyup"  required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group  label-floating">
                                                                <label class="label-style">
                                                                    Address <span class='required-error'>*</span>
                                                                </label>
                                                                <input class="form-control" name="owner_address" value="{{$property->owner_address}}" type="text" data-parsley-trigger="keyup"  required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group  label-floating">
                                                                <label class="label-style">
                                                                    Contact Phone <span class='required-error'>*</span>
                                                                </label>
                                                                <input class="form-control" name="owner_phone" value="{{$property->owner_phone}}" type="text"  data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-type-message="only numbers"  required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!---  /OWNER DETAIL ----->

                                        <br>
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                    Not Featured <input type="checkbox" value="1" name="feature" @if($property->feature) checked  @endif> Feature
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-footer text-right">
                                            <div class="checkbox pull-left">
                                            </div>
                                            <button type="submit" class="btn  btn-fill btn-success float-right postProperty">Update Property</button>
                                        </div>

                                    </div>
                                    <!-- /panel -group-->

                                </div>
                                <div class="tab-pane" id="panel2">

                                    <div class="row seo">
                                        <div class="form-group margin-style col-md-12">
                                            <label>Meta Keywords</label>
                                            <textarea name="meta_keyword" id="" cols="30" rows="3"
                                                      class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> {!! $property->meta_keyword !!} </textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                            *{{ $errors->first('meta_keyword') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3"
                                                      class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> {!! $property->meta_description !!} </textarea>
                                            @if ($errors->has('meta_description'))
                                                <span class="error-message">
                                            *{{ $errors->first('meta_description') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('script')


<script>


    var del = document.querySelectorAll('.delButton');

    del.forEach((d)=>{
        d.addEventListener("click",(e)=>{
            e.preventDefault();
            var count = $('#countImages').val();
            if(count >1)
            {
                swal({
                    title: 'Are you sure?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    $.ajax({
                        url:'{!!URL::to('admin/property-image/delete/')!!}' + '/' + d.value,
                        type : "get",
                        data : {'_method' : 'GET'},
                        success:function(){
                            d.parentNode.style.display = "none";
                            location.reload();
                        },
                        error:function(){
                        }
                    });

                });


            }else {

                swal({
                    title: 'Atleast One Image Required For Property',
                    text: "Please upload other image to delete this",
                    type: 'warning',
                    confirmButtonText: 'ok'
                })
            }
        })
    });


</script>

<script src="{{asset('dashboard/fileinputs/js/plugins/piexif.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/js/plugins/sortable.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/js/fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/js/locales/fr.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/js/locales/es.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/themes/gly/theme.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/themes/fas/theme.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/fileinputs/themes/explorer-fas/theme.js')}}" type="text/javascript"></script>
<script>$.fn.fileinput.defaults.theme = 'gly';</script>
<script>
    $("#file-5").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        dropZoneEnabled: false,
        maxFileCount: 12,
        validateInitialCount: true,
        overwriteInitial: false,
    });
    $('.file-caption-name').val('Choose Multiple Images ( Max limit : 4)');


</script>
@endpush
