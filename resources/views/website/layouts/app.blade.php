<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedHill :{{ isset($pageTitle) ? $pageTitle : null }}</title>
    @yield('meta')
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/fonts/line-awesome-1.3.0/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/plugins/owl_carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/plugins/simple-lightbox/css/simple-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('website/lobibox/dist/css/lobibox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/select2/select2.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <header id="linkedHill_header_wrapper">
        {{-- <div class="linkedhill_top_ribbon">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="th_left_link">
                            <ul>
                                <li><a class="{{ (Route::getCurrentRoute()->slug=='Residential' || Route::currentRouteName()=='homepage' )? 'active' :'' }}" href="{{ route('propertytype','Residential') }}">Residential</a></li>
                                <li><a class="{{ (Route::getCurrentRoute()->slug=='Commercial')? 'active' :'' }}" href="{{ route('propertytype','Commercial') }}">Commercial</a></li>
                                <li><a class="{{ (Route::getCurrentRoute()->slug=='Agriculture')? 'active' :'' }}" href="{{ route('propertytype','Agriculture') }}">Agriculture</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="th_flex_wrap">
                            <div class="th_right_link">
                                <ul>
                                    <li><a href="mailto:{{ $website->alternate_email }}"><i class="las la-envelope"></i>{{ $website->alternate_email }}</a></li>
                                    <li><a href="tel:{{ $website->phone }}"><i class="las la-tty"></i>{{ $website->phone }}</a></li>
                                </ul>
                            </div>
                            <div class="th_right_other_link">
                                <ul>
                                    <li>
                                        <a href="{{ route('customer.signup') }}"> <span class="login_door"><i class="lar la-user"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="linked_hill_nav">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ image(config('websites.logo')) }}" alt=""><span class="brandname-front">Linked</span><span class="text-white navbar-brand brandname-back">hill</span>
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    @foreach ($header_menus as $menu)
                    @if ($menu->child_menu->count() > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ @$menu->name }} <i class="las la-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($menu->child_menu as $child_menu)
                                    <li><a class="dropdown-item" href="{{ route('menu', @$child_menu->slug) }}">{{ @$child_menu->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ route('menu', @$menu->slug) == request()->url() ? 'active' : '' }}" href="{{ route('menu', @$menu->slug) }}">{{ @$menu->name }}</a>
                        </li>
                    @endif
                @endforeach
                </ul>
                <div class="social_link d-flex">
                    <div class="me-2"> <a href="{{ route('customer.signup') }}"> <span class="login_door"><i class="lar la-user"></i>Login / Register</span></a>
                    </div>
                    <div>
                         <a href="{{ route('agent.getLogin') }}"> <span class="login_door"><i class="lar la-user"></i>List Property</span>
                    </a></div>
                    {{-- <ul>
                        <li><a class="facebook" href="{{ config('websites.fb_url') }}"><i class="lab la-facebook-f"></i></a></li>
                        <li><a class="instagram" href="{{ config('websites.instagram_url') }}"><i class="lab la-instagram"></i></a></li>
                        <li><a class="twitter" href="{{ config('websites.twitter_url') }}"><i class="lab la-twitter"></i></a></li>
                        <li><a class="youtube" href="{{ config('websites.youtube_url') }}"><i class="lab la-youtube"></i></a></li>
                    </ul> --}}
                </div>
              </div>
            </div>
          </nav>
    </header>
    <header id="site_header" style="display:none;">
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
                                            <li><a href="{{ route('front.search-properties', ['city_id' => $city->id]) }}">{{ $city->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mega_block">
                                        <p>Popular city</p>
                                        <ul>
                                            @foreach ($cities as $city)
                                                <li><a href="{{ route('front.search-properties', ['city_id' => $city->id]) }}">{{ $city->name }}</a></li>
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
                                    <li class="login_user_name"><span class="login_door"><i class="lar la-user"></i></span><span>Welcome
                                        </span><span>{{ Auth::guard('web')->user()->name }}</span></li>
                                @else
                                    <li><a href="{{ route('customer.signup') }}"><span class="login_door"><i class="lar la-user"></i></span></a></li>
                                @endif
                                <li><a href="{{ route('login') }}" class="btn btn-light">Post property <span class="badge">Free</span></a></li>
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
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ @$menu->name }} <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($menu->child_menu as $child_menu)
                                                <li><a class="dropdown-item" href="{{ route('menu', @$child_menu->slug) }}">{{ @$child_menu->name }}</a>
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
                                <li><a class="facebook" href="{{ config('websites.fb_url') }}"><i class="lab la-facebook-f"></i></a></li>
                                <li><a class="instagram" href="{{ config('websites.instagram_url') }}"><i class="lab la-instagram"></i></a></li>
                                <li><a class="twitter" href="{{ config('websites.twitter_url') }}"><i class="lab la-twitter"></i></a></li>
                                <li><a class="youtube" href="{{ config('websites.youtube_url') }}"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer id="site_footer">
        <div class="container">
            <div class="footer_top">
                <h3 style="z-index: 1">Subscribe to Our Newsletter.</h3>
                <div class="newsletter_form">
                    <form id="newsletter" name="newsletter">
                        @csrf
                        <div class="subscribe_form">
                            <input type="text" placeholder="Your email address" name="email" id="subscribeRmail">
                            <button type="submit" class="btn btn-info">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer_ft_left">
                        <a class="navbar-brand" href="{{ route('homepage') }}">
                            <img src="{{ image(config('websites.logo_footer')) }}"
                                alt="">
                                <span class="footer-brandname-front">Linked</span><span class="footer-brandname-back">hill</span>
                        </a>
                        <p>{!! @$website->short_description !!}</p>
                        <div class="follow_us">
                            <p>Follow Us:</p>
                            <ul>
                                <li><a href="{{ config('websites.fb_url') }}" target="_blank"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="{{ config('websites.twitter_url') }}" target="_blank"><i class="lab la-instagram"></i></a></li>
                                <li><a href="{{ config('websites.instagram_url') }}" target="_blank"><i class="lab la-twitter"></i></a></li>
                                <li><a href="{{ config('websites.youtube_url') }}" target="_blank"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="footer_list">
                                <h3><span>Get</span> in touch</h3>
                                <ul>
                                    <li><i class="las la-map-marker-alt"></i>{{ config('websites.address') }}</li>
                                    <li><a href="mailto:{{ config('websites.email') }}"><i class="las la-envelope"></i>{{ config('websites.email') }}</a>
                                    </li>
                                    <li><a href="tel:{{ config('websites.phone') }}"><i class="las la-mobile"></i>{{ config('websites.phone') }}</a>
                                    </li>
                                    <li></li>
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
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <p>Copyright &copy; 2022</p>
                    </div>
                    <div class="col-lg-6 col-md-6 text-end">
                        <p>Designed By: <a href="https://www.nectardigit.com/">Nectar Digit</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('website/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/plugins/owl_carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/plugins/simple-lightbox/js/simple-lightbox.js') }}"></script>
    <script src="{{ asset('website/js/script.js') }}"></script>
    <script src="{{ asset('website/lobibox/dist/js/notifications.min.js') }}"></script>
    <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('frontend/select2/select2.min.js') }}"></script>
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
                placeholder: "Search Suburb, postcode or state",
            });
        });
    </script>
    <script>
    </script>



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