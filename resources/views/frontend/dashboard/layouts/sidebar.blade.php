<div class="sidebar" data-active-color="green" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-mini">
            <img src="{{asset('dashboard/img/rsz_logo.png')}}" width="35px" height="30px" />
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            <b>Linkedhill</b>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('dashboard/img/default.png')}}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExamplePassword" class="collapsed">
                            <span>
                               {{Auth::user()->name}}
                                <b class="caret"></b>
                            </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse {{ (request()->is('change-profile*') || request()->is('change-password*')  )? 'in' : ''  }}" id="collapseExamplePassword">
                    <ul class="nav">
                        <li class="{{ (request()->is('change-profile*')) ? 'active' : '' }}">
                            <a href="{{route('changeProfile')}}">
                                <span class="sidebar-mini"></span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('change-password*')) ? 'active' : '' }}">
                            <a href="{{route('changePassword')}}">
                                <span class="sidebar-mini"></span>
                                <span class="sidebar-normal">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{Request::is('my-dashboard')? 'active':''}}">
                <a href="{{route('my.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{--<li class="{{Request::is('property*')? 'active':''}}">--}}
                {{--<a href="{{route('property.create')}}">--}}
                    {{--<i class="material-icons">business</i>--}}
                    {{--<p>Property</p>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="{{ (request()->is('property*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#users">
                    <i class="material-icons">business</i>
                    <p>Property</p>

                </a>
                <div class="collapse {{ (request()->is('property*'))||(request()->is('pending-property*'))||(request()->is('favourite-property*')) || (request()->is('assigned-properties*')) ? 'in' : ''  }}" id="users">
                    <ul class="nav">
                        <li class="{{ (request()->is('property/create')) ? 'active' : '' }}">
                            <a href="{{route('property.create')}}">

                                <span class="sidebar-normal">Add Property</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('property')) ? 'active' : '' }}">
                            <a href="{{route('property.index')}}">

                                <span class="sidebar-normal">All Properties</span>
                            </a>
                        </li>

                        @if(Auth::user()->hasAgency)
                            <li class="{{ (request()->is('assigned-properties*')) ? 'active' : '' }}">
                                <a href="{{route('property.assigned')}}">
                                    <span class="sidebar-normal">Property Assigned By User</span>
                                </a>
                            </li>
                        @endif


                        <li class="{{ (request()->is('pending-property')) ? 'active' : '' }}">
                            <a href="{{route('pending.property')}}">

                                <span class="sidebar-normal">Pending Properties</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('favourite-property')) ? 'active' : '' }}">
                            <a href="{{route('fav.property')}}">

                                <span class="sidebar-normal">My Favourite</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('property.index')}}">

                                <span class="sidebar-normal">Expired Properties</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="{{Request::is('agent/create')? 'active':''}}">
                <a href="{{route('agent.create')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Be An Agent</p>
                </a>
            </li>

            <li class="{{ (request()->is('agent*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#agents">
                    <i class="material-icons">contacts</i>
                    <p>Agency</p>

                </a>
                <div class="collapse {{ (request()->is('agent*')) ? 'in' : ''  }}" id="agents">
                    <ul class="nav">
                        <li class="{{ (request()->is('agent')) ? 'active' : '' }}">
                            <a href="{{route('agent.index')}}">

                                <span class="sidebar-normal">Select Agency</span>
                            </a>
                        </li>

                        {{--<li class="{{ (request()->is('agent/create')) ? 'active' : '' }}">--}}
                            {{--<a href="{{route('agent.create')}}">--}}

                                {{--<span class="sidebar-normal">Be An Agent</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                        <li class="{{ (request()->is('agent/applied-agency')) ? 'active' : '' }}">
                            <a href="{{route('my.agent')}}">
                                <span class="sidebar-normal">My  Agencies</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('agent/assign-property-to-agency')) ? 'active' : '' }}">
                            <a href="{{route('assign.agency')}}">
                                <span class="sidebar-normal">Property-Agent</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
