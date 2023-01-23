<article class="modal fade login-form" id="login"  data-keyboard="false" tabindex="-1" role="dialog" >
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
                        <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                        <a href="#!" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="material-icons">close</span>
                        </a>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('login') }}" class="form" method="post">


                            @csrf
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" autofocus="" class="form-control @error('email') is-invalid @enderror" id="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if(\Session::has('error-email'))

                                    <p style="color: darkred;font-weight: bold;font-size: 12px">{{\Session::get('error-email')}}</p>

                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" id="pass" required>
                                <a href="#!" class="visibility input-group-text">
                                    <span class="material-icons">visibility_off</span>
                                </a>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if(\Session::has('error-password'))

                                        <p style="color: darkred;font-weight: bold;font-size: 12px">{{\Session::get('error-password')}}</p>

                                @endif
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="terms">
                                <label class="form-check-label para" for="terms">Remember Me</a> </label>
                                <!-- <label class="form-check-label para" for="terms">Aggree to our <a href="#">Terms and conditions</a> </label> -->
                            </div>
                            <div class="form-group">
                                <button type="submit">Login</button>
                            </div>

                        </form>
                        <p class="or"> <span>or</span></p>
                        {{--<button class="facebook"><img src="{{asset('frontend/gallery/ff.png')}}" alt="">  login with </button>--}}
                        {{--<button class="google"><img src="{{asset('frontend/gallery/gg.png')}}" alt=""> login with </button>--}}
                        {{--<p class="para"><a href="#"> Forgot Password?</a></p>--}}
                        <p class="mb-0 para">Don't have a account? <a href="{{route('sign.up')}}" class="link">Create account</a>.</p>

                    </div>
                </div>

            </div>


        </div>
    </div>
</article>
