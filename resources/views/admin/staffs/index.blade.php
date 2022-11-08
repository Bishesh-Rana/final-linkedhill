@extends('admin.layouts.master')
@section('title', 'User')

@section('content')
    <div class="container-fluid">
        <div class="row">



            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="red">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">User:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                        <i class="material-icons">settings</i>Manage User
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    @can('user-create')
                                        <a href="{{ route('staffs.create') }}" aria-expanded="false">
                                            <i class="material-icons">add</i>Add User
                                            <div class="ripple-container"></div>
                                        </a>
                                    @endcan
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">



                    <div class="tab-content">
                        <div class="tab-pane active" id="panel1">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Roles</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Phone</th>
                                            <th>is_active</th>
                                            @canany(['update', 'view', 'delete'], auth()->user())
                                                <th class="disabled-sorting text-right">Actions</th>
                                            @endcanany
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $staff)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="img-container" style="height: 40px; width: 40px;">
                                                        <img src="{{ $staff->profile ?? asset('images/profile/default-user.png') }}"
                                                            alt="...">
                                                    </div>
                                                </td>
                                                <td>{{ $staff->name }}</td>
                                                <td>
                                                    @if ($staff->roles)
                                                        @forelse ($staff->roles as $role)
                                                            <span class="label label-info">{{ $role->name }}</span>
                                                        @empty
                                                            N/A
                                                        @endforelse
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $staff->email }}
                                                </td>
                                                <td>
                                                    {{ $staff->mobile ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $staff->phone ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('user.active') }}" method="post">
                                                        @csrf
                                                        <div class="togglebutton">
                                                            <label>
                                                                <input type="hidden" value="{{ $staff->id }}" name="id">
                                                                <input type="hidden" value="0" name="is_active">
                                                                <input type="checkbox" value="1" name="is_active"
                                                                    @if (isset($staff)) @if ($staff['is_active'] === 1) checked @endif
                                                                @else {{ old('is_active') == '1' ? 'checked' : '' }}
                                                                    @endif onChange="this.form.submit()">
                                                            </label>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-right">
                                                    @can('update', $staff)
                                                        <a href="{{ route('staffs.edit', $staff->id) }}"
                                                            class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
                                                            data-original-title="Edit Staff"><i
                                                                class="material-icons">edit</i></a>
                                                    @endcan
                                                    @can('delete', $staff)
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon"
                                                            onclick="deleteStaff({{ $staff->id }})" rel="tooltip"
                                                            data-original-title="Delete Staff"><i
                                                                class="material-icons">close</i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="form-footer text-right">
                        <div class="checkbox pull-left">
                        </div>
                    </div>

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

        function deleteStaff(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {

                $.ajax({
                    url: '{!! URL::to('admin/staffs/') !!}' + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },

                    success: function() {

                        console.log('success');
                        location.reload();
                    },
                    error: function() {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });

            });
        }
    </script>
@endpush
