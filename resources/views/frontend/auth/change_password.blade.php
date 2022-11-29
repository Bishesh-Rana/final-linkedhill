@extends('frontend.dashboard.layouts.master')
@section('title','Change Password')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">

                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i> Change Password
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('updatePassword')}}" class="form-horizontal" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                            @csrf

                            <div class="card-content">
                                @if(Auth::user()->password != null)
                                    <div class="form-group  margin-style">
                                        <label>Old Password</label>
                                        <input type="password"  class="form-control" name="old_password" data-parsley-trigger="keyup" required>
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
                                        <label>New Password</label>
                                        <input type="password"  class="form-control" name="new_password" data-parsley-trigger="keyup" required>
                                        @if ($errors->has('new_password'))
                                            <span class="error-message">
                                                    * {{ $errors->first('new_password') }}
                                        </span>
                                        @endif
                                    </div>
                                @else

                                    <div class="form-group label-floating margin-style">
                                        <label>Please Set A Password</label>
                                        <input type="password"  class="form-control" name="new_password" data-parsley-trigger="keyup" required>
                                        @if ($errors->has('new_password'))
                                            <span class="error-message">
                                                    * {{ $errors->first('new_password') }}
                                        </span>
                                        @endif
                                    </div>


                                @endif




                                <div class="clearfix"></div>

                                <div class="form-footer text-right">
                                    <div class="checkbox pull-left">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm btn-fill">Update </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection


