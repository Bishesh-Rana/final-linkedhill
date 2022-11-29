@extends('frontend.layouts.master')
@section('title',$blog->title)
@push('css')
<link rel="stylesheet" href="{{asset('frontend/node_modules/nouislider/distribute/nouislider.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/sharetastic.css')}}"/>


<style>
    .sharetastic {
        justify-content: left !important;
    }
</style>
@endpush

@push('metaTags')
    <meta name="keywords" content="{{$blog->meta_keyword}}">
    @if($blog->meta_description != null)
        <meta name="description" content="{{$blog->meta_description}}">
    @else
        <meta name="description" content="{!! strip_tags($blog->description) !!}">
    @endif
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$blog->title}}">
    <meta property="og:description" content="{!! strip_tags($blog->description) !!}">
    <meta property="og:image" content="{{$blog->image}}">
@endpush
@section('content')

    <main class="about-us-page inner-page blog-single">

        <section class="bg-white template--part">
            <div class="section-rule">
                <section class="main-content">
                    <article class="card--lg">
                        <div class="card--top">
                            <!-- image size is 640 * 420 -->
                            <div class="card--img">
                                <img src="{{$blog->image}}" alt=""/>
                            </div>
                            <div class="card--text">
                                <h2 class="section__title">{{$blog->title}}</h2>
                                <div class="para">
                                    {!! substr($blog->description, 0, 1000) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card--body w-100 " style="display:none"  id="collapseExample">
                            <p class="para">
                                {!! substr($blog->description, 1000, 2000) !!}
                            </p>
                            <!-- its hidden initial -->
                        </div>
                        <div class="d-flex">
                            <p><span class="material-icons-outlined material-icons">visibility</span>{{$blog->viewCount}} Views</p>
                            <p>Last Updated: {{$blog->created_at->format('d-M-y')}}</p>
                            <span class="sharetastic"> </span>
                            <div class="ml-auto">

                                <a  class="card__link"  href="#!"  id="card__link--read"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                                        <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"></path></svg>
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>

                    </article>
                </section>
                @if(count($latest_blogs)>1)

                <section class="blog">
                    <h2 class="section__title">Latest Blogs</h2>
                    <div class="carousel">
                        @foreach($latest_blogs as $latest_blog)
                            @if($latest_blog->id != $blog->id)
                                <div class="item">
                                    <div class="card">
                                        <div class="card__img">
                                            <img src="{{$blog->image}}" alt="">
                                        </div>
                                        <div class="card__body">
                                            <h2 class="small__title">{{$blog->created_at->format('d-M-Y')}}</h2>
                                            <h2 class="card__title"><a href="{{route('blog.single',['id'=>$blog->id,'slug'=>$blog->slug])}}">{{$blog->title}}</a></h2>
                                            <div class="para">
                                                {!! $blog->description  !!}
                                            </div>
                                            <a href="{{route('blog.single',['id'=>$blog->id,'slug'=>$blog->slug])}}" class="card__link" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                                                    <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/></svg>Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>

                @endif
            </div>



        </section>



    </main>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            //collapse
            $('#card__link--read').click(function(e){
                e.preventDefault();
                if($(this).hasClass('active')){
                    $(this).find('span').text("Read More");
                    $(this).removeClass('active');

                }
                else{
                    $(this).find('span').text("Read Less");
                    $(this).addClass('active');

                }
                $("#collapseExample").toggle(300);

            })

            //slider
            $(".blog .carousel").slick({
                infinite: true,
                lazyLoad: 'ondemand',
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows:true,
                draggable:true,
                prevArrow:"<button class=' slick-prev'><i class='material-icons'>keyboard_arrow_left</i></button>",
                nextArrow:"<button class=' slick-next '><i class='material-icons'>keyboard_arrow_right</i></button>",
                responsive: [
                    {
                        breakpoint: 840,
                        settings: {
                            slidesToShow: 2.2,
                            arrows:false,
                            infinite: false,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1.4,
                            arrows:false,
                            infinite: false,
                        }
                    }

                ]
            });
        })
    </script>

    <script src="{{asset('frontend/js/sharetastic.js')}}"></script>
    <script>
        $('.sharetastic').sharetastic({
            services: {
                linkedin:false,
                googleplus: false,
                tumblr: false,
                mailto : false,
                print:false,
                email:false
            }
        });
    </script>


@endpush
