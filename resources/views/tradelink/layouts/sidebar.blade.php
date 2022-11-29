<style>
    .sidebar[data-active-color="green"] li.active>a {
        background-color: #1E90FF;
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(76 175 80 / 40%);
    }
</style>

<div class="sidebar" data-active-color="green" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

    @php
    $data = \App\Models\TradelinkWebsite::first();
    @endphp

    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-mini">
            <img src="{{asset('tradelink/'.$data->logo)}}" width="35px" height="30px" />
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            <b>{{$data->website_title}}</b>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{Auth::guard('tradelink_admin')->user()->image}}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExamplePassword" class="collapsed">
                            <span>
                                {{Auth::guard('tradelink_admin')->user()->name}}
                                <b class="caret"></b>
                            </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse {{ (request()->is('tradelink/tradelink-change-password*') || request()->is('tradelink/tradelink-edit-profile*')  )? 'in' : ''  }}" id="collapseExamplePassword">
                    <ul class="nav">
                        <li class="{{ (request()->is('tradelink/tradelink-change-password*')) ? 'active' : '' }}">
                            <a href="{{route('tradelink.change.password')}}">
                                <span class="sidebar-mini"></span>
                                <span class="sidebar-normal">Change Password</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('tradelink/tradelink-edit-profile*')) ? 'active' : '' }}">
                            <a href="{{route('tradelink.change.profile')}}">
                                <span class="sidebar-mini"></span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{Request::is('tradelink/dashboard')? 'active':''}}">
                <a href="{{route('tradelink.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="{{Request::is('tradelink/tradelink-setting')? 'active':''}}">
                <a href="{{route('tradelink.settings')}}">
                    <i class="material-icons">settings</i>
                    <p>Settings</p>
                </a>
            </li>



            <li class="{{Request::is('tradelink/vendor-list')? 'active':''}}">
                <a href="{{route('all.vendors')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Vendors</p>
                </a>
            </li>

            <li class="{{ (request()->is('service*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#agents">
                    <i class="material-icons">contacts</i>
                    <p>Service</p>

                </a>
                <div class="collapse {{ (request()->is('tradelink/service*')) ? 'in' : ''  }}" id="agents">
                    <ul class="nav">
                        <li class="{{ (request()->is('tradelink/service-category')) ? 'active' : '' }}">
                            <a href="{{route('service-category.index')}}">

                                <span class="sidebar-normal">Manage Service Category</span>
                            </a>
                        </li>


                        <li class="{{ (request()->is('tradelink/service-list/create')) ? 'active' : '' }}">
                            <a href="{{route('service-list.create')}}">
                                <span class="sidebar-normal">Add Service</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('tradelink/service-list')) ? 'active' : '' }}">
                            <a href="{{route('service-list.index')}}">
                                <span class="sidebar-normal">Manage Services</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="{{Request::is('tradelink/tradelink-subscriber*')? 'active':''}}">
                <a href="{{url('/tradelink/tradelink-subscriber')}}">
                    <i class="material-icons">list</i>
                    <p>Subscribers</p>
                </a>
            </li>
        </ul>
    </div>
</div>
