@extends('website.layouts.app')

@section('content')
<section id="post_property_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="post_property_content_cover">
                   <div class="main_indexing_wrapper">
                   <div id="bread_crumb_wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a>/</li>
                                    <li><a href="#">Housing Park</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mHeader1">
                                <h1>Sell or Rent your Property</h1>
                                <p>We've over 15 Lac buyers and tenants for you!</p>
                            </div>

                            <div class="post_info_box">
                                <p>You are posting this property for <strike>Rs5000</strike> <span>FREE!</span></p>
                                <ul>
                                    <li><i class="las la-check"></i>Free Professional Photoshoot</li>
                                    <li><i class="las la-check"></i>Get Contact Details of upto 5 Responses</li>
                                    <li><i class="las la-check"></i>Access to 15 Lac Buyers & Tenants</li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="post_personal_detail">
                                <div class="post_header_sub">
                                    <h2>Personal Details</h1>
                                </div>

                                <div class="post_detail_checkbox">
                                    <span>I am</span>
                                    <div class="form-check">
                                        <input class="form-check-input post_input_field" type="radio" name="flexRadioDefault"
                                            id="owner_type" value="owner">
                                        <label class="form-check-label" for="owner_type">
                                            Owner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input post_input_field" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" value="agent">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Agent
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input post_input_field" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" value="builder">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Builder

                                        </label>
                                    </div>
                                </div>

                                <div class="post_property_form_wrapper" id="post_pp_property_id">
                                    <div class="mb_space">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your name">
                                    </div>
                                    <div class="mb_flex">
                                        <div class="flex_item_1">
                                            <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>+977</option>
                                            </select>
                                        </div>
                                        <div class="flex_item_2">
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Enter your mobile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb_space">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your email">
                                    </div>

                                </div>

                                <div class="post_header_sub">
                                    <h2>Property Details</h1>
                                </div>
                                <div class="post_detail_checkbox">
                                    <span>For</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Sale
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Rent/ Lease PG/Hostel
                                        </label>
                                    </div>

                                </div>
                                <div class="get_property_detail">
                                    <label for="exampleFormControlInput1" class="form-label">Property Type</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select Property Type</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="post_header_sub">
                                    <h2>Property Details</h1>
                                </div>
                                <div class="post_property_form_wrapper">
                                    <div class="mb_space">
                                        <label for="exampleFormControlInput1" class="form-label">City</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter city">
                                    </div>
                                    <div class="mb_space">
                                        <label for="exampleFormControlInput1" class="form-label">Locality</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your Locality">
                                    </div>

                                </div>

                                <div class="post_property_check_option">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        I am posting this property 'exclusively' on linkedhill

                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        I agree to Magicbricks T&C, Privacy Policy, & Cookie Policy
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        I want to receive responses on  Whatsapp

                                        </label>
                                    </div>

                                </div>

                                <div class="post_submit_button_cover">
                                    <button class="btn btn-danger">Login & Post Property</button>
                                </div>


                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- blank area -->
            </div>
        </div>
    </div>
</section>
@endsection

