@extends('frontend.dashboard.layouts.master')
@section('title','Favourite Properties')


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
                                            <i class="material-icons">settings</i> @if(request()->is('favourite-property'))My Favourite Properties @else Property Assigned By User @endif
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
                                    <th>Property Title</th>
                                    <th>User Name</th>
                                    <th>Image</th>

                                    <th>Address</th>
                                    <th style="width: 5%" class="text-center">Action</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Property Title</th>
                                    <th>User Name</th>
                                    <th>Image</th>

                                    <th>Address</th>
                                    <th class="text-center" width="20%">Action</th>


                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($properties as $property)
                                    @php
                                        $data = $property->property->images->first->name;
                                    @endphp
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$property->property->title}}</td>
                                        <td>{{$property->property->user->name}}</td>

                                        <td>
                                            <a href="{{$data->name}}" data-lightbox="example{{$property->property->id}}"><img class="img-style" src="{{$data->name}}" /></a>
                                        </td>
                                        <td>
                                            {{$property->property->property_address}}
                                        </td>
                                        <td>
                                            <div class="col-md-1 text-center">
                                                @if(request()->is('favourite-property'))
                                                    <a  target="_blank"  href="{{route('property.detail',['id'=>$property->property->id,'slug'=>$property->property->slug])}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"  data-original-title="View Property"><i class="material-icons">visibility</i></a>
                                                    @else
                                                    <a  href="{{route('auth.property.detail',$property->property->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"  data-original-title="View Property"><i class="material-icons">visibility</i></a>

                                                @endif
                                            </div>
                                            <div class="col-md-1"></div>
                                            @if(request()->is('favourite-property'))
                                            <div class="col-md-1">
                                                <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteProperty({{$property->id}})" rel="tooltip"  data-original-title="Remove from Favourite List"><i class="material-icons">close</i></a>
                                            </div>
                                            @endif
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
    </script>

    <script>
        function deleteProperty(id) {

            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({

                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {

                $.ajax({
                    url:'{!!URL::to('delete-from-fav-list/')!!}' + '/' + id,
                    type : "get",
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
