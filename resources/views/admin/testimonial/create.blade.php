@extends('admin.layouts.master')
@section('title','Create Testimonial')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Testimonial:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Testimonial
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('testimonial.store')}}"  method="post" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">

                                                <img src="{{asset('dashboard/img/placeholder.jpg')}}" id="image" class="img-thumbnail img-responsive" alt="">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                            <span class="btn btn-outline-success btn-round btn-file">
                                                                <span class="fileinput-new">Add Image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="image" id="image" required/>
                                                            </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Name
                                            </label>
                                            <input class="form-control" name="name" value="{{old('name')}}" id="name" type="text"  data-parsley-trigger="keyup" required />
                                            @if ($errors->has('name'))
                                                <span class="error-message">
                                                                 *{{ $errors->first('name') }}
                                                         </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-style">
                                                Testimonial
                                                <small>*</small>
                                            </label>
                                            <textarea  class="form-control summernote" name="message" data-parsley-trigger="keyup" required>{{old('message')}}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="error-message">
                                                                 *{{ $errors->first('message') }}
                                                         </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                    Non Featured <input type="checkbox" name="featured" value="1"  checked> Featured
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="tab-pane" id="panel2">

                                    <div class="row seo">
                                        <div class="form-group margin-style col-md-12">
                                            <label >Keywords</label>
                                            <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                                                            *{{ $errors->first('meta_keyword') }}
                                                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label >Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
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


