@extends('website.layouts.app',['pageTitle'=>$blog->title])
@section('content')

    <section id="single_blog_wrapper" class="cs_padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single_blog_content">
                        <div class="single_blog_title">
                            <h1>{{ $blog->title }}</h1>
                            <div class="flex_dbox">

                                <div class="follow_us">
                                    <p>Follow Us:</p>
                                    <ul>
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-youtube"></i></a></li>
                                    </ul>
                                </div>
                                <div class="posted_date"><span>{{ $blog->created_at->format('F,m ,Y') }}</span></div>
                            </div>
                            <div class="blog_picture">
                                <img src="{{ $blog->image }}" alt="linked hill">
                            </div>

                        </div>
                        <div class="single_blog_content_area">

                            {!! $blog->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        {{-- <div class="col-lg-12">
                            <div class="trending_property_wrapper">
                                <h1>Want to <span>Sell / Rent</span> out your property for free?</h1>
                                <a href="#" class="btn btn-link">Post property <i class="las la-arrow-right"></i></a>
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="trending_side_blog">
                                <div class="trending_title">
                                    <p><i class="las la-project-diagram"></i>Trending {{ $blog->type }}</p>
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
                                                <a href="{{ route('blog.single', $item->slug) }}">{{ $item->title }}</a>
                                                <span>{{ $item->created_at->format('F,m, Y') }}</span>
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
