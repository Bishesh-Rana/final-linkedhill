@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="sign_up_in_wrapper">
                                <h3>LOGIN</h3>
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
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="name@example.com" name="email">
                                    </div>
                                    <div class="mb-0">
                                        <label for="password_field" class="form-label">Password</label>
                                        <div class="form_group input_box_zee">
                                            <input type="password" class="form-control" id="password_field" placeholder=""
                                                name="password">
                                            <i class="lar la-eye"></i>
                                        </div>
                                    </div>
                                    <div class="forget_psw_Wrapper">
                                        <a href="#">Forget Password ?</a>
                                    </div>
                                    <div class="sign_in_button">
                                        <button class="btn btn-danger">Login</button>
                                    </div>
                                </form>
                                <div class="sign_in_or_text">
                                    <p>Or login with</p>
                                </div>
                                <div class="sign_in_other_link_wrapper">
                                    <a href="#" class="btn btn-facebook"><i class="lab la-facebook-f"></i>facebook</a>
                                    <a href="#" class="btn btn-google"><i class="lab la-google"></i>Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="sign_up_in_wrapper">
                                <h3>Sign up</h3>

                                <form action="{{ route('customer.register') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="name">
                                        @if ($errors->has('name'))
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="email">
                                        @if ($errors->has('email'))
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Mobile no.</label>
                                        <div class="form_phone_number">
                                            <span>+977</span>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="" name="mobile">
                                            @if ($errors->has('mobile'))
                                                <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_field_signUp" class="form-label">Password</label>
                                        <div class="form_group signUpinput_box_zee">
                                            <input type="password" class="form-control" id="password_field_signUp"
                                                placeholder="" name="password">
                                            <i class="lar la-eye"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                    <div class="sign_up_msg">
                                        <p>By clicking sign up, you agree to <a href="">the terms and conditions,
                                                privacy
                                                policy</a> of NepalHomes.com</p>
                                    </div>
                                    <div class="sign_up_button">
                                        <button type="submit" class="btn btn-danger">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="user_notice_wrapper">
                        <h3>{{ $website->login_title }}</h3>
                        <p>{{ $website->login_sub_title }}</p>

                        <ul class="list_info">
                            <li><i class="las la-home"></i><span>{{ $website->second_login_sub_title }}</span></li>
                            <li><i class="las la-user-friends"></i><span>{{ $website->third_login_sub_title }}</span></li>
                            <li><i class="las la-city"></i><span>{{ $website->four_login_sub_title }}</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
