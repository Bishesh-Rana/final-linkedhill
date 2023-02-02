<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkedhill :{{ isset($pageTitle) ? $pageTitle : null }}</title>
    @yield('meta')
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/fonts/line-awesome-1.3.0/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/plugins/owl_carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/plugins/simple-lightbox/css/simple-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('website/lobibox/dist/css/lobibox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/select2/select2.min.css') }}" rel="stylesheet">
    {{-- gallery jquery --}}

    <link rel="stylesheet" href="{{ asset('website/css/lc_lightbox.css') }}" />
    <!-- SKINS -->
    <link rel="stylesheet" href="{{ asset('website/css/minimal.css') }}" />
    @stack('styles')
</head>

<body>

    <header id="linkedHill_header_wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="linked_hill_nav">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ image(config('websites.logo')) }}" alt=""><span
                                class="brandname-front">Linkedhill</span>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @foreach ($header_menus as $menu)
                                @if ($menu->child_menu->count() > 0)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ @$menu->name }} <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($menu->child_menu as $child_menu)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menu', @$child_menu->slug) }}">{{ @$child_menu->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link {{ route('menu', @$menu->slug) == request()->url() ? 'active' : '' }}"
                                            href="{{ route('menu', @$menu->slug) }}">{{ @$menu->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="header-btn">
                        <ul>
                            <li>
                                <a href="{{ route('customer.signin') }}">
                                    <i class="lar la-user"></i>Login / Register
                                </a>
                            </li>
                            <li class="badge-item">
                                <a href="{{ route('agent.getLogin') }}">
                                    <i class="las la-home"></i>List Property
                                </a>
                                <span class="badge badge-light">Free</span>
                            </li>
                        </ul>
                    </div>
                    <div class="header-mobile-btn">
                        <ul>
                            <li><a href="{{ route('customer.signin') }}"><i class="las la-user"></i></a></li>
                            <li><a href="{{ route('agent.getLogin') }}"><i class="las la-home"></i></a></li>
                        </ul>
                        <div class="toggle-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- <header id="site_header" style="display:none;">
        <div class="header_ribbon">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-3 col-xs-12">
                        <div class="ribbon_flex">
                            <a class="navbar-brand desktop-only" href="{{ url('/') }}">
                                <img src="{{ image(config('websites.logo')) }}" alt="">
                                <span> {{ config('webisites.logo') }}</span>
                            </a>
                            <div class="ribbon_menu">
                                <a href="javascript:void(0);">
                                    <i class="las la-map-marker-alt"></i>
                                    {{ request('city_id') ? optional($cities->where('id', request('city_id'))->first())->name : config('websites.address') }}
                                    <i class="las la-angle-down"></i>
                                </a>
                                <div class="mega_menu">
                                    <div class="mega_block">
                                        <p>Nearby city</p>
                                        <ul>
                                            @foreach ($cities as $city)
                                                <li><a
                                                        href="{{ route('front.search-properties', ['city_id' => $city->id]) }}">{{ $city->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mega_block">
                                        <p>Popular city</p>
                                        <ul>
                                            @foreach ($cities as $city)
                                                <li><a
                                                        href="{{ route('front.search-properties', ['city_id' => $city->id]) }}">{{ $city->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12 text-end">
                        <div class="ribbon_right">
                            <ul>
                                @if (Auth::guard('web')->check())
                                    <li class="login_user_name"><span class="login_door"><i
                                                class="lar la-user"></i></span><span>Welcome
                                        </span><span>{{ Auth::guard('web')->user()->name }}</span></li>
                                @else
                                    <li><a href="{{ route('customer.signup') }}"><span class="login_door"><i
                                                    class="lar la-user"></i></span></a></li>
                                @endif
                                <li><a href="{{ route('login') }}" class="btn btn-light">Post property <span
                                            class="badge">Free</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg" id="site_navigation">
            <div class="container">
                <div class="toggle-option">
                    <a class="navbar-brand mobile-only" href="{{ url('/') }}">
                        <img src="{{ image(config('websites.logo')) }}" alt="">
                        <span> {{ config('webisites.logo') }}</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="header-navigation">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            @foreach ($header_menus as $menu)
                                @if ($menu->child_menu->count() > 0)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ @$menu->name }} <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($menu->child_menu as $child_menu)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menu', @$child_menu->slug) }}">{{ @$child_menu->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link {{ route('menu', @$menu->slug) == request()->url() ? 'active' : '' }}"
                                            href="{{ route('menu', @$menu->slug) }}">{{ @$menu->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="social_link">
                            <ul>
                                <li><a class="facebook" href="{{ config('websites.fb_url') }}"><i
                                            class="lab la-facebook-f"></i></a></li>
                                <li><a class="instagram" href="{{ config('websites.instagram_url') }}"><i
                                            class="lab la-instagram"></i></a></li>
                                <li><a class="twitter" href="{{ config('websites.twitter_url') }}"><i
                                            class="lab la-twitter"></i></a></li>
                                <li><a class="youtube" href="{{ config('websites.youtube_url') }}"><i
                                            class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header> --}}

    <!-- Mobile Menu -->
    <div id="mySidenav" class="sidenav">
        <div class="mobile-logo">
            <a href="{{ url('/') }}"><img src="{{ image(config('websites.logo')) }}" alt="logo"></a>
            <a href="javascript:void(0)" id="close-btn" class="closebtn">&times;</a>
        </div>
        <div class="no-bdr1">
            <ul id="menu1">
                @foreach ($header_menus as $menu)
                    @if ($menu->child_menu->count() > 0)
                        <li>
                            <a href="#" class="has-arrow">
                                {{ @$menu->name }}
                            </a>
                            <ul>
                                @foreach ($menu->child_menu as $child_menu)
                                    <li>
                                        <a href="{{ route('menu', @$child_menu->slug) }}">{{ @$child_menu->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('menu', @$menu->slug) }}">{{ @$menu->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Mobile Menu End -->


    @yield('content')


    <footer id="site_footer">
        <div class="container">
            <div class="footer_top">
                <h3 style="z-index: 1">Subscribe to Our Newsletter.</h3>
                <div class="newsletter_form">
                    <form id="newsletter" name="newsletter">
                        @csrf
                        <div class="subscribe_form">
                            <input type="text" placeholder="Your email address" name="email"
                                id="subscribeRmail">
                            <button type="submit" class="btn btn-info">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer_ft_left">
                        <a class="navbar-brand" href="{{ route('homepage') }}">
                            <img src="{{ image(config('websites.logo_footer')) }}" alt="">
                            <span class="footer-brandname-front">Linkedhill</span>
                        </a>
                        {{-- <p>{!! @$website->short_description !!}</p> --}}
                        <div class="follow_us">
                            <p>Follow Us:</p>
                            <ul>
                                <li><a href="{{ config('websites.fb_url') }}" target="_blank"><i
                                            class="lab la-facebook-f"></i></a></li>
                                <li><a href="{{ config('websites.twitter_url') }}" target="_blank"><i
                                            class="lab la-instagram"></i></a></li>
                                <li><a href="{{ config('websites.instagram_url') }}" target="_blank"><i
                                            class="lab la-twitter"></i></a></li>
                                <li><a href="{{ config('websites.youtube_url') }}" target="_blank"><i
                                            class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="footer_list">
                                <h3><span>Get</span> in touch</h3>
                                <span class="text-white footer_span">For general enquiries : </span>
                                <ul>
                                    {{-- <li><i class="las la-map-marker-alt"></i>{{ config('websites.address') }}</li> --}}
                                    <li><a href="mailto:{{ config('websites.email') }}"><i
                                                class="las la-envelope"></i>{{ config('websites.email') }}</a>
                                    </li>
                                    <li><a href="mailto:marketing@linkedhill.com.np"><i
                                                class="las la-envelope"></i>marketing@linkedhill.com.np</a>
                                    </li>
                                    <li><a href="mailto:agents@linkedhill.com.np"><i
                                                class="las la-envelope"></i>agents@linkedhill.com.np</a>
                                    </li>
                                    <li><a href="mailto:careers@linkedhill.com.np"><i
                                                class="las la-envelope"></i>careers@linkedhill.com.np</a>
                                    </li>
                                    {{-- <li><a href="tel:{{ config('websites.phone') }}"><i class="las la-mobile"></i>{{ config('websites.phone') }}</a> </li> --}}
                                </ul>


                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer_list">
                                <h3><span>Quick</span> menu</h3>
                                <ul class="quick_menu">
                                    @foreach ($footer_menus as $menu)
                                        <li><a href="{{ route('menu', $menu->slug) }}">{{ @$menu->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 text-center">
                        <p>&copy;Linkedhill Nepal. All Rights Reserved.2022</p>
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 text-end">
                        <p>Designed By: <a href="https://www.nectardigit.com/">Nectar Digit</a>.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('website/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/plugins/owl_carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/plugins/simple-lightbox/js/simple-lightbox.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('website/js/script.js') }}"></script>
    <script src="{{ asset('website/lobibox/dist/js/notifications.min.js') }}"></script>
    <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('frontend/select2/select2.min.js') }}"></script>
    {{-- jqueryy gallery --}}

    <script src="{{ asset('website/js/lc_lightbox.lite.js') }}" type="text/javascript"></script>

    <!-- ASSETS -->
    <script src="{{ asset('website/js/alloy_finger.min.js') }}" type="text/javascript"></script>

    <script>
        $("form[name='newsletter']").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('subscribe.us') }}',
                type: 'post',
                dataType: 'json',
                data: $('form#newsletter').serialize(),
                success: function(response) {
                    $('#newsletter').trigger("reset");
                    Lobibox.notify('success', {
                        size: 'mini',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        width: 400,
                        rounded: true,
                        msg: 'Subscribed successfully',
                        delay: 3000,
                        delayIndicator: false,
                    });
                }
            });
        });
    </script>
    <script>
        function getPropertyByCity(city_id) {
            console.log(city_id);
            var uri = "{{ route('front.search-properties') }}"
            $.ajax({
                url: uri,
                type: 'get',
                // dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    city_id: city_id
                },
                success: function(response) {
                    $('body').html(response);
                }
            });
        }
    </script>
    <script>
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            grid: true,
            min: 100000,
            max: 10000000,
            from: 200000,
            to: 5000000
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Search Suburb, Postcode or State",
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.multiple-facility').select2({
                placeholder: "Facilities",
            });
        });

        // setTimeout(function(){
        //     $('.alert').slideUp();
        // },3000);
    </script>
    <script></script>



    {{-- <script>
$(document).on({
    "contextmenu": function (e) {
        console.log("ctx menu button:", e.which);
        // Stop the context menu
        e.preventDefault();
    },
    "mousedown": function(e) {
        console.log("normal mouse down:", e.which);
    },
    "mouseup": function(e) {
        console.log("normal mouse up:", e.which);
    }
});
</script> --}}

    @stack('scripts')

</body>

</html>
