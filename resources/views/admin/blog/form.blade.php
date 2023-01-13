@extends('admin.layouts.master')
@section('title', 'Edit Blog')
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">

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
                                <span class="nav-tabs-title">Blog:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Edit Blog
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
                    @if ($blog->id)
                        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data"
                            id="parsleyValidationForm" data-parsley-validate="">
                            @method('put')
                        @else
                            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data"
                                id="parsleyValidationForm" data-parsley-validate="">
                    @endif

                    @csrf
                    <div class="card-content">
                        <div class="tab-content">

                            <div class="tab-pane active" id="panel1">

                                <x-image name="image" value="{{ @$blog->image }}" />
                                <div class="form-group col-md-12" style="margin-top:10px;">
                                    <label class="label-style">Select Category </label>
                                    <select class="form-control" name="category_id"
                                        data-placeholder="Select Category" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($blog->category_id == $category->id) selected @endif>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Title
                                        </label>
                                        <input class="form-control" name="title" value="{{ $blog->title }}" id="title"
                                            type="text" data-parsley-trigger="keyup" required />
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
                                        <input class="form-control" name="slug" value="{{ $blog->slug }}" id="slug"
                                            type="text" data-parsley-trigger="keyup" required />
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
                                            data-parsley-trigger="keyup">{{ $blog->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="error-message">
                                                *{{ $errors->first('description') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="togglebutton">
                                            <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                Non Featured <input type="checkbox" name="featured" value="1"
                                                    @if ($blog->featured) checked @endif> Featured
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="panel2">

                                <div class="row seo">
                                    <div class="form-group margin-style col-md-12">
                                        <label>Keywords</label>
                                        <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control"
                                            data-parsley-trigger="keyup"
                                            data-parsley-maxlength="300">{{ $blog->meta_keyword }}</textarea>
                                        @if ($errors->has('meta_keyword'))
                                            <span class="error-message">
                                                *{{ $errors->first('meta_keyword') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                        <label>Description</label>
                                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control"
                                            data-parsley-trigger="keyup"
                                            data-parsley-maxlength="300">{{ $blog->meta_description }}</textarea>
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
                            <button type="submit" class="btn  btn-fill btn-success float-right">Submit</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    </script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });

    @endpush
