@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 p-5 first ">
                    <h1>Register</h1>
                    <div class="why_us">
                        <h3>Why us :</h3>
                        <ul>
                            <li>
                                Reach out to a large audience.
                            </li>
                            <li>Connecting potential Customers.
                            </li>
                            <li>
                                Get notifications & market trend.

                            </li>
                            <li>
                                Online Customer Service. 
                            </li>
                            <li>
                                Email Marketing.
                            </li>
                        </ul>
                    </div>
                    <img class="img-fluid" src="{{asset('images/logo1.png')}}" alt="" srcset="">

                </div>
                <div class="col-lg-4">
                    <div class="second-wrapper">
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
                                    <form action="{{ route('customer.register') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Full Name" name="name">
                                            @if ($errors->has('name'))
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Email ID" name="email">
                                            @if ($errors->has('email'))
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <div class="form_phone_number">
                                                <span>+977</span>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Mobile No." name="mobile">
                                                @if ($errors->has('mobile'))
                                                    <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form_group signUpinput_box_zee">
                                                <input type="password" class="form-control" id="password_field_signUp"
                                                    placeholder="Password" name="password">
                                                <i class="lar la-eye"></i>
                                            </div>
                                            @if ($errors->has('password'))
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            @endif
                                        </div>
                                        <div class="sign_up_msg">
                                            <p> <input type="checkbox" name="privacy" id="privacy" required> By signing up, you agree to the<a href=""> terms & conditions and
                                                    privacy policy</a> of Linkehill.com.np</p>
                                        </div>
                                        <div class="sign_up_button">
                                            <button type="submit" class="btn btn-danger">Sign Up</button>                                        
                                        </div>
                                    </form>                              
                                   
                                </div>
                                <div class="social-login mt-3">
                                    <p class="text-center">Or Sign Up with</p>
    
                                    <div class="social-btn-wrapper">
                                        <a href="{{route('facebookLogin')}}" class="btn facebook"><i class="lab la-facebook-f"></i><span class="ms-2">Facebook</span></a>
                                    <a href="{{route('googleLogin')}}" class="btn google"> <i class="lab la-google"></i><span class="ms-2">Google</span></a>
    
                                    </div>
                                </div>
                                <div class="d-flex login_register">
                                    
                                    <p class="">Already Registered??</p>
                                    <a href="{{route('customer.signin')}}" class="btn login_registerbtn">Login</a>
                                </div>
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
