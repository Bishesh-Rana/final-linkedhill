<form action="{{route('agent.store')}}"  method="post" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
    @csrf

    <div class="form-group label-floating is-empty">
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail">

                <img src="{{asset('dashboard/img/placeholder.jpg')}}" id="image" class="img-thumbnail img-responsive" alt="">

            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
                                                            <span class="btn btn-outline-success btn-round btn-file">
                                                                <span class="fileinput-new">Add Logo</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="logo" id="image" required />
                                                                @if ($errors->has('logo'))
                                                                    <span class="error-message">
                                                                                *{{ $errors->first('logo') }}
                                                                     </span>
                                                                @endif
                                                            </span>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
        </div>
    </div>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Name
            </label>
            <input class="form-control" name="agency_name"  type="text" data-parsley-trigger="keyup" required  />
            @if ($errors->has('agency_name'))
                <span class="error-message">
                    *{{ $errors->first('agency_name') }}
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Email
            </label>
            <input class="form-control" name="agency_email"  type="email" data-parsley-trigger="keyup" data-parsley-type="email" required />
            @if ($errors->has('agency_email'))
                <span class="error-message">
                    *{{ $errors->first('agency_email') }}
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Website
            </label>
            <input class="form-control" name="website" type="text"  />
            @if ($errors->has('website'))
                <span class="error-message">
                    *{{ $errors->first('website') }}
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Office Address
            </label>
            <input class="form-control" name="address"  type="text" data-parsley-trigger="keyup" required />
            @if ($errors->has('address'))
                <span class="error-message">
                    *{{ $errors->first('address') }}
                </span>
            @endif
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Phone Number
            </label>
            <input class="form-control" name="agency_phone"  type="text"  data-parsley-trigger="keyup" required />
            @if ($errors->has('agency_phone'))
                <span class="error-message">
                    *{{ $errors->first('agency_phone') }}
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group  label-floating">
            <label class="label-style">
                Enter Agency Mobile Number
            </label>
            <input class="form-control" name="agency_mobile" type="text" data-parsley-trigger="keyup" required />
            @if ($errors->has('agency_mobile'))
                <span class="error-message">
                    *{{ $errors->first('agency_mobile') }}
                </span>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <br><br>
        <label for="" class="label-style">Upload Required Document  ex License </label>
        <br>
        <label class="custumFile btn btn-default" type="button">
            <input type="file" class="inputTypeFile" name="other_document" multiple>
            @if ($errors->has('other_document'))
                <span class="error-message">
                    *{{ $errors->first('other_document') }}
                </span>
            @endif
        </label>
    </div>
    <div class="col-md-12">
        <br><br>
        <div class="form-group">
            <label class="label-style">
                Short Introduction About Agency
                <small>*</small>
            </label>
            <textarea  class="form-control summernote" name="short_intro" data-parsley-trigger="keyup" required>{{old('short_intro')}}</textarea>
            @if ($errors->has('short_intro'))
                <span class="error-message">
                    *{{ $errors->first('short_intro') }}
                </span>
            @endif
        </div>
    </div>




    <div class="form-footer text-right">
        <div class="checkbox pull-left">
        </div>
        <button type="submit" class="btn  btn-fill btn-success float-right">Create</button>
    </div>
</form>
