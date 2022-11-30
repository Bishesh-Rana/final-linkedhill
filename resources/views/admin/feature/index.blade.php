@extends('admin.layouts.master')
@section('title', 'Feature')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Feature:</span>
                                <li class="active">
                                    <a href="{{ route('feature.create') }}">
                                        <i class="material-icons">settings</i>Add Features
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">
                                <div class="material-datatables">
                                    <ol class="sortable">
                                        @foreach ($features as $key => $value)
                                            <li id="purposeItem_{{ $value->id }}">
                                                <div>
                                                    <td>{{ $value->title }}</td>
                                                    <td>
                                                        <a href="{{route('feature.edit',$value->id)}}" class="btn btn-sm btn-primary" data-placement="top" title="Edit Purpose"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <button onclick="deleteCity({{$value->id}})" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>
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
                                    {{-- <a href="{{ request()->url() }}" type="button" class="btn btn-danger btn-sm btn-flat"><i
                                            class="fas fa-sync-alt"></i> Reset Order</a> --}}
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
                url: "{{ route('update.feature') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    sort: serialized
                },
                success: function(res) {
                    //location.reload();
                    toastr.options.closeButton = true
                    toastr.success('Features Order Successfuly', "Success !");
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
    <script>
        $('#datatables').DataTable({

            processing: true,

            serverSide: true,

            ajax: '{{ route('feature.get') }}',

            columns: [

                {
                    title: 'SN',
                    render: function(data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                }
            ],
        });

        function deleteFeature(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',

                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $.ajax({
                    url: '{!! URL::to('admin/feature/') !!}' + '/' + id,
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
    <script>
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
                url:'{!!URL::to('admin/feature/')!!}' + '/' + id,
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
