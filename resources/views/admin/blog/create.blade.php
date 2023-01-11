@extends('admin.layouts.master')
@section('title', 'Create Blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Blog:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Blog
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
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data"
                        id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">
                                    <x-image />

                                    <div class="form-group col-md-12" style="margin-top:10px;">
                                        <label class="label-style">Select Category </label>
                                        <select class="form-control select2 select2-hidden-accessible" name="category_id"
                                            data-placeholder="Select Category" style="width: 100%;" tabindex="-1"
                                            aria-hidden="true" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Title
                                            </label>
                                            <input class="form-control" name="title" id="title" type="text"
                                                data-parsley-trigger="keyup" />
                                            @if ($errors->has('title'))
                                                <span class="error-message">
                                                    *{{ $errors->first('title') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Slug
                                            </label>
                                            <input class="form-control" name="slug" id="slug" type="text"
                                                data-parsley-trigger="keyup" />
                                            @if ($errors->has('slug'))
                                                <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-style">
                                                Blog Description
                                                <small>*</small>
                                            </label>
                                            <textarea class="form-control summernote" name="description"
                                                data-parsley-trigger="keyup">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="error-message">
                                                    *{{ $errors->first('description') }}
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


