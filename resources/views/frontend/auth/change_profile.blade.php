@extends('frontend.dashboard.layouts.master')
@section('title','Update Profile')

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
                                            <i class="material-icons">settings</i> Change Profile
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('updateProfile')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="card-content">

                                <div class="form-group label-floating is-empty">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">

                                            <img src="{{Auth::user()->profile}}" id="image" class="img-thumbnail img-responsive" alt="">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Update Image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="profile" id="image" />
                                                    </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group label-floating margin-style ">
                                        <label class="control-label" >Name</label>
                                        <input type="text"  class="form-control" name="name" value="{{Auth::user()->name}}" required>
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
                                        <input type="email"  class="form-control" name="email" value="{{Auth::user()->email}}" required>
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


