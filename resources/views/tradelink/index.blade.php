@extends('tradelink.layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">manage_accounts</i>
                    </div>
                    <div class="card-content">
                        <p class="category"><b>Services : {{count(\App\Models\Service::all())}}</b></p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">label</i>
                            <a href="{{route('service-list.index')}}">Manage Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">article</i>
                    </div>
                    <div class="card-content">
                        <p class="category"><b>Total Vendor : {{count(\App\Models\TradelinkAdmin::all()) - 1}}</b></p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">label</i>
                            <a href="{{route('all.vendors')}}">Manage Vendor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
