@extends('website.layouts.app',['pageTitle'=>$pagedata->name])
@section('meta')
    @include('website.shared.meta', ['meta' => $meta])
@endsection
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
    <section class="ads_inside_subpage">
        <div class="container">
            <div class="ads_section_cover">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($advertisements as $ads)
                        <div class="ads_wrap" {{ $ads->display_size }}>
                            <img src="{{ $ads->image }}" alt="{{ $ads->title }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($blogs as $key => $item)
        <section id="b_blog_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="b_blog_images">
                            <img src="{{ $item->image }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="b_blog_side">
                           <p> <a href="{{ route('blog.single', $item->slug) }}">{{ $item->title }}</a></p>
                            <div class="b_blog_about">

                                <span>{{ $item->created_at->format('F d, Y') }}</span>
                            </div>
                            <a href="{{ route('blog.single', $item->slug) }}" class="btn">Keep Reading<i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($loop->first)
                @php
                    $blogs->forget($key);
                @endphp
            @break
        @endif
    </section>
@endforeach
<section id="property_detail_wrapper" class="cs_padding">
    <div class="container">
    </div>
</section>
<section id="b_blog_news_wrapper" class="cs_bottom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($blogs as $blog)
                    <div class="b_blog_latestNews">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="blog_latestNews_content">
                                    <div class="latest_news_tag">
                                        <span>{{ $blog->created_at->format('F,d, Y') }}</span>
                                    </div>
                                    <h3><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p>{!! Str::limit(strip_tags($blog->description), 350) !!}</p>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="blog_latestNews_thumbnail_wrap">
                                    <img src="{{ $blog->image }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="blog_pagination">
                    {{ $blogs->links() }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending_property_wrapper">
                            <h1>Want to <span>Sell / Rent</span> out your property for free?</h1>
                            <a href="#" class="btn btn-link">Post property <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="trending_side_blog">
                            <div class="trending_title">
                                <p><i class="las la-project-diagram"></i>Trending {{ $pagedata->name }}</p>
                            </div>
                            @foreach ($trending as $key => $item)
                                <div class="trending_inner_wrapper">
                                    <div class="trending_flex_box">
                                        <div class="blog_trending_pic">
                                            <div class="trending_photo">
                                                <img src="{{ $item->image }}" alt="">
                                            </div>
                                            <div class="trending_badge">#{{ ++$key }}</div>
                                        </div>
                                        <div class="trending_content">
                                            <a
                                                href="{{ route('blog.single', $item->slug) }}">{{ $item->title }}</a>
                                            <span>{{ $item->created_at->format('F,d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
