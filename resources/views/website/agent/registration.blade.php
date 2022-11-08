@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <div class="sign_up_in_wrapper">
                                <h3>Agent Registration</h3>
                                <form action="{{ route('agent.postRegistration') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Agency Type</label>
                                        <input class="form-check-input" type="radio" name="type" id="type1" checked value="1"
                                            onclick="changeType()">
                                        <label class="form-check-label" for="type1">
                                            Individual
                                        </label>
                                        <input class="form-check-input" type="radio" name="type" id="type2" value="2"
                                            onclick="changeType()">
                                        <label class="form-check-label" for="type2">
                                            Company
                                        </label>
                                        @if ($errors->has('type'))
                                            <strong class="text-danger">{{ $errors->first('type') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Agency Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="name">
                                        @if ($errors->has('name'))
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="address">
                                        @if ($errors->has('address'))
                                            <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Website</label>
                                        <input type="url" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="website">
                                        @if ($errors->has('website'))
                                            <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3 company" style="display: none;">
                                        <label for="exampleFormControlInput1" class="form-label">Company Registration
                                            Number</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="company_reg_no">
                                        @if ($errors->has('company_reg_no'))
                                            <strong class="text-danger">{{ $errors->first('company_reg_no') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3 company" style="display: none;">
                                        <label for="exampleFormControlInput1" class="form-label">Company Logo</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="logo">
                                        @if ($errors->has('logo'))
                                            <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tel no.</label>
                                        <div class="form_phone_number">
                                            <span>+977</span>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="" name="agency_phone">
                                            @if ($errors->has('agency_phone'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('agency_phone') }}</strong>
                                            @endif
                                        </div>
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
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="" name="email">
                                        @if ($errors->has('email'))
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <div class="form_group">
                                            <input type="password" class="form-control" id="txtPassword" placeholder=""
                                                name="password">
                                            <i class="lar la-eye toggle_pwd"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                    <div class="sign_up_msg">
                                        <p>By clicking sign up, you agree to <a href="">the terms and conditions, privacy
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
