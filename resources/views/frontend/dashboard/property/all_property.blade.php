@extends('frontend.dashboard.layouts.master')
@section('title','Properties')
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
                                <span class="nav-tabs-title">Property :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i> Manage Properties
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('property.create')}}"  aria-expanded="false">
                                            <i class="material-icons">add</i> Create
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">

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
                                @foreach($properties as $property)
                                    @php
                                        $data = $property->images->first->name;
                                    @endphp
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$property->title}}</td>
                                        <td>
                                            <a href="{{$data->name}}" data-lightbox="example{{$property->id}}"><img class="img-style" src="{{$data->name}}" /></a>
                                        </td>
                                        <td> <span class="label label-info"> {{$property->status  == "1" ? "Approved" : "Pending" }} </span></td>
                                        <td>
                                            {{$property->property_address}}
                                        </td>
                                        <td>
                                            <div class="col-md-1">
                                                <a href="{{route('property.edit',$property->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"  data-original-title="Edit Property"><i class="material-icons">edit</i></a>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-1">
                                                <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteProperty({{$property->id}})" rel="tooltip"  data-original-title="Delete Property"><i class="material-icons">close</i></a>
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
            </div>
        </div>

    </div>
@endsection

@push('script')

    <script>
        function deleteProperty(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {

                $.ajax({
                    url:'{!!URL::to('/property/')!!}' + '/' + id,
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

