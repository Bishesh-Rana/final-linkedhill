@extends('admin.layouts.master')
@section('title', 'Edit Pricings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Pricings:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Edit Page
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($pricing->id)
                        <form action="{{ route('pricings.update', $pricing->id) }}" method="post"
                            enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                            @method('PATCH')
                        @else
                            <form action="{{ route('pricings.store') }}" method="post" enctype="multipart/form-data"
                                id="parsleyValidationForm" data-parsley-validate="">
                    @endif
                    @csrf
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">
                                <div class="col-md-12">
                                    <x-image :value="$pricing->image" />
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Pricings Title
                                        </label>
                                        <input class="form-control" name="title" value="{{ $pricing->title }}"
                                            id="title" type="text" data-parsley-trigger="keyup" required />
                                        @error('title')
                                            <small class="text-danger text-bold">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Slug
                                        </label>
                                        <input class="form-control" name="slug" value="{{ $pricing->slug }}" id="slug"
                                            type="text" data-parsley-trigger="keyup" required />
                                        @error('slug')
                                            <small class="text-danger text-bold">* {{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Price
                                        </label>
                                        <input class="form-control" name="price" value="{{ $pricing->price }}"
                                            id="price" type="text" data-parsley-trigger="keyup" required />
                                        @error('price')
                                            <small class="text-danger text-bold">* {{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-style">
                                            Description
                                            <small>*</small>
                                        </label>
                                        <textarea class="form-control " cols="100" name="description"
                                            data-parsley-trigger="keyup" required>{{ $pricing->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger text-bold">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-style">
                                        Features
                                        <small>*</small>
                                    </label>
                                    <div id="pricingFeatures" class="row">
                                        @if ($pricing->features)
                                            @foreach ($pricing->features as $item)
                                                <div class="col-md-8">
                                                    <input class="form-control" name="features[]" type="text"
                                                        value="{{ $item }}" required />
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button class="btn btn-xs btn-danger remove" type="button"><i
                                                            class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-xs btn-success remove" type="button" id="addRow"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    @error('features')
                                        <small class="text-danger text-bold">* {{ $message }}</small>
                                    @enderror
                                    <hr />
                                </div>
                            </div>



                        </div>

                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit"
                                class="btn  btn-fill btn-success float-right">{{ $pricing->id ? 'Update' : 'Create' }}</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script>
        const template = `<div class="col-md-8">
                            <input class="form-control" name="features[]" type="text"  required />
                        </div>
                        <div class="col-md-4 text-right">
                            <button class="btn btn-xs btn-danger remove" type="button"><i class="fa fa-trash-o"></i>
                            </button>
                        </div>`;

        $(document).ready(function() {
            if ($('#pricingFeatures div').length == 0) {
                $('#pricingFeatures').append(template);

            }
            $('#addRow').on('click', () => $('#pricingFeatures').append(template));
        })
    </script>
@endpush
@push('css')
    <style>
        body {
            counter-reset: Serial;
        }

        .serialize:before {
            counter-increment: Serial;
            /* Increment the Serial counter */
            content: counter(Serial);
            /* Display the counter */
        }

    </style>
@endpush
