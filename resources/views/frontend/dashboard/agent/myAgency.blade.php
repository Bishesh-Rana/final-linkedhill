@extends('frontend.dashboard.layouts.master')
@section('title','Applied Agency')


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i> Applied Agency
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    {{--<th>Status</th>--}}
                                    <th>Address</th>
                                    <th style="width: 5%" class="text-center">Action</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    {{--<th>Status</th>--}}
                                    <th>Address</th>
                                    <th class="text-center" width="20%">Action</th>


                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($agencies as $key=>$agency)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$agency->agency->hasAgency->agency_name}}</td>
                                        <td>
                                            <a href="{{$agency->agency->hasAgency->logo}}" data-lightbox="example{{$agency->id}}"><img class="img-style" src="{{$agency->agency->hasAgency->logo}}" /></a>
                                        </td>
                                        {{--<td> <span class="label label-info"> @if($agency->verified == 1) Verified @else Unverified @endif </span></td>--}}
                                        <td>
                                            {{$agency->agency->hasAgency->address}}
                                        </td>
                                        <td>
                                            <div class="col-md-1">
                                                <a href=" " class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"  data-original-title="View Agency"><i class="material-icons">visibility</i></a>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-1">
                                                <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteDataById({{$agency->id}},'/delete-my-agency')" rel="tooltip"  data-original-title="Delete Agency"><i class="material-icons">close</i></a>
                                            </div>
                                            <div class="col-md-9"></div>

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
</script>
@endpush
