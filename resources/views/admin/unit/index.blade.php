@extends('admin.layouts.master')
@section('title','Unit')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Create Unit</b>
                    </div>
                    <div class="card-content">
                        <form action="{{route('unit.store')}}"  method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Enter  Unit</label>
                                <input type="text" name="name" id="name" class="form-control">
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
                        <b>Manage Units</b>
                    </div>
                    <div class="card-content">
                        <div class="material-datatables">
                            {{-- <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Unit</th>

                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$unit->name}}</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" data-toggle="modal" data-target="#exampleModal-{{$unit->id}}"  data-original-title="Edit Unit"><i class="material-icons">edit</i></a>
                                            <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$unit->id}})" rel="tooltip"  data-original-title="Delete Unit"><i class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table> --}}
                            <ol class="sortable">
                                @foreach ($units as $key => $value)
                                    <li id="unitItem_{{ $value->id }}">
                                        <div>
                                            <td>{!! $value->name !!}</td>
                                            <td>
                                                <a href="#" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" data-toggle="modal" data-target="#exampleModal-{{$value->id}}"  data-original-title="Edit Unit"><i class="material-icons">edit</i></a>
                                                <button onclick="deleteCity({{$value->id}})" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>
                                            </td>

                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        <div class="form-group mt-4">
                            <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize"><i
                                    class="fa fa-save"></i>
                                Update Purpose
                            </button>
                            <a href="{{ request()->url() }}" type="button" class="btn btn-danger btn-sm btn-flat"><i
                                    class="fas fa-sync-alt"></i> Reset Order</a>
                        </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @foreach($units as $unit)
            <div class="modal fade" id="exampleModal-{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('unit.update',$unit->id)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Unit</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Unit
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="name" value="{{$unit->name}}" type="text"  />
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


        @endforeach

    </div>
@endsection

@push('script')

<script src="{{ asset('dashboard/plugins/sortablejs/jquery-ui.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/sortablejs/jquery.mjs.nestedSortable.js') }}"></script>
<script src="{{ asset('dashboard/plugins/toastrjs/toastr.min.js') }}"></script>
        <script>
            $('.sortable').nestedSortable({
                handle: 'div',
                items: 'li',
                toleranceElement: '> div',
                maxLevels: 2,
            });
            $("#serialize").click(function(e) {
                e.preventDefault();
                $(this).prop("disabled", true);
                $(this).html(
                    `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Updating...`
                );
                var serialized = $('ol.sortable').nestedSortable('serialize');
                //console.log(serialized);
                $.ajax({
                    url: "{{ route('update.unit') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        sort: serialized
                    },
                    success: function(res) {
                        //location.reload();
                        toastr.options.closeButton = true
                        toastr.success('Unit Ordered Successfuly', "Success !");
                        $('#serialize').prop("disabled", false);
                        $('#serialize').html(`<i class="fa fa-save"></i> Update Menu`);
                    }
                });
            });
    
            function show_alert() {
                if (!confirm("Do you really want to do this?")) {
                    return false;
                }
                this.form.submit();
            }
</script>

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

    function deleteCity(id) {
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
                url:'{!!URL::to('admin/unit/')!!}' + '/' + id,
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