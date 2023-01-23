@extends('frontend.dashboard.layouts.master')
@section('title','Agents')
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
                                            <i class="material-icons">settings</i> Agencies
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <form action="{{route('apply.as.agent')}}"  method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <label class="label-style">Select Agency  </label>
                                <select class="form-control select2 select2-hidden-accessible" name="agent_id[]"  data-placeholder="Select Agency" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple required>
                                    @foreach($agents as $agent)
                                        <option value="{{$agent->user_id}}" @if(in_array($agent->user_id,$ids)) selected @endif>{{$agent->agency_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-footer text-left" style="margin-left: 15px">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn  btn-fill btn-success float-left">Apply</button>
                            </div>

                            <br>

                            <h6 style="margin-left: 20px">Didn't Find Agency ? <a href="{{route('agent.create')}}"> Add Here! </a></h6>
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
