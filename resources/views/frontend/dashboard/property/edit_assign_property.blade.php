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
            <form action="{{route('updatePropertyDetailByAgency',$property->id)}}" method="post">
                @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Edit Property : {{$property->title}}</b>
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
                                        <input class="form-control" name="title_by_agency" id="title_by_agency" value="@if($property->title_by_agency != null) {{$property->title_by_agency}} @else {{$property->title}}@endif" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" card form-group" style="margin-top:18px; padding: 20px">

                                   @if($property->allow_edit =="0")
                                        <div class="form-footer text-center" style="background: #5bc0de;color: #ffffff;padding: 5px;font-weight: bold">
                                            You haven't made any changes yet !
                                        </div>
                                       @elseif($property->allow_edit == "requested")

                                        <div class="form-footer text-center" style="background: #FA8072;color: #ffffff;padding: 5px;font-weight: bold">
                                            You request has been sent to the user for approval to edit.
                                        </div>
                                       @else
                                        <div class="form-footer text-center" style="background: #dc3545;color: #ffffff;padding: 5px;font-weight: bold">
                                            Your are authorised to edit property detail.
                                        </div>

                                    @endif


                                </div>

                            </div>
                        </div>

                        {{--<div class="row">--}}

                            {{--@foreach($property->images as $image)--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<div class="form-group label-floating is-empty">--}}
                                        {{--<div class="fileinput fileinput-new text-center" data-provides="fileinput">--}}
                                            {{--<div class="fileinput-new thumbnail" style="width: 200px; height: 160px">--}}

                                                {{--<img src="{{$image->name}}" id="image" class="img-thumbnail img-responsive" alt="">--}}

                                            {{--</div>--}}
                                            {{--<div class="fileinput-preview fileinput-exists thumbnail"></div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}



                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Price</h5>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group  label-floating" style="margin-top:10px;">
                                <label class="label-style">
                                    Price
                                    {{--<small>*</small>--}}
                                </label>
                                <input class="form-control" name="price_by_agency" value="@if($property->price_by_agency == null){{$property->price}} @else {{$property->price_by_agency}} @endif" type="text"  />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" style="margin-top:10px;">
                                <label class="label-style">Price Label </label>
                                <select class="form-control select2 select2-hidden-accessible"  name="price_label_by_agency" data-placeholder="Select Price " style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    @if($property->price_label_by_agency != null)
                                        <option @if($property->price_label_by_agency == "Per Month" ) selected @endif value="Per Month">Per Month</option>
                                        <option @if($property->price_label_by_agency == "Per Aana" ) selected @endif value="Per Aana">Per Aana</option>
                                        <option @if($property->price_label_by_agency == "Per Ropani" ) selected @endif value="Per Ropani">Per Ropani</option>
                                        <option @if($property->price_label_by_agency == "Per Daam" ) selected @endif value="Per Daam">Per Daam</option>
                                    @else
                                        <option @if($property->price_label == "Per Month") selected @endif value="Per Month">Per Month</option>
                                        <option @if($property->price_label == "Per Aana") selected @endif value="Per Aana">Per Aana</option>
                                        <option @if($property->price_label == "Per Ropani") selected @endif value="Per Ropani">Per Ropani</option>
                                        <option  @if($property->price_label == "Per Daam") selected @endif value="Per Daam">Per Daam</option>
                                    @endif
                                </select>
                            </div>
                        </div>





                        <div class="col-md-12">
                            <br>
                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Property  Detail</h5>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label-style">
                                    Property Details
                                    <small>*</small>
                                </label>
                                <textarea  class="form-control arka-tinymce" name="property_detail_by_agency">@if($property->property_detail_by_agency != null) {!! $property->property_detail_by_agency !!}  @else {!! $property->property_detail !!} @endif </textarea>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group  label-floating" style="margin-top:15px;">
                                <label class="label-style">
                                    Google Map Iframe
                                </label>
                                <textarea class="form-control"  name="map_location_by_agency" row="2" required>@if($property->map_location_by_agency != null) {{$property->map_location_by_agency}}  @else {{$property->map_location}} @endif</textarea>
                            </div>
                        </div>

{{--                        <div class="col-md-12">--}}
{{--                            <br>--}}
{{--                            <h5 style="font-weight: 700;font-size: 14px;text-decoration: underline">Map Location</h5>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-12 map" style="margin-bottom:200px">--}}
{{--                            @if($property->map_location_by_agency != null)--}}
{{--                                {!! $property->map_location_by_agency !!}--}}
{{--                                @else--}}
{{--                                {!! $property->map_location !!}--}}
{{--                            @endif--}}

{{--                        </div>--}}


                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn  btn-fill btn-success float-right">Update Property Detail</button>
                        </div>



                    </div>
                </div>
            </div>

            </form>

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
