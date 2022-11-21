@extends('website.layouts.app')

@section('content')
    <section id="user-credential_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-5 text-center first">
                         
                            <h3>Seller Registration</h3>
                            <p>Register and add Your property for sale or rent.</p>
                            <img class="img-fluid" src="{{asset('images/logo1.png')}}" alt="" srcset="">
                        
                        </div>
                        <div class="col-md-7 m-auto">
                            <div class="sign_up_in_wrapper">
                                <form action="{{ route('agent.postRegistration') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Agency Type:- </label> <br>
                                        <div class="agent-type">
                                            {{-- <div  class="fortooltip ">
                                                <input class="form-check-input" type="radio" name="type" id="type1"
                                                    checked value="Property owner" onclick="changeType()">
                                                <label class="form-check-label" for="type1">
                                                    Property Owner
                                                    <button type="button" class="tooltipinfo">
                                                        <i class="las la-info"></i>
                                                    </button>
                                                </label>
                                                <div class="tooltipdefault">If You are owner of property.
                                                </div>
                                            </div> --}}
                                           
                                            <div class="fortooltip ">
                                                <input class="form-check-input" type="radio" name="type" data-client="realestate" id="type2"
                                                    value="Real Estate Company" onclick="changeType()">
                                                <label class="form-check-label" for="type2">Real Estate Company
                                                    <button type="button" class="tooltipinfo" data-toggle="tooltip"
                                                        data-placement="top"  data-html="true" title="Licensed under Nepal Government and with more then 1 employees.">
                                                        <i class="las la-info"></i>
                                                    </button></label>
                                            </div>
                                            <div class="fortooltip ">
                                                <input class="form-check-input" type="radio" data-client="individualagent" name="type" id="type3"
                                                    value="Individual Agent" onclick="changeType()">
                                                <label class="form-check-label" for="type3">
                                                    Individual Agent <button type="button" class="tooltipinfo"
                                                        data-toggle="tooltip" data-placement="top" data-html="true" title="Licensed under Nepal Government rules & regulations and a single employee or work for himself/herself.">
                                                        <i class="las la-info"></i>
                                                    </button>
                                                </label>
                                            </div>
                                            <div class="fortooltip ">
                                                <input class="form-check-input" type="radio" name="type" data-client="builder" id="type4"
                                                    value="Builder/ Developer" onclick="changeType()">
                                                <label class="form-check-label" for="type4">
                                                    Builder/ Developer <button type="button" class="tooltipinfo"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-html="true" title="Licensed under Nepal Government rules & regulations and who Build or develops different sites & relating to upcoming projects.">
                                                        <i class="las la-info"></i>
                                                    </button>
                                                </label>
                                            </div>
                                        </div>

                                        @if ($errors->has('type'))
                                            <strong class="text-danger">{{ $errors->first('type') }}</strong>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Full Name" name="name" required>
                                            @if ($errors->has('name'))
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6">

                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Adress" name="address" required>
                                            @if ($errors->has('address'))
                                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <input type="url" class="form-control" id="exampleFormControlInput1"
                                                placeholder="website if any" name="website">
                                            @if ($errors->has('website'))
                                                <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6 registration">
                                            <input type="text" class="form-control " id="exampleFormControlInput1"
                                                placeholder="Government ID Number" name="idnumber">

                                            @if ($errors->has('company_reg_no'))
                                                <strong class="text-danger">{{ $errors->first('company_reg_no') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6 company" style="display: none;">
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Company Registration No." name="company_reg_no">
                                            @if ($errors->has('company_reg_no'))
                                                <strong class="text-danger">{{ $errors->first('company_reg_no') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="exampleFormControlInput1"
                                                placeholder="" name="logo">
                                            @if ($errors->has('logo'))
                                                <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                            @endif
                                        </div>
                                        
                                        
                                        <div class="mb-3 col-md-6 ">
                                            <label for="exampleFormControlInput1" class="form-label">PAN Card (scan copy)</label>
                                            <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="" name="pan">
                                            @if ($errors->has('pan'))
                                                <strong class="text-danger">{{ $errors->first('pan') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6 company" style="display: none;">
                                            <label for="companyregistration" class="form-label">Company Registration (scan
                                                copy)</label>
                                            <input type="file" class="form-control" id="companyregistration"
                                                placeholder="" name="companyregistration">
                                            @if ($errors->has('companyregistration'))
                                                <strong
                                                    class="text-danger">{{ $errors->first('companyregistration') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6 company" style="display: none;">
                                            <label for="taxclearance" class="form-label">Tax Clearance (scan copy)</label>
                                            <input type="file" class="form-control" id="taxclearance" placeholder=""
                                                name="taxclearance">
                                            @if ($errors->has('pan'))
                                                <strong class="text-danger">{{ $errors->first('pan') }}</strong>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form_phone_number">
                                                <span>+977</span>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Tel no." name="phone">
                                                @if ($errors->has('phone'))
                                                    <strong
                                                        class="text-danger">{{ $errors->first('agency_phone') }}</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form_phone_number">
                                                <span>+977</span>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Mobile no." name="mobile">
                                                @if ($errors->has('mobile'))
                                                    <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Email Address" name="email">
                                            @if ($errors->has('email'))
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            @endif
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <div class="form_group">
                                                <input type="password" class="form-control" id="txtPassword"
                                                    placeholder="Password" name="password">
                                                {{-- <i class="lar la-eye toggle_pwd"></i> --}}
                                            </div>
                                            @if ($errors->has('password'))
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="sign_up_msg">
                                        <p> <input class="me-2" type="checkbox" name="privacypolicy" id="privacypolicy" checked required> By clicking sign up, you agree to 
                                            <a href="#">the terms and conditions & privacy policy</a> of linkedhill.com.np</p>
                                    </div>
                                    <div class="sign_up_button">
                                        <button type="submit" class="btn btn-danger">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-3 text-center">
                                <p>Already Registred?? <a class="btn btn-success ms-2" href="{{route('agent.getLogin')}}">Login</a></p>
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
        var type = $("input[name='type']:checked").data('client');
        console.log(type);
        if (type== 'builder' || type == 'realestate') {
            $("input[name='name']").attr('placeholder','Company Name');
            // $("input[name='idnumber']").attr('placeholder','Company Registration Number');
            $(".company").show();
            $(".registration").hide();


        } else {
            $("input[name='name']").attr('placeholder','Full Name');
            $(".registration").show();
            // $("input[name='idnumber']").attr('placeholder','Government ID Number');
            $(".company").hide();
            
        }

       
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
