@extends('admin.layouts.master')
@section('title','Edit Page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Page:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Edit Page
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
                    <form action="{{route('page.update',$page->id)}}"  method="post" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        @method('put')
                        <div class="card-content">



                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Page Title
                                            </label>
                                            <input class="form-control" name="name" value="{{$page->name}}" id="title" type="text"  data-parsley-trigger="keyup" required  />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Slug
                                            </label>
                                            <input class="form-control" name="slug" value="{{$page->slug}}" id="slug" type="text" data-parsley-trigger="keyup" required   />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-style">
                                                Page Description
                                                <small>*</small>
                                            </label>
                                            <textarea  class="form-control summernote" cols="100" name="description" data-parsley-trigger="keyup" required >{{$page->description}}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="panel2">

                                    <div class="row seo">
                                        <div class="form-group margin-style col-md-12">
                                            <label >Keywords</label>
                                            <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300">{{$page->meta_keyword}}</textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                                                            *{{ $errors->first('meta_keyword') }}
                                                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label >Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300">{{$page->meta_description}}</textarea>
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
                                <button type="submit" class="btn  btn-fill btn-success float-right">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
