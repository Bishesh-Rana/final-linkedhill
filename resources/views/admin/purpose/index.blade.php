@extends('admin.layouts.master')
@section('title','Purpose')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Purpose:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Purpose
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('purpose.store')}}"  method="post" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">

                                    <div class="form-group">
                                        <label class="control-label">Enter  Name</label>
                                        <input type="text" name="name" id="name" class="form-control" data-parsley-trigger="keyup"  required>
                                        @if ($errors->has('name'))
                                            <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn  btn-fill btn-success  float-right">Create</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Purpose:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Manage Purposes
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
                                    <!-- <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Purpose</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <ol class="sortable">
                                            @foreach($purposes as $purpose)
                                                <li>
                                                    <div>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$purpose->name}}</td>
                                                        <td class="text-right">
                                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal-{{$purpose->id}}" data-placement="top" title="Edit Purpose"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <button onclick="deleteCity({{$purpose->id}})" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>
                                                        </td>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </table> -->
                                    <ol class="sortable">
                                        @foreach ($purposes as $key => $value)
                                            <li id="purposeItem_{{ $value->id }}">
                                                <div>
                                                    <td>{{ $value->name }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal-{{$purpose->id}}" data-placement="top" title="Edit Purpose"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <button onclick="deleteCity({{$purpose->id}})" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>
                                                    </td>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
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
                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($purposes as $purpose)
            <div class="modal fade" id="exampleModal-{{$purpose->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('purpose.update',$purpose->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Purpose</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Purpose
                                        </label>
                                        <input class="form-control" name="name" value="{{$purpose->name}}" type="text"  />
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
                url: "{{ route('update.purpose') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized
                },
                success: function(res) {
                    //location.reload();
                    toastr.options.closeButton = true
                    toastr.success('Purpose Order Successfuly', "Success !");
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
                url:'{!!URL::to('admin/purpose/')!!}' + '/' + id,
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
