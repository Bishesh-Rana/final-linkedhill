@extends('admin.layouts.master')
@section('title',"Deleted Agency")
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
@endpush

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">

                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Manage Deleted Agency
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
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Deleted At</th>
                                            <th>Address</th>
                                            <th style="width: 5%" class="text-center">Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>

                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Deleted At</th>
                                            <th>Address</th>
                                            <th class="text-center" width="20%">Action</th>


                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($agencies as $key=>$agency)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$agency->agency_name}}</td>
                                                <td>
                                                    <a href="{{$agency->logo}}" data-lightbox="example{{$agency->id}}"><img class="img-style" src="{{$agency->logo}}" /></a>
                                                </td>
                                                <td>
                                                    {{$agency->deleted_at->format('d-M-Y')}} </span>
                                                </td>
                                                <td>
                                                    {{$agency->address}}
                                                </td>
                                                <td>
                                                    <div class="col-md-1">
                                                        <a href="{{route('restoreAgency', $agency->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Restore Agency"><i class="fa fa-recycle" aria-hidden="true"></i></a>                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-1">
                                                        <button onclick="deleteAgency({{$agency->id}})" class="btn btn-sm btn-danger remove" type="button"><i class="fa fa-trash-o"></i> </button>
                                                    </div>
                                                    <div class="col-md-9"></div>

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        toastr.success("{{Session::get('message')}}",'',{
            "positionClass": "toast-top-right",
        });
        @endif

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





            $('.card .material-datatables label').addClass('form-group');
        });


        function deleteAgency(id) {

            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({

                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {

                $.ajax({
                    url:'{!!URL::to('admin/restore/hard-delete-agency/')!!}' + '/' + id,
                    type : "POST",
                    data : {'_token' : csrf_token},

                    success:function(){

                        console.log('success');
                        location.reload();
                    },
                    error:function(){
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
