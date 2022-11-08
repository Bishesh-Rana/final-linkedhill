@extends('frontend.dashboard.layouts.master')
@section('title','Property Detail')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">


<style>
    #drop_file_zone {
        background-color: #EEE;
        border: #999 5px dashed;
        width: 290px;
        height: 140px;
        padding: 8px;
        font-size: 18px;
    }
    #drag_upload_file {
        width:50%;
        margin:0 auto;
    }
    #drag_upload_file p {
        text-align: center;
    }
    #drag_upload_file #selectfile {
        display: none;
    }

    .property-image{
        width: 150px;
        height: 150px;
    }

    .map iframe{
        height: 350px;
        width: 100%;
    }
</style>


@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Property : {{$property->title}}</b>
                    </div>
                    <div class="card-content">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Property Category
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" id="title" value="{{$property->property_category->name}}" type="text"  readonly/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Property Title
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" id="title" value="{{$property->title}}" type="text"  readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" card form-group" style="margin-top:18px; padding: 20px">


                                        <div class="form-footer text-center">
                                            <div class="checkbox pull-left">
                                            </div>
                                            <br>
                                            <a href="{{route('editAssignedProperty',$property->id)}}" class="btn btn-fill btn-success float-right"><b> <i class="fa fa-edit"></i>&nbsp;&nbsp;Check here to Update &nbsp;&nbsp;Property &nbsp;&nbsp;Detail </b></a>
                                        </div>

                                </div>

                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Purpose to Post Property
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->property_status}}" type="text"  readonly/>
                                <br><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Property Type
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->type}}" type="text"  readonly/>
                                <br><br>
                            </div>
                        </div>

                        <div class="row">

                            @foreach($property->images as $image)
                                <div class="col-md-3">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 160px">

                                                <img src="{{$image->name}}" id="image" class="img-thumbnail img-responsive" alt="">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>



                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline"> Address </h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Property  Address
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->property_address}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Area
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->area->name}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    City
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->city->name}}" type="text"  readonly/>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Total Area and Road Details</h5>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Total Area
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->total_area}} {{$property->area_unit->name}}" type="text"  readonly/>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Built Up Area
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->built_up_area}} {{$property->unit->name}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Property  Facing
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->property_facing}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Road Access
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->road_access}} @if($property->road_access_unit == 1) Feet @else Meter @endif" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Road  Type
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->property_facing}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Property Other Details</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Building detail ( Built Up Area)
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->built_year_month}} {{$property->built_year}} " type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Furnished
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->furnished}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Number of Kitchen
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->total_kitchen}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Number of Living Room
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->total_living_room}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Number of  Bed Room
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->total_bed_room}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Number of  Bathroom
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->total_bathroom}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Total Number of Floor
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->total_floor}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Parking for Car
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->car_parking}}" type="text"  readonly/>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Parking for Bikes
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->bike_parking}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Amenties</h5>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group  label-floating">

                                @foreach($property->amenties as $key => $amenty)
                                    <b>{{++$key}}. </b>{{$amenty->amenity->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                            </div>
                        </div>


                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Price</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">

                                <input class="form-control" id="title" value="{{$property->price}} NPR &nbsp;&nbsp;&nbsp; {{$property->price_label}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Owner Detail</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Name
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->owner_name}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Address
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->owner_address}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group  label-floating">
                                <label class="label-style">
                                    Phone
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" id="title" value="{{$property->owner_phone}}" type="text"  readonly/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Property  Detail</h5>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                {!! $property->property_detail !!}
                            </div>
                        </div>

{{--                        <div class="col-md-12">--}}
{{--                            <br>--}}
{{--                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Map Location</h5>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-12 map" style="margin-bottom:200px">--}}
{{--                            {!! $property->map_location !!}--}}
{{--                        </div>--}}




                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
         toastr.info("{{Session::get('message')}}",'',{
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
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

    var del = document.querySelectorAll('.delButton');

    del.forEach((d)=>{
        d.addEventListener("click",(e)=>{
        e.preventDefault();

    swal({
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {

        $.ajax({
            url:'{!!URL::to('property-image/delete/')!!}' + '/' + d.value,
            type : "get",
            data : {'_method' : 'GET'},

            success:function(){

                console.log('success');
                d.parentNode.style.display = "none";
            },
            error:function(){

            }
        });

    });




    })
    });


    $('#title').on('keyup',function(){
        var title=$(this).val();
        var slug=convertToSlug(title);
        $('#slug').val(slug);
    });

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
                url:'{!!URL::to('admin/city/')!!}' + '/' + id,
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

    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);



</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>


<script type="text/javascript">

    var fileobj;
    function upload_file(e) {
        e.preventDefault();
        ajax_file_upload(e.dataTransfer.files);
    }

    function file_explorer() {
        document.getElementById('selectfile').click();
        document.getElementById('selectfile').onchange = function() {
            files = document.getElementById('selectfile').files;
            ajax_file_upload(files);
        };
    }

    function ajax_file_upload(file_obj) {
        if(file_obj != undefined) {
            var form_data = new FormData();
            for(i=0; i<file_obj.length; i++) {
                form_data.append('file[]', file_obj[i]);
            }
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    alert(response);
                    $('#selectfile').val('');
                }
            });
        }
    }


</script>




@endpush
