@extends('website.layouts.app',['pageTitle'=>$pagedata->name])

@section('content')
    <section id="bread_crumb_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a>/</li>
                        <li><a href="#">{{ $pagedata->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
