@extends('website.layouts.app')
@section('content')


<div id="user-credential_wrapper" class="site-content">
    <div class="container">
        <div class="row">
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="customer-login-form otp-form row">
                                    <div class="col-md-5 text-center first">
                                        <h3>Otp Verification for Registration</h3>
                                        <p>Register and List Your Properties.</p>
                                        <img class="img-fluid" src="{{asset('images/logo1.png')}}" alt="" srcset="">
                                    
                                    </div>
                                    <div id="customer_login" class="u-columns col-md-6 col2-set">
                                        <div class="u-column1">
                                            @if (Session::has('error'))
                                                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                                    {{ Session::get('error') }}</p>
                                            @endif
                                            <p>
                                                Please insert the 6 digit OTP that you received in the message.
                                            </p>
                                            <form method="post" action="{{route('verify',$customer->id)}}" class="woocomerce-form woocommerce-form-login login">
                                                @csrf
                                                <input type="hidden" class="input-text" name="name" value="{{$customer->name}}" required autofocus />

                                                <div class="form-group">
                                                    <input type="text" class="input-text" name="otp" value="" required autofocus />
                                                    <input class="woocommerce-Button button " type="submit" value="Verify & Login" name="login">
                                                    <label for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline"></label>
                                                </div>
                                                <p class="woocommerce-LostPassword lost_password mt-3">
                                                    Didn't get the message?  &nbsp; <input type="button"id="resend"href="{{route('customer.getOtp',$customer->id)}}"value="Resend Code"/> {{--{{route('customers.otp',[$customer->name , 'resend' => '1'])}}--}}
                                                <div class="countdown"></div>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="u-column2">
                                                <div class="register-benefits">
                                                    <h3>Sign up today and you will be able to :</h3>
                                                    <ul>
                                                        <li>Post Your Property.</li>
                                                        <li>Boost Your Property.</li>
                                                        <li>Keep a record of actions on your property.</li>
                                                    </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    $(document).on('click','#resend',function(){
        var timer2 = "1:00";

    var url=$(this).attr('href');
     var $this = $(this);
    $this.val('Please wait for 1 minute');
    $this.attr('disabled', true);

    setTimeout(function() {
        $this.attr('disabled', false);
        $this.val('Resend Code');
    }, 60000);

    var interval = setInterval(function() {
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('.countdown').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
        }, 1000);

        $.ajax({
        type: "GET",
        url: url,
        cache:false,

        success: function (response) {
        }
    });

    });
</script>


