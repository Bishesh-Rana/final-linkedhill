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
                    <button class="carousel-control-prev" type="button" data-bs-target="#site_carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#site_carousel"
                        data-bs-slide="next">
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

        <section id="about_loan_info_wrapper" class="pt pb">
            <div class="container">
                <div class="row">
                    @foreach ($property_categories as $category)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="about_loan_thumbnail">
                                <div class="loan_images">
                                    <a href="{ route('front.search-properties', ['category_id' => $category->id]) }}"
                                        title="{{ $category->name }}">
                                        <img src="{{ image(@$category->icon) }}" alt="">
                                    </a>
                                </div>
                                <div class="loan-info">
                                    <h3><a
                                            href="{{ route('front.search-properties', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                    </h3>
                                    <a href="{{ route('front.search-properties', ['category_id' => $category->id]) }}"
                                        class="btns">View More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <x-advertisement-component direction="top" section="home_properties" :advertisement=$advertisement>
        </x-advertisement-component>

        <section id="premium_wrapper" class="pt pb">
            <div class="container">
                <div class="site_title text-center">
                    <h2>{{ $website->pro_title }}</h2>
                    <p><i>{{ $website->pro_sub_title }}</i></p>
                </div>
                {{-- @dd($properties[0]->features) --}}
                <div class="owl-carousel owl-theme feature-property">
                    @foreach ($properties as $property)
                        <div class="item">
                            <div class="premium_thumbnail">
                                <div class="premium_thumb_images">
                                    <div class="premium_images_wrap">
                                        <a href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}"
                                            title="{{ @$property->title }}">
                                            <img src="{{ image(optional($property->images->first())->name) }}"
                                                alt=""></a>
                                    </div>
                                    <div class="featured_in_wrapper">
                                        {{ $property->type }}
                                    </div>
                                    <div class="for_rent_in_wrapper">
                                        {{ $property->property_status }}
                                    </div>
                                    <div class="view_camera_in_wrapper">
                                        <i class="las la-camera"></i> {{ $property->images->count() }}
                                    </div>
                                </div>
                                <div class="premium_content_area">
                                    <h4><a
                                            href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">{{ @$property->title }}</a>
                                    </h4>
                                    <div class="position-relative">
                                        <b>{{ formattedNepaliNumber(@$property->start_price)}}</b>
                                        @if (auth()->user())
                                            <div class="favicon">
                                                @php
                                                    $data = auth()->user()->favProperties;
                                                @endphp
                                                {{-- @if (auth()->user()->favProperties->contains($property->id))
                                                    @dd(auth()->user()->favProperties )
                                                    @endif --}}
                                                @if (!empty($data))
                                                    @php
                                                        $count = 0;
                                                    @endphp
                                                    @foreach ($data as $fav)
                                                        @if ((int) $fav->property_id === (int) $property->id)
                                                            <a href="javascript:;" class="favorite{{ $property->id }}  fav"
                                                                data-id="{{ $property->id }}"><i
                                                                    class="las la-heart "></i></a>
                                                            @php
                                                                $count++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if ($count <= 0)
                                                        <a href="javascript:;" class="favorite{{ $property->id }}  fav"
                                                            data-id="{{ $property->id }}"><i class="lar la-heart "></i></a>
                                                    @endif
                                                @endif
                                            </div>
                                        @else
                                            <div onclick="favorite({{ $property->id }})" class="favicon">
                                                <a href="javascript:;" class="favorite{{ $property->id }}  fav"
                                                    data-id="{{ $property->id }}"><i class="lar la-heart "></i></a>
                                            </div>
                                        @endif
                                        <div class="sharethis-inline-share-buttons"></div>

                                    </div>

                                    <div class="property_address">
                                        <div class="text_tx_property">
                                            <i class="las la-map-marker-alt"></i>
                                            <span>{{ @$property->property_address }}</span>
                                        </div>
                                    </div>
                                    <div class="premium_options">
                                        <ul>
                                            @foreach($property->featureProperty as $feature)
                                            {{-- bed --}}
                                            @if (($feature->feature_id == 19)&&(isset($feature->value))) 
                                                <li>
                                                    <i class="las la-bed"
                                                        title="Bed"></i><span> {{rtrim($feature->value, "+")}}</span>
                                                </li>
                                            @endif
                                            {{-- bath --}}
                                            @if ( ($feature->feature_id == 20)&&(isset($feature->value)))
                                                <li>
                                                    <i class="las la-bath"
                                                        title="Bathroom"></i><span>{{rtrim($feature->value, "+")}}</span>
                                                </li>
                                            @endif
                                            {{-- park --}}
                                            @if ( ($feature->feature_id == 18)&&(isset($feature->value)))
                                            <li>
                                                <i class="las la-car" title="Parking"></i><span>{{rtrim($feature->value, "+")}}</span>
                                            </li>
                                            @endif
                                            @endforeach
                                            <li>
                                                <span title="Area">
                                                    <i
                                                        class="las la-crop-alt"></i>{{ $property->total_area . ' ' . $property->area_unit->name }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="premium_option">
                                        <a href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}"
                                            class="small_btn" style="margin-left: auto;">full info</a>
                                    </div>
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


        <section id="property_detail_wrapper" class="pt pb">
            <div class="container">
                <div class="site_title text-center">
                    <h2>{{ $website->second_pro_title }}</h2>
                    <p>{{ $website->second_pro_sub_title }}</p>
                </div>
                <x-frontend.property-type-component></x-frontend.property-type-component>
            </div>
        </section>
        <x-advertisement-component direction="bottom" section="home_properties_type" :advertisement=$advertisement>
        </x-advertisement-component>
        <x-advertisement-component direction="top" section="home_news" :advertisement=$advertisement>
        </x-advertisement-component>


        <section id="latest_property_wrapper" style="display:none;">
            <div class="container">
                <div class="site_title text-center">
                    <h2>Latest Property News</h2>
                    <p><i>We offers a wide variety of properties in Nepal.</i></p>
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
                                            <a href="{{ route('blog.single', $item->slug) }}">Read More <i
                                                    class="las la-arrow-right"></i></a>
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


        <section id="news_insights_wrapper" class="pt pb">
            <div class="container">
                <div class="site_title text-center">
                    <h2>{{ $website->blog_title }}</h2>
                    <p><i>{{ $website->blog_sub_title }}</i>
                    </p>
                </div>
                <div id="news_slider" class="owl-carousel owl-theme">
                    @foreach ($blogs as $item)
                        <div class="item">
                            <div class="news_content_wrapper">
                                <div class="news_flex_box">
                                    <div class="news_thumbnail">
                                        <img src="{{ image($item->image) }}" alt="">
                                    </div>
                                    <div class="news_detail">
                                        <h2>
                                            <a href="{{ route('blog.single', $item->slug) }}">{{ $item->title }}</a>
                                        </h2>
                                        <span class="date_wrap">
                                            <span>{{ $item->created_at->format('d-M-Y') }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

        <section id="assistance_wrapper" class="">
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
        <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=63888bce65735e001232d53a&product=inline-share-buttons&source=platform"
            async="async"></script>
        <script>
            var categoryProperty = function(category_id) {
                var uri = "{{ route('front.search-properties')}}";
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
        <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=638886b465735e001232d533&product=inline-share-buttons&source=platform"
            async="async"></script>
    @endpush

    @section('meta')
        @include('website.shared.meta', ['meta' => $meta])
    @endsection
