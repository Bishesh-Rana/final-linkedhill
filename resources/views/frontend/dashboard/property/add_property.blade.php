@extends('frontend.dashboard.layouts.master')
@section('title','Post Property')
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
                        <form id="dropzoneForm" class="dropzone"  action="{{route('property.store')}}"  method="post" enctype="multipart/form-data"  data-parsley-validate="">
                            @csrf
                                <!-- panel-group -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="panel1">

                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <!--  BASIC DETAILS  ---->
                                        @include('frontend.dashboard.property.includes.basic_details')
                                        <!-- /BASIC DETAILS  ---->

                                            <!---- ADDRESS ------->
                                        @include('frontend.dashboard.property.includes.address')
                                        <!---- /ADDRESS ------->


                                            <!--  TOTAL AREA & ROAD --->
                                        @include('frontend.dashboard.property.includes.total_area')
                                        <!--  TOTAL AREA & ROAD --->

                                            <!--  UPLOAD IMAGES   --->
                                        @include('frontend.dashboard.property.includes.upload_images')
                                        <!--  /UPLOAD IMAGES  --->

                                            <!---  OTHER DETAIL ----->
                                        @include('frontend.dashboard.property.includes.other_details')
                                        <!---  /OTHER DETAIL ----->

                                            <!---  Price ----->
                                        @include('frontend.dashboard.property.includes.price')
                                        <!---  /Price ----->

                                            <!---  OWNER DETAIL ----->
                                        @include('frontend.dashboard.property.includes.owner_details')
                                        <!---  /OWNER DETAIL ----->
                                            <br>
                                            <div class="form-group">
                                                <div class="togglebutton">
                                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                        Non Featured <input type="checkbox" name="feature" value="1"  checked> Featured
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane" id="panel2">

                                            <div class="row seo">
                                                <div class="form-group margin-style col-md-12">
                                                    <label>Meta Keywords</label>
                                                    <textarea name="meta_keyword" id="" cols="30" rows="3"
                                                              class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"></textarea>
                                                    @if ($errors->has('meta_keyword'))
                                                        <span class="error-message">
                                            *{{ $errors->first('meta_keyword') }}
                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                                    <label>Meta Description</label>
                                                    <textarea name="meta_description" id="" cols="30" rows="3"
                                                              class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
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
                                        <button type="submit" class="btn  btn-fill btn-success float-right postProperty">Post Property</button>
                                    </div>

                                </div>
                                <!-- /panel -group-->
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('script')




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
