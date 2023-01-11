@extends('frontend.layouts.master')
@section('title',$page->name)
@push('css')

<style>
    img[src$='.jpg'] {
        background-color: #ffffff !important;
    }

    .profile-image img{

        padding-top: 10px;
        width: 150px !important;
        height: 80px !important;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .map iframe{
        width: 100% !important;
        height: 100% !important;
    }


</style>

@endpush

@push('metaTags')
    <meta name="keywords" content="{{$page->meta_keyword}}">
    <meta name="description" content="{{$page->meta_description}}">
@endpush

@section('content')

    <main class="about-us-page inner-page about-us">
        <section class="screen">
            <img src="{{asset('images/default/interior02.jpg')}}" alt="" class="cover"/>
            <div class="absolute__wrapper">
                <div class="section-rule">
                    <img src="{{asset('images/'.$website->logo)}}" alt="">
                    <h2 class="screen__title">{{$page->name}}</h2>
                    <a href="#scrolldown" class="scrolldown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35.5" height="57.284" viewBox="0 0 35.5 57.284">
                            <g id="scroll_down" data-name="scroll down" transform="translate(-676 -788)">
                                <g id="Rectangle_9" data-name="Rectangle 9" transform="translate(676 788)" fill="none" stroke="#fff" stroke-width="2">
                                    <rect width="35.5" height="57.284" rx="17.75" stroke="none"></rect>
                                    <rect x="1" y="1" width="33.5" height="55.284" rx="16.75" fill="none"></rect>
                                </g>
                                <circle id="Ellipse_4" data-name="Ellipse 4" cx="2.017" cy="2.017" r="2.017" transform="translate(691.33 797.682)" fill="#fff"></circle>
                                <circle id="Ellipse_4-2" data-name="Ellipse 4" cx="2.017" cy="2.017" r="2.017" transform="translate(691.33 805.75)" fill="#fff" opacity="0.62"></circle>
                                <circle id="Ellipse_4-3" data-name="Ellipse 4" cx="2.017" cy="2.017" r="2.017" transform="translate(691.33 813.818)" fill="#fff" opacity="0.29"></circle>
                                <path id="Union_4" data-name="Union 4" d="M0,8.448V0H8.448V1.352h-7.1v7.1Z" transform="translate(693.518 833.834) rotate(-135)" fill="#fff"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <section class="main-content " id="scrolldown">
            <div class="section-rule">
                <h2 class="section__title">{{$page->name}}</h2>
                <div class="para">
                    {!! $page->description !!}
                </div>

            </div>

        </section>


    </main>

@endsection

@push('scripts')
<script>
    $(document).ready(()=>{
        $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        asNavFor: '.slider-nav',
        pauseOnHover:false,
        responsive: [
            {
                breakpoint: 840,
                settings: {
                    dots:true,
                }
            }

        ]
    });
    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        infinite: false,
    });

    $('.slider-nav .item').hover(function(){
        $(this).click();
    })


    $('.recommended .carousel').slick({
        infinite: true,
        lazyLoad: 'ondemand',
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows:true,
        draggable:true,
        prevArrow:"<button class=' slick-prev'><i class='material-icons'>keyboard_arrow_left</i></button>",
        nextArrow:"<button class=' slick-next '><i class='material-icons'>keyboard_arrow_right</i></button>",
        responsive: [
            {
                breakpoint: 1030,
                settings: {
                    slidesToShow: 3,
                }
            },
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


    $('.nearby .carousel').slick({
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
@endpush
