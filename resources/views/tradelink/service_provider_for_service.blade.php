
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="msapplication-TileImage" content="./favicon/logo02.ico">

    <title>Linkedhill - all about Property</title>

    <!-- materailizeicon -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">

    <!-- fancybox -->
    <link rel="stylesheet" href="{{asset('frontend/css/fancybox/fancybox.min.css')}}">



    <!-- facebook -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="bkj44UEv"></script>

    <!-- slick -->
    <link rel="stylesheet" href="{{asset('frontend/css/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick/slick.css')}}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/node_modules/multiselect-master/styles/multiselect.css')}}">

    <!-- style -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->

    <link rel="stylesheet" href="{{asset('frontend/css/otherstyle.css')}}">


</head>
<body>




<header class="tradelink-header">
    <div class="section-rule">
        <nav class="nav nav-fill">
            <div class="nav__left d-flex">
                <li class="nav-list">
                    <a href="{{url('/')}}" class="logo">
                        <img src="{{asset('tradelink/'.$tradelink_website->logo)}}" alt="linkedhill">
                    </a>
                </li>
            </div>

            <div class="nav__center d-flex ml-auto mr-auto">

            </div>



        </nav>
    </div>
</header>



<main class="home-page trade-home-page">
    <style>
        .screen{
            background:center no-repeat fixed url('{{asset('frontend/gallery/banimg03.png')}}');
        }



        .trade-home-page .screen {
            position: relative;
             border-radius: 0px !important;
            height: 500px !important;
        }
    </style>
    <section class="screen">
        <div class="section-rule">
            <h2 class="screen__title">Your Service <br>Expert in all over </h2>
            <p class="card__title">Book or get free quotes for over 25 home services from trusted companies in Nepal</p>


        </div>
    </section>


    <section class="recommended professionals">
        <div class="section-rule">
            <h2 class="section__title text-center">Service Provider of Service : {{$service->name}}</h2>
            <div class="carousel">
                @foreach($service->vendors as $vendor)
                <div class="item">
                    <div class="card">
                        <div class="card__img">
                            <img src="{{$vendor->vendor->image}}" alt="">
                        </div>
                        <div class="card__body">
                            {{--<p class="star"><span class="material-icons">grade</span><span class="material-icons">grade</span><span class="material-icons">grade</span><span class="material-icons">grade</span><span class="material-icons non-star">grade</span></p>--}}
                            <h2 class="card__title">{{$vendor->vendor->name}}</h2>
                            <h2 class="small__title"><i class="fa fa-phone"></i> {{$vendor->vendor->phone}}</h2>
                            {{--<button onclick="window.location.href='#'">--}}
                                {{--Book Now--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>

    <section class="recommended">
        <div class="section-rule">
            <h2 class="section__title">Our Other Services</h2>
            <div class="carousel">

                @foreach($all_services as $all_service)
                <div class="item">
                    <a href="{{route('service.serviceProvider',$all_service->slug)}}" class="card">
                        <div class="card__img">
                            <img src="{{$all_service->image}}" alt="">
                        </div>
                        <div class="card__body">
                            <h2 class="card__title">{{$all_service->name}}</h2>
                        </div>
                    </a>
                </div>
                 @endforeach




            </div>
        </div>

    </section>




</main>

<footer class="trade-footer">
    <div class="section-rule">
        <div class="row">
            <article class="col-6 col-md-4">
                <div class="logo">
                    <img src="{{asset('frontend/gallery/Tradelink_dark.png')}}" alt="">
                </div>
                <div class="para">
                    {!! $tradelink_website->short_description !!}
                </div>
                <p class="link"><a href="tel:9875462180">{{$tradelink_website->phone}}</a></p>
                <p class="link"><a href="mailto:{{$tradelink_website->email}}">{{$tradelink_website->email}}</a></p>
            </article>
            <article class="col-6 col-md-4 col-lg-2">

            </article>
            <article class="col-6 col-md-4 col-lg-2">

            </article>
            <article class="col-sm-7 col-lg-4" id="trade-subscribe">
                <h2 class="card__title">Newsletter</h2>
                <form action="{{route('tradelink.subscribeus')}}" class="form-inline" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        <button type="submit">Go</button>
                    </div>
                </form>
                @if (session('success'))

                    <p style="color:#3f8809;font-weight:bolder;margin-left: 60px;margin-top: 4px">{{ session('success') }}</p>

                @endif
            </article>
        </div>
        <hr>
        <div class="d-flex last__footer">
            <p>{{$tradelink_website->copyright_message}}</p>
            <div class="d-flex">
                @if($tradelink_website->fb_url != null)
                    <a href="{{$tradelink_website->fb_url}}" target="_blank"><i class="fab fa-facebook-square"></i></a>
                @endif
                @if($tradelink_website->instagram_url != null)
                        <a href="{{$tradelink_website->instagram_url}}" target="_blank"><i class="fab fa-instagram"></i></a>

                @endif
                {{--<a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
                {{--<a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>--}}
                {{--<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>--}}
            </div>
        </div>
    </div>
</footer>





<!--jquery  -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="https://kit.fontawesome.com/021b940a03.js" crossorigin="anonymous"></script>


<!-- fancybox -->
<script type="text/javascript" src="{{asset('frontend/css/fancybox/jquery.fancybox.min.js')}}"></script>
<!-- owl -->
<script type="text/javascript" src="{{asset('frontend/css/slick/slick.min.js')}}"></script>


<!-- bootstrap -->
<script type="text/javascript" src="{{asset('frontend/css/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/css/bootstrap/js/bootstrap.min.js')}}"></script>


<!-- commom js -->
<script type="text/javascript" src="{{asset('frontend/js/commonjs.js')}}"></script>
<!-- custom -->
<script>
    $(document).ready(()=>{
        // categories
        $('.customer .carousel').slick({
        infinite: true,
        lazyLoad: 'ondemand',
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows:false,
        draggable:true,
        dots:true,
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

        ],
    });

    $('.recommended  .carousel').slick({
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

        ],
    });

    $(' .tradeN .carousel ').slick({
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

        ],



    });
    })
</script>

</body>
</html>
