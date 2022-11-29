@extends('admin.layouts.master')
@section('title', 'Menu')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">
@endpush

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Menu :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="{{ route('menu.index') }}" aria-expanded="false">
                                            <i class="material-icons">settings</i>Mange Menu
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li>


                                        <a href="{{ route('menu.create') }}" aria-expanded="false">
                                            <i class="material-icons">add</i>Create Menu
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="material-datatables">
                            <ol class="sortable">
                                @foreach ($menus as $key => $value)
                                    <li id="menuItem_{{ $value->id }}">
                                        <div>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                <a href="{{ route('menu.edit', $value->id) }}"
                                                    class="btn btn-xs btn-primary" data-toggle="tooltip"
                                                    data-placement="top" title="Edit Slider"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <button onclick="deleteMenu({{ $value->id }})"
                                                    class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>

                                        </div>
                                        @foreach ($value->child_menu as $key => $menu)
                                            <ol>
                                                <li id="menuItem_{{ $menu->id }}">
                                                    <div>
                                                        <td>{{ $menu->name }}</td>
                                                        <td>
                                                            <a href="{{ route('menu.edit', $menu->id) }}"
                                                                class="btn btn-xs btn-primary" data-toggle="tooltip"
                                                                data-placement="top" title="Edit Slider"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i></a>
                                                            <button onclick="deleteMenu({{ $menu->id }})"
                                                                class="btn btn-xs btn-danger remove"><i
                                                                    class="fa fa-trash-o"></i>
                                                            </button>
                                                        </td>

                                                    </div>
                                                </li>
                                            </ol>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ol>

                        </div>
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
                url: "{{ route('update.menu') }}",
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
