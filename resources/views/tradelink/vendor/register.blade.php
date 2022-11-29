@extends('frontend.layouts.master')
@section('title','Linkedhill - all about Property')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{asset('frontend/node_modules/nouislider/distribute/nouislider.min.css')}}">

<style>
    .join{
        display: none;
    }
    footer{
        display: none;
    }
    .header-class{
        display: none;
    }
    .secondary-nav{
        display: none;
    }
</style>
@endpush

@section('content')
    <main class="home-page">
        <article class="login-form sign-up-form">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="row">

                        @if(\Session::has('message'))
                            <div class="alert alert-success col-lg-12">
                                <p>{{\Session::get('message')}}</p>
                            </div>
                        @endif


                        <div class="col-lg-12 wrapper">
                            @if($errors->any)

                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach

                            @endif
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                                <a href="{{route('homepage')}}" class="close" >
                                    <span class="material-icons">close</span>
                                </a>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="{{ route('trade.vendor.register') }}" class="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="" style="font-size: 14px;color: #495057"> Upload Profile Picture</label>
                                        <input type="file" placeholder="Profile Picture" name="image" autofocus="" class="form-control" required>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <input type="text" placeholder="Name" name="name" autofocus="" class="form-control @error('name') is-invalid @enderror" id="name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="email" placeholder="Email" name="email" autofocus="" class="form-control  @error('email') is-invalid @enderror" id="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Phone Number" name="phone" autofocus="" class="form-control  @error('phone') is-invalid @enderror" id="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="" style="font-size: 14px;color: #495057"> Please attach required document i.e license</label>
                                        <input type="file" placeholder="Email" name="document" autofocus="" class="form-control" required>
                                        @error('document')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="" style="font-size: 14px;color: #495057"> Please Select Service</label>
                                        <br>
                                        <div class="row">
                                            <div class="container">
                                               @foreach($services as $service)
                                                <div class="col-md-3">
                                                    <input type="checkbox" name="service_id[]" value="{{$service->id}}" id="termsandCondition"> <span style="font-size: 14px;color: #495057"> {{$service->name}}</span>
                                                </div>
                                                @endforeach

                                            </div>


                                            @error('service_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                    </div>



                                    <div class="form-group">
                                        <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" id="pass">
                                        <a href="#!" class="visibility input-group-text">
                                            <span class="material-icons">visibility_off</span>
                                        </a>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{--<div class="form-group form-check">--}}
                                        {{--<input type="checkbox" class="form-check-input" id="termsandCondition">--}}
                                        {{--<label class="form-check-label para" for="andCondition">Aggree to our <a href="#">Terms and conditions</a> </label>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <button type="submit">Sign Up</button>
                                    </div>

                                </form>

                        </div>

                    </div>


                </div>
            </div>
        </article>
    </main>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))


            toastr.success("{{Session::get('message')}}",'',{
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
    </script>

@endsection
