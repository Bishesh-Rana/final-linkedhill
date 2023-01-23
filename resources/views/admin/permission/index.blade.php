@extends('admin.layouts.master')
@section('title','Permissions')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-icon">
                    <b>Add Permission</b>
                </div>
                <div class="card-content">
                    <form action="{{route('permissions.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" placeholder="create/read/update/delete" id="name"
                                class="form-control">
                            @if ($errors->has('name'))
                            <span class="error-message">
                                *{{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>

              

                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn btn-sm btn-fill btn-success float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-icon">
                    <b>Manage permissions</b>
                </div>
                <div class="card-content">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Permission Name </th>

                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td class="text-right">
                                        <a href="#" onclick="handleEdit({{$permission->id}})"
                                            class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"><i
                                                class="material-icons">edit</i></a>
                                        <a href="#" class="btn btn-simple btn-danger btn-icon"
                                            onclick="deletePermission({{$permission->id}})" rel="tooltip"
                                            data-original-title="Delete permission"><i
                                                class="material-icons">close</i></a>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="editForm">
                @csrf
                @method('put')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Edit Permission</b></h5>
                        <hr>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group  label-floating">
                                <label>
                                    Name
                                </label>
                                <input class="form-control" name="name" value="" id="name" type="text" required />
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection

@push('script')

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {
        $(".select2edit").select2();
        };
    });
</script>


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


    function handleEdit(id)
    {
        $.ajax({
                type: 'get',
                url: '{{url('admin/permissions')}}'+'/'+id+'/edit',
                success:function(response){
                    console.log(response);
                    var name = response.name;
                    var option = response.for;
                    console.log(option);
                    $('#editModal input#name').val(name);
                    // $("#edit_for").val(option);
                    $(`#edit_for option[value=${option}]`).prop('selected',true);
                }
            });

        // find the form
        var form = document.getElementById('editForm');
        // update the action
        form.action = "/admin/permissions/"+id;
        // call modal
        $('#editModal').modal('show');
    }

    function deletePermission(id) {
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
                url:'{!!URL::to('admin/permissions/')!!}' + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' : csrf_token},

                success:function(){

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