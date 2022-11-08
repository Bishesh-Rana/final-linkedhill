@extends('frontend.layouts.master')
@section('title',$property->title)
@push('css')


    <link rel="stylesheet" href="{{asset('frontend/css/sharetastic.css')}}"/>

    <style>


        .map iframe{
            width: 100% !important;
            height: 100% !important;
        }

        .sharetastic {
            justify-content: left !important;
        }

    </style>

@endpush

@push('metaTags')
    <meta name="keywords" content="{{$property->meta_keyword}}">
    @if($property->meta_description != null)
        <meta name="description" content="{{$property->meta_description}}">
    @else
        <meta name="description" content="{!! strip_tags($property->property_detail) !!}">
    @endif
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$property->title}}">
    <meta property="og:description" content="{!! strip_tags($property->property_detail) !!}">
    <meta property="og:image" content="{{$property->images->first()->name}}">
@endpush

@section('content')
    <nav class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            {{--            <li class="breadcrumb-item"><a href="#">For Sale</a></li>--}}
            <li class="breadcrumb-item active" aria-current="page">{{$property->title}}</li>
        </ol>
    </nav>
    <main class="single-page common-page">
        <section class="single__screen">

            <div class="section-rule pt-0">
                <div class="row">
                    <aside class="col-lg-9 pl-0">
                        <div class="card">

                            <div class="slider-for">
                                <!-- not more than 4 -->
                                @foreach($property->images as $key => $value)

                                    {{--                                    <div class="item">--}}
                                    {{--                                        <a class="image" data-fancybox="gallery" href="{{$value->name}}">--}}
                                    {{--                                            <img src="{{$value->name}}" alt="">--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}



                                @endforeach

                                <div class="item">
                                    <a class="image" data-fancybox="gallery" href="{{asset('frontend/gallery/card__img/img08.png')}}">
                                        <img src="{{asset('frontend/gallery/card__img/img08.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="image" data-fancybox="gallery" href="{{asset('frontend/gallery/card__img/img01.png')}}">
                                        <img src="{{asset('frontend/gallery/card__img/img01.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a  class="image" data-fancybox="gallery" href="{{asset('frontend/gallery/card__img/img02.png')}}">
                                        <img src="{{asset('frontend/gallery/card__img/img02.png')}}" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="slider-nav">
                                <!-- must be same image from above -->

                                @foreach($property->images as $key => $value)
                                    {{--                                <div class="item">--}}
                                    {{--                                    <div class="image">--}}
                                    {{--                                        <img src="{{$value->name}}" alt="">--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                @endforeach

                                <div class="item">
                                    <div class="image">
                                        <img src="{{asset('frontend/gallery/card__img/img08.png')}}" alt="">
                                    </div>

                                </div>
                                <div class="item">
                                    <div class="image">
                                        <img src="{{asset('frontend/gallery/card__img/img01.png')}}" alt="">
                                    </div>


                                </div>
                                <div class="item">
                                    <div class="image">
                                        <img src="{{asset('frontend/gallery/card__img/img02.png')}}" alt="">
                                    </div>

                                </div>


                            </div>

                            <div class="card__body">
                                <div class="d-flex">
                                    <p>{{$property->view_count}} Views</p>
                                    <p><span class="material-icons material-icons-outlined">location_on</span>{{$property->property_address}}, {{$property->city->name}}</p>
                                    <p>Last Updated: {{$property->updated_at->format('d-M-Y')}}</p>

                                </div>
                                <div class="ml-0 mt-2 mt-md-0 ml-md-auto">


                                    <span class="sharetastic"> </span>


                                </div>
                                <hr>
                                <h2 class="small__title">Property Information</h2>
                                <div class="card__action d-flex">
                                    @if($property->total_bed_room != null)
                                        <div>
                                            <label >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20.593" height="13.353" viewBox="0 0 20.593 13.353">
                                                    <g id="bed_2_" data-name="bed (2)" transform="translate(0)">
                                                        <path id="Union_5" data-name="Union 5" d="M16.974,13.353a.4.4,0,0,1-.4-.4V11.744H4.022v1.207a.4.4,0,0,1-.4.4H1.207a.4.4,0,0,1-.4-.4V11.676A1.208,1.208,0,0,1,0,10.538V8.125A1.208,1.208,0,0,1,.8,6.987V2.253A2.233,2.233,0,0,1,2.815,0H17.777a2.234,2.234,0,0,1,2.011,2.253V6.987a1.208,1.208,0,0,1,.8,1.137v2.414a1.208,1.208,0,0,1-.8,1.137v1.276a.4.4,0,0,1-.4.4Zm.4-.8h1.609v-.8H17.375Zm-15.766,0H3.217v-.8H1.609ZM.8,10.538a.4.4,0,0,0,.4.4h18.18a.4.4,0,0,0,.4-.4v-.4H11.905a.4.4,0,1,1,0-.8h7.883V8.125a.4.4,0,0,0-.4-.4H1.207a.4.4,0,0,0-.4.4V9.331H8.688a.4.4,0,1,1,0,.8H.8Zm14.56-7.883a1.208,1.208,0,0,1,1.207,1.207V5.349A2.019,2.019,0,0,1,18.14,6.918h.844V2.253C18.984,1.6,18.446.8,17.777.8H2.815C2.147.8,1.609,1.6,1.609,2.253V6.918h.844A2.018,2.018,0,0,1,4.022,5.349V3.861A1.208,1.208,0,0,1,5.229,2.655H8.688A1.208,1.208,0,0,1,9.895,3.861V5.309h.8V3.861a1.208,1.208,0,0,1,1.207-1.207ZM3.287,6.918h14.02a1.208,1.208,0,0,0-1.137-.8H4.424A1.208,1.208,0,0,0,3.287,6.918ZM11.5,3.861V5.309h4.264V3.861a.4.4,0,0,0-.4-.4H11.905A.4.4,0,0,0,11.5,3.861Zm-6.677,0V5.309H9.09V3.861a.4.4,0,0,0-.4-.4H5.229A.4.4,0,0,0,4.826,3.861ZM9.895,9.734a.4.4,0,1,1,.4.4A.4.4,0,0,1,9.895,9.734Z" transform="translate(0)" fill="#747474"/>
                                                    </g>
                                                </svg>
                                            </label>
                                            <p><span>Bedroom </span> <br>{{$property->total_bed_room}} Bedroom</p>
                                        </div>
                                    @endif

                                    @if($property->total_bathroom != null)
                                        <div>
                                            <label ><svg xmlns="http://www.w3.org/2000/svg" width="16.611" height="17.402" viewBox="0 0 16.611 17.402">
                                                    <path id="bathroom" d="M16.611,9.279h-3.3V2.957a2.957,2.957,0,0,0-5.912-.1H6.279v1.02H9.542V2.855H8.423a1.937,1.937,0,0,1,3.872.1V9.279H0V10.3H.874V12.45A3.739,3.739,0,0,0,3.3,15.944V17.4h1.02V16.171q.144.011.29.011H12q.146,0,.29-.011V17.4h1.02V15.944a3.739,3.739,0,0,0,2.423-3.495V10.3h.874ZM14.717,12.45A2.716,2.716,0,0,1,12,15.162h-7.4A2.716,2.716,0,0,1,1.894,12.45V10.3H3.808v2.538h5.37V10.3h5.539ZM8.158,10.3v1.518H4.827V10.3Zm0,0" fill="#747474"/>
                                                </svg></label>
                                            <p><span>Bathroom </span> <br>{{$property->total_bathroom}} Baths</p>

                                        </div>
                                    @endif

                                    @if($property->total_area != null)
                                        <div>

                                            <label><svg xmlns="http://www.w3.org/2000/svg" width="18.469" height="18.52" viewBox="0 0 18.469 18.52">
                                                    <g id="marker" transform="translate(0 0)">
                                                        <path id="Path_43" data-name="Path 43" d="M382.4,49.9a1.43,1.43,0,1,0-1.43,1.43A1.431,1.431,0,0,0,382.4,49.9Zm-1.43.7a.7.7,0,1,1,.7-.7A.7.7,0,0,1,380.969,50.6Zm0,0" transform="translate(-368.537 -47.066)" fill="#747474"/>
                                                        <path id="Path_44" data-name="Path 44" d="M57.644,189.847a1.558,1.558,0,1,0-1.558,1.558A1.56,1.56,0,0,0,57.644,189.847Zm-1.558.829a.829.829,0,1,1,.829-.829A.83.83,0,0,1,56.085,190.676Zm0,0" transform="translate(-52.948 -182.832)" fill="#747474"/>
                                                        <path id="Path_45" data-name="Path 45" d="M17.193,140.688a3.391,3.391,0,0,0-4.29,0,4,4,0,0,0-1.215,4.106,7.349,7.349,0,0,0,2.363,3.18H9.6L3.87,143.282l3.182-1.73a.365.365,0,0,0-.348-.64l-3.119,1.7v-.919a7.546,7.546,0,0,0,2.586-3.111,3.641,3.641,0,0,0-1.036-3.826,3.027,3.027,0,0,0-3.83,0A3.564,3.564,0,0,0,.221,138.41a7.5,7.5,0,0,0,2.634,3.278v1.532a.369.369,0,0,0,.134.282l6.247,5.118a.365.365,0,0,0,.231.083h5.581a.487.487,0,0,0,.313-.15,8.707,8.707,0,0,0,2.993-3.571,4.085,4.085,0,0,0-1.162-4.294ZM.919,138.2a2.846,2.846,0,0,1,.848-2.884,2.3,2.3,0,0,1,2.905,0,2.919,2.919,0,0,1,.808,3.028,6.648,6.648,0,0,1-2.26,2.7,6.7,6.7,0,0,1-2.3-2.845Zm16.745,6.548a7.668,7.668,0,0,1-2.616,3.119,7.72,7.72,0,0,1-2.663-3.284,3.287,3.287,0,0,1,.98-3.331,2.673,2.673,0,0,1,3.365,0,3.371,3.371,0,0,1,.934,3.5Zm0,0" transform="translate(-0.083 -130.183)" fill="#747474"/>
                                                        <path id="Path_46" data-name="Path 46" d="M458.584,397.637a1.721,1.721,0,1,0,1.721,1.721A1.723,1.723,0,0,0,458.584,397.637Zm0,2.714a.992.992,0,1,1,.992-.992A.993.993,0,0,1,458.584,400.35Zm0,0" transform="translate(-443.619 -386.11)" fill="#747474"/>
                                                        <path id="Path_47" data-name="Path 47" d="M311.552,10.09a.363.363,0,0,0,.174-.044l3.052-1.66a.365.365,0,0,0,.19-.32V6.941a6.734,6.734,0,0,0,2.306-2.782A3.29,3.29,0,0,0,316.338.7a2.741,2.741,0,0,0-3.468,0,3.22,3.22,0,0,0-.979,3.307,6.694,6.694,0,0,0,2.349,2.932v.908l-2.862,1.556A.367.367,0,0,0,311.552,10.09ZM312.589,3.8a2.5,2.5,0,0,1,.744-2.532,2.01,2.01,0,0,1,2.543,0,2.563,2.563,0,0,1,.709,2.659A5.845,5.845,0,0,1,314.6,6.3,5.891,5.891,0,0,1,312.589,3.8Zm0,0" transform="translate(-302.173 -0.083)" fill="#747474"/>
                                                        <path id="Path_48" data-name="Path 48" d="M266.825,343.593a.365.365,0,1,0-.364-.381A.369.369,0,0,0,266.825,343.593Zm0,0" transform="translate(-258.738 -332.925)" fill="#747474"/>
                                                    </g>
                                                </svg></label>
                                            <p><span>Ares </span> <br> {{$property->total_area}} {{$property->area_unit->name}}</p>

                                        </div>
                                    @endif

                                    @if($property->car_parking != null)
                                        <div>
                                            <label ><svg xmlns="http://www.w3.org/2000/svg" width="40.402" height="31.251" viewBox="0 0 40.402 31.251">
                                                    <g id="transportation" transform="translate(0 -53)">
                                                        <g id="Group_57" data-name="Group 57" transform="translate(0 53)">
                                                            <g id="Group_56" data-name="Group 56" transform="translate(0 0)">
                                                                <path id="Path_118" data-name="Path 118" d="M38.857,64.611l-.881-.932-3.091-8.331A3.625,3.625,0,0,0,31.51,53H9.436A3.613,3.613,0,0,0,6.06,55.348L3.013,63.575,1.744,64.749A4.96,4.96,0,0,0,0,68.522V80.66a3.609,3.609,0,0,0,3.609,3.591H5.888A3.609,3.609,0,0,0,9.5,80.66V78.9h21.41V80.66a3.609,3.609,0,0,0,3.609,3.591h2.279A3.609,3.609,0,0,0,40.4,80.66V68.2A5.006,5.006,0,0,0,38.857,64.611ZM7.683,55.935a1.867,1.867,0,0,1,1.752-1.209H31.519a1.879,1.879,0,0,1,1.752,1.209l2.693,7.252H33.953a5.921,5.921,0,0,0-11.715,0H4.99Zm24.509,7.252h-8.21a4.193,4.193,0,0,1,8.21,0ZM7.77,80.66a1.877,1.877,0,0,1-1.882,1.865H3.609A1.877,1.877,0,0,1,1.727,80.66V78.4a3.506,3.506,0,0,0,1.882.5H7.77Zm30.906,0a1.877,1.877,0,0,1-1.882,1.865H34.515a1.883,1.883,0,0,1-1.882-1.865V78.9h4.161a3.506,3.506,0,0,0,1.882-.5V80.66Zm-1.882-3.488H3.609a1.862,1.862,0,0,1-1.882-1.847v-6.8a3.241,3.241,0,0,1,1.148-2.469l.035-.035,1.174-1.105H36.776l.829.889c.009.017.035.026.043.043A3.254,3.254,0,0,1,38.667,68.2v7.122h.009A1.868,1.868,0,0,1,36.794,77.172Z" transform="translate(0 -53)" fill="#3f8809"/>
                                                            </g>
                                                        </g>
                                                        <g id="Group_59" data-name="Group 59" transform="translate(4.057 68.367)">
                                                            <g id="Group_58" data-name="Group 58">
                                                                <path id="Path_119" data-name="Path 119" d="M54.338,231H47.863a.866.866,0,0,0-.863.863v4.489a.866.866,0,0,0,.863.863h6.475a.866.866,0,0,0,.863-.863v-4.489A.866.866,0,0,0,54.338,231Zm-.863,4.489H48.727v-2.763h4.748Z" transform="translate(-47 -231)" fill="#3f8809"/>
                                                            </g>
                                                        </g>
                                                        <g id="Group_61" data-name="Group 61" transform="translate(28.143 68.367)">
                                                            <g id="Group_60" data-name="Group 60">
                                                                <path id="Path_120" data-name="Path 120" d="M333.338,231h-6.475a.866.866,0,0,0-.863.863v4.489a.866.866,0,0,0,.863.863h6.475a.866.866,0,0,0,.863-.863v-4.489A.866.866,0,0,0,333.338,231Zm-.863,4.489h-4.748v-2.763h4.748Z" transform="translate(-326 -231)" fill="#3f8809"/>
                                                            </g>
                                                        </g>
                                                        <g id="Group_63" data-name="Group 63" transform="translate(15.168 71.993)">
                                                            <g id="Group_62" data-name="Group 62">
                                                                <path id="Path_121" data-name="Path 121" d="M184.9,273h-8.339a.863.863,0,1,0,0,1.727H184.9a.863.863,0,1,0,0-1.727Z" transform="translate(-175.7 -273)" fill="#3f8809"/>
                                                            </g>
                                                        </g>
                                                        <g id="Group_65" data-name="Group 65" transform="translate(15.168 69.316)">
                                                            <g id="Group_64" data-name="Group 64" transform="translate(0 0)">
                                                                <path id="Path_122" data-name="Path 122" d="M184.9,242h-8.339a.863.863,0,0,0,0,1.727H184.9a.863.863,0,0,0,0-1.727Z" transform="translate(-175.7 -242)" fill="#3f8809"/>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></label><p><span>Parking </span> <br>{{$property->car_parking}} Parking</p>

                                        </div>
                                    @endif
                                </div>
                                <hr>
                                <h2 class="card__title">{{$property->title}}</h2>
                                {{--                                <a href="#" class="save"><svg xmlns="http://www.w3.org/2000/svg" width="27.208" height="24.206" viewBox="0 0 27.208 24.206">--}}
                                {{--                                        <path id="love-and-romance" d="M25.05,2.369A7.316,7.316,0,0,0,19.608,0a6.845,6.845,0,0,0-4.275,1.476A8.746,8.746,0,0,0,13.6,3.28a8.742,8.742,0,0,0-1.729-1.8A6.844,6.844,0,0,0,7.6,0,7.317,7.317,0,0,0,2.159,2.369,8.5,8.5,0,0,0,0,8.177a10.127,10.127,0,0,0,2.7,6.629,57.543,57.543,0,0,0,6.755,6.34c.936.8,2,1.7,3.1,2.665a1.6,1.6,0,0,0,2.1,0c1.1-.963,2.163-1.868,3.1-2.666a57.511,57.511,0,0,0,6.755-6.34,10.126,10.126,0,0,0,2.7-6.629A8.5,8.5,0,0,0,25.05,2.369Zm0,0" transform="translate(0)" fill="#dbdbdb"/>--}}
                                {{--                                    </svg></a>--}}
                                <div  class="save @if(isFavouriteProperty($property->id)) active @endif" id="fav{{$property->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27.208" height="24.206" viewBox="0 0 27.208 24.206">
                                        <path id="love-and-romance" d="M25.05,2.369A7.316,7.316,0,0,0,19.608,0a6.845,6.845,0,0,0-4.275,1.476A8.746,8.746,0,0,0,13.6,3.28a8.742,8.742,0,0,0-1.729-1.8A6.844,6.844,0,0,0,7.6,0,7.317,7.317,0,0,0,2.159,2.369,8.5,8.5,0,0,0,0,8.177a10.127,10.127,0,0,0,2.7,6.629,57.543,57.543,0,0,0,6.755,6.34c.936.8,2,1.7,3.1,2.665a1.6,1.6,0,0,0,2.1,0c1.1-.963,2.163-1.868,3.1-2.666a57.511,57.511,0,0,0,6.755-6.34,10.126,10.126,0,0,0,2.7-6.629A8.5,8.5,0,0,0,25.05,2.369Zm0,0" transform="translate(0)" fill="#dbdbdb"></path>
                                    </svg>
                                    <input type="hidden" id="property_id" name="property_id" value="{{$property->id}}">

                                </div>

                                <div class="d-flex">
                                    {{--<p>--}}
                                    {{--<a href="#" class="star m-0"><span class="material-icons">grade</span><span class="material-icons">grade</span><span class="material-icons">grade</span><span class="material-icons">grade</span><span class="material-icons material-icons-outlined">grade</span> (123 Reviews) </a>--}}
                                    {{--</p>--}}
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16.02" height="19.668" viewBox="0 0 16.02 19.668">
                                            <path id="business-and-finance" d="M61.386,18.4H60.117V2.855a.634.634,0,0,0-.634-.634H54.724V.634A.634.634,0,0,0,54.089,0h-4.4a.634.634,0,0,0-.634.634V2.221h-.516a.634.634,0,0,0-.634.634V18.4H46.634a.634.634,0,0,0,0,1.269H61.386a.634.634,0,0,0,0-1.269ZM50.322,1.269h3.133v.952H50.322ZM52.741,18.4V15.7h2.538v2.7Zm3.807,0V15.7h.278a.634.634,0,0,0,0-1.269H51.195a.634.634,0,0,0,0,1.269h.278v2.7h-2.3V3.49h9.675V18.4ZM53.1,5.353a.634.634,0,0,1-.634.634H51.75a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,53.1,5.353Zm3.767,0a.634.634,0,0,1-.634.634h-.714a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,56.865,5.353ZM53.1,7.732a.634.634,0,0,1-.634.634H51.75a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,53.1,7.732Zm3.767,0a.634.634,0,0,1-.634.634h-.714a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,56.865,7.732ZM53.1,10.112a.634.634,0,0,1-.634.634H51.75a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,53.1,10.112Zm3.767,0a.634.634,0,0,1-.634.634h-.714a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,56.865,10.112ZM53.1,12.491a.634.634,0,0,1-.634.634H51.75a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,53.1,12.491Zm3.767,0a.634.634,0,0,1-.634.634h-.714a.634.634,0,0,1,0-1.269h.714A.634.634,0,0,1,56.865,12.491Z" transform="translate(-46)" fill="#3f8809"/>
                                        </svg>
                                        Property type:<label class="mb-0">{{$property->property_category->name}}</label>
                                    </p>
                                    {{--                                    <p>Property ID: 503487066</p>--}}
                                </div>

                                <p>{{$property->title}}</p>
                                <div class="para">
                                    {!! $property->property_detail !!}
                                </div>

                                <h2 class="price">NPR {{$property->price}}</h2>

                            </div>

                        </div>

                        @if($property->map_location != null)
                            <div class="location">
                                <h2 class="section__title">Location</h2>

                                <article class="map" >
                                    {!! $property->map_location !!}
                                </article>
                            </div>
                        @endif

                    </aside>
                    @if(propertyHasAgent($property->id))
                        <aside  class="col-lg-3 p-0">
                            <div class="sticky">
                                <div class="card profile text-center">
                                    @php
                                        $agent = findPropertyAgent($property->id);
                                    @endphp
                                    <div class="card__img">
                                        <img src="{{$agent->profile}}" alt="">
                                    </div>
                                    <div class="card__body">
                                        <h2 class="card__title name">{{$agent->name}}</h2>
                                        <span class="tags">Verified</span>
                                        <div class="profile-image text-center">
                                            <img src="{{$agent->hasAgency->logo}}" alt="" class="center">
                                        </div>
                                        <h2 class="card__title">{{$agent->hasAgency->agency_name}}</h2>
                                        <h2 class="small__title mb-0">{{$agent->hasAgency->address}}</h2>
                                        <h2 class="small__title"> {{$property->area->name}}, {{$property->city->name}}</h2>
                                        {{--<h2 class="small__title">License Number: 654321</h2>--}}
                                        <a href="tel:{{$agent->hasAgency->agency_mobile}}" class="call btn">Call Agent</a>
                                        <a href="mailto:{{$agent->hasAgency->agency_email}}" class="mail btn">Email Agent</a>

                                    </div>
                                </div>
                                <div class="card profile search">
                                    <ul>
                                        <li><h2 class="card__title">Search Property type</h2></li>
                                        @foreach($property_categories as $property_category)
                                            <li class="small__title"><a href="{{route('property.category',['propertyCategory'=>$property_category->id,'slug'=>$property_category->slug])}}">{{$property_category->name}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </aside>

                    @else
                        <aside  class="col-lg-3 p-0">
                            <div class="sticky">
                                <div class="card profile text-center">
                                    <div class="card__img">
                                        <img src="{{asset('images/default/defaultUser.jpg')}}" alt="">
                                    </div>
                                    <div class="card__body">
                                        <h2 class="card__title name">Linkedhill</h2>
                                        <span class="tags">Verified</span>
                                        <img src="{{asset('images/'.$website->logo)}}" alt="">
                                        <h2 class="card__title">Linkedhill Pvt. Ltd</h2>
                                        <h2 class="small__title mb-2">{{$website->address}}</h2>
                                        <a href="tel:{{$website->phone}}" class="call btn">Call Agent</a>
                                        <a href="mailto:{{$website->email}}" class="mail btn">Email Agent</a>

                                    </div>
                                </div>
                                <div class="card profile search">
                                    <ul>
                                        <li><h2 class="card__title">Search Property type</h2></li>
                                        @foreach($property_categories as $property_category)
                                            <li class="small__title"><a href="{{route('property.category',['propertyCategory'=>$property_category->id,'slug'=>$property_category->slug])}}">{{$property_category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>

                    @endif
                </div>

            </div>

        </section>


        @if(count($related_properties)>1)
            <section class="feature nearby" >
                <div class="section-rule pt-0">
                    <div class="section__title--wrapper">
                        <h2 class="section__title">Nearby Properties</h2>
                        {{--                    <a href="#" class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">--}}
                        {{--                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>--}}
                        {{--                        </svg>View More</a>--}}
                    </div>

                    <div class="carousel">
                        @include('frontend.includes.properties',['properties' => $related_properties])
                    </div>
                </div>
            </section>
        @endif
        @if(count($recommended_properties)>1)
            <section class="feature recommended">
                <div class="section-rule pt-0">
                    <div class="section__title--wrapper">
                        <h2 class="section__title">Recommended</h2>
                        {{--                    <a href=" " class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">--}}
                        {{--                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>--}}
                        {{--                        </svg>View More</a>--}}
                    </div>

                    <div class="carousel">
                        @include('frontend.includes.properties',['properties' => $recommended_properties])


                    </div>


                </div>
            </section>
        @endif
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


    <script>


        @if(\Illuminate\Support\Facades\Auth::check())
        $('.save').click(function(e){
            e.preventDefault();
            var id = $(this).find('#property_id').val();
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: "{{url('add-to-favlist')}}/"+id,
                success: function (response) {
                    console.log("fav added");
                    // $("#fav"+id).html('<i class="icon-heart"></i>');
                    e.preventDefault();
                    $("#fav"+id).addClass("active");

                }
            });


        })
        @else

        $('.save').click(function(e){
            e.preventDefault();
            $('#login').modal('show');
        })
        @endif

    </script>
@endpush
