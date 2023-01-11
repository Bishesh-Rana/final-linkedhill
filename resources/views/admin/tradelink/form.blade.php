@extends('admin.layouts.master')
@section('title', 'Tradelink')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="red">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Tradelink:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                        <i
                                            class="material-icons">add</i>{{ $tradelink->id ? 'Edit Tradelink' : 'Add Tradelink' }}
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    @if ($tradelink->id)
                        <form method="POST" action="{{ route('tradelink.update', $tradelink->id) }}"
                            class="form-horizontal" id="parsleyValidationForm" data-parsley-validate="">
                            @method('PATCH')
                        @else
                            <form method="POST" action="{{ route('tradelink.store') }}" class="form-horizontal"
                                id="parsleyValidationForm" data-parsley-validate="">
                    @endif
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel1">

                            <x-image  value="{{ $tradelink->image }}" />
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Name<span class="required-error">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $tradelink->name) }}"
                                        class="form-control" data-parsley-trigger="keyup" required>
                                    @if ($errors->has('name'))
                                        <span class="error-message">
                                            *{{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Email<span class="required-error">*</span></label>
                                    <input type="text" name="email" value="{{ old('email', $tradelink->email) }}"
                                        id="email" class="form-control" data-parsley-trigger="keyup"
                                        data-parsley-type="email" required>
                                    @if ($errors->has('email'))
                                        <span class="error-message">
                                            *{{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter address<span class="required-error">*</span></label>
                                    <input type="text" name="address" id="address"
                                        value="{{ old('address', $tradelink->address) }}" data-parsley-type="text"
                                        class="form-control" data-parsley-trigger="keyup" required>
                                    @if ($errors->has('address'))
                                        <span class="error-message">
                                            *{{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone', $tradelink->phone) }}" data-parsley-type="number"
                                        data-parsley-trigger="keyup">
                                    @if ($errors->has('phone'))
                                        <span class="error-message">
                                            *{{ $errors->first('phone') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Enter Short Introduction</label>
                                    <textarea name="description" id="description"
                                        class="form-control summernote">{{ $tradelink->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="error-message">
                                            *{{ $errors->first('description') }}
                                        </span>
                                    @endif

                                </div>
                                <div class="clearfix">
                                    <div class="form-group col-md-12">
                                        <label class="label-style">Category</label>
                                        <div class="radio">
                                            @foreach ($categories as $category)
                                                <label>
                                                    <input type="radio" name="category_id"
                                                        @if ($tradelink->category_id == $category->id) checked="true" @endif
                                                        value="{{ $category->id }}"><span
                                                        class="circle"></span><span class="check"></span>
                                                    {{ $category->title }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn btn-fill btn-success float-right">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                //            "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
            var table = $('#datatables').DataTable();
        });
    </script>
@endpush
