@extends('frontend.layouts.master')
@section('title','FAQ')
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

@section('content')

    <main class="about-us-page inner-page faq">
        <section class="">
            <div class="section-rule">
                @if(count($faqs)>0)
                    <h1 class="section__title text-center">Frequently Asked Questions</h1>

                @else
                    <h1 class="section__title text-center">No Question Yet.If you have any query you can send us your enquiry .
                        <br>
                        <a href="{{route('contactUs')}}" style="text-decoration: underline;color:  #3f8809"> Click Here</a> to send us your enquiry.
                    </h1>

                @endif
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $key=>$faq)
                    <div class="card">
                        <div class="card-header" id="headingOne{{$faq->id}}">

                            <a  data-toggle="collapse" href="#collapseOne{{$faq->id}}" class="collapsed">
                                {{$faq->question}} <span class="hide">+</span><span class="minus">-</span>
                            </a>
                        </div>

                        <div id="collapseOne{{$faq->id}}" class="collapse" aria-labelledby="headingOne{{$faq->id}}" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="para">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
