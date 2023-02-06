<div class="sidebar" data-active-color="green" data-background-color="white"
    data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-mini">
            <img src="{{ config('websites.logo') }}" width="30px" height="30px" />
        </a>
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            <b>{{ config('websites.name') }}</b>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ auth()->user()->profile ?? asset('images/profile/default-user.png') }}" />
            </div>
            <div class="info">
                {{-- <span>
                    {{ auth()->user()->name }}
                </span> --}}
                <a  href="{{ route('profile',auth()->user()->id) }}">
                    <span>
                        {{ auth()->user()->name }}
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="{{ Request::routeIs('profile') ? 'active' : '' }}">
                <a href="{{ route('profile',auth()->user()->id) }}">
                    <i class="material-icons">profile</i>
                    <p>Profile</p>
                </a>
            </li>
            @if(auth()->user()->hasRole('Customer'))
            <li class="{{ Request::routeIs('favorite.index') ? 'active' : '' }}">
                <a href="{{ route('favorite.index') }}">
                    <i class="material-icons">property</i>
                    <p>Favorite Property</p>
                </a>
            </li>
            @endif

            @foreach ($sidebars as $key => $sidebar)
                @canany($sidebar['permission'])
                    @if ($sidebar['child'])
                    {{-- {{  request()->routeIs($sidebar['title'].'*')}} --}}
                        <li class="{{ activeMenu($sidebar) }} active">
                            <a data-toggle="collapse" href="#{{ $key }}">
                                <i class="material-icons">{{ $sidebar['icon'] }}</i>
                                <p>{{ $sidebar['title'] }}
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse {{ activeMenu($sidebar) ? 'in' : '' }}" id="{{ $key }}">
                                <ul class="nav">
                                    @foreach ($sidebar['child'] as $child)
                                        <li
                                            class="{{ request()->is(str_replace(asset('/'), '', $child['href'])) ? 'active' : null }}">
                                            <a href="{{ $child['href'] }}">
                                                <span class="sidebar-normal">
                                                    <i class="material-icons">{{ $child['icon'] }}</i>

                                                    {{ $child['title'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @continue
                    @endif
                    <li class="{{ request()->is(str_replace(asset('/'), '', $sidebar['href'])) ? 'active' : null }}">
                        <a href="{{ $sidebar['href'] }}">
                            <i class="material-icons">{{ $sidebar['icon'] }}</i>
                            <p>{{ $sidebar['title'] }}</p>
                        </a>
                    </li>
                @endcanany
            @endforeach
            <li>
                <a href="{{route('logout')}}" title="logout">
                    <p class="">Logout <i class="material-icons">exit_to_app</i></p>
                    
                    
                </a>
            </li>
        </ul>
    </div>
</div>
