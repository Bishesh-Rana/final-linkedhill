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
                    <form action="{{ route('tradelink-category.store') }}" method="post" enctype="multipart/form-data"
                        id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">
                                    <div class="form-group">
                                        <label class="control-label">Enter Category Name</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            data-parsley-trigger="keyup" required>
                                        @if ($errors->has('title'))
                                            <span class="error-message">
                                                *{{ $errors->first('title') }}
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

                                    <div class="row">
                                        <div class="col-md-12">
                                            <x-image />
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

                        <div class="tab-content">

                            <div class="tab-pane active" id="panel1">

                                <div class="material-datatables">


                                    <ol class="sortable">
                                        @foreach ($categories as $key => $category)
                                            <li id="menuItem_{{ $category->id }}">
                                                <div>
                                                    <td>{{ $category->title }}</td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal-{{ $category->id }}"
                                                            data-placement="top" title="Edit Category"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <button onclick="deleteCity({{ $category->id }})"
                                                            class="btn btn-sm btn-danger remove"><i
                                                                class="fa fa-trash-o"></i> </button>

                                                    </td>

                                                </div>
                                                @foreach ($category->child as $key => $child_category)
                                                    <ol>
                                                        <li id="menuItem_{{ $child_category->id }}">
                                                            <div>
                                                                <td>{{ $child_category->title }}</td>
                                                                <td>
                                                                    <a href="#" class="btn btn-sm btn-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal-{{ $child_category->id }}"
                                                                        data-placement="top" title="Edit Category"><i
                                                                            class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i></a>
                                                                    <button
                                                                        onclick="deleteCity({{ $child_category->id }})"
                                                                        class="btn btn-sm btn-danger remove"><i
                                                                            class="fa fa-trash-o"></i> </button>

                                                                </td>

                                                            </div>
                                                        </li>
                                                    </ol>
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ol>

                                </div>

                            </div>



                        </div>

                        <div class="form-footer text-right">
                            <div class="form-group mt-4">
                                <button type="button" class="btn btn-success btn-sm btn-flat" id="serialize"><i
                                        class="fa fa-save"></i>
                                    Update Menu
                                </button>
                                <a href="{{ request()->url() }}" type="button" class="btn btn-danger btn-sm btn-flat"><i
                                        class="fas fa-sync-alt"></i> Reset Order</a>
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
                    <form action="{{ route('tradelink-category.update', $category->id) }}" method="post">
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
                                            Enter Category Title
                                            {{-- <small>*</small> --}}
                                        </label>
                                        <input class="form-control" name="title" value="{{ $category->title }}"
                                            type="text" required />
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Category Slug
                                            {{-- <small>*</small> --}}
                                        </label>
                                        <input class="form-control" name="slug" value="{{ $category->slug }}"
                                            type="text" required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <x-image value="{{ $category->image }}" />
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
            @foreach ($category->child as $item)
                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('tradelink-category.update', $item->id) }}" method="post">
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
                                                Enter Category Title
                                                {{-- <small>*</small> --}}
                                            </label>
                                            <input class="form-control" name="title" value="{{ $item->title }}"
                                                type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group  label-floating">
                                            <label>
                                                Enter Category Slug
                                                {{-- <small>*</small> --}}
                                            </label>
                                            <input class="form-control" name="slug" value="{{ $item->slug }}"
                                                type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <x-image value="{{ $item->image }}" />
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
        @endforeach

    </div>
@endsection

@push('script')
    <script>
        function deleteMenu(id) {
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
                    url: '{!! URL::to('admin/menu/') !!}' + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },

                    success: function() {

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
                url: "{{ route('update.tradelinkcategory') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized
                },
                success: function(res) {
                    //location.reload();
                    toastr.options.closeButton = true
                    toastr.success('Menu Order Successfuly', "Success !");
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
@endpush
@push('css')
    <style>
        ol {
            list-style-type: none;
        }

        .menu-handle {
            display: block;
            margin-bottom: 5px;
            padding: 6px 4px 6px 12px;
            color: #333;
            font-weight: bold;
            border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            cursor: move;
        }

        .menu-handle:hover {
            color: #2ea8e5;
            background: #fff;
        }

        .placeholder {
            outline: 1px dashed #4183C4;
            margin-bottom: 10px;
            background: #D7F8FD
        }

    </style>
@endpush
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
            }).then(function() {

                $.ajax({
                    url: '{!! URL::to('admin/property-category/') !!}' + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },

                    success: function() {

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
