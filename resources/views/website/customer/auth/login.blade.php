@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 p-5 first ">
                    <h1>Login</h1>
                    <p>Get access to your Orders, Wishlist and Recommendations</p>
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
                                <form action="{{ route('customer.login') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                       <div class="form_group input_box_zee">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com" name="email" required >
                                        <i class="las la-envelope"></i>
                                       </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_field" class="form-label">Password</label>
                                        <div class="form_group input_box_zee">
                                            <input type="password" class="form-control" id="password_field" placeholder=""
                                                name="password" required>
                                                <a href="{{route('customer.forgot')}}" class="forgot">Forgot?</a>
                                            {{-- <i class="lar la-eye"></i> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="forget_psw_Wrapper">
                                        <a href="#">Forget Password ?</a>
                                    </div> --}}
                                    <div class="sign_in_button">
                                        <button class="btn btn-danger">Login</button>
                                    </div>
                                </form>
                               
                               
                            </div>
                            <div class="d-flex login_register">
                                <p class="">New to Linkedhill??</p>
                                <a href="{{route('customer.registerform')}}" class="btn login_registerbtn">Signup</a>
                            </div>
                        </div>
                    </div>
                </div>

             

                {{-- <div class="col-lg-4">
                    <div class="user_notice_wrapper">
                        <h3>{{ $website->login_title }}</h3>
                        <p>{{ $website->login_sub_title }}</p>

                        <ul class="list_info">
                            <li><i class="las la-home"></i><span>{{ $website->second_login_sub_title }}</span></li>
                            <li><i class="las la-user-friends"></i><span>{{ $website->third_login_sub_title }}</span></li>
                            <li><i class="las la-city"></i><span>{{ $website->four_login_sub_title }}</span></li>
                        </ul>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
@endsection
