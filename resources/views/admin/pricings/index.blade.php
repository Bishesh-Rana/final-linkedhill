@extends('admin.layouts.master')
@section('title', 'Pricings')

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
                                            <i class="material-icons">settings</i>Manage Pricings
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('pricings.create') }}" aria-expanded="false">
                                            <i class="material-icons">add</i>Add Pricing
                                            <div class="ripple-container"></div>
                                        </a>
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
                                                <th>Id</th>
                                                <td>Image</td>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th class="text-center">Action</th>


                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <td>Image</td>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th class="text-center">Action</th>


                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($pricings as $key => $pricing)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><img src="{{ $pricing->image }}" alt="{{ $pricing->title }}"
                                                            style="max-width: 100px;max-height:100px" /></td>
                                                    <td>{{ $pricing->title }}</td>
                                                    <td>{{ $pricing->slug }}</td>
                                                    <td>
                                                        {{ substr(strip_tags($pricing->description), 0, 70) }}..
                                                    </td>
                                                    <td>
                                                        <div class="col-md-1">
                                                            <a href="{{ route('pricings.edit', $pricing->id) }}"
                                                                class="btn btn-simple btn-warning btn-icon edit"
                                                                rel="tooltip" data-original-title="Update Page"><i
                                                                    class="material-icons">edit</i></a>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <form action="{{ route('pricings.destroy', $pricing->id) }}"
                                                                method="post" class="deleteForm">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-simple btn-danger btn-icon delete"
                                                                    type="submit"><i class="fa fa-trash-o"></i> </button>

                                                            </form>
                                                        </div>


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

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
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

            $('.deleteForm').on('submit', function() {
                return confirm('Are You sure?');
            })

            $('.card .material-datatables label').addClass('form-group');
        });
    </script>
@endpush
