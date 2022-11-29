@extends('admin.layouts.master')
@section('title','Facility')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">


                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Facility:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Facility
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('facility.store')}}"  method="post" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">

                                    <div class="form-group">
                                        <label class="control-label">Enter  Title</label>
                                        <input type="text" name="title" id="title" class="form-control" data-parsley-trigger="keyup"  required>
                                        @if ($errors->has('title'))
                                            <span class="error-message">
                                                    *{{ $errors->first('title') }}
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
                                <span class="nav-tabs-title">Facility:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Manage Facility
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
                                            <th>S.No</th>
                                            <th>Facility</th>

                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($facilities as $facility)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$facility->title}}</td>
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal-{{$facility->id}}" data-placement="top" title="Edit Facility"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <button onclick="deleteCity({{$facility->id}})" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>
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

        @foreach($facilities as $facility)
            <div class="modal fade" id="exampleModal-{{$facility->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('facility.update',$facility->id)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Facility</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Name
                                        </label>
                                        <input class="form-control" name="title" value="{{$facility->title}}" type="text"  required/>
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
                url:'{!!URL::to('admin/facility')!!}' + '/' + id,
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
