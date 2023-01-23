@extends('admin.layouts.master')
@section('title','Slider')
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
                            <span class="nav-tabs-title">Slider :</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="{{route('slider.index')}}" aria-expanded="false">
                                        <i class="material-icons">settings</i>Mange Slider
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li>
                                    @can('slider-create')
                                    <a href="{{route('slider.create')}}" aria-expanded="false">
                                        <i class="material-icons">add</i>Create Slider
                                        <div class="ripple-container"></div>
                                    </a>
                                    @endcan
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($sliders as $key =>$value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>
                                        <a href="{{$value->image}}" data-lightbox="example{{$value->id}}"><img
                                                class="img-style" src="{{$value->image}}" /></a>
                                    </td>
                                    <td>
                                        @if($value->hide == 0)
                                        <a href="#" class="btn btn-sm btn-danger">Inactive</a>
                                        @else
                                        <a href="#" class="btn btn-sm btn-success">Active</a>
                                        @endif
                                    </td>

                                    <td>
                                        @can('slider-edit')

                                        <a href="{{route('slider.edit',$value->id)}}" class="btn btn-xs btn-primary"
                                            data-toggle="tooltip" data-placement="top" title="Edit Slider"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('slider-delete')
                                        <button onclick="deleteSlider({{$value->id}})"
                                            class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i> </button>
                                        @endcan
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
    @if(Session::has('message'))
        toastr.success("{{Session::get('message')}}",'',{

            "positionClass": "toast-top-right",

        });
        @endif

        function deleteSlider(id) {
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
                    url:'{!!URL::to('admin/slider/')!!}' + '/' + id,
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
