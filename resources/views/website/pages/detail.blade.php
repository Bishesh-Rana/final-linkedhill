@extends('website.layouts.app', ['pageTitle' => $property->title])
@section('meta')
    @include('website.shared.meta', ['meta' => $meta])
@endsection
@section('content')
<section id="bread_crumb_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a>/</li>
                    <li><a href="{{ url('/properties') }}">Properties</a>/</li>
                    <li><a href="#">{{ $property->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @if ($advertisement->count())
       <div class="container">
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
       </div>
    @endif
      <section id="detail_info_wrapper">
        <div class="container">
            <div class="row">
                @foreach ($property->images as $image)
                <div class="col-md-3">
                 <a class="elem" href="{{ image(@$image->name) }}"  data-lcl-thumb="{{ image(@$image->name) }}">
                     <span style="background-image: url({{ image(@$image->name) }});"></span>
                 </a>
                </div>
                 @endforeach
            </div>
        </div>
    </section>

    <section id="property_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="property_inner">
                                        <div class="main-price">
                                            <i class="las la-coins"></i><strong>RS. {{ $property->start_price }} </strong>
                                        </div>
                                      
                                        <div class="property_address">
                                            <div class="text_tx_property">
                                                <span><i class="las la-map-marker-alt"></i></span>
                                                <span>{{ @$property->property_address }}</span>
                                            </div>
                                        </div>
                                        <div class="detail_property_owner">
                                            @if ($property->bed !== 0)
                                                <span title="bedroom" class="detail_icon_"><i class="las la-bed"></i><span
                                                        class="type_badge">{{ $property->bed }}</span></span>
                                            @endif
                                            @if ($property->bath !== 0)
                                                <span title="bathroom" class="detail_icon_"><i class="las la-bath"></i>
                                                    <span class="type_badge">{{ $property->bath }}</span></span>
                                            @endif
                                            {{-- @if (array_key_exists('park', $property)) --}}

                                            @if ($property->park !== 0)
                                            <span title="Parking" class="detail_icon_"><i class="las la-car"></i>
                                                <span class="type_badge">{{ $property->park }}</span></span>
                                            @endif
                                            <span title="{{ $property->total_area . ' ' . $property->area_unit->name }}"class="detail_icon_">
                                                <i class="las la-crop-alt"></i>
                                                <span class="type_badge">{{ $property->total_area . ' ' . $property->area_unit->name }}</span>
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <h1>{{ @$property->title }}</h1>
                                        </div>
                                        <div class="top_tv_verified mt-3">
            
                                            @isset($property->type)
                                                <span><i class="las la-check"></i>{{ $property->type }}</span>
                                            @endisset
                                            <span><i class="las la-check"></i>{{ @$property->property_facing }}
                                            </span>
                                            @if ($property->negotiable == false)
                                                @isset($property->negotiable)
                                                @endisset
                                            @else
                                                @if ($property->negotiable == true)
                                                    @isset($property->negotiable)
                                                        <span><i class="las la-check"></i>NEGOTIABLE</span>
                                                    @endisset
                                                @endif
                                            @endif
                                            @if ($property->insurance !== false)
                                                @isset($property->insurance)
                                                    <span><i class="las la-check"></i>Insurance</span>
                                                @endisset
                                            @endif
            
                                            @if ($property->user->is_active == 1)
                                                <span><i class="las la-check"></i>Verified Builder</span>
                                            @endif
            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="share-wrap">
                                    <div class="property_verified_ text-end">
                                        @if (auth()->user())
                                        <div class="favicon_detail ">
                                            @php
                                                $data = auth()->user()->favProperties;
                                            @endphp
                                            @if (auth()->user()->favProperties->contains($property->id))
                                                @dd(auth()->user()->favProperties)
                                            @endif
                                            @if (!empty($data))
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($data as $fav)
                                                    @if ((int) $fav->property_id === (int) $property->id)
                                                        <a style="color: black" href="javascript:;"
                                                            class="favorite{{ $property->id }}  fav"
                                                            data-id="{{ $property->id }}"><i
                                                                class="las la-heart "></i></a>
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($count <= 0)
                                                    <a href="javascript:;"
                                                        class="favorite{{ $property->id }}  fav"
                                                        data-id="{{ $property->id }}"><i
                                                            class="lar la-heart "></i></a>
                                                @endif
                                            @endif
                                        </div>
                                    @else
                                        <div onclick="favorite({{ $property->id }})" class="favicon_detail">
                                            <a href="javascript:;"
                                                class="favorite{{ $property->id }}  fav"
                                                data-id="{{ $property->id }}"><i
                                                    class="lar la-heart "></i></a>
                                        </div>
                                    @endif
                                       
                                    </div>
                                    <span class="sharethis-inline-share-buttons"></span>
                                </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="detail_scroll_spy_">
                                <!-- scroll spy start -->
                                <!-- Start Nav Section -->
                                <nav id="navbar_scroll_spy" class="navbar">
                                    <ul class="nav-menu">
                                        {{-- <li>
                                            <a data-scroll="Overview" href="#Overview" class="dot active">
                                                <span>Overview</span>
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a data-scroll="about" href="#about" class="dot">
                                                <span>Overview</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-scroll="specifications" href="#specifications" class="dot">
                                                <span>specifications</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a data-scroll="Amenities" href="#Amenities" class="dot">
                                                <span>Amenities</span>
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
                                {{-- <div id="Overview" class="section">
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
                                </div> --}}
                                <!-- End Home Section -->
                                <!-- Start About Me Section -->
                                <div id="about" class="section">
                                    <div class="containerWrapper">
                                        <div class="about_wrapper">
                                            <div class="about_aw_wrapper">
                                                <div class="spy_common_title">
                                                    <h1>Overview </h1>
                                                </div>
                                                {!! $property->property_detail !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                     <!-- Start Contact Section -->
                                     <div id="specifications" class="section">
                                        <div class="containerWrapper">
                                            <div class="content-wrapper">
                                                <div class="content">
                                                    <div class="specification_sw_wrapper">
                                                        <div class="spy_common_title">
                                                            <h1>Project specifications</h1>
                                                        </div>
                                                        <div class="specification_sc_content">                                                            
                                                            <div class="specification_sf_flex">
                                                                    {{-- <div class="specification_box">
                                                                        <span>Face Direction</span>
                                                                        <span>{{@$property->property_facing}}</span>
                                                                    </div> --}}
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
                                                                {{-- <img src="{{ image($amenity->image) }}" alt=""> --}}
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
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Contact Section -->
                                <!-- scroll spy End -->
                            </div>
                        </div>
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 relative_position">
                    <div class="detail_right_bar">
                        <div class="row">
                            {{-- @dd($property) --}}
                            <div class="col-12">
                                <iframe style="width: 100%;height:auto;" src="https://www.youtube.com/embed/{{$property->youtube_video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-lg-12">
                               <div class="right_bar">
                                <div class="map_container">
                                    <div class="over_view_bottom_flex" id="hello">
                                    </div>
                                </div>
                                <div class="builder_wrapper d-flex">
                                    <div class="profile"><img src="{{ asset('frontend/gallery/dummyprofile.png') }}" alt=""></div>
                                    <div style="width:50%;padding-left: 10px;">
                                        <p class="builder_name">{{ $property->user->name }}</p>
                                        <p class="builder_address"><span>Adress:</span>{{$property->user->full_address}} </p>
                                    </div>
                                   <div>
                                    <div class="icon_wrapper">
                                        <a href="tel:{{ @$property->user->mobile ?? @$property->user->phone }}"><i class="las la-phone"></i></a>
                                        {{-- <span>{{ @$property->user->mobile ?? @$property->user->phone }}</span> --}}
                                    </div>
                                   </div>
                                   <div>
                                    <div class="icon_wrapper" data-bs-toggle="modal" data-bs-target="#send_message_model">
                                        <i class="las la-envelope"></i>
                                    </div>
                                   </div>                                  
                                </div>
                               </div>
                            </div>

                           
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="near_nb_by_wrap">
                        <div class="spy_common_title">
                            <h1>Nearby Projects</h1>
                        </div>
                        <div class="near_by_property">
                            <div class="owl-carousel" id="nearby_slider">
                                @foreach ($related as $relate)
                                    <div>
                                        <div class="near_by_thumbnail">
                                            <a
                                                href="{{ route('property.detail', ['id' => $relate->id, 'slug' => $relate->slug]) }}"><img
                                                    src="{{ image(@$relate->images->first()->name) }}"
                                                    alt=""></a>
                                            <div class="near_by_content">
                                                <span>Rs. {{ $relate->start_price }}</span>
                                                <strong>{{ $relate->address }}</strong>
                                                <p><a
                                                        href="">{{ $relate->city->name }}</a>
                                                </p>
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
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name"
                                required>
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
    <div class="modal fade share_feedback" id="send_message_model" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Contact Builder</h1>
                    <form name="propertyEnquiry">
                        <div class="builder_bf_form">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Name" name="name" value="{{ old('name') }}">
                            </div>
                            <input type="hidden" name="propertyId" value="{{ $property->id }}"
                                readonly>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Email Id" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form_flex">
                                <div class="form_left">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="in" selected="">+977</option>
                                    </select>
                                </div>
                                <div class="form_right">
                                    <input type="text" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Mobile No."
                                        name="contact_info" value="{{ old('contact_info') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Subject" name="subject" value="{{ old('subject') }}">
                            </div>
                            {{-- <input type="hidden" name="subject" value="{{ $property->id }}" readonly> --}}

                            <div class="mb-3">
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Write Message"></textarea>
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
    <!-- START Modal report-->
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
    $(document).ready(function() {
        $(".fav").on('click', function() {
            var property = $(this).data('id');
            $.ajax({
                url: "{{ route('favorite') }}",
                type: 'get',
                data: {
                    property_id: property,
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $(".favorite" + property + ">.la-heart ").toggleClass("lar las");
                        alert(response.success);
                    } else {
                        alert(response.error);
                    }
                },
                error: function(response) {

                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
       
        // live handler
        lc_lightbox('.elem', {
            wrap_class: 'lcl_fade_oc',
            gallery : true,	
            thumb_attr: 'data-lcl-thumb', 
            skin: 'minimal',
            radius: 0,
            padding	: 0,
            border_w: 0,
        });	
    
    });
    </script>

    <script>
        $('#owl_banners').owlCarousel({
            loop: true,
            margin: 10,
            // nav:true,
            dots:true,
            dotsData:true,
            responsiveClass: true,
            navText: ["<i class='las la-angle-left'></i>", "<i class='las la-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                    },
                600: {
                    items: 1,
                    },
                1000: {
                    items: 1,
                    }
            }
        })
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
            width="100%" height="250px" style="border:0;" allowfullscreen="" loading="lazy"
            src = 'https://maps.google.com/maps?&amp;q="+
            ${encodeURIComponent(addr)} +
                "&amp;output=embed'></iframe>`;
            $('#hello').append(embed);
        })
        // $("#favourite").on("click", function(e) {
        //     token = "{{ optional(auth()->user())->access_token }}";
        //     if (!token) {
        //         alert('log in first');
        //         return false;
        //     }
        //     $.ajax({
        //         url: '{{ url('api/toggle-favourites') }}',
        //         type: 'post',
        //         dataType: 'json',
        //         data: {
        //             'property_id': '{{ $property->id }}'
        //         },

        //         headers: {
        //             "Authorization": "Bearer " + token
        //         },
        //         success: function(response) {
        //             console.log(response);
        //             Lobibox.notify('success', {
        //                 size: 'mini',
        //                 showClass: 'fadeInDown',
        //                 hideClass: 'fadeUpDown',
        //                 width: 400,
        //                 rounded: true,
        //                 msg: response.message,
        //                 delay: 3000,
        //                 delayIndicator: false,
        //             });
        //         }
        //     });
        // });
    </script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=637c810e6fa502001965eddb&product=inline-share-buttons&source=platform" async="async"></script>
@endpush