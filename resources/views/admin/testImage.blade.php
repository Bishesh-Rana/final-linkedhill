@extends('admin.layouts.master')
@section('title','Create Slider')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/jquery.imagesloader.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Slider :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Slider
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('slider.index')}}" aria-expanded="false">
                                            <i class="material-icons">settings</i>Mange Slider
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <form id="frm" method="post" class="needs-validation" novalidate="">

                            <!--Image Upload-->
                            <div class="row mt-3 mb-2">

                                <div class="col-12 pr-0 text-left">
                                    <label for="Images" class="col-form-label text-nowrap"><strong>Images loader</strong></label>
                                </div>
                            </div>

                            <!--Image container -->
                            <div class="row"
                                 data-type="imagesloader"
                                 data-errorformat="Accepted file formats"
                                 data-errorsize="Maximum size accepted"
                                 data-errorduplicate="File already loaded"
                                 data-errormaxfiles="Maximum number of images you can upload"
                                 data-errorminfiles="Minimum number of images to upload"
                                 data-modifyimagetext="Modify immage">

                                <!-- Progress bar -->
                                <div class="col-12 order-1 mt-2">
                                    <div data-type="progress" class="progress" style="height: 25px; display:none;">
                                        <div data-type="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;">Load in progress...</div>
                                    </div>
                                </div>

                                <!-- Model -->
                                <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2" style="max-width:200px; display:none;">

                                    <div class="ratio-box text-center" data-type="image-ratio-box">
                                        <img data-type="noimage" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="./img/photo-camera-gray.svg" style="cursor:pointer;">
                                        <div data-type="loading" class="img-loading" style="color:#218838; display:none;">
                                            <span class="fa fa-2x fa-spin fa-spinner"></span>
                                        </div>
                                        <img data-type="preview" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="" style="display: none; cursor: default;">
                                        <span class="badge badge-pill badge-success p-2 w-50 main-tag" style="display:none;">Main</span>
                                    </div>

                                    <!-- Buttons -->
                                    <div data-type="image-buttons" class="row justify-content-center mt-2">
                                        <button data-type="add" class="btn btn-outline-success" type="button"><span class="fa fa-camera mr-2"></span>Add</button>
                                        <button data-type="btn-modify" type="button" class="btn btn-outline-success m-0" data-toggle="popover" data-placement="right" style="display:none;">
                                            <span class="fa fa-pencil-alt mr-2"></span>Modify
                                        </button>
                                    </div>
                                </div>

                                <!-- Popover operations -->
                                <div data-type="popover-model" style="display:none">
                                    <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">
                                        <div class="row">
                                            <div class="col p-0">
                                                <button data-operation="main" class="btn btn-block btn-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-double-up mr-2"></span>Main</button>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6 p-0 pr-1">
                                                <button data-operation="left" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-left mr-2"></span>Left</button>
                                            </div>
                                            <div class="col-6 p-0 pl-1">
                                                <button data-operation="right" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Right<span class="fa fa-angle-right ml-2"></span></button>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6 p-0 pr-1">
                                                <button data-operation="rotateanticlockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fas fa-undo-alt mr-2"></span>Rotate</button>
                                            </div>
                                            <div class="col-6 p-0 pl-1">
                                                <button data-operation="rotateclockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Rotate<span class="fas fa-redo-alt ml-2"></span></button>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <button data-operation="remove" class="btn btn-outline-danger btn-sm btn-block" type="button"><span class="fa fa-times mr-2"></span>Remove</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="input-group">
                                    <!--Hidden file input for images-->
                                    <input id="files" type="file" name="files[]" data-button="" multiple="" accept="image/jpeg, image/png, image/gif," style="display:none;">
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

    <script src="{{ asset('dashboard/js/jquery.imagesloader-1.0.1.js') }}"></script>

    <script type="text/javascript">

        // Ready
        $(document).ready(function () {

            //Image loader var to use when you need a function from object
            var auctionImages = null;

            // Create image loader plugin
            var imagesloader = $('[data-type=imagesloader]').imagesloader({
                maxFiles: 4
                , minSelect: 1
                , imagesToLoad: auctionImages
            });

            //Form
            $frm = $('#frm');

            // Form submit
            $frm.submit(function (e) {

                var $form = $(this);

                var files = imagesloader.data('format.imagesloader').AttachmentArray;

                var il = imagesloader.data('format.imagesloader');

                if (il.CheckValidity())
                    alert('Upload ' + files.length + ' files');

                e.preventDefault();
                e.stopPropagation();
            });

        });

    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
@endpush
