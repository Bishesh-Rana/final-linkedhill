@php
  $agency = \App\Models\AgencyDetail::where('user_id',Auth::user()->id)->first();
@endphp

<form action="{{route('agency.update',$agency->id)}}"  method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating is-empty">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img src="{{$agency->logo}}" id="image" class="img-thumbnail img-responsive" alt="">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Name
            </label>
            <input class="form-control" value="{{$agency->agency_name}}"  type="text"  readonly/>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Email
            </label>
            <input class="form-control"   value="{{$agency->agency_email}}"  type="email"  readonly />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Website
            </label>
            <input class="form-control"  value="{{$agency->website}}" type="text"  />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Office Address
            </label>
            <input class="form-control"  value="{{$agency->address}}"   type="text" readonly />
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Phone Number
            </label>
            <input class="form-control"  value="{{$agency->agency_phone}}"  type="text" readonly  />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Mobile Number
            </label>
            <input class="form-control"  value="{{$agency->agency_mobile}}" type="text"  readonly/>
        </div>
    </div>

    <div class="clearfix"></div>

    {{--                            <div class="col-md-12">--}}
    {{--                                <br><br>--}}
    {{--                                <label for="" class="label-style">View  Document  ex License </label>--}}
    {{--                                <br>--}}
    {{--                                <label class="custumFile btn btn-default" type="button">--}}
    {{--                                    <input type="file" class="inputTypeFile" name="other_document" multiple>--}}
    {{--                                </label>--}}
    {{--                            </div>--}}

    <div class=" col-md-12 form-group">
        <iframe id="myFrame" style="display:none" width="100%" height="500"></iframe>
        <input type="button" value="View Document" class="btn btn-primary" onclick = "openPdf()"/>
    </div>


    <div class="col-md-12" style="margin-bottom: 60px">
        <br><br>
        <div class="form-group">
            <label class="label-style">
                Short Introduction About Agency
                <small>*</small>
            </label>
            <textarea  class="form-control summernote" name="short_intro">{!! $agency->short_intro !!}</textarea>
        </div>
    </div>
    <div class="form-footer text-right" >
        <div class="checkbox pull-left"></div>
{{--        <button type="submit" class="btn  btn-fill btn-success float-right"> Update</button>--}}
    </div>
</form>


<script>
    function openPdf() {
        var omyFrame = document.getElementById("myFrame");
        omyFrame.style.display="block";
        omyFrame.src = "{{asset('documents/'.$agency->other_document)}}";
    }
</script>

