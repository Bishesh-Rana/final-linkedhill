@extends('admin.layouts.master')
@section('title', 'Edit Team')
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
                                <span class="nav-tabs-title">Team:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Edit Team
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($team->id)
                        <form action="{{ route('team.update', $team->id) }}" method="post" enctype="multipart/form-data"
                            id="parsleyValidationForm" data-parsley-validate="">
                            @method('put')
                        @else
                            <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data"
                                id="parsleyValidationForm" data-parsley-validate="">
                    @endif
                    <div class="card-content">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">
                                <x-image :value="$team->profile" name='profile' />

                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Name
                                        </label>
                                        <input class="form-control" name="name" value="{{ $team->name }}" type="text"
                                            data-parsley-trigger="keyup" required />
                                        @if ($errors->has('name'))
                                            <span class="error-message">
                                                *{{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Designation
                                        </label>
                                        <input class="form-control" name="designation" value="{{ $team->designation }}"
                                            data-parsley-trigger="keyup" required type="text" />
                                        @if ($errors->has('designation'))
                                            <span class="error-message">
                                                *{{ $errors->first('designation') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Phone
                                        </label>
                                        <input class="form-control" name="phone" value="{{ $team->phone }}"
                                            type="text" />
                                        @if ($errors->has('phone'))
                                            <span class="error-message">
                                                *{{ $errors->first('phone') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="togglebutton">
                                            <label class="lead"
                                                style="color:black;font-weight:bold;font-size:11pt;">
                                                Non Featured <input type="checkbox" name="feature" value="1"
                                                    @if ($team->feature) checked @endif> Featured
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>



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

    <script>
        function convertToSlug(title) {
            return title
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/&/g, 'and')
                .replace(/[^\w-]+/g, '');

        }

        $('#title').on('keyup', function() {
            var title = $(this).val();
            var slug = convertToSlug(title);
            $('#slug').val(slug);
        });
    </script>

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>

@endpush
