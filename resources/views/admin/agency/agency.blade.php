@extends('admin.layouts.master')
@section('title',$pageHeading)


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Agency:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Manage {{$pageHeading}}
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
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th style="width: 5%" class="text-center">Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>

                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
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
                                                <td> <span class="label label-info"> {{$agency->status}} </span></td>
                                                <td>
                                                    {{$agency->address}}
                                                </td>
                                                <td>
                                                    <div class="col-md-1">
                                                        <a href="{{route('agency.show',$agency->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"  data-original-title="View Agency"><i class="material-icons">visibility</i></a>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-1">
                                                        <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteAgency({{$agency->id}})" rel="tooltip"  data-original-title="Delete Agency"><i class="material-icons">close</i></a>
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
                url:'{!!URL::to('admin/agency/')!!}' + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' : csrf_token},

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
