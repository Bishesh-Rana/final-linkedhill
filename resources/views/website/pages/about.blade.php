@extends('website.layouts.app',['pageTitle'=>$pagedata->name])
@section('content')
    <section id="single_blog_title_banner_wrapper">
        <img src="{{ $pagedata->image }}" alt="">
    </section>
    <section id="single_page_wrapper">
        <div class="container">
            <div class="cover_single_blog">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="bread_crumb_wrapper">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a>/</li>
                                <li><a href="">{{ $pagedata->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site_title text-center">
                            <h2>{{ $pagedata->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="blog_single_content">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $pagedata->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('meta')
@include('website.shared.meta', ['meta' => $meta])
@endsection
