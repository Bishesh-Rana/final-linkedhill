@extends('frontend.layouts.master')
@section('title','Linkedhill - all about Property')
@push('css')
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
                        <div class="col-lg-6 pl-0">
                            <div class="card__img">
                                <img src="{{asset('frontend/gallery/login.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 wrapper">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                                <a href="{{route('homepage')}}" class="close" >
                                    <span class="material-icons">close</span>
                                </a>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="{{ route('register') }}" class="form">
                                    @csrf
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
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="termsandCondition">
                                        <label class="form-check-label para" for="andCondition">Aggree to our <a href="#">Terms and conditions</a> </label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit">Sign Up</button>
                                    </div>

                                </form>
                                <p class="or"> <span>or</span></p>
                                <a href="{{route('facebookLogin')}}"><button type="button" class="facebook form-control"><img src="{{asset('frontend/gallery/ff.png')}}" alt="">  Sign Up with </button></a>
                                <a href="{{route('googleLogin')}}"><button class="google"><img src="{{asset('frontend/gallery/gg.png')}}" alt=""> Sign Up with </button> </a>
                                <p class="mb-0 para">Already have an account?<a href="sign-up.php" class="link" data-toggle="modal" data-target="#login">Login here</a>.</p>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </article>
    </main>
@endsection
