@extends('admin.layouts.master')
@section('title', 'Post Property')
@push('css')
    <link href="{{ asset('dashboard/fileinputs/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('dashboard/fileinputs/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet"
        type="text/css" />
    <style>
        .kv-file-upload {
            display: none !important;
        }

        .kv-file-content {
            width: 150px;
            height: 180px;
        }

        .file-footer-caption,
        .file-upload-indicator {
            display: none !important;
        }

        .file-footer-buttons {
            text-align: center !important;
        }

        .krajee-default .file-footer-buttons {
            float: none !important;
        }


        .custom-image input[type=file] {
            opacity: 5;
            position: relative;
        }
        .radio-wrapper label{
            margin-right: 20px

        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

/* Firefox */
.input[type=number] {
  -moz-appearance: textfield;
}

    </style>
    <style>
        .select2-container{
            width: 100%!important;
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
                                            <i class="material-icons">add</i> Create
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
                        @if ($property->id)
                            <form method="post" action="{{ route('properties.update', $property->id) }}"
                                class="form-horizontal" enctype="multipart/form-data" id="parsleyValidationForm"
                                data-parsley-validate="">
                                @method('PATCH')
                            @else
                                <form method="post" action="{{ route('properties.store') }}" class="form-horizontal"
                                    enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @endif
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">
                                <!-- panel-group -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <!--  BASIC DETAILS  ---->
                                    @include('admin.property.includes.basic_details')
                                    <!-- /BASIC DETAILS  ---->

                                    <!---- ADDRESS ------->
                                    @include('admin.property.includes.address', [
                                        'cities' => $cities,
                                    ])
                                    <!---- /ADDRESS ------->


                                    <!--  TOTAL AREA & ROAD --->
                                    <div class="total_area">
                                        @include('admin.property.includes.total_area')
                                    </div>
                                    <!--  TOTAL AREA & ROAD --->
                                   
                                      <!---  Price ----->
                                      @include('admin.property.includes.price')
                                      <!---  /Price ----->
                                        <!---  OTHER DETAIL ----->

                                    
                                    @include('admin.property.includes.category')
                                    @include('admin.property.includes.facility')
                                    <!---  /OTHER DETAIL ----->

                                    <!--  UPLOAD IMAGES   --->
                                    @include(
                                        'admin.property.includes.upload_images'
                                    )
                                    <!--  /UPLOAD IMAGES  --->

                                  

                                  

                                    <!---  OWNER DETAIL ----->
                                    @include(
                                        'admin.property.includes.owner_details'
                                    )
                                    <!---  /OWNER DETAIL ----->


                                    <!---  Amenities DETAIL ----->
                                    @include('admin.property.includes.amenities')
                                    <!---  /Amenities DETAIL ----->
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-style">
                                                    Featured
                                                    <span class='required-error'>*</span>
                                                </label> <br>  
                                                <div class="radio-wrapper">
                                                    <input  type="radio" name="feature" value="0" id="notfeature" @if ($property->feature == 0) checked @endif>
                                                    <label for="notfeature" class="me-2" >Not Featured</label>
                                                    <input type="radio" name="feature" value="1" id="feature" class="me-2" @if ($property->feature == 1) checked @endif>
                                                    <label for="feature">Featured</label>
                                                </div>
                                                {{-- <div class="togglebutton">
                                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                        Not Featured 
                                                        <input type="checkbox" value="1" name="feature"
                                                            @if ($property->feature) checked @endif> Feature
                                                    </label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-style">
                                                    Insurance
                                                    <span class='required-error'>*</span>
                                                </label>
                                                <br> 
                                                <div class="radio-wrapper"> 
                                                <input  type="radio" name="insurance" value="0" id="non-insurance" @if ($property->insurance == 0) checked @endif>
                                                <label for="non-insurance" class="me-2">Not Availabe</label>
                                                <input type="radio" name="insurance" value="1" id="insurance" class="me-2" @if ($property->insurance == 1) checked @endif>
                                                <label for="insurance">Availabe</label>
                                                </div>
                                                {{-- <div class="togglebutton">
                                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                        Not Available <input type="checkbox" value="1" name="insurance"
                                                            @if ($property->insurance) checked @endif>Available
                                                    </label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-style">
                                                    Negotiable
                                                    <span class='required-error'>*</span>
                                                </label>
                                                <br>
                                                <div class="radio-wrapper">
                                                    <input  type="radio" name="negotiable" value="0" id="non-negotiable" @if ($property->negotiable == 0) checked @endif>
                                                    <label for="non-negotiable" class="pe-2">Not Negotiable</label>
                                                    <input type="radio" name="negotiable" value="1" id="negotiable" class="me-2" @if ($property->negotiable == 1) checked @endif>
                                                    <label for="negotiable">Negotiable</label>
                                                </div>
        
                                                {{-- <div class="togglebutton">
                                                    <label class="lead"
                                                        style="color:black;font-weight:bold;font-size:11pt;">
                                                        None Negotiable <input type="checkbox" value="1" name="negotiable"
                                                            @if ($property->negotiable) checked @endif>Negotiable
                                                    </label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        @if (auth()->user()->isAdmin())
                                        <div class="col-md-6">
                                            <label class="control-label">Select User</label> <br>
                                            <select class="js-example-basic-single" name="client">
                                                <option disabled selected>Select User</option>
                                                @foreach ($users as $user )
                                                <option value="{{$user->id}}" @isset($property)  {{ ($property->user_id == $user->id) ? 'selected':'' }} @endisset>{{$user->name}}</option>
                                                @endforeach
                                          </select>
                                        </div>                                
                                        @endif
                                    </div>
                                 
                                </div>                                    
                                </div>
                                <!-- /panel -group-->

                            </div>
                            <div class="tab-pane" id="panel2">
                                <div class="row seo">
                                    <div class="form-group margin-style col-md-12">
                                        <label>Meta Keywords</label>
                                        <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control"
                                            data-parsley-trigger="keyup" data-parsley-maxlength="300"></textarea>
                                        @if ($errors->has('meta_keyword'))
                                            <span class="error-message">
                                                *{{ $errors->first('meta_keyword') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control"
                                            data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
                                        @if ($errors->has('meta_description'))
                                            <span class="error-message">
                                                *{{ $errors->first('meta_description') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn btn-success btn-fill">Create</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection

@push('script')
    <script src="{{ asset('dashboard/fileinputs/js/plugins/piexif.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/js/locales/fr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/js/locales/es.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/themes/gly/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/fileinputs/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
    <script>
        $.fn.fileinput.defaults.theme = 'gly';
    </script>
    <Script>
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </Script>
    <script>
        // $('#categorytype').on('click', function(){
        //     let a = $('input[name="category_id"]:checked').data('testval');
        //     if(a == "Apartment/Flat"){
        //         $('.total_area').hide();
        //     }
        //     else{
        //         $('.total_area').show();
        //     }
        // })   

    </script>
    <script>
        $("#file-5").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            'dropZoneEnabled': false,
            'maxFileCount': 12,
            'validateInitialCount': true,
            'overwriteInitial': false,
        });

        $('.file-caption-name').val('Choose Multiple Images ( Max limit : 4)');
    </script>
    <script>
        @if ($errors->any())
            toastr.error("{{ implode('\n',$errors->all()) }}",'',{
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            });
        @endif
    </script>
@endpush
