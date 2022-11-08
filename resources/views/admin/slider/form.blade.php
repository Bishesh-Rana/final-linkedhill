@extends('admin.layouts.master')
@section('title', 'Edit Slider')
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Slider :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Edit Slider
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('slider.index') }}" aria-expanded="false">
                                            <i class="material-icons">settings</i>Mange Slider
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        @if ($slider->id)
                            <form action="{{ route('slider.update', $slider->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                            @else
                                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <x-image value="{{ $slider->image }}" />
                        <div class="col-md-6">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Enter Title
                                </label>
                                <input class="form-control" name="title" value="{{ $slider->title }}" type="text" />
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
                                    Enter Url
                                </label>
                                <input class="form-control" name="url" id="slug" value="{{ $slider->url }}"
                                    type="text" />
                                @if ($errors->has('url'))
                                    <span class="error-message">
                                        *{{ $errors->first('url') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Enter Sldier Type
                                </label>
                                {!! Form::select('type', $slider::TYPE, $slider->type, ['class' => 'form-control select2']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="togglebutton">
                                    <label class="lead"
                                        style="color:black;font-weight:bold;font-size:11pt; margin: 20px 0px">
                                        Hide <input type="checkbox" name="hide" value="1"
                                            @if ($slider->hide == 1) checked @endif> Show
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn  btn-fill btn-success float-right">Update</button>
                        </div>
                        </form>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="http://example.com/image-uploader.min.js"></script>
@endpush
