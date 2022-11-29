@extends('admin.layouts.master')
@section('title', 'Property')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Property:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Manage Property
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        @can('create-property')
                                            <a href="{{ route('properties.create') }}" aria-expanded="false">
                                                <i class="material-icons">add</i>Add Property
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
                                                <th>SN</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Faq</th>
                                                <th style="width: 5%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Faq</th>
                                                <th class="text-center" width="20%">Action</th>


                                            </tr>
                                        </tfoot>
                                        <tbody>

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
    <script type="text/javascript">
        $(document).ready(function() {

            var base_url = {!! json_encode(url('/')) !!};

            $('#datatables').DataTable({

                processing: true,

                serverSide: true,

                ajax: {
                    "url": "{{ route('get.properties') }}",
                    "data":{
                        "city_id":"{{ request('city_id') }}"
                    }
                },

                columns: [

                    {
                        title: 'SN',

                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        }

                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },


                    {
                        data: 'property_address',
                        name: 'property_address'
                    },
                    {
                        data: 'faq',
                        name: 'faq'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        className: 'text-center'
                    }



                ],
            });


        });

        function deleteProperty(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {

                $.ajax({
                    url: '{!! URL::to('/admin/properties/') !!}' + '/' + id,
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
