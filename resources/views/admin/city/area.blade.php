@extends('admin.layouts.master')
@section('title','Area')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row" >

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="{{route('city.index')}}" class="float-right-side btn btn-sm btn-white"><i class="material-icons">location_on</i>All Cities</a>

                <div class="card">

                    <div class="card-header card-header-icon">
                        <b>Area Under City - {{$name}}</b>
                    </div>
                    <div class="card-content">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Area Name</th>
                                    <th>Slug</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($areas as $area)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$area->name}}</td>
                                        <td>{{$area->slug}}</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" data-toggle="modal" data-target="#exampleModal-{{$area->id}}"  data-original-title="Edit Area"><i class="material-icons">edit</i></a>
                                            <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteArea({{$area->id}})" rel="tooltip"  data-original-title="Delete Area"><i class="material-icons">close</i></a>
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

        @foreach($areas as $area)
            <div class="modal fade" id="exampleModal-{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('area.update',$area->id)}}" method="post">
                        @csrf

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Area</b></h5>

                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Edit City Area
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="name" value="{{$area->name}}" type="text"  />
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Edit City Slug
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="name" value="{{$area->slug}}" type="text"  />
                                    </div>
                                </div>




                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@push('script')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        toastr.info("{{Session::get('message')}}",'',{
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });
        @endif
        function convertToSlug(title)
        {
            return title
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/&/g,'and')
                .replace(/[^\w-]+/g,'');
        }
        $('#name').on('keyup',function(){
            var title=$(this).val();
            var slug=convertToSlug(title);
            $('#slug').val(slug);
        });
    </script>

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
        function deleteArea(id) {
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
                    url:'{!!URL::to('admin/area/')!!}' + '/' + id,
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
