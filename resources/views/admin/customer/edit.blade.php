@extends('admin.layouts.master')
@section('title','View Customer')

@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <style>


    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Customer :  {{$user->name}}</b>
                                </div>
                                <div class="col-md-4"></div>

                            </div>


                        </div>
                    </div>
                    <div class="card-content">
                        <form action="{{route('agency.update',$user->id)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-group label-floating is-empty">--}}
{{--                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">--}}
{{--                                            <div class="fileinput-new thumbnail">--}}

{{--                                                <img src="{{$user->logo}}" id="image" class="img-thumbnail img-responsive" alt="">--}}

{{--                                            </div>--}}
{{--                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>



                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                       Customer Name
                                    </label>
                                    <input class="form-control" value="{{$user->name}}"  type="text"  readonly/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Customer Email
                                    </label>
                                    <input class="form-control"   value="{{$user->email}}"  type="email"  readonly />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Customer Phone
                                    </label>
                                    <input class="form-control"   value="{{$user->phone}}"  type="email"  readonly />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Customer Address
                                    </label>
                                    <input class="form-control"   value="{{$user->address}}" name="address"  type="email"  readonly />
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

                    <input type="hidden" value="{{$user->id}}" name="user_id">

                    @php
                        $user = \App\Models\User::find($user->id);
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
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


    </script>
@endpush
