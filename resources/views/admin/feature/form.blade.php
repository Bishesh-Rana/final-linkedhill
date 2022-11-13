@extends('admin.layouts.master')
@section('title', 'Feature')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Feature:</span>

                            </div>
                        </div>
                    </div>
                    @if ($feature->id)
                        <form action="{{ route('feature.update', $feature->id) }}" method="post"
                            enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                            @method('PATCH')
                        @else
                            <form action="{{ route('feature.store') }}" method="post" enctype="multipart/form-data"
                                id="parsleyValidationForm" data-parsley-validate="">
                    @endif
                    @csrf
                    <div class="card-content">

                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">
                                <div class="form-group">
                                    <x-image value="{{ $feature->image }}" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        data-parsley-trigger="keyup" required value="{{ $feature->title }}">
                                    @error('title')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">description</label>
                                    <textarea name="description" class="form-control summernote" id="description"
                                        data-parsley-trigger="keyup" required>{!! $feature->description !!}</textarea>
                                    @error('description')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="control-label">Show On Filter</label>
                                    <input type='radio' name="showOnFilter" value='1' {{$feature->showOnFilter=='1'?'checked':''}} >
                                    <label>yes</label> 
                                    <input type='radio' name="showOnFilter" value="0" {{$feature->showOnFilter=='0'?'checked':''}}>
                                    <label>No</label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Value</label>
                                    <input type="text" name="value" class="form-control" placeholder="Eg: unfurnish, semi-furnish, fully-furnish" >
                                    @error('value')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="label-style">Choose Category</label>
                                <div class="form-check">
                                    @foreach ($categories as $category)
                                        <label>
                                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}"
                                                {{ in_array($category->id, $selectedCategories) ? 'checked ' : null }}>
                                            {{ $category->name }}

                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('category_id')
                                    <span class="error-message">
                                        *{{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style">Choose type</label>
                                <div class="radio">
                                    @foreach ($feature::TYPE as $key => $type)
                                        <label>
                                            <input type="radio" name="type" value="{{ $key }}"
                                                @if ($feature->type == $key) checked="true" @endif><span
                                                class="circle"></span><span class="check"></span>
                                            {{ $type }}
                                        </label>
                                    @endforeach
                                </div>
                                @error('type')
                                    <span class="error-message">
                                        *{{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn  btn-fill btn-success  float-right">Create</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
