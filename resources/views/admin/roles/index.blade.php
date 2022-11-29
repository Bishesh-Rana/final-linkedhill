@extends('admin.layouts.master')
@section('title','Role')
@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">



        <div class="card">
            <div class="card-header card-header-tabs" data-background-color="red">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Role:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active">
                                <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">settings</i>Manage Role
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('roles.create')}}" aria-expanded="false">
                                    <i class="material-icons">add</i>Add Role
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
                                        <th>S.N.</th>
                                        <th>Role Name</th>
                                        <th>Permission For</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($roles as $role)
                                    <tr>

                                        <td>{{$loop->index+1}}</td>
                                        <td>{{@$role->name}}</td>
                                        <td>
                                            @forelse (@$role->permissions as $item)
                                            <span class="label label-info">{{@$item->name. '-' .
                                                @$item->for}}</span>
                                            @empty
                                            N/A
                                            @endforelse

                                        </td>
                                        <td class="text-right">
                                            <a href="{{route('roles.edit',$role->id)}}"
                                                class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
                                                data-original-title="Edit Role"><i class="material-icons">edit</i></a>
                                            <a href="#" class="btn btn-simple btn-danger btn-icon"
                                                onclick="deleteRole({{@$role->id}})" rel="tooltip"
                                                data-original-title="Delete Role"><i
                                                    class="material-icons">close</i></a>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
        toastr.success("{{Session::get('message')}}",'',{

            "positionClass": "toast-top-right",

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

        function deleteRole(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            // if(ca >0){
            //     swal({
            //         title: 'Role has areas',
            //         text: "Please first delete the areas in the city",
            //         type: 'warning',
            //         confirmButtonText: 'ok'
            //     })

            // }

            //     else{

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
                        url:'{!!URL::to('admin/roles/')!!}' + '/' + id,
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

            // }

        }

</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
            $(".select2").select2();
        });
</script>

@endpush
