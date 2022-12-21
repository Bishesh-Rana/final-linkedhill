@extends('admin.layouts.master')
@section('title','Admin Dashboard')
@section('content')
<div class="container-fluid">

    @can('property-list')
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">business</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Property</p>
                {{-- <h6 class="card-title">{{\App\Models\Property::superAdmin()->count()}}</h6> --}}
                <h6 class="card-title">{{count(auth()->user()->properties)}} </h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    <a href="{{route('properties.create')}}">Add Property</a>
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('properties.index')}}">Manage Property </a>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('staff-list')
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="rose">
                <i class="material-icons">groups</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Staff</p>
                {{-- <h6 class="card-title">{{count(\App\Models\Admin::where('id','!=',1)->get())}}</h6> --}}
                <h6 class="card-title">{{count(\App\Models\User::visible()->get())}} </h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    @can('staff-create')
                        <a href="{{route('staffs.create')}}">Add Staff</a>
                    @endcan

                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('staffs.index')}}">Manage Staff </a>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('agency-list')

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="purple">
                <i class="material-icons">maps_home_work</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Agency</p>
                <h6 class="card-title">{{count(\App\Models\AgencyDetail::all())}}</h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    <a href="{{route('agency.create')}}">Add Agency</a>
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('agency.index')}}">Manage Agency </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('blog-list')

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">library_books</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Blog</p>
                <h6 class="card-title">{{count(\App\Models\Blog::where('type','blog')->get())}}</h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    <a href="{{route('blog.create')}}">Add Blog</a>
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('blog.index')}}">Manage Blogs </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    {{-- @can('user-list') --}}
    @can('customer')
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">groups</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Customers</p>
                {{-- <h6 class="card-title">{{count(\App\Models\User::all())}}</h6> --}}
                <h6 class="card-title">{{count(\App\Models\User::visible()->get())}}</h6>
                {{-- $users = User::visible()->latest()->get(); --}}
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    {{-- <i class="material-icons text-success">add_box</i>--}}
                    {{-- <a href="">Add Agency</a>--}}
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('customer.index')}}">Manage Customers </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('news-list')

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">fact_check</i>
            </div>
            <div class="card-content">
                <p class="category title__card">News</p>
                <h6 class="card-title">{{count(\App\Models\Blog::where('type','news')->get())}}</h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    <a href="{{route('news.create')}}">Add News</a>
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('news.index')}}">Manage News </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('team-list')

    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">group</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Team</p>
                <h6 class="card-title">{{count(\App\Models\Team::get())}}</h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    <a href="{{route('team.create')}}">Add Team</a>
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('team.index')}}">Manage Team </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('advertisement-list')
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">newspaper</i>
            </div>
            <div class="card-content">
                <p class="category title__card">Advertisement</p>
                <h6 class="card-title">{{count(\App\Models\Advertisement::get())}}</h6>
            </div>
            <div class="clearfix"></div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add_box</i>
                    <a href="{{route('advertisements.create')}}">Add Advertisement</a>
                </div>
                <div class="spacer"></div>
                <div class="stats pull-right">
                    <i class="material-icons text-success">settings_applications</i>
                    <a href="{{route('advertisements.index')}}">Advertisements </a>
                </div>
            </div>
        </div>
    </div>
    @endcan

       {{--  --}}

       @can('staffrole-list')

       <div class="col-lg-4 col-md-6 col-sm-6">
           <div class="card card-stats">
               <div class="card-header" data-background-color="rose">
                   <i class="material-icons">groups</i>
               </div>
               <div class="card-content">
                   <p class="category title__card">Role</p>
                   {{-- <h6 class="card-title">{{count(\App\Models\Admin::where('id','!=',1)->get())}}</h6> --}}
               </div>
               <div class="clearfix"></div>
               <div class="card-footer">
                   <div class="stats">
                       <i class="material-icons text-success">add_box</i>
                       @can('staff-create')
                           <a href="{{route('roles.index')}}">View Role</a>
                       @endcan
   
                   </div>
                   <div class="spacer"></div>
                   <div class="stats pull-right">
                       <i class="material-icons text-success">settings_applications</i>
                       <a href="{{route('permissions.index')}}">View Permission </a>
                   </div>
               </div>
           </div>
       </div>
       @endcan
   
       {{--  --}}


    {{-- @endif --}}

</div>
@endsection
