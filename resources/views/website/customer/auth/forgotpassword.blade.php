@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 p-5 first ">
                    <h1>Forgot password??</h1>
                    <p>Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <img class="img-fluid" src="{{asset('images/logo1.png')}}" alt="" srcset="">

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="sign_up_in_wrapper">
                                @if (Session::has('error'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                        {{ Session::get('error') }}</p>
                                @endif
                                @if (Session::has('success'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                                        {{ Session::get('success') }}</p>
                                @endif
                                <form method="post" action="{{ route('customer.resetpasswordmail') }}">
                                    @csrf
    
                                    <label for="exampleFormControlInput1">Registered Email:- </label>
                                    <div class="form_group input_box_zee mb-3">                                        
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com" name="email" required >
                                        <i class="las la-envelope"></i>
                                       </div>
    
    
                                    <div class="login-foot">
    
                                        <input class="btn btn-danger reset" type="submit" value="Reset" name="login">
                                        <div>
                                        </div>
                                        <a href="{{ route('customer.signup') }}">Back To Login</a>
                                    </div>
                                </form>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
