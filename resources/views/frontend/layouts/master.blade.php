<!DOCTYPE html>
<html lang="en">
<head>
    @php
    $website = \App\Models\Website::first();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="msapplication-TileImage" content="./favicon/logo02.ico">
    <link rel="icon" type="image/png" href="{{asset('images/'.$website->favicon)}}" />
    @stack('metaTags')
    <title>@yield('title')</title>

    <!-- materailizeicon -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">

    <!-- fancybox -->
    <link rel="stylesheet" href="{{asset('frontend/css/fancybox/fancybox.min.css')}}">

    <!-- facebook -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="bkj44UEv"></script>

    <!-- slick -->
    <link rel="stylesheet" href="{{asset('frontend/css/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick/slick.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/node_modules/multiselect-master/styles/multiselect.css')}}">

    <!-- style -->

    @stack('css')
    {{--<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">--}}
    @if(Request::is('/'))
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        @else
        {{--<link rel="stylesheet" href="{{asset('frontend/css/otherstyle.css')}}">--}}
        <link rel="stylesheet" href="{{asset('frontend/css/otherstyle.css')}}">
    @endif
</head>
<body>

@include('frontend.layouts.nav')
@yield('content')
@include('frontend.layouts.footer')

@stack('scripts')
</body>
</html>
