@extends('tradelink.layouts.master')
@section('title','Website Settings')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Website &nbsp; Settings </b>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('tradelink.update.settings')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf


                            <div class="col-md-4 form-group label-floating is-empty ">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('tradelink/'.$data->logo)}}" id="image" class="img-thumbnail img-responsive" alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Update Logo</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="logo" id="image" />
                                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>


                            <div class="col-md-6 form-group">
                                <label>Website Title</label>
                                <input type="text"  class="form-control" name="website_title" id="name" value="{{$data->website_title}}">
                                @if ($errors->has('website_title'))
                                    <span class="error-message">
                                                    *{{ $errors->first('website_title') }}
                                        </span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input type="email"  class="form-control" name="email"  value="{{$data->email}}">
                                @if ($errors->has('email'))
                                    <span class="error-message">
                                                    *{{ $errors->first('email') }}
                                        </span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Phone Number</label>
                                <input type="text"  class="form-control" name="phone"  value="{{$data->phone}}">
                                @if ($errors->has('phone'))
                                    <span class="error-message">
                                                    *{{ $errors->first('phone') }}
                                        </span>
                                @endif
                            </div>



                            <div class="col-md-6 form-group">
                                <label>Copyright </label>
                                <input type="text"  class="form-control" name="copyright_message"  value="{{$data->copyright_message}}">
                                @if ($errors->has('copyright_message'))
                                    <span class="error-message">
                                                    *{{ $errors->first('copyright_message') }}
                                        </span>
                                @endif
                            </div>







                            <div class="col-md-6 form-group">
                                <label>Facebook Link</label>
                                <input type="text"  class="form-control" name="fb_url"  value="{{$data->fb_url}}">
                                @if ($errors->has('fb_url'))
                                    <span class="error-message">
                                                    *{{ $errors->first('fb_url') }}
                                        </span>
                                @endif
                            </div>


                            <div class="col-md-6 form-group">
                                <label>Instagram Link</label>
                                <input type="text"  class="form-control" name="instagram_url"  value="{{$data->instagram_url}}">
                                @if ($errors->has('instagram_url'))
                                    <span class="error-message">
                                                    *{{ $errors->first('instagram_url') }}
                                        </span>
                                @endif
                            </div>



                            <div class="col-md-12 form-group  margin-style">
                                <label>Short Description in footer</label>
                                <textarea name="short_description"  id="summary-ckeditor" class="arka-tinymce">{!! $data->short_description !!}</textarea>
                                @if ($errors->has('short_description'))
                                    <span class="error-message">
                                        *{{ $errors->first('short_description') }}
                                    </span>
                                @endif
                            </div>



                            <div class="clearfix"></div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-behance btn-fill">Update </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))


        toastr.success("{{Session::get('message')}}",'',{

            "positionClass": "toast-top-right",

        });


        @endif

    </script>

@endpush
