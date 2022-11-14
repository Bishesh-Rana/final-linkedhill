@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-5 text-center first">
                            <h3>Seller Login</h3>
                           <p>Login First to list your property.</p>
                           <img class="img-fluid" src="{{asset('images/logo1.png')}}" alt="" srcset="">
                        </div>
                        <div class="col-md-4 m-auto">
                            <div class="sign_up_in_wrapper">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">                                    
                                        <div class="mb-3 col-md-12">
                                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Email Address" name="email">
                                            @if ($errors->has('email'))
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            @endif
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <div class="form_group">
                                                <input type="password" class="form-control" id="txtPassword"
                                                    placeholder="Password" name="password">
                                                    <a class="forgot toggle_pwd" href="{{route('customer.forgot')}}">Forgot??</a>
                                            </div>
                                            @if ($errors->has('password'))
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            @endif
                                        </div>

                                    </div>

                                   
                                    <div class="sign_up_button">
                                        <button type="submit" class="btn btn-danger">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex login_register">
                                <p class="">New Seller ??</p>
                                <a href="{{route('agent.getRegistration')}}" class="btn login_registerbtn">Signup</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($message = Session::get('success'))
        @push('scripts')
            <script>
                Lobibox.notify('success', {
                    size: 'mini',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    width: 400,
                    rounded: true,
                    msg: '{{ $message }}',
                    delay: 3000,
                    delayIndicator: false,
                });
            </script>
        @endpush
    @endif
@endsection
@push('scripts')
<script>
    function changeType() {
        var type = $("input[name='type']:checked").val();
        console.log(type);
        if (type== 2 || type == 4) {
            $("input[name='name']").attr('placeholder','Company Name');
            $("input[name='idnumber']").attr('placeholder','Company Registration NUmber');

        } else {
            $("input[name='name']").attr('placeholder','Full Name');
            $("input[name='idnumber']").attr('placeholder','Government ID Number');
            
        }

        $(".company").toggle();
    }
    $(function() {
        $("#toggle_pwd").click(function() {
            $(this).toggleClass("la-eye la-eye-slash");
            var type = $(this).hasClass("la-eye-slash") ? "text" : "password";
            $("#txtPassword").attr("type", type);
        });
    });
</script>
@endpush
