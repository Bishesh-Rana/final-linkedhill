@php
    $data = \App\Models\Admin::find(1);
    $website = \App\Models\Website::find(1);
@endphp


<header class="header-class">
    <div class="section-rule">
        <nav class="nav nav-fill">
            <div class="nav__left d-flex">
                <li class="nav-list">
                    <a href="{{url('/')}}" class="logo">
                        <img src="{{asset('images/'.$website->logo)}}" alt="linkedhill">
                    </a>
                </li>
                <li class="nav-list d-flex d-lg-none hamburger">
                    <a href="#!" class="nav-item"><span class="material-icons" translate="no">menu</span></a>
                </li>
            </div>

            <div class="nav__right d-flex">
                <li class="nav-list">
                    <a href="tel:9845126278" class="nav-item"><span class="material-icons" translate="no">phone</span> {{$data->phone}}</a>
                </li>
                <li class="nav-list">
                    <a href="mailto:{{$website->email}}" class="nav-item"><span class="material-icons" translate="no">mail</span>{{$website->email}}</a>
                </li>
                <li class="nav-list">
                </li>
{{--                <li class="nav-list">--}}
{{--                    <a href="#" class="nav-item">Find Realtors</a>--}}
{{--                </li>--}}
{{--                <li class="nav-list">--}}
{{--                    <a href="#" class="nav-item">Help</a>--}}
{{--                </li>--}}

                    @auth



{{--                        <li class="nav-list"><a href="{{ route('my.dashboard') }}" class="text-sm text-gray-700 underline"><b>{{Auth::user()->name}}</b></a></li>--}}

                    @else

                        <li class="nav-list">
                            <a href="#" class="nav-item btn login" data-toggle="modal" data-target="#login">Login</a>
                        </li>

                        <li class="nav-list">
                            <a href="{{route('sign.up')}}" class="nav-item btn">Sign Up</a>
                        </li>

                    @endauth

                <li class="nav-list">
                    <div id="google_translate_element" class="nav-item login"></div>
                </li>



            </div>

        </nav>
    </div>
</header>
<div class="secondary-nav">
    <div class="section-rule">
        <nav class=" nav nav-fill">
            <li class="nav-list">
                <a href="{{url('/')}}" class="nav-item active">Home</a>
            </li>
            <li class="nav-list dropdown">
                <a href="#!" class="nav-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >About Us <i class="material-icons drop_arrow">expand_more</i></a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="" >

                    <a class="dropdown-item" href="{{url('our-company')}}">Our Company</a>
                    {{--<a class="dropdown-item" href="#">Our Team</a>--}}
                    <a class="dropdown-item" href="{{url('policies')}}">Policies</a>
                </div>
            </li>
            <li class="nav-list">
                <a href="{{url('properties')}}" class="nav-item">Property</a>
            </li>
            {{--<li class="nav-list">--}}
                {{--<a href="#" class="nav-item">Our Services</a>--}}
            {{--</li>--}}
            {{--<li class="nav-list">--}}
                {{--<a href="#" class="nav-item">News</a>--}}
            {{--</li>--}}
            {{--<li class="nav-list">--}}
                {{--<a href="#" class="nav-item">Listings</a>--}}
            {{--</li>--}}
            <li class="nav-list">
                <a href="{{url('news')}}" class="nav-item">News</a>
            </li>
            <li class="nav-list">
                <a href="{{url('blogs')}}" class="nav-item">Blogs</a>
            </li>
            <li class="nav-list">
            <a href="{{route('contactUs')}}" class="nav-item">Contact Us</a>
            </li>




            {{--<li class="nav-list">--}}
                {{--<a href="#" class="nav-item">Contact Us</a>--}}
            {{--</li>--}}
            <li class="nav-list">
                <a href="#" class="nav-item d-lg-none">Province Profile</a>
            </li>
            <li class="nav-list d-flex d-lg-none hamburger">
                <a href="#!" class="nav-item"><span class="material-icons" translate="no">close</span></a>
            </li>

            @auth

                <li class="nav-list dropdown">
                    <a href="#!" class="nav-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false" > <b> {{Auth::user()->name}} </b> <i class="material-icons drop_arrow">expand_more</i></a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="" >

                        <a class="dropdown-item" href="{{ route('my.dashboard') }}">My Dashboard</a>
                        {{--<a class="dropdown-item" href="#">Our Team</a>--}}
                        <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                    </div>
                </li>

            @endauth



        </nav>
    </div>
</div>








