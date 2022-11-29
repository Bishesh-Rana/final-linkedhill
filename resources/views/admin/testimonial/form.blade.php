@extends('admin.layouts.master')
@section('title', 'Edit Testimonial')

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
                                            <i class="material-icons">settings</i>Edit Testimonial
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($testimonial->id)
                        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post"
                            enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                            @method('put')

                        @else <form action="{{ route('testimonial.store') }}" method="post"
                                enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                    @endif
                    <div class="card-content">
                        @csrf



                        <div class="tab-content">

                            <div class="tab-pane active" id="panel1">


                                <x-image :value="$testimonial->image" />

                                <div class="col-md-12">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Name
                                        </label>
                                        <input class="form-control" name="name" value="{{ $testimonial->name }}"
                                            id="title" type="text" data-parsley-trigger="keyup" required />
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
                                        <textarea class="form-control summernote" name="message"
                                            data-parsley-trigger="keyup" required>{{ $testimonial->message }}</textarea>
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
                                            <label class="lead"
                                                style="color:black;font-weight:bold;font-size:11pt;">
                                                Non Featured <input type="checkbox" name="featured" value="1"
                                                    @if ($testimonial->featured) checked @endif> Featured
                                            </label>
                                        </div>
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
