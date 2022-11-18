@extends('website.layouts.app',['pageTitle'=>$property->title])
@section('meta')
    @include('website.shared.meta', ['meta' => $meta])
@endsection
@section('content')
@if ($advertisement->count())
<div class="ads_section_cover">
    <div class="row">
        <div class="col-lg-12">
            @foreach ($advertisement as $item)
            <div class="ads_wrap" {{ $item->display_size }}>
                <img src="{{ image($item->image) }}" alt="{{ $item->title }}">
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
    <section id="bread_crumb_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a>/</li>
                        <li><a href="#">{{ $property->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

 

    <section id="detail_info_wrapper">
        <div class="container">
            <div class="property_detail_wrapper mt-3">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property_inner">
                            <h1>{{ @$property->title }}</h1>
                            <p>by <a href="">{{ @$property->user->name }}</a></p>
                            <div class="main-price">
                                <i class="las la-coins"></i><strong>{{ $property->start_price }}</strong>
                            </div>
                            <div class="property_address">
                                <div class="text_tx_property">
                                    <span><i class="las la-map-marker-alt"></i></span>
                                    <span>{{ @$property->property_address }}</span>
                                </div>
                                <div class="button_tx_property">
                                    <a href="http://maps.google.com/?q={{ @$property->property_address }}"
                                        class="btn" target="_blank"><i class="las la-street-view"></i>Get
                                        Direction</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="property_verified_ text-end">
                            <ul>
                                @if(auth()->user())
                                    @if(!$property->favorite->isEmpty())
                                        @foreach($property->favorite as $favorite)
                                            @if($property->id == $favorite->property_id && auth()->user()->id == $favorite->user_id)
                                                <li><a href="#" id="favourite"><i class="las la-heart"></i></a></li>
                                            @else
                                                <li><a href="#" id="favourite"><i class="lar la-heart"></i></a></li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li><a href="#" id="favourite"><i class="lar la-heart"></i></a></li>
                                    @endif
                                @else
                                    <li><a href="#" id="favourite"><i class="lar la-heart"></i></a></li>
                                @endif
                                <li><a href="#"><i class="las la-share-alt-square"></i></a></li>
                            </ul>
                            @if ($property->user->is_active == 1)
                                <p><i class="las la-check"></i>Verified Builder</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="property_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="property_detail_images">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($property->images as $image)
                                            <div class="carousel-item {{ @$loop->first ? 'active' : '' }}">
                                                <a href="{{ image(@$image->name) }}" class="lightbox" title="">
                                                    <img src="{{ image(@$image->name) }}" alt="Thumbnail 1">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="detail_scroll_spy_">
                                <!-- scroll spy start -->
                                <!-- Start Nav Section -->
                                <nav id="navbar_scroll_spy" class="navbar">
                                    <ul class="nav-menu">
                                        <li>
                                            <a data-scroll="Overview" href="#Overview" class="dot active">
                                                <span>Overview</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-scroll="about" href="#about" class="dot">
                                                <span>About</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a data-scroll="Amenities" href="#Amenities" class="dot">
                                                <span>Amenities</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-scroll="specifications" href="#specifications" class="dot">
                                                <span>specifications</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-scroll="FAQ" href="#FAQ" class="dot">
                                                <span>FAQ</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- End Nav Section -->

                                <!-- Start Home Section -->
                                <div id="Overview" class="section">
                                    <div class="containerWrapper">
                                        <div class="content-wrapper">
                                            <div class="content">
                                                <div class="over_view_wrapper">
                                                    <div class="spy_common_title">
                                                        <h1>Overview</h1>
                                                    </div>
                                                    <div class="over_view_flex">
                                                        <div class="over_view_info">
                                                            <span>Total Area</span>
                                                            <p>{{ $property->total_area . ' ' . $property->area_unit->name }}
                                                            </p>
                                                        </div>
                                                        <div class="over_view_info">
                                                            <span>Price</span>
                                                            <p>NPR {{ @$property->start_price }} </p>
                                                        </div>
                                                    </div>
                                                    <div class="over_view_bottom_flex" id="hello">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Home Section -->
                                <!-- Start About Me Section -->
                                <div id="about" class="section">
                                    <div class="containerWrapper">
                                        <div class="about_wrapper">
                                            <div class="about_aw_wrapper">
                                                <div class="spy_common_title">
                                                    <h1>About - {{ $property->title }}</h1>
                                                </div>
                                                {!! $property->property_detail !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start Testimonials Section -->
                                <div id="Amenities" class="section">
                                    <div class="containerWrapper">
                                        <div class="content-wrapper">
                                            <div class="content">
                                                <div class="amenites_aw_wrapper">
                                                    <div class="spy_common_title">
                                                        <h1>Amenities</h1>
                                                    </div>
                                                    <div class="amenites_ac_content">
                                                        @foreach ($property->amenities as $amenity)
                                                            <div class="amenites_item">
                                                                <img src="{{ image($amenity->image) }}" alt="">
                                                                <span>{{ $amenity->name }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Testimonials Section -->

                                <!-- Start Contact Section -->
                                <div id="specifications" class="section">
                                    <div class="containerWrapper">
                                        <div class="content-wrapper">
                                            <div class="content">
                                                <div class="specification_sw_wrapper">
                                                    <div class="spy_common_title">
                                                        <h1>Details - {{ $property->title }}</h1>
                                                    </div>
                                                    <div class="specification_sc_content">
                                                        <h3>Project specifications</h3>
                                                        <div class="specification_sf_flex">
                                                                <div class="specification_box">
                                                                    <span>Face Direction</span>
                                                                    <span>{{@$property->property_facing}}</span>
                                                                </div>
                                                            @foreach ($property->features as $item)
                                                                <div class="specification_box">
                                                                    <span>{{ $item->title }}</span>
                                                                    <span>{!! @$item->pivot->value == 'true' ? '<i class="las la-check"></i>' : $item->pivot->value !!}</span>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="Amenities" class="section">
                                    <div class="containerWrapper">
                                        <div class="content-wrapper">
                                            <div class="content">
                                                <div class="amenites_aw_wrapper">
                                                    <div class="spy_common_title">
                                                        <h1>Facilities</h1>
                                                    </div>
                                                    <div class="amenites_ac_content">
                                                        @foreach ($property->facility as $facility)
                                                            <div class="amenites_item">
                                                                <span>{{ $facility->title }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="FAQ" class="section">
                                    <div class="containerWrapper">
                                        <div class="content-wrapper">
                                            <div class="content">
                                                <div class="faq_fw_wrapper">
                                                    <div class="spy_common_title">
                                                        <h1>FAQs - {{ $property->title }}</h1>
                                                    </div>
                                                    <div class="faq_accordian_wrapper">
                                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                                            @foreach ($property->faqs as $key => $faq)
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="flush-headingOne-{{ $key }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#flush-collapseOne-{{ $key }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="flush-collapseOne-{{ $key }}">
                                                                            {{ $faq->question }}
                                                                        </button>
                                                                    </h2>
                                                                    <div id="flush-collapseOne-{{ $key }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="flush-headingOne-{{ $key }}"
                                                                        data-bs-parent="#accordionFlushExample">
                                                                        <div class="accordion-body">
                                                                            {{ $faq->answer }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="near_nb_by_wrap">
                                                    <div class="spy_common_title">
                                                        <h1>Nearby Projects - {{ $property->title }}</h1>
                                                    </div>
                                                    <div class="near_by_property">
                                                        <div class="owl-carousel" id="nearby_slider">
                                                            @foreach ($related as $relate)
                                                                <div>
                                                                    <div class="near_by_thumbnail">
                                                                        <a href="{{ route('property.detail', ['id' => $relate->id, 'slug' => $relate->slug]) }}"><img src="{{ image(@$relate->images->first()->name) }}"
                                                                            alt=""></a>
                                                                        <div class="near_by_content">
                                                                            <span>Rs. {{ $relate->start_price }}</span>
                                                                            <strong>{{ $relate->address }}</strong>
                                                                            <p><a href="">{{ $relate->city->name }}</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Contact Section -->
                                <!-- scroll spy End -->
                            </div>
                        </div>
                        <div class="col-lg-12"></div>
                    </div>
                </div>
                <div class="col-lg-4 relative_position">
                    <div class="detail_right_bar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="builder_wrapper">
                                    <h1>Builder</h1>
                                    <p>{{ @$property->user->name }}</p>
                                    <span>{{ @$property->user->mobile ?? @$property->user->phone }}</span>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="builder_contact_form">
                                    <h1>Contact <span>Builder</span></h1>
                                    <form name="propertyEnquiry">
                                        <div class="builder_bf_form">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Name" name="name" value="{{ old('name') }}">
                                            </div>
                                            <input type="hidden" name="propertyId" value="{{ $property->id }}" readonly>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Email Id" name="email" value="{{ old('email') }}">
                                            </div>
                                            <div class="mb-3">
                                                <input type="time" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Prefered Time" name="" value="">
                                            </div>
                                            <div class="form_flex">
                                                <div class="form_left">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option value="in" selected="">+977</option>
                                                    </select>
                                                </div>
                                                <div class="form_right">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                                        placeholder="Mobile No." name="contact_info"
                                                        value="{{ old('contact_info') }}">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Subject" name="subject" value="{{ old('subject') }}">
                                            </div>
                                            {{-- <input type="hidden" name="subject" value="{{ $property->id }}" readonly> --}}

                                            <div class="mb-3">
                                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Write Message"></textarea>
                                              </div>

                                            <div class="form_eligibility">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1" required>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        I wish to share my information with builder.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form_fs_submit">
                                                <button class="btn btn-danger">Submit</button>
                                                <span>I agree to {{ config('websites.name') }} <a
                                                        href="#linkhill">T&C</a></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STAET builder inquire form model -->
    <!-- Modal -->
    <div class="modal fade builderForm_fb" id="contactBuilder" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Contact <span>Builder</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="builder_bf_form">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Email Id" required>
                        </div>
                        <div class="form_flex">
                            <div class="form_left">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="in" selected="">+977</option>
                                </select>
                            </div>
                            <div class="form_right">
                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Mobile No." required>
                            </div>
                        </div>
                        <div class="form_flex">
                            <div class="form_left">
                                <span> I am interested in</span>
                            </div>
                            <div class="form_right">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="57">APARTMENT</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_eligibility">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    I wish to check my Home Loan eligibility
                                </label>
                            </div>
                        </div>
                        <div class="form_fs_submit">
                            <button class="btn btn-danger">Submit</button>
                            <span>I agree to Homeonline <a href="#linkhill">T&C</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END builder inquire form model -->
    <!-- START Modal -->
    <div class="modal fade" id="Share_Feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Help us Understand the Problem!
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2><span>Share Feedback</span> (Select one)</h2>
                    <ul>
                        <li><a href="#">Incorrect Details</a></li>
                        <li><a href="#">Property Sold/Rented Out</a></li>
                        <li><a href="#">Report Spam</a></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                    <div class="model_form_wrapper">
                        <div class="mb-3">

                            <input type="text" class="form-control" id="Name" placeholder="Name">
                        </div>
                        <div class="mb-3">

                            <input type="email" class="form-control" id="Email_id" placeholder="Email Id">
                        </div>
                        <div class="mb-3">

                            <input type="email" class="form-control" id="mobile_number" placeholder="Mobile Number">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type your message"></textarea>
                        </div>
                        <a href="#" class="btn btn-danger">Submit</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection

@push('scripts')
    <script>
        $("form[name='propertyEnquiry']").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('store.enquiry') }}',
                type: 'post',
                dataType: 'json',
                data: $("form[name='propertyEnquiry']").serialize(),
                success: function(response) {
                    $('form[name="propertyEnquiry"').trigger("reset");
                    Lobibox.notify('success', {
                        size: 'mini',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        width: 400,
                        rounded: true,
                        msg: 'Enquiry Sent successfully',
                        delay: 3000,
                        delayIndicator: false,
                    });
                }
            });
        });
        $(document).ready(function() {
            var addr = '{{ $property->property_address }}';
            var embed = `<iframe
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            src = 'https://maps.google.com/maps?&amp;q="+
            ${encodeURIComponent(addr)} +
                "&amp;output=embed'></iframe>`;
            $('#hello').append(embed);
        })
        $("#favourite").on("click", function(e) {
            token = "{{ optional(auth()->user())->access_token }}";
            if (!token) {
                alert('log in first');
                return false;
            }
            $.ajax({
                url: '{{ url('api/toggle-favourites') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    'property_id': '{{ $property->id }}'
                },

                headers: {
                    "Authorization": "Bearer " + token
                },
                success: function(response) {
                    console.log(response);
                    Lobibox.notify('success', {
                        size: 'mini',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        width: 400,
                        rounded: true,
                        msg: response.message,
                        delay: 3000,
                        delayIndicator: false,
                    });
                }
            });
        });
    </script>
@endpush
