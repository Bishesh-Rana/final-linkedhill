@extends('frontend.dashboard.layouts.master')
@section('title','Assign Aggency')
@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

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
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i> Assign Property To Agent
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <form action="{{route('assign.agency')}}"  method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <label class="label-style">Select Agency </label>
                                <select class="form-control select2 select2-hidden-accessible" name="agency_id"  data-placeholder="Select Agency" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    @foreach($agencies as $agency)
                                        <option value="{{$agency->agency->hasAgency->user_id}}">{{$agency->agency->hasAgency->agency_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <label class="label-style">Select Property </label>
                                <select class="form-control select2 select2-hidden-accessible" name="property_id"  data-placeholder="Select Property" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    @foreach($properties as $property)
                                        <option value="{{$property->id}}">{{$property->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-footer text-left" style="margin-left: 15px">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn  btn-fill btn-success float-left">APPLY</button>
                            </div>

                            <br>

                        </form>
                    </div>
                </div>

                <div class="card">


                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i> Agency - Property
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="card-content">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Property</th>
                                            <th>Aggency</th>
                                            <th>View Changes</th>
                                            <th>Changes by Agency</th>
                                            <th style="width: 5%" class="text-center">Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Property</th>
                                            <th>Aggency</th>
                                            <th>View Changes</th>
                                            <th>Chages by Agency</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($agency_property as $key => $item)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$item->property->title}}</td>
                                            <td>{{$item->agency->hasAgency->agency_name}}</td>
                                            <td class="text-center">
                                                @if($item->property->allow_edit != "0")
                                                    <a href="#!" rel="tooltip" data-original-title="View Changes by Agency" data-toggle="modal" data-target="#showProperty-{{$item->property->id}}" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">visibility</i></a>

                                                @else
                                                   <b> - </b>
                                                @endif
                                            </td>
                                            <td>

                                                <input type="hidden" id="property_id" value="{{$item->property->id}}">
                                                <div class="form-group">
                                                    <div class="togglebutton">
                                                        Unapproved
                                                        <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                            <input type="checkbox" name="active" @if($item->property->allow_edit == 1) checked @endif  onchange="changeStatus({{$item->property->id}})">
                                                        </label>
                                                        Approved
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="col-md-1">
                                                    <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteAgency({{$item->id}})" rel="tooltip"  data-original-title="Remove Agency"><i class="material-icons">close</i></a>
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

        </div>

        @foreach($agency_property as $key => $item)
            <div class="modal fade" id="showProperty-{{$item->property->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action=" " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Show changes done  by Agency</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-12">

                                    <div class="form-group  label-floating">
                                        <label>
                                           Property Ttile
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" value="{{$item->property->title_by_agency}}" readonly />
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group  label-floating">
                                        <label>
                                           Price
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" value="{{$item->property->price_by_agency}} {{$item->property->price_label_by_agency}}" readonly />
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Property Detail
                                            {{--<small>*</small>--}}
                                        </label>
                                        <p>
                                            {!! $item->property->property_detail_by_agency !!}
                                        </p>
                                    </div>
                                </div>
                                <style>
                                    .modal-map iframe{
                                        width: 500px !important;
                                        height: 400px !important;
                                    }
                                </style>

                                <div class="col-md-12">
                                    <div class="form-group modal-map" >
                                    {!! $item->property->map_location_by_agency !!}
                                    </div>
                                </div>




                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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

    @if(Session::has('message'))
         toastr.success("{{Session::get('message')}}",'',{
        "positionClass": "toast-top-right",
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

    $('#title').on('keyup',function(){
        var title=$(this).val();
        var slug=convertToSlug(title);
        $('#slug').val(slug);
    });

</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });

    function deleteAgency(id) {

        var csrf_token = $('meta[name="csrf-token"]').attr('content')
        swal({

            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {

            $.ajax({
                url:'{!!URL::to('agent/')!!}' + '/' + id,
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


    /**
     * Change status
     */

    function changeStatus(status)
    {
        $.ajax({
            url:'{!!URL::to('change-edit-status/')!!}' + '/' + status,
            type : "get",
            data : {'_method' : 'get'},

            success:function(response){

                console.log(response);
                location.reload();
//                $('#msg').css('display', 'block');
//                $("#msg").html(response.message);
//                $("#msg").fadeOut(8000);

            },
            error:function(){

            }
        });


    }
</script>



@endpush
