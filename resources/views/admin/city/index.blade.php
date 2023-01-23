@extends('admin.layouts.master')
@section('title', 'City')
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">



            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="red">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">City:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                        <i class="material-icons">settings</i>Manage City
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('city.create') }}" aria-expanded="false">
                                        <i class="material-icons">add</i>Add City
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
                                            <th>S.No</th>
                                            <th>City Name</th>
                                            <th>Province</th>
                                            <th>District</th>
                                            <th>Property By City</th>
                                            <th>View Areas</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                    </thead>

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

        @foreach ($cities as $city)
            <div class="modal fade" id="addArea-{{ $city->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('add.area') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $city->id }}" name="area_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Add Area Under City -
                                        {{ $city->name }}</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <input type="hidden" value="{{ $city->id }}" name="city_id">
                                        <label>
                                            Enter Area Name
                                            {{-- <small>*</small> --}}
                                        </label>
                                        <input class="form-control" name="name" type="text" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Slug
                                            {{-- <small>*</small> --}}
                                        </label>
                                        <input class="form-control" name="slug" type="text" required />
                                    </div>
                                </div>




                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save </button>
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
        @if (Session::has('message'))
            toastr.success("{{ Session::get('message') }}",'',{
            "positionClass": "toast-top-right",
            });
        @endif

        function convertToSlug(title) {
            return title
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/&/g, 'and')
                .replace(/[^\w-]+/g, '');
        }
        $('#name').on('keyup', function() {
            var title = $(this).val();
            var slug = convertToSlug(title);
            $('#slug').val(slug);
        });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
            var base_url={!! json_encode(url('/')) !!};
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('get.cities')}}',
                columns: [
                    {title:'SN',
                        render: function( data, type, full, meta ) {
                            return meta.row+1;
                        }
                    },
                    { data: 'name', name: 'name'},
                    {data: 'province_id', name: 'province.eng_name'},
                    {data: 'district', name: 'district'},
                    {data: 'viewCity', name: 'viewCity'},
                    {data: 'viewArea', name: 'viewArea'},
                    {data: 'action', name: 'action', orderable: true, searchable: true}
                ],
            });
        });
        function deleteCity(id,ca) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(ca >0){
                swal({
                    title: 'City has areas',
                    text: "Please first delete the areas in the city",
                    type: 'warning',
                    confirmButtonText: 'ok'
                })
            }
            else{
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
                        url:'{!!URL::to('admin/city/')!!}' + '/' + id,
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
        }
</script>


    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });

    </script>


@endpush
