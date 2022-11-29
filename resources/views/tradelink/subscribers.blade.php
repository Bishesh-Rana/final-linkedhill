@extends('tradelink.layouts.master')
@section('title','Subscribers')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-icon">


                        <h4><b>Subscribers List</b></h4>


                    </div>
                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th style="width: 5%" class="text-center">Action</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>

                                    <th style="width: 15%" class="text-center">Action</th>


                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$subscriber->email}}</td>


                                        <td>

                                            <div class="col-md-1">
                                                <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteTradelinkSubscriber({{$subscriber->id}})" rel="tooltip"  data-original-title="Delete Subscriber"><i class="material-icons">close</i></a>

                                            </div>

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

        function deleteTradelinkSubscriber(id) {
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
                    url:'{!!URL::to('tradelink/delete-subscriber/')!!}',
                    type : "POST",
                    data : {'id' : id, '_token' : csrf_token},

                    success:function(){

                        console.log('success');
                        location.reload();
                    },
                    error:function(){
                        swal({
                            title: 'Oops...',
                            text: "Something went wrong",
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });

            });

        }

    </script>

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>

@endpush
