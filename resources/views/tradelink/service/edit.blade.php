@extends('tradelink.layouts.master')
@section('title','Edit Service')
@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Edit &nbsp; Service : {{$service->name}}</b>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('service-list.update',$service->id)}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-content">

                                <div class="form-group label-floating is-empty col-md-12">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">


                                            <img src="{{$service->image}}" id="image" class="img-thumbnail img-responsive" alt="">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Update Image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image" id="image" />
                                                    </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="error-message">
                                                    *{{ $errors->first('image') }}
                                        </span>
                                @endif


                                <div class="form-group col-md-12" style="margin-top:18px;">
                                    <label>Select Category for service</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="service_category_id"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        @foreach($service_categories as $service_category)
                                            <option value="{{$service_category->id}}" @if($service_category->id == $service->service_category_id) selected @endif>{{$service_category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>




                                <div class="clearfix"></div>



                                <div class="form-group col-md-6">
                                    <label>Service Name</label>
                                    <input type="text"  class="form-control" name="name" id="name" value="{{$service->name}}">
                                    @if ($errors->has('name'))
                                        <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Slug</label>
                                    <input type="text"  class="form-control" name="slug" id="slug" value="{{$service->slug}}">
                                    @if ($errors->has('slug'))
                                        <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group col-md-6">
                                    <br><br>
                                    <div class="togglebutton">
                                        <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                            Not Featured <input type="checkbox" name="feature" @if($service->feature =="on") checked  @endif> Feature
                                        </label>
                                    </div>
                                </div>




                                <div class="clearfix"></div>

                                <div class="form-footer text-right">
                                    <div class="checkbox pull-left">
                                    </div>
                                    <button type="submit" class="btn btn-behance btn-fill">Update</button>
                                </div>

                            </div>
                        </form>

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

    $('#name').on('keyup',function(){
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
</script>

@endpush
