@extends('frontend.dashboard.layouts.master')
@section('title','Add Agent')

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

                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Agency :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">account_balance</i> @if($hasAccount)

                                                @if(\Illuminate\Support\Facades\Auth::user()->hasAgency->status == "verified")
                                                    <h4><b>  Agency</b></h4>
                                                    <button class="btn btn-sm pull-right" style="margin-top: -30px;color: darkgreen;background-color: #e2e6ea;font-weight: bold"> <i class="fa fa-check"></i> {{$message_verified}}</button>

                                                @else
                                                    <h4><b>Agency  &nbsp;Detail </b></h4>
                                                    <button class="btn btn-sm pull-right" style="margin-top: -30px;color: darkred;background-color: #e2e6ea;font-weight: bold">{{$message}}</button>
                                                @endif

                                            @else
                                                <b>Add  &nbsp;Agency</b>
                                            @endif
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="card-content">
                        @if($hasAccount)
                            @include('frontend.dashboard.agent.agencyDetail')
                        @else
                            @include('frontend.dashboard.agent.addAgency')
                        @endif


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
