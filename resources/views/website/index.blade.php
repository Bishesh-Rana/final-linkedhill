    @extends('website.layouts.app')


    @section('content')
        <section id="linked_hill_carousel">
            <section id="site_banner_slider">
                <div id="site_carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ image($slider->image) }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#site_carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#site_carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <!-- start serch pannel -->
                    <!-- Start arrow down pannel -->
                    <div class="show_down_arrow">
                        <a href="#about_loan_info_wrapper"><i class="las la-angle-double-down"></i></a>
                    </div>
                    <!-- End arrow down pannel -->
                </div>
              
                @include('website.index._search')
                @include('website.index.advancesearch')
            </section>
        </section>
        <section id="site_banner_slider" style="display: none;">
            <div id="site_carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ image($slider->image) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#site_carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#site_carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <!-- start serch pannel -->
                <!-- Start arrow down pannel -->
                <div class="show_down_arrow">
                    <a href="#about_loan_info_wrapper"><i class="las la-angle-double-down"></i></a>
                </div>
                <!-- End arrow down pannel -->
            </div>
            @include('website.index._search')
        </section>
        <section id="about_loan_info_wrapper" class="cs_padding">
            <div class="container">
                <div class="row">
                    @foreach ($property_categories as $category)
                        <div class="col-lg-3 col-md-6">
                            <div class="about_loan_thumbnail text-center">
                                <div class="loan_images">
                                    <img src="{{ image(@$category->icon) }}" alt="">
                                </div>
                                <h3>{{ $category->name }}</h3>
                                <p>{{ Str::limit(strip_tags($category->description), 150, '...') }}</p>

                                <a href="{{ route('front.search-properties', ['category_id' => $category->id]) }}"
                                    class="btn btn-danger mb-2">Find a
                                    {{ $category->name }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <x-advertisement-component direction="top" section="home_properties" :advertisement=$advertisement>
        </x-advertisement-component>
        <section id="premium_wrapper" class="cs_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site_title text-center">
                            <h2>{{ $website->pro_title }}</h2>
                            <p><i>{{ $website->pro_sub_title }}</i></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- start thumbnail -->
                    @foreach ($properties as $property)
                        <div class="col-lg-4 col-md-6">
                            <div class="premium_thumbnail">
                                <div class="premium_thumb_images">
                                    <div class="premium_images_wrap">
                                        <a href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">
                                            <img src="{{ image(optional($property->images->first())->name) }}" alt=""></a>
                                    </div>
                                    <div class="featured_in_wrapper">
                                        {{ $property->type }}
                                    </div>
                                    <div class="for_rent_in_wrapper">
                                        {{ $property->property_status }}
                                    </div>
                                    <div class="for_location_in_wrapper">
                                        <i class="las la-map-marker-alt"></i>
                                        <a href="">{{ @$property->property_address }}</a>
                                    </div>
                                    <div class="view_camera_in_wrapper">
                                        <i class="las la-camera"></i> {{ $property->images->count() }}
                                    </div>
                                </div>
                                <div class="premium_content_area">
                                    <a href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">
                                        <span>Rs. {{ @$property->start_price }}</span>
                                        <h4> {{ @$property->title }}</h4>
                                       
                                        <p> {{ getSummary($property->property_detail) }} </p>
                                        <div class="premium_option">
                                            <div>
                                                @if($property->bed !==0)
                                                <span><span class="badge_count">{{ $property->bed }}</span><i class="las la-bed" title="Bed"></i></span>@endif
                                                @if($property->bath !==0)
                                                <span><span class="badge_count">{{ $property->bath }}</span><i class="las la-bath" title="Bathroom"></i></span>@endif
                                                <span>
                                                    <i class="las la-crop-alt"></i>{{ $property->total_area . ' ' . $property->area_unit->name }}
                                                </span>
                                            </div>
                                            <span class="small_btn">full info</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <x-advertisement-component direction="bottom" section="home_properties" :advertisement=$advertisement>
        </x-advertisement-component>
        <x-advertisement-component direction="bottom" section="home_properties_type" :advertisement=$advertisement>
        </x-advertisement-component>
        <section id="property_detail_wrapper" class="cs_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site_title text-center">
                            <h2>{{ $website->second_pro_title }}</h2>
                            <p>{{ $website->second_pro_sub_title }}</p>
                        </div>
                    </div>
                </div>
                <x-frontend.property-type-component></x-frontend.property-type-component>

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
            </div>
        </section>
        <x-advertisement-component direction="bottom" section="home_properties_type" :advertisement=$advertisement>
        </x-advertisement-component>
        <x-advertisement-component direction="top" section="home_news" :advertisement=$advertisement>
        </x-advertisement-component>
        <section id="latest_property_wrapper" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site_title text-center">
                            <h2>Latest Property News</h2>
                            <p><i>We offers a wide variety of properties in Kathmandu and in Nepal.</i></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($news->take(3) as $item)
                            <div class="latest_blog_">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="latest_blog_thumbnail">
                                            <img src="{{ image($item->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="latest_blog_content">
                                            <h1 class="text-capitalize"><a
                                                    href="{{ route('blog.single', $item->slug) }}">{{ $item->title }}</a>
                                            </h1>
                                            <span>By Admin
                                            </span>
                                            <p>{{ Str::limit(strip_tags($item->description), 100, '...') }}</p>
                                            <a href="{{ route('blog.single', $item->slug) }}">Read More <i class="las la-arrow-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (!empty($news->skip(3)->first()))
                        <div class="col-lg-4">
                            <div class="latest_blog_side">
                                <div class="latest_side_thumbnail">
                                    <img src="{{ image(@$news->skip(3)->first()->image) }}" alt="">
                                </div>
                                <div class="latest_blog_side_content">
                                    <span>
                                        @foreach (@$news->skip(3)->first()->categories as $category)
                                            {{ @$category->name }} &nbsp;&nbsp;
                                        @endforeach
                                    </span>
                                    <h1>{{ @$news->skip(3)->first()->title }}</h1>
                                    <a href="{{ route('blog.single', $item->slug) }}">Read More <i
                                            class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <x-advertisement-component direction="bottom" section="home_news" :advertisement=$advertisement>
        </x-advertisement-component>
        <x-advertisement-component direction="top" section="home_blogs" :advertisement=$advertisement>
        </x-advertisement-component>
        <section id="news_insights_wrapper" class="cs_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site_title text-center">
                            <h2>{{ $website->blog_title }}</h2>
                            <p><i>{{$website->blog_sub_title }}</i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11 m-auto">
                        <div id="news_slider" class="owl-carousel">
                            @foreach ($blogs as $item)
                                <div>
                                    <div class="news_content_wrapper">
                                        <div class="news_flex_box">
                                            <div class="news_thumbnail">
                                                <img src="{{ image($item->image) }}" alt="">
                                            </div>
                                            <div class="news_detail">
                                                <div class="new_inner_title">

                                                </div>
                                                <h2><a href="{{ route('blog.single', $item->slug) }}">{{ $item->title }}</a>
                                                </h2>
                                                <span class="date_wrap"><span>{{ $item->created_at->format('d-M-Y') }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-advertisement-component direction="bottom" section="home_blogs" :advertisement=$advertisement>
        </x-advertisement-component>
        <section id="service_wrapper" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service_thumb">
                            <div class="service_image">
                                <img src="{{ asset('') }}website/images/familyhome.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="service_content">
                            <div class="sc_title_wrapper">
                                <span>Core</span>
                                <h2>Services</h2>
                            </div>
                            <div class="slider_wrapper">
                                <div class="owl-carousel" id="service_slider">
                                    @foreach ($services as $item)
                                        <div class="tools_option">
                                            <div class="tool_images_wrap">
                                                <img src="{{ image($item->image) }}" alt="">
                                            </div>
                                            <div class="tools_description">
                                                <h5>{{ $item->name }}</h5>
                                                <p>{{ getSummary($item->description) }}</p>
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
        {{-- <section id="price_and_planing_wrapper" class="cs_top_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div id="price_plan" class="owl-carousel">

                            @foreach ($pricings as $pricing)
                                <div>
                                    <div class="pricingPlan_card">
                                        <span>{{ $pricing->title }}</span>
                                        <h1>Rs {!! $pricing->priceFormat !!}</h1>
                                        <p>{!! $pricing->description !!}</p>
                                        <ul>
                                            @foreach ($pricing->features as $item)
                                                <li><i class="lar la-check-circle"></i>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                        <a href="#" class="btn btn-danger">Purchase</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section id="assistance_wrapper" class="cs_bottom_padding">
            <div class="container">
                <div class="ass_inner_wrapper">
                    <div class="row">
                        <div class="col-lg-8">
                            <p>Need Assistance? Your wish is our command.</p>
                            <h1>We'll help you <span>find the right property</span></h1>
                        </div>
                        <div class="col-lg-4">
                            <div class="assistance_flex">
                                <a href="{{ url('properties') }}" class="btn">View All Property</a>
                                {{-- <span class="help_text">in less than 1 minute</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="iframe_chat_box">
            <a href="#" data-bs-toggle="modal" data-bs-target="#chat_box_model">
                <i class="lab la-rocketchat"></i>
            </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="chat_box_model" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="iframe_wrap">
                            <iframe src="https://chat.linkedhill.com.np/chat-application" class="first"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('styles')
        <style>
            .iframe_chat_box {
                position: fixed;
                bottom: 10px;
                right: 6px;
                z-index: 99;
            }

            .iframe_chat_box a i {
                font-size: 54px;
                background-color: #dbdbdb;
                border-radius: 50%;
                padding: 15px;
                color: #e4002b
            }

            .iframe_wrap iframe {
                width: 371px;
                height: 516px;
                background-color: white;
            }

            #chat_box_model .modal-dialog {
                max-width: 388px;
            }

            #chat_box_model .modal-content {
                background-color: transparent;
                border-color: transparent;
                padding-left: 15px;
                padding-top: 44px;
            }

            div#chat_box_model .btn-close {
                background-color: #03d4e9;
                opacity: 1;
                border-radius: 50px;
                padding: 10px;
                position: absolute;
                top: 23px;
                right: 0px;
                Z-INDEX: 99999;
                filter: invert(1);
            }

            div#chat_box_model {
                top: unset;
                left: unset;
                width: unset;
                bottom: 0;
                right: 7px;
                height: unset;
            }

            div#chat_box_model .modal-dialog {
                margin: 0;
            }

            div#chat_box_model .modal-body {
                padding: 0;
            }

        </style>
    @endpush
    @push('scripts')
        <script>
            var categoryProperty = function(category_id) {
                var uri = "{{ route('front.search-properties') }}";
                $.ajax({
                    url: uri,
                    type: 'post',
                    // dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_id: category_id
                    },
                    success: function(response) {
                        $('body').html(response);

                    }
                });
            }
        </script>
        <script src="{{ asset('frontend/js/search.js') }}"></script>
        <script type="text/javascript">
            $(function() {
                var iframe = $('iframe.first');
                var nxtiframe = iframe.find('iframe');
                nxtiframe.addClass('test');
            })
        </script>
    @endpush
    @section('meta')
        @include('website.shared.meta', ['meta' => $meta])
    @endsection
