<div class="sidebar" data-active-color="green" data-background-color="white"
    data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-mini">
            <img src="{{asset('dashboard/img/rsz_logo.png')}}" width="100px" height="30px" />
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
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{auth()->user()->name}}
                        {{-- <b class="caret"></b>--}}
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{Request::is('admin/dashboard')? 'active':''}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            

            @if (auth()->user()->isSuperAdmin())

            <li class="{{ (request()->is('admin/city*'))}}">
                <a data-toggle="collapse" href="#city">
                    <i class="material-icons">location_on</i>
                    <p>City
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/city*')) ||(request()->is('admin/city*')) ? 'in' : ''  }}"
                    id="city">
                    <ul class="nav">

                        <li class="{{ (request()->is('admin/city/create')) ? 'active' : '' }}">
                            <a href="{{route('city.create')}}">

                                <span class="sidebar-normal">Add City</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/city')) ? 'active' : '' }}">
                            <a href="{{route('city.index')}}">
                                <span class="sidebar-normal">Mange City</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li
                class="{{ (request()->is('admin/amenity*')) ||(request()->is('admin/purpose*')) ||(request()->is('admin/type*')) ||(request()->is('admin/property-category*')) || (request()->is('admin/road-type*'))? 'active' : '' }}">
                <a data-toggle="collapse" href="#property">
                    <i class="material-icons">business</i>
                    <p>Property Details
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/amenity*')) ||(request()->is('admin/purpose*')) ||(request()->is('admin/type*')) ||(request()->is('admin/property-category*')) || (request()->is('admin/road-type*'))? 'in' : '' }}"
                    id="property">
                    <ul class="nav">
                        <li class="{{ (request()->is('admin/amenity*')) ? 'active' : '' }}">
                            <a href="{{route('amenity.index')}}">
                                <span class="sidebar-normal">Amenties</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/purpose*')) ? 'active' : '' }}">
                            <a href="{{route('purpose.index')}}">

                                <span class="sidebar-normal">Purpose</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/type*')) ? 'active' : '' }}">
                            <a href="{{route('type.index')}}">
                                <span class="sidebar-normal">Property Type</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/property-category*')) ? 'active' : '' }}">
                            <a href="{{route('property-category.index')}}">
                                <span class="sidebar-normal">Property Category</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/road-type*')) ? 'active' : '' }}">
                            <a href="{{route('road-type.index')}}">
                                <span class="sidebar-normal">Road Type</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/feature*')) ? 'active' : '' }}">
                            <a href="{{route('feature.index')}}">
                                <span class="sidebar-normal">Feature</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif


            @canany(['create', 'viewAny'], \App\Models\Admin::class)
            <li class="{{ (request()->is('admin/staff*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#staff">
                    <i class="material-icons">groups
                    </i>
                    <p>Manage Staffs
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/permissions*')) || (request()->is('admin/role*')) || (request()->is('admin/staff*'))  ? 'in' : '' }}"
                    id="staff">
                    <ul class="nav">
                        @if (auth()->user()->isSuperAdmin())
                        <li class="{{ (request()->is('admin/permissions*')) ? 'active' : '' }}">
                            <a href="{{route('permissions.index')}}">
                                <span class="sidebar-normal">Permissions</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/roles*')) ? 'active' : '' }}">
                            <a href="{{route('roles.index')}}">
                                <span class="sidebar-normal">Roles</span>
                            </a>
                        </li>
                        @endif
                        @can('viewAny', App\Models\Admin::class)
                        <li class="{{ (request()->is('admin/staff*')) ? 'active' : '' }}">
                            <a href="{{route('staffs.index')}}">
                                <span class="sidebar-normal">Staffs</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </div>

            </li>
            @endcanany
            <li class="{{ (request()->is('admin/properties*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#propertyy">
                    <i class="material-icons">business</i>
                    <p>Property
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/properties*')) ? 'in' : ''  }}" id="propertyy">
                    <ul class="nav">

                        @can('create', App\Models\Property::class)
                        <li class="{{ (request()->is('admin/properties/create*')) ? 'active' : '' }}">
                            <a href="{{route('properties.create')}}">
                                <span class="sidebar-normal">Create Property</span>
                            </a>
                        </li>
                        @endcan


                        <li class="{{ (request()->is('admin/properties')) ? 'active' : '' }}">
                            <a href="{{route('properties.index')}}">
                                <span class="sidebar-normal">Manage Properties</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </li>

            @canany(['create', 'viewAny'], [\App\Models\Blog::class, 'blog'])

            <li class="{{ (request()->is('admin/blog-category*')) ||(request()->is('admin/blog*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#blogs">
                    <i class="material-icons">library_books</i>
                    <p>Blogs
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/blog-category*')) ||(request()->is('admin/blog*')) ? 'in' : ''  }}"
                    id="blogs">
                    <ul class="nav">
                        @if (auth()->user()->isSuperAdmin())
                        <li class="{{ (request()->is('admin/blog-category/create')) ? 'active' : '' }}">
                            <a href="{{route('blog-category.create')}}">

                                <span class="sidebar-normal">Add Blog Category</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/blog-category')) ? 'active' : '' }}">
                            <a href="{{route('blog-category.index')}}">

                                <span class="sidebar-normal">Blog Category</span>
                            </a>
                        </li>
                        @endif
                        @can('create', [\App\Models\Blog::class, 'blog'])
                        <li class="{{ (request()->is('admin/blog/create')) ? 'active' : '' }}">
                            <a href="{{route('blog.create')}}">

                                <span class="sidebar-normal">Add Blog</span>
                            </a>
                        </li>
                        @endcan
                        @can('viewAny', [\App\Models\Blog::class, 'blog'])
                        <li class="{{ (request()->is('admin/blog')) ? 'active' : '' }}">
                            <a href="{{route('blog.index')}}">
                                <span class="sidebar-normal">Manage Blogs</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany

            @canany(['create', 'viewAny'], [\App\Models\Blog::class, 'news'])
            <li class="{{ (request()->is('admin/news-category*')) ||(request()->is('admin/news*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#newss">
                    <i class="material-icons">fact_check</i>
                    <p>News
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/news-category*')) ||(request()->is('admin/news*')) ? 'in' : ''  }}"
                    id="newss">
                    <ul class="nav">
                        @if (auth()->user()->isSuperAdmin())

                        <li class="{{ (request()->is('admin/news-category/create')) ? 'active' : '' }}">
                            <a href="{{route('news-category.create')}}">

                                <span class="sidebar-normal">Add News Category</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/news-category')) ? 'active' : '' }}">
                            <a href="{{route('news-category.index')}}">

                                <span class="sidebar-normal">News Category</span>
                            </a>
                        </li>
                        @endif
                        @can('create', [\App\Models\Blog::class, 'news'])
                        <li class="{{ (request()->is('admin/news/create')) ? 'active' : '' }}">
                            <a href="{{route('news.create')}}">

                                <span class="sidebar-normal">Add News</span>
                            </a>
                        </li>
                        @endcan

                        @can('viewAny', [\App\Models\Blog::class, 'news'])
                        <li class="{{ (request()->is('admin/news')) ? 'active' : '' }}">
                            <a href="{{route('news.index')}}">
                                <span class="sidebar-normal">Mange News</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
            @canany(['create', 'viewAny'], \App\Models\Faq::class)
            <li class="{{ (request()->is('admin/faq*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#faq">
                    <i class="material-icons">question_answer</i>
                    <p>Faq
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/faq*')) ? 'in' : ''  }}" id="faq">
                    <ul class="nav">

                        <li class="{{ (request()->is('admin/faq/create')) ? 'active' : '' }}">
                            <a href="{{route('faq.create')}}">

                                <span class="sidebar-normal">Add Faq</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/faq')) ? 'active' : '' }}">
                            <a href="{{route('faq.index')}}">
                                <span class="sidebar-normal">Mange Faq</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcanany

            @canany(['create', 'viewAny'], \App\Models\Testimonial::class)
            <li class="{{ (request()->is('admin/testimonial*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#testimonial">
                    <i class="material-icons">surround_sound</i>
                    <p>Testimonial
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/testimonial*')) ? 'in' : ''  }}" id="testimonial">
                    <ul class="nav">

                        @can('create', \App\Models\Testimonial::class)

                        <li class="{{ (request()->is('admin/testimonial/create')) ? 'active' : '' }}">
                            <a href="{{route('testimonial.create')}}">

                                <span class="sidebar-normal">Add Testimonial</span>
                            </a>
                        </li>
                        @endcan
                        @can('viewAny', \App\Models\Testimonial::class)
                        <li class="{{ (request()->is('admin/testimonial')) ? 'active' : '' }}">
                            <a href="{{route('testimonial.index')}}">
                                <span class="sidebar-normal">Manage Testimonial</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany

            @canany(['create', 'viewAny'], \App\Models\Advertisement::class)
            <li class="{{ (request()->is('admin/advertisements*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#advertisements">
                    <i class="material-icons">newspaper</i>
                    <p>Advertisement
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/advertisements*')) ? 'in' : ''  }}" id="advertisements">
                    <ul class="nav">
                        @can('create', \App\Models\Advertisement::class)

                        <li class="{{ (request()->is('admin/advertisements/create')) ? 'active' : '' }}">
                            <a href="{{route('advertisements.create')}}">

                                <span class="sidebar-normal">Add Advertisement</span>
                            </a>
                        </li>
                        @endcan
                        @can('viewAny', \App\Models\Testimonial::class)

                        <li class="{{ (request()->is('admin/advertisements')) ? 'active' : '' }}">
                            <a href="{{route('advertisements.index')}}">
                                <span class="sidebar-normal">Mange Advertisement</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
            
            <li class="{{ (request()->is('admin/setting*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#setting">
                    <i class="material-icons">settings</i>
                    <p>Settings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/setting*')) || (request()->is('admin/slider*'))  ? 'in' : '' }}"
                    id="setting">
                    <ul class="nav">
                        @if (auth()->user()->isSuperAdmin())

                        <li class="{{ (request()->is('admin/setting*')) ? 'active' : '' }}">
                            <a href="{{route('setting')}}">
                                <span class="sidebar-normal">Manage Website</span>
                            </a>
                        </li>
                        @endif
                        @canany(['create', 'viewAny'], \App\Models\Slider::class)
                        <li class="{{ (request()->is('admin/slider*')) ? 'active' : '' }}">
                            <a href="{{route('slider.index')}}">
                                <span class="sidebar-normal">Slider</span>
                            </a>
                        </li>
                        @endcanany
                        @canany(['create', 'viewAny'], \App\Models\Menu::class)
                        <li class="{{ (request()->is('admin/menu*')) ? 'active' : '' }}">
                            <a href="{{route('menu.index')}}">
                                <span class="sidebar-normal">Mange Menu</span>
                            </a>
                        </li>
                        @endcanany
                    </ul>
                </div>

            </li>


            @if (auth()->user()->isSuperAdmin())

            <li class="{{ (request()->is('admin/agency*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#agency">
                    <i class="material-icons">maps_home_work</i>
                    <p>Agency
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/agency*')) ? 'in' : ''  }}" id="agency">
                    <ul class="nav">

                        <li class="{{ (request()->is('admin/agency/create*')) ? 'active' : '' }}">
                            <a href="{{route('agency.create')}}">
                                <span class="sidebar-normal">Create Agency</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('admin/agency/verified*')) ? 'active' : '' }}">
                            <a href="{{route('verified')}}">
                                <span class="sidebar-normal">Verified</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/agency/non-verified*')) ? 'active' : '' }}">
                            <a href="{{route('nonVerified')}}">
                                <span class="sidebar-normal">Non-Verified</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('admin/agency/blocked*')) ? 'active' : '' }}">
                            <a href="{{route('blocked')}}">
                                <span class="sidebar-normal">Blocked Agency</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

            <li class="{{ (request()->is('admin/team*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#teams">
                    <i class="material-icons">group</i>
                    <p>Team
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/team*')) ? 'in' : ''  }}" id="teams">
                    <ul class="nav">

                        <li class="{{ (request()->is('admin/team/create')) ? 'active' : '' }}">
                            <a href="{{route('team.create')}}">

                                <span class="sidebar-normal">Add Team</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/team')) ? 'active' : '' }}">
                            <a href="{{route('team.index')}}">
                                <span class="sidebar-normal">Mange Team</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="{{ (request()->is('admin/customer*')) ? 'active' : '' }}">
                <a href="{{route('customer.index')}}">
                    <i class="material-icons">group</i>
                    <p>Customers</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/page*')) ? 'active' : '' }}">
                <a href="{{route('page.index')}}">
                    <i class="material-icons">book</i>
                    <p>Pages</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/subscribers*')) ? 'active' : '' }}">
                <a href="{{route('admin.subscriber')}}">
                    <i class="material-icons">supervised_user_circle</i>
                    <p>Subscriber</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/restore*')) ? 'active' : ''  }}">
                <a data-toggle="collapse" href="#restore">
                    <i class="material-icons">restore_from_trash</i>
                    <p>Restore
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ (request()->is('admin/restore*')) ? 'in' : ''  }}" id="restore">
                    <ul class="nav">

                        <li class="{{ (request()->is('admin/restore/deleted-property')) ? 'active' : '' }}">
                            <a href="{{route('deletedProperty')}}">
                                <span class="sidebar-normal">Properties</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/restore/deleted-blog')) ? 'active' : '' }}">
                            <a href="{{route('deletedBlogs')}}">
                                <span class="sidebar-normal">Blogs</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/restore/deleted-news')) ? 'active' : '' }}">
                            <a href="{{route('deletedNews')}}">
                                <span class="sidebar-normal">News</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/restore/deleted-agency')) ? 'active' : '' }}">
                            <a href="{{route('deletedAgency')}}">
                                <span class="sidebar-normal">Agency</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/restore/deleted-faqs')) ? 'active' : '' }}">
                            <a href="{{route('deletedFaqs')}}">
                                <span class="sidebar-normal">Faq</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('admin/restore/deleted-testimonials')) ? 'active' : '' }}">
                            <a href="{{route('deletedTestimonials')}}">
                                <span class="sidebar-normal">Testimonial</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
