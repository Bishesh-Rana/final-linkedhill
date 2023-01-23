@extends('admin.layouts.master')
@section('title', ' Service')
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b> &nbsp; Service : {{ $service->name }}</b>
                    </div>
                    <div class="card-content">

                        @if ($service->id)
                            <form method="post" action="{{ route('service.update', $service->id) }}"
                                class="form-horizontal" enctype="multipart/form-data">
                                @method('put')
                            @else
                                <form method="post" action="{{ route('service.store') }}" class="form-horizontal">
                        @endif
                        @csrf

                        <div class="card-content">

                            <x-image value="{{ $service->image }}" />


                            <div class="form-group col-md-12" style="margin-top:18px;">
                                <label>Select Category for service</label>
                                <select class="form-control select2 select2-hidden-accessible" name="service_category_id"
                                    data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                    required>
                                    @foreach ($service_categories as $service_category)
                                        <option value="{{ $service_category->id }}"
                                            @if ($service_category->id == $service->service_category_id) selected @endif>
                                            {{ $service_category->name }}</option>
                                    @endforeach

                                </select>
                            </div>




                            <div class="clearfix"></div>



                            <div class="form-group col-md-6">
                                <label>Service Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $service->name }}">
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                        *{{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ $service->slug }}">
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                        *{{ $errors->first('slug') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description"
                                    id="description">{!! $service->description !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="error-message">
                                        *{{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <br><br>
                                <div class="togglebutton">
                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                        Not Featured <input type="checkbox" name="feature"
                                            @if ($service->feature == 1) checked @endif> Feature
                                    </label>
                                </div>
                            </div>




                            <div class="clearfix"></div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-behance btn-fill">Submit</button>
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

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endpush
