@extends('admin.layouts.master')
@section('title', 'Create Agency')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Agency:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Agency
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
                    @if ($errors->any())
                        {{ implode(',', $errors->all()) }}
                    @endif
                    <form action="{{ route('agency.store') }}" method="post" enctype="multipart/form-data"
                        id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">

                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">

                                                <img src="{{ asset('dashboard/img/placeholder.jpg') }}" id="image"
                                                    class="img-thumbnail img-responsive" alt="">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-outline-success btn-round btn-file">
                                                    <span class="fileinput-new">Add Logo</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="logo" id="image"  />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Agency Name
                                            </label>
                                            <input class="form-control" name="agency_name" type="text"
                                                value="{{ old('agency_name') }}" data-parsley-trigger="keyup" required />
                                            @if ($errors->has('agency_name'))
                                                <span class="error-message">
                                                    *{{ $errors->first('agency_name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Agency Email
                                            </label>
                                            <input class="form-control" name="email" value="{{ old('email') }}"
                                                type="email" data-parsley-trigger="keyup" data-parsley-type="email"
                                                required />
                                            @if ($errors->has('email'))
                                                <span class="error-message">
                                                    *{{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Agency Website
                                            </label>
                                            <input class="form-control" name="website" type="text"
                                                value="{{ old('website') }}" />
                                            @if ($errors->has('website'))
                                                <span class="error-message">
                                                    *{{ $errors->first('website') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Office Address
                                            </label>
                                            <input class="form-control" name="address" type="text"
                                                data-parsley-trigger="keyup" value="{{ old('address') }}" required />
                                            @if ($errors->has('address'))
                                                <span class="error-message">
                                                    *{{ $errors->first('address') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Agency Phone Number
                                            </label>
                                            <input class="form-control" name="agency_phone" type="text"
                                                data-parsley-trigger="keyup" data-parsley-maxlength="15" data-parsley-minlength="10" data-parsley-pattern="\d+" required
                                                value="{{ old('agency_phone') }}" />
                                            @if ($errors->has('agency_phone'))
                                                <span class="error-message">
                                                    *{{ $errors->first('agency_phone') }}
                                                </span>
                                            @endif
                                            @if ($errors->has('phone'))
                                            <span class="error-message">
                                                *{{ $errors->first('phone') }}
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Agency Mobile Number
                                            </label>
                                            <input class="form-control" name="agency_mobile" type="text"
                                                data-parsley-trigger="keyup" value="{{ old('agency_mobile') }}"
                                                required />
                                            @if ($errors->has('agency_mobile'))
                                                <span class="error-message">
                                                    *{{ $errors->first('agency_mobile') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-12">
                                        <br><br>
                                        <label for="" class="label-style">Upload Required Document ex License </label>
                                        <br>
                                        <label class="custumFile btn btn-default" type="button">
                                            <input type="file" class="inputTypeFile" name="other_document" multiple>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <br><br>
                                        <div class="form-group">
                                            <label class="label-style">
                                                Short Introduction About Agency
                                                <small>*</small>
                                            </label>
                                            <textarea class="form-control summernote" name="short_intro"
                                                data-parsley-trigger="keyup" required>{{ old('short_intro') }}</textarea>
                                            @if ($errors->has('short_intro'))
                                                <span class="error-message">
                                                    *{{ $errors->first('short_intro') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>




                                </div>

                                <div class="tab-pane" id="panel2">

                                    <div class="row seo">
                                        <div class="form-group margin-style col-md-12">
                                            <label>Keywords</label>
                                            <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control"
                                                data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                                    *{{ $errors->first('meta_keyword') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3"
                                                class="form-control" data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300"> </textarea>
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
                                <button type="submit" class="btn  btn-fill btn-success float-right">Create</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
