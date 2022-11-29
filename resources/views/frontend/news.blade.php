@extends('frontend.layouts.master')
@section('title','News & Events')
@push('css')
    <link rel="stylesheet" href="{{asset('frontend/node_modules/nouislider/distribute/nouislider.min.css')}}">
    <style>
        .blog {
            background-image: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f2f2f2)) !important;
            /* background-image: linear-gradient(
        180deg
        , #fff, #fff); */
            /* background-size: 100% 50%; */
            background-repeat: no-repeat;
        }

    </style>
@endpush

@section('content')
    <main class="home-page">


        <section class="blog">
            <div class="section-rule">
                <div class="section__title--wrapper">
                    @if(count($blogs)>0)
                        <h2 class="section__title">Latest News & Events</h2>
                    @else
                        <h6 class="section__title text-center"> We will soon update our news. Please stay tuned for more updates.</h6>
                    @endif
                </div>

                <div class="row">
                    @foreach($blogs as $blog)
                        <article class="col-md-4" style="padding: 5px;box-sizing: border-box">
                            <div class="card">
                                <a href="{{route('news.single',['id'=>$blog->id,'slug'=>$blog->slug])}}">
                                    <div class="card__img">
                                        <img src="{{$blog->image}}" alt="">
                                    </div>
                                </a>
                                <div class="card__body">
                                    <h2 class="small__title">{{$blog->created_at->format('d-M-Y')}}</h2>
                                    <h2 class="card__title"><a href="{{route('blog.single',['id'=>$blog->id,'slug'=>$blog->slug])}}">{{$blog->title}}</a></h2>

                                    <div class="para">
                                        {!! $blog->description  !!}
                                    </div>

                                    <a href="{{route('news.single',['id'=>$blog->id,'slug'=>$blog->slug])}}" class="card__link" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/></svg>Read More
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </section>




        <script type="text/javascript" src="{{asset('frontend/node_modules/multiselect-master/multiselect.min.js')}}"></script>


    @endsection

    @push('scripts')
        <!-- custom -->
            <script src="{{asset('frontend/node_modules/nouislider/distribute/nouislider.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('frontend/js/custom.js')}}"></script>
    @endpush
