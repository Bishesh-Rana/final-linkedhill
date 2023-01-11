@extends('admin.layouts.master')
@section('title','View Agency')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>AGENCY :  {{$agency->agency_name}}</b>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <a href="#" data-toggle="modal" data-target="#blockModal" class="btn btn-danger pull-right" >Block</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-content">
                        <form action="{{route('agency.update',$agency->id)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <label>Profile</label>
                                                <img src="{{$agency->logo}}" id="image" class="img-thumbnail img-responsive" alt="">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <label>Pan</label>
                                                <img src="{{$agency->pan}}" id="pan" class="img-thumbnail img-responsive" alt="">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class=" card form-group" style="margin-top:18px; padding: 20px">
                                        <label>Update Agency Status</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="status"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="non-verified" @if($agency->status == "Non-Verified") selected @endif>Not Verified</option>
                                            <option value="verified" @if($agency->status == "Verified") selected @endif>Verified</option>
                                        </select>


                                        <div class="form-footer text-right">
                                            <div class="checkbox pull-left">
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-sm btn-fill btn-success float-right">Update</button>
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

                            <div class=" col-md-12 form-group">
                                <iframe id="myFrame" style="display:none" width="100%" height="500"></iframe>
                                <input type="button" value="View Company Registration" class="btn btn-primary" onclick = "openPdf()"/>
                            </div>

                            <div class=" col-md-12 form-group">
                                <iframe id="myFrame1" style="display:none" width="100%" height="500"></iframe>
                                <input type="button" value="View Tax Clearance" class="btn btn-primary" onclick = "openTaxPdf()"/>
                            </div>


                            <div class="col-md-12">
                                <br><br>
                                <div class="form-group">
                                    <label class="label-style">
                                        Short Introduction About Agency
                                        <small>*</small>
                                    </label>
                                    <textarea  class="form-control summernote" name="short_intro">{!! $agency->short_intro !!}</textarea>
                                </div>
                            </div>




                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                {{--<button type="submit" class="btn  btn-fill btn-success float-right">Create</button>--}}
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>



        <div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">




                <form action="{{route('block.agency')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{$agency->user_id}}" name="user_id">

                    @php
                        $user = \App\Models\User::find($agency->user_id);
                    @endphp
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Block Agency</b> @if($user->is_blocked) <span style="font-weight: bold;font-size: 14px;color: darkred"> This Agency Is Blocked.</span> @endif</h5>
                            <hr>
                        </div>
                        <div class="modal-body">



                            <div class="col-md-12">
                                <div class="form-group  label-floating" style="padding-bottom: 20px">
                                    <label>
                                        Block/Unblock Agency
                                        {{--<small>*</small>--}}
                                    </label>
                                    <select name="is_blocked" id="" class="form-control">
                                        <option value="1">Blocked</option>
                                        <option value="0">Unblock</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-md-12">
                                <div class="form-group  label-floating">
                                    <label>
                                        Enter Block Remark

                                    </label>
                                    <input class="form-control" name="block_remark" type="text"  required/>
                                </div>
                            </div>




                        </div>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('script')

<script>


    function openPdf() {
        var omyFrame = document.getElementById("myFrame");
        omyFrame.style.display="block";
        omyFrame.src = "{{$agency->company_registration}}";
    }
    function openTaxPdf() {
        var omyFrame = document.getElementById("myFrame1");
        omyFrame.style.display="block";
        omyFrame.src = "{{$agency->tax_clearance}}";
    }
</script>
@endpush
