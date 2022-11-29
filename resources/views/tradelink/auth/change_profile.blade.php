@extends('tradelink.layouts.master')
@section('title','Update Profile')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Change &nbsp; Profile</b>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('tradelink.update.profile')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="card-content">

                                <div class="form-group label-floating is-empty">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">

                                            <img src="{{Auth::guard('tradelink_admin')->user()->image}}" id="image" class="img-thumbnail img-responsive" alt="">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Update Image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image" id="image" />
                                                    </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group label-floating margin-style ">
                                        <label class="control-label" >Name</label>
                                        <input type="text"  class="form-control" name="name" value="{{Auth::guard('tradelink_admin')->user()->name}}" required>
                                        @if(\Session::has('name'))
                                            <span class="error-message">
                                                    * {{\Session::get('name')}}
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">

                                    <div class="form-group label-floating margin-style">
                                        <label class="control-label" >Email</label>
                                        <input type="email"  class="form-control" name="email" value="{{Auth::guard('tradelink_admin')->user()->email}}" required>
                                        @if ($errors->has('email'))
                                            <span class="error-message">
                                                    * {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>


                                </div>

                                <div class="clearfix"></div>

                                <div class="form-footer text-right">
                                    <div class="checkbox pull-left">
                                    </div>
                                    <button type="submit" class="btn btn-behance btn-fill">Update </button>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))


        toastr.success("{{Session::get('message')}}",'',{

            "positionClass": "toast-top-right",

        });


        @endif

    </script>

@endpush
