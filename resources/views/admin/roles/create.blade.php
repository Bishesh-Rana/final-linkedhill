@extends('admin.layouts.master')
@section('title', 'Role')
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-tabs" data-background-color="red">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Role:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active">
                                <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">add</i>{{ isset($role) ? 'Edit Role' : 'Add Role' }}
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-content">
                @if ($role->id)
                    <form method="post" action="{{ route('roles.update', $role->id) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @method('PATCH')

                    @else
                        <form method="post" action="{{ route('roles.store') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                @endif

                @csrf

                <div class="tab-content mx-3">
                    <div class="tab-pane active" id="panel1">
                        <div class="form-group col-md-12">
                            <label class="control-label">Enter Role Name</label>
                            <input type="text" name="name" id="name"
                                value="{{ isset($role) ? $role->name : old('name') }}" class="form-control">
                            @if ($errors->has('name'))
                                <span class="error-message">
                                    *{{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                @foreach ($permissions as $key => $permission)
                    <div class="panel panel-default mainPermission">
                        <h4 class="panel-title text-capitalize">
                            <input class="form-check-input permissionsManagement" type="checkbox"> {{ 'Manage ' . $key }}
                        </h4>

                        <div class="panel-body">
                            @foreach ($permission as $per)
                                <div class="form-check col-md-4">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $per->id }}"
                                            {{ in_array($per->id, $selectedPermission) ? 'checked' : null }}>
                                        {{ $per->name }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>


            <div class="form-footer text-right">
                <div class="checkbox pull-left">
                </div>
                <button type="submit" class="btn btn-fill btn-success float-right">
                    submit
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@push('script')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



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

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.permissionsManagement').on('click', function() {
                $(this).closest('.mainPermission').find('input[type="checkbox"]').prop("checked", $(this)
                    .prop("checked"));
            })
        })
    </script>

@endpush
