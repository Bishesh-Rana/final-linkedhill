@extends('admin.layouts.master')
@section('title','Faqs')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">FAQ:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Manage FAQ
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
                                            <th>Id</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th style="width: 5%" class="text-center">Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th style="width: 5%" class="text-center">Action</th>


                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($faqs as $faq)
                                            <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td>{{$faq->question}}</td>

                                                <td>
                                                    {{substr( strip_tags($faq->answer),0,70)}}..
                                                </td>



                                                <td class="text-right" style="width: 15%">
                                                    <div class="col-md-1">
                                                        <a href="{{route('faq.edit',$faq->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"   data-original-title="Edit Faq"><i class="material-icons">edit</i></a>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-1">
                                                        <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteFaq({{$faq->id}})" rel="tooltip"  data-original-title="Delete Faq"><i class="material-icons">close</i></a>
                                                    </div>
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

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
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





            $('.card .material-datatables label').addClass('form-group');
        });


        function deleteFaq(id,) {
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
                    url:'{!!URL::to('admin/faq/')!!}' + '/' + id,
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
