@extends('tradelink.layouts.master')
@section('title','Change Password')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Change &nbsp; Password</b>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('tradelink.update.password')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="card-content">

                                <div class="form-group label-floating margin-style">
                                    <label class="control-label" >Old Password</label>
                                    <input type="password"  class="form-control" name="old_password">
                                    @if(\Session::has('error_message'))
                                        <span class="error-message">
                                                    * {{\Session::get('error_message')}}
                                        </span>
                                    @endif
                                    @if ($errors->has('old_password'))
                                        <span class="error-message">
                                                    * {{ $errors->first('old_password') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group label-floating margin-style">
                                    <label class="control-label" >New Password</label>
                                    <input type="password"  class="form-control" name="new_password">
                                    @if ($errors->has('new_password'))
                                        <span class="error-message">
                                                    * {{ $errors->first('new_password') }}
                                        </span>
                                    @endif
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
