@extends('admin.layouts.master')
@section('title', 'Property Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Property Category:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Property Category
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('property-category.store') }}" method="post" enctype="multipart/form-data"
                        id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">
                                    <div class="form-group">
                                        <label class="control-label">Enter Category Name</label>
                                        <input type="text" name="name" id="title" class="form-control"
                                            data-parsley-trigger="keyup" required>
                                        @if ($errors->has('name'))
                                            <span class="error-message">
                                                *{{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            data-parsley-trigger="keyup" required>
                                        @if ($errors->has('slug'))
                                            <span class="error-message">
                                                *{{ $errors->first('slug') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="label-style">
                                            description
                                            <span class='required-error'>*</span>
                                        </label>
                                        <textarea class="form-control summernote" name="description">{!! old('description') !!}</textarea>
                                        <x-error name='description' />

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-image />
                                        </div>
                                        <div class="col-md-6">
                                            <x-image name="icon" />

                                        </div>
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
                                <span class="nav-tabs-title">Property Category:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Manage Property Categories
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">

                        <!-- <div class="tab-content">

                            <div class="tab-pane active" id="panel1">

                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>

                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <ol class="sortable">
                                                @foreach ($categories as $category)
                                                    <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $category->name }}</td>


                                                            <td class="text-right">
                                                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                                                    data-target="#exampleModal-{{ $category->id }}"
                                                                    data-placement="top" title="Edit Category"><i
                                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                <button onclick="deleteCity({{ $category->id }})"
                                                                    class="btn btn-sm btn-danger remove"><i
                                                                        class="fa fa-trash-o"></i> </button>

                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </ol>

                                        </tbody>
                                    </table>
                                </div>

                            </div>



                        </div> -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">
                                <div class="material-datatables">
                                    <ol class="sortable">
                                        @foreach ($categories as $key => $category)
                                            <li id="categoryItem_{{ $category->id }}">
                                                <div>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal-{{$category->id}}" data-placement="top" title="Edit Category"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <button onclick="deleteCity({{$category->id}})" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>
                                                    </td>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize"><i
                                            class="fa fa-save"></i>
                                        Update Category
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

        @foreach ($categories as $category)
            <div class="modal fade" id="exampleModal-{{ $category->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('property-category.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Property Category</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Category Name
                                            {{-- <small>*</small> --}}
                                        </label>
                                        <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                             required /> 
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Category Slug
                                        </label>
                                        <input class="form-control" name="slug" value="{{ $category->slug }}"
                                            type="text" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-style">
                                        description
                                        <span class='required-error'>*</span>
                                    </label>
                                    <textarea class="form-control summernote" name="description">{!! strip_tags(old('description',$category->description)) !!}</textarea>
                                    <x-error name='description' />

                                </div>
                                <div class="col-md-6">
                                    <x-image value="{{ $category->image }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-image name='icon' value='{{ $category->icon }}' />
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
            $.ajax({
                url: "{{ route('update.property.category') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized
                },
                success: function(res) {
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
            }).then(function() {

                $.ajax({
                    url: '{{ route('property-category.delete') }}',
                    type: "POST",
                    data: {
                        'id': id,
                        '_token': csrf_token
                    },

                    success: function(response) {
                        if(response['error']){
                            alert("Delete its property first");
                        }
                        console.log('success');
                        location.reload();
                    },
                    error: function() {
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
