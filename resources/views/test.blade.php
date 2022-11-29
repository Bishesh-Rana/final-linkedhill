@extends('frontend.layouts.master')
@section('title','Linkedhill - all about Property')
@push('css')
<link rel="stylesheet" href="{{asset('frontend/node_modules/nouislider/distribute/nouislider.min.css')}}">
@endpush

@section('content')
    <main class="home-page">
        <section class="screen">
            <div class="carousel">
                @foreach($sliders as $slider)
                    <div class="item">
                        <img src="{{$slider->image}}" alt="">
                    </div>
                @endforeach
            </div>
            <div class="absolute__wrapper">
                <div class="section-rule">
                    <h2 class="screen__title">Find your <br> Dream Home</h2>
                    <form class="form-inline main-form" action=" " autocomplete="off">
                        <aside>


                            <div class="form-row "><!-- add  only__two  class if there is only Buy and rent like this  <div class="form-group form-check only__two"> -->
                                <div class="form-group form-check">
                                    <input type="radio" name="exampleRadios" class="form-check-input" id="categoryFilter1" checked="">
                                    <label class="form-check-label" for="categoryFilter1">Buy</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" name="exampleRadios" class="form-check-input" id="categoryFilter2">
                                    <label class="form-check-label" for="categoryFilter2">Rent</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" name="exampleRadios" class="form-check-input" id="categoryFilter3">
                                    <label class="form-check-label" for="categoryFilter3">Share</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" name="exampleRadios" class="form-check-input" id="categoryFilter4">
                                    <label class="form-check-label" for="categoryFilter4">Loans &amp; Insurance</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" name="exampleRadios" class="form-check-input" id="categoryFilter5">
                                    <label class="form-check-label" for="categoryFilter5">Property Management</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="radio" name="exampleRadios" class="form-check-input" id="categoryFilter6">
                                    <label class="form-check-label" for="categoryFilter6">Tradelink</label>
                                </div>
                            </div>
                            <div class="form-row second">

                                <div class="form-group">
                                    <i class="material-icons material-icons-outlined">location_on</i>
                                    <select  multiple class="form-control" id='testSelect1'>

                                        <option value='1' >Province No. 1</option>
                                        <option value='2'>Province No. 2</option>
                                        <option value='3'>Bagmati Pradesh</option>
                                        <option value='4'>Gandaki Pradesh</option>
                                        <option value='5'>Province No. 5</option>
                                        <option value='4'>Karnali Pradesh</option>
                                        <option value='5'>Sudurpashchim Pradesh</option>
                                    </select>
                                    <i class="material-icons arrow">expand_more</i>
                                    <!-- province_0 should start from 0 -->
                                    <div class="city province_0">
                                        <!-- ps: donot put space  after cities name  -->
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Biratnagar</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Dhankuta</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Taplejung</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Mechi</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Bhojpur</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="city province_1">
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Saptari</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Siraha</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Dhanusa</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Mechi</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Mahottari</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Sarlahi</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Bara</span>
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="city province_2">
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Sindhuli</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Ramechhap</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Dolakha</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Sindhupalchok</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Kavrepalanchok</span>
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="city province_3">
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Gorkha</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Lamjung </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Tanahun</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Syangja </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Kaski</span>
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="city province_4">
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Gulmi</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Palpa </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Parasi</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Rupandehi </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Kapilvastu</span>
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="city province_5">
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Salyan</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Surkhet </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Dailekh</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Jajarkot </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Dolpa</span>
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="city province_6">
                                        <ul >
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Bajura</span>
                                                </label>
                                            </li><li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Bajhang</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Achham</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Doti </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="multiselect-checkbox custom-control-input" type="checkbox">
                                                    <span class="multiselect-text custom-control-label">Kailali</span>
                                                </label>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group" id="appendtag">
                                    <div class="tag__container">

                                    </div>
                                    <div class="form-group">
                                        <input type="search" class="form-control" placeholder="Search by Region or Postcode"  autocomplete="anyrandomstring" >
                                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                            <li class="dropdown-item">Kathmandu</li>
                                            <li class="dropdown-item">Bhaktapur</li>
                                            <li class="dropdown-item">Lalitpur</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row second advance">

                                <div class="form-group">
                                    <select  multiple class="form-control" id='testSelect2'>
                                        <!-- home must be first -->
                                        <option value='1' >Home</option>

                                        <!-- land must be second -->
                                        <option value='2'>Land</option>
                                        <option value='3'>Appartment</option>
                                        <option value='4'>Flat</option>
                                        <!-- <option value='5'>Office</option> -->
                                    </select>
                                    <i class="material-icons arrow">expand_more</i>
                                </div>
                                <div class="form-group" id="add_home">
                                    <ul class="nav flex-column">
                                        <div class="example outer_link">
                                            <div class="d-flex flex__parent">
                                                <div class="form-group d-flex">
                                                    <select id="input-select--hr"><option selected="">Min Price</option><option value="0">Rs: 0</option><option value="20000">Rs: 20000</option><option value="40000">Rs: 40000</option><option value="60000">Rs: 60000</option><option value="80000">Rs: 80000</option><option value="100000">Rs: 100000</option><option value="120000">Rs: 120000</option><option value="140000">Rs: 140000</option><option value="160000">Rs: 160000</option><option value="180000">Rs: 180000</option><option value="200000">Rs: 200000</option></select>
                                                    <i class="material-icons ">unfold_more</i>
                                                </div>
                                                <div class="form-group d-flex">
                                                    <select id="input-select2--hr"><option selected="">Max Price</option><option value="0">Rs: 0</option><option value="20000">Rs: 20000</option><option value="40000">Rs: 40000</option><option value="60000">Rs: 60000</option><option value="80000">Rs: 80000</option><option value="100000">Rs: 100000</option><option value="120000">Rs: 120000</option><option value="140000">Rs: 140000</option><option value="160000">Rs: 160000</option><option value="180000">Rs: 180000</option><option value="200000">Rs: 200000</option></select>
                                                    <i class="material-icons ">unfold_more</i>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                    <!-- land area -->
                                    <ul class="nav flex-column only_land">

                                        <div class="d-flex flex__parent">
                                            <div class="form-group d-flex">
                                                <select>
                                                    <option value="1" selected="">Land Area</option>
                                                    <option>1000 sq.</option>
                                                    <option>2000 sq.</option>
                                                    <option>3000 sq.</option>
                                                    <option>4000+ sq.</option>
                                                </select>
                                                <i class="material-icons ">unfold_more</i>
                                            </div>
                                        </div>

                                    </ul>
                                    <ul class="nav flex-column only_home">

                                        <div class="d-flex flex__parent">
                                            <div class="form-group d-flex">
                                                <select>
                                                    <option value="1" selected="">Bed Rooms</option>
                                                    <option>1 Bed.</option>
                                                    <option>2 Bed</option>
                                                    <option>3 Bed</option>
                                                    <option>4+ Bed </option>
                                                </select>
                                                <i class="material-icons ">unfold_more</i>
                                            </div>

                                        </div>
                                    </ul>
                                    <ul class="nav flex-column only_home">
                                        <div class="d-flex flex__parent">
                                            <div class="form-group d-flex">
                                                <select>
                                                    <option value="1" selected="">Bathrooms</option>
                                                    <option>1 Bathroom</option>
                                                    <option>2 Bathroom</option>
                                                    <option>3 Bathroom</option>
                                                    <option>4+ Bathroom</option>
                                                </select>
                                                <i class="material-icons ">unfold_more</i>
                                            </div>
                                        </div>
                                    </ul>

                                </div>
                            </div>

                        </aside>
                        <button class="article__item" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.209" height="16.422" viewBox="0 0 16.209 16.422">
                                <path id="Union_2" data-name="Union 2" d="M12.193,12.967l2.5,2.134ZM0,7.354a7.354,7.354,0,1,1,7.354,7.354A7.354,7.354,0,0,1,0,7.354Z" transform="translate(0.75 0.75)" fill="none" stroke="#fff" stroke-width="1.5" opacity="0.57"/>
                            </svg>
                            <text>Search</text>
                        </button>
                    </form>

                    <a href="#scrolldown" class="scrolldown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35.5" height="57.284" viewBox="0 0 35.5 57.284">
                            <g id="scroll_down" data-name="scroll down" transform="translate(-676 -788)">
                                <g id="Rectangle_9" data-name="Rectangle 9" transform="translate(676 788)" fill="none" stroke="#fff" stroke-width="2">
                                    <rect width="35.5" height="57.284" rx="17.75" stroke="none"/>
                                    <rect x="1" y="1" width="33.5" height="55.284" rx="16.75" fill="none"/>
                                </g>
                                <circle id="Ellipse_4" data-name="Ellipse 4" cx="2.017" cy="2.017" r="2.017" transform="translate(691.33 797.682)" fill="#fff"/>
                                <circle id="Ellipse_4-2" data-name="Ellipse 4" cx="2.017" cy="2.017" r="2.017" transform="translate(691.33 805.75)" fill="#fff" opacity="0.62"/>
                                <circle id="Ellipse_4-3" data-name="Ellipse 4" cx="2.017" cy="2.017" r="2.017" transform="translate(691.33 813.818)" fill="#fff" opacity="0.29"/>
                                <path id="Union_4" data-name="Union 4" d="M0,8.448V0H8.448V1.352h-7.1v7.1Z" transform="translate(693.518 833.834) rotate(-135)" fill="#fff"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

        </section>

        <section class="feature cmm" id="scrolldown">
            <div class="section-rule">
                <div class="section__title--wrapper">
                    <h2 class="section__title">Featured Properties</h2>
                    <a href=" " class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>
                        </svg>View More</a>
                </div>

                <div class="carousel">
                    @foreach($properties as $property)
                        @if(propertyAgent($property->id) != 0)
                            <article class="item">
                                <a class="card" href="{{route('property.detail',['id'=>$property->id,'slug'=>$property->slug])}}">
                                    <div class="card__img">
                                        <img src="{{$property->images->first()->name}}" alt="">

                                    </div>
                                    <div class="card__body">
                                        <div class="card__top d-flex align-items-start justify-content-between">
                                            <div>
                                                <h2 class="card__title">{{$property->title}}</h2>
                                                <p class="small__title">{{$property->address}}</p>
                                            </div>
                                            <div  class="save"><svg xmlns="http://www.w3.org/2000/svg" width="27.208" height="24.206" viewBox="0 0 27.208 24.206">
                                                    <path id="love-and-romance" d="M25.05,2.369A7.316,7.316,0,0,0,19.608,0a6.845,6.845,0,0,0-4.275,1.476A8.746,8.746,0,0,0,13.6,3.28a8.742,8.742,0,0,0-1.729-1.8A6.844,6.844,0,0,0,7.6,0,7.317,7.317,0,0,0,2.159,2.369,8.5,8.5,0,0,0,0,8.177a10.127,10.127,0,0,0,2.7,6.629,57.543,57.543,0,0,0,6.755,6.34c.936.8,2,1.7,3.1,2.665a1.6,1.6,0,0,0,2.1,0c1.1-.963,2.163-1.868,3.1-2.666a57.511,57.511,0,0,0,6.755-6.34,10.126,10.126,0,0,0,2.7-6.629A8.5,8.5,0,0,0,25.05,2.369Zm0,0" transform="translate(0)" fill="#dbdbdb"></path>
                                                </svg></div>
                                        </div>

                                        <h2 class="price">{{$currency}} {{$property->price}}</h2>
                                        <div class="card__action d-flex">
                                            <div>
                                                <label ><svg xmlns="http://www.w3.org/2000/svg" width="20.593" height="13.353" viewBox="0 0 20.593 13.353">
                                                        <g id="bed_2_" data-name="bed (2)" transform="translate(0)">
                                                            <path id="Union_5" data-name="Union 5" d="M16.974,13.353a.4.4,0,0,1-.4-.4V11.744H4.022v1.207a.4.4,0,0,1-.4.4H1.207a.4.4,0,0,1-.4-.4V11.676A1.208,1.208,0,0,1,0,10.538V8.125A1.208,1.208,0,0,1,.8,6.987V2.253A2.233,2.233,0,0,1,2.815,0H17.777a2.234,2.234,0,0,1,2.011,2.253V6.987a1.208,1.208,0,0,1,.8,1.137v2.414a1.208,1.208,0,0,1-.8,1.137v1.276a.4.4,0,0,1-.4.4Zm.4-.8h1.609v-.8H17.375Zm-15.766,0H3.217v-.8H1.609ZM.8,10.538a.4.4,0,0,0,.4.4h18.18a.4.4,0,0,0,.4-.4v-.4H11.905a.4.4,0,1,1,0-.8h7.883V8.125a.4.4,0,0,0-.4-.4H1.207a.4.4,0,0,0-.4.4V9.331H8.688a.4.4,0,1,1,0,.8H.8Zm14.56-7.883a1.208,1.208,0,0,1,1.207,1.207V5.349A2.019,2.019,0,0,1,18.14,6.918h.844V2.253C18.984,1.6,18.446.8,17.777.8H2.815C2.147.8,1.609,1.6,1.609,2.253V6.918h.844A2.018,2.018,0,0,1,4.022,5.349V3.861A1.208,1.208,0,0,1,5.229,2.655H8.688A1.208,1.208,0,0,1,9.895,3.861V5.309h.8V3.861a1.208,1.208,0,0,1,1.207-1.207ZM3.287,6.918h14.02a1.208,1.208,0,0,0-1.137-.8H4.424A1.208,1.208,0,0,0,3.287,6.918ZM11.5,3.861V5.309h4.264V3.861a.4.4,0,0,0-.4-.4H11.905A.4.4,0,0,0,11.5,3.861Zm-6.677,0V5.309H9.09V3.861a.4.4,0,0,0-.4-.4H5.229A.4.4,0,0,0,4.826,3.861ZM9.895,9.734a.4.4,0,1,1,.4.4A.4.4,0,0,1,9.895,9.734Z" transform="translate(0)" fill="#747474"/>
                                                        </g>
                                                    </svg>{{$property->total_bed_room}} Beds</label>

                                            </div>
                                            <div>
                                                <label ><svg xmlns="http://www.w3.org/2000/svg" width="16.611" height="17.402" viewBox="0 0 16.611 17.402">
                                                        <path id="bathroom" d="M16.611,9.279h-3.3V2.957a2.957,2.957,0,0,0-5.912-.1H6.279v1.02H9.542V2.855H8.423a1.937,1.937,0,0,1,3.872.1V9.279H0V10.3H.874V12.45A3.739,3.739,0,0,0,3.3,15.944V17.4h1.02V16.171q.144.011.29.011H12q.146,0,.29-.011V17.4h1.02V15.944a3.739,3.739,0,0,0,2.423-3.495V10.3h.874ZM14.717,12.45A2.716,2.716,0,0,1,12,15.162h-7.4A2.716,2.716,0,0,1,1.894,12.45V10.3H3.808v2.538h5.37V10.3h5.539ZM8.158,10.3v1.518H4.827V10.3Zm0,0" fill="#747474"/>
                                                    </svg>{{$property->total_bathroom}} Baths</label>

                                            </div>
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
                                                    </svg>{{$property->total_area}} {{$property->area_unit->name}}</label>

                                            </div>
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
                                                    </svg>{{$property->car_parking}} Parking</label>

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>


            </div>
        </section>

        <section class="property">
            <div class="section-rule">
                <div class="section__title--wrapper">
                    <h2 class="section__title">Property by City</h2>
                    <a href=" " class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>
                        </svg>View More</a>
                </div>
                <div class="row">
                    @foreach($cities as $city)
                        <article class="col-sm-6">
                            <div class="card">
                                <div class="card__img">
                                    <img src="{{asset('images/cities/'.$city->image)}}" alt="card__title">
                                </div>
                                <div class="card__body">
                                    <h2 class="card__title">{{$city->name}}</h2>
                                    <div class="card__action d-flex">
                                        <h2 class="small__title">Property By City</h2>
                                        <h2 class="small__title">18 Properties</h2>
                                    </div>
                                </div>

                                <div class="card__body hover">
                                    <h2 class="card__title">{{$city->name}}</h2>
                                    <h2 class="small__title">Property By City</h2>
                                    <button onclick="window.location.href='{{route('property.city',['city'=>$city->id,'slug'=>$city->slug])}}'">View Details</button>
                                </div>

                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

        </section>

        @if(count($premium_properties)>0)
            <section class="feature listed cmm" >
                <div class="section-rule pb-0">
                    <div class="section__title--wrapper">
                        <h2 class="section__title">Premium Properties in Nepal</h2>
                        <a href=" " class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                                <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>
                            </svg>View More</a>
                    </div>

                    <div class="carousel">
                        @foreach($premium_properties as $premium_property )
                            <article class="item">
                                <a class="card" href="{{route('property.detail',['id'=>$premium_property->id,'slug'=>$premium_property->slug])}}">
                                    <div class="card__img">
                                        <img src="{{$premium_property->images->first()->name}}" alt="">

                                    </div>
                                    <div class="card__body">
                                        <div class="card__top d-flex align-items-start justify-content-between">
                                            <div>
                                                <h2 class="card__title">{{$premium_property->title}}</h2>
                                                <p class="small__title">{{$premium_property->address}}</p>
                                            </div>
                                            <div  class="save"><svg xmlns="http://www.w3.org/2000/svg" width="27.208" height="24.206" viewBox="0 0 27.208 24.206">
                                                    <path id="love-and-romance" d="M25.05,2.369A7.316,7.316,0,0,0,19.608,0a6.845,6.845,0,0,0-4.275,1.476A8.746,8.746,0,0,0,13.6,3.28a8.742,8.742,0,0,0-1.729-1.8A6.844,6.844,0,0,0,7.6,0,7.317,7.317,0,0,0,2.159,2.369,8.5,8.5,0,0,0,0,8.177a10.127,10.127,0,0,0,2.7,6.629,57.543,57.543,0,0,0,6.755,6.34c.936.8,2,1.7,3.1,2.665a1.6,1.6,0,0,0,2.1,0c1.1-.963,2.163-1.868,3.1-2.666a57.511,57.511,0,0,0,6.755-6.34,10.126,10.126,0,0,0,2.7-6.629A8.5,8.5,0,0,0,25.05,2.369Zm0,0" transform="translate(0)" fill="#dbdbdb"></path>
                                                </svg></div>
                                        </div>

                                        <h2 class="price">{{$currency}} {{$premium_property->price}}</h2>
                                        <div class="card__action d-flex">
                                            <div>
                                                <label ><svg xmlns="http://www.w3.org/2000/svg" width="20.593" height="13.353" viewBox="0 0 20.593 13.353">
                                                        <g id="bed_2_" data-name="bed (2)" transform="translate(0)">
                                                            <path id="Union_5" data-name="Union 5" d="M16.974,13.353a.4.4,0,0,1-.4-.4V11.744H4.022v1.207a.4.4,0,0,1-.4.4H1.207a.4.4,0,0,1-.4-.4V11.676A1.208,1.208,0,0,1,0,10.538V8.125A1.208,1.208,0,0,1,.8,6.987V2.253A2.233,2.233,0,0,1,2.815,0H17.777a2.234,2.234,0,0,1,2.011,2.253V6.987a1.208,1.208,0,0,1,.8,1.137v2.414a1.208,1.208,0,0,1-.8,1.137v1.276a.4.4,0,0,1-.4.4Zm.4-.8h1.609v-.8H17.375Zm-15.766,0H3.217v-.8H1.609ZM.8,10.538a.4.4,0,0,0,.4.4h18.18a.4.4,0,0,0,.4-.4v-.4H11.905a.4.4,0,1,1,0-.8h7.883V8.125a.4.4,0,0,0-.4-.4H1.207a.4.4,0,0,0-.4.4V9.331H8.688a.4.4,0,1,1,0,.8H.8Zm14.56-7.883a1.208,1.208,0,0,1,1.207,1.207V5.349A2.019,2.019,0,0,1,18.14,6.918h.844V2.253C18.984,1.6,18.446.8,17.777.8H2.815C2.147.8,1.609,1.6,1.609,2.253V6.918h.844A2.018,2.018,0,0,1,4.022,5.349V3.861A1.208,1.208,0,0,1,5.229,2.655H8.688A1.208,1.208,0,0,1,9.895,3.861V5.309h.8V3.861a1.208,1.208,0,0,1,1.207-1.207ZM3.287,6.918h14.02a1.208,1.208,0,0,0-1.137-.8H4.424A1.208,1.208,0,0,0,3.287,6.918ZM11.5,3.861V5.309h4.264V3.861a.4.4,0,0,0-.4-.4H11.905A.4.4,0,0,0,11.5,3.861Zm-6.677,0V5.309H9.09V3.861a.4.4,0,0,0-.4-.4H5.229A.4.4,0,0,0,4.826,3.861ZM9.895,9.734a.4.4,0,1,1,.4.4A.4.4,0,0,1,9.895,9.734Z" transform="translate(0)" fill="#747474"/>
                                                        </g>
                                                    </svg>{{$premium_property->total_bed_room}} Beds</label>

                                            </div>
                                            <div>
                                                <label ><svg xmlns="http://www.w3.org/2000/svg" width="16.611" height="17.402" viewBox="0 0 16.611 17.402">
                                                        <path id="bathroom" d="M16.611,9.279h-3.3V2.957a2.957,2.957,0,0,0-5.912-.1H6.279v1.02H9.542V2.855H8.423a1.937,1.937,0,0,1,3.872.1V9.279H0V10.3H.874V12.45A3.739,3.739,0,0,0,3.3,15.944V17.4h1.02V16.171q.144.011.29.011H12q.146,0,.29-.011V17.4h1.02V15.944a3.739,3.739,0,0,0,2.423-3.495V10.3h.874ZM14.717,12.45A2.716,2.716,0,0,1,12,15.162h-7.4A2.716,2.716,0,0,1,1.894,12.45V10.3H3.808v2.538h5.37V10.3h5.539ZM8.158,10.3v1.518H4.827V10.3Zm0,0" fill="#747474"/>
                                                    </svg>{{$premium_property->total_bathroom}} Baths</label>

                                            </div>
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
                                                    </svg>{{$premium_property->total_area}} {{$premium_property->area_unit->name}}</label>

                                            </div>
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
                                                    </svg>{{$premium_property->car_parking}} Parking</label>

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="feature listed cmm" >
            <div class="section-rule pb-0">
                <div class="section__title--wrapper">
                    <h2 class="section__title">Trending Property</h2>
                    <a href="{{route('property.detail',['id'=>$property->id,'slug'=>$property->slug])}}" class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>
                        </svg>View More</a>
                </div>

                <div class="carousel">
                    @foreach($trending_properties as $trending_property)
                        <article class="item">
                            <a class="card" href="{{route('property.detail',['id'=>$trending_property->id,'slug'=>$trending_property->slug])}}">
                                <div class="card__img">
                                    <img src="{{$trending_property->images->first()->name}}" alt="">

                                </div>
                                <div class="card__body">
                                    <div class="card__top d-flex align-items-start justify-content-between">
                                        <div>
                                            <h2 class="card__title">{{$trending_property->title}}</h2>
                                            <p class="small__title">{{$trending_property->address}}</p>
                                        </div>
                                        <div  class="save"><svg xmlns="http://www.w3.org/2000/svg" width="27.208" height="24.206" viewBox="0 0 27.208 24.206">
                                                <path id="love-and-romance" d="M25.05,2.369A7.316,7.316,0,0,0,19.608,0a6.845,6.845,0,0,0-4.275,1.476A8.746,8.746,0,0,0,13.6,3.28a8.742,8.742,0,0,0-1.729-1.8A6.844,6.844,0,0,0,7.6,0,7.317,7.317,0,0,0,2.159,2.369,8.5,8.5,0,0,0,0,8.177a10.127,10.127,0,0,0,2.7,6.629,57.543,57.543,0,0,0,6.755,6.34c.936.8,2,1.7,3.1,2.665a1.6,1.6,0,0,0,2.1,0c1.1-.963,2.163-1.868,3.1-2.666a57.511,57.511,0,0,0,6.755-6.34,10.126,10.126,0,0,0,2.7-6.629A8.5,8.5,0,0,0,25.05,2.369Zm0,0" transform="translate(0)" fill="#dbdbdb"></path>
                                            </svg></div>
                                    </div>

                                    <h2 class="price">{{$currency}} {{$trending_property->price}}</h2>
                                    <div class="card__action d-flex">
                                        <div>
                                            <label ><svg xmlns="http://www.w3.org/2000/svg" width="20.593" height="13.353" viewBox="0 0 20.593 13.353">
                                                    <g id="bed_2_" data-name="bed (2)" transform="translate(0)">
                                                        <path id="Union_5" data-name="Union 5" d="M16.974,13.353a.4.4,0,0,1-.4-.4V11.744H4.022v1.207a.4.4,0,0,1-.4.4H1.207a.4.4,0,0,1-.4-.4V11.676A1.208,1.208,0,0,1,0,10.538V8.125A1.208,1.208,0,0,1,.8,6.987V2.253A2.233,2.233,0,0,1,2.815,0H17.777a2.234,2.234,0,0,1,2.011,2.253V6.987a1.208,1.208,0,0,1,.8,1.137v2.414a1.208,1.208,0,0,1-.8,1.137v1.276a.4.4,0,0,1-.4.4Zm.4-.8h1.609v-.8H17.375Zm-15.766,0H3.217v-.8H1.609ZM.8,10.538a.4.4,0,0,0,.4.4h18.18a.4.4,0,0,0,.4-.4v-.4H11.905a.4.4,0,1,1,0-.8h7.883V8.125a.4.4,0,0,0-.4-.4H1.207a.4.4,0,0,0-.4.4V9.331H8.688a.4.4,0,1,1,0,.8H.8Zm14.56-7.883a1.208,1.208,0,0,1,1.207,1.207V5.349A2.019,2.019,0,0,1,18.14,6.918h.844V2.253C18.984,1.6,18.446.8,17.777.8H2.815C2.147.8,1.609,1.6,1.609,2.253V6.918h.844A2.018,2.018,0,0,1,4.022,5.349V3.861A1.208,1.208,0,0,1,5.229,2.655H8.688A1.208,1.208,0,0,1,9.895,3.861V5.309h.8V3.861a1.208,1.208,0,0,1,1.207-1.207ZM3.287,6.918h14.02a1.208,1.208,0,0,0-1.137-.8H4.424A1.208,1.208,0,0,0,3.287,6.918ZM11.5,3.861V5.309h4.264V3.861a.4.4,0,0,0-.4-.4H11.905A.4.4,0,0,0,11.5,3.861Zm-6.677,0V5.309H9.09V3.861a.4.4,0,0,0-.4-.4H5.229A.4.4,0,0,0,4.826,3.861ZM9.895,9.734a.4.4,0,1,1,.4.4A.4.4,0,0,1,9.895,9.734Z" transform="translate(0)" fill="#747474"/>
                                                    </g>
                                                </svg>{{$trending_property->total_bed_room}} Beds</label>

                                        </div>
                                        <div>
                                            <label ><svg xmlns="http://www.w3.org/2000/svg" width="16.611" height="17.402" viewBox="0 0 16.611 17.402">
                                                    <path id="bathroom" d="M16.611,9.279h-3.3V2.957a2.957,2.957,0,0,0-5.912-.1H6.279v1.02H9.542V2.855H8.423a1.937,1.937,0,0,1,3.872.1V9.279H0V10.3H.874V12.45A3.739,3.739,0,0,0,3.3,15.944V17.4h1.02V16.171q.144.011.29.011H12q.146,0,.29-.011V17.4h1.02V15.944a3.739,3.739,0,0,0,2.423-3.495V10.3h.874ZM14.717,12.45A2.716,2.716,0,0,1,12,15.162h-7.4A2.716,2.716,0,0,1,1.894,12.45V10.3H3.808v2.538h5.37V10.3h5.539ZM8.158,10.3v1.518H4.827V10.3Zm0,0" fill="#747474"/>
                                                </svg>{{$trending_property->total_bathroom}} Baths</label>

                                        </div>
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
                                                </svg>{{$trending_property->total_area}} {{$trending_property->area_unit->name}}</label>

                                        </div>
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
                                                </svg>{{$trending_property->car_parking}} Parking</label>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>


        <section class="loan">
            <div class="section-rule ">
                <h2 class="section__title">Home Loan Calculator</h2>
                <div class="row">
                    <article class="col-sm-3">
                        <div class="card">
                            <h2 class="card__title">
                                Borrowing Power Calculator
                            </h2>
                            <h2 class="small__title">Quickly estimate how much you may be able to borrow</h2>
                            <div>
                                <button onclick="window.location.href='#'">Calculate</button>
                            </div>
                        </div>
                    </article>
                    <article class="col-sm-3">
                        <div class="card">
                            <h2 class="card__title">
                                Stamp Duty Calculator
                            </h2>
                            <h2 class="small__title">Quickly estimate how much you may be able to borrow</h2>
                            <div>
                                <button onclick="window.location.href='#'">Calculate</button>
                            </div>
                        </div>
                    </article>
                    <article class="col-sm-3">
                        <div class="card">
                            <h2 class="card__title">
                                Reverse Rent Calculator
                            </h2>
                            <h2 class="small__title">Quickly estimate how much you may be able to borrow</h2>
                            <div>
                                <button onclick="window.location.href='#'">Calculate</button>
                            </div>
                        </div>
                    </article>
                    <article class="col-sm-3">
                        <div class="card">
                            <h2 class="card__title">
                                Equity Calculator
                            </h2>
                            <h2 class="small__title">Quickly estimate how much you may be able to borrow</h2>
                            <div>
                                <button onclick="window.location.href='#'">Calculate</button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>


        {{--<section class="trade">--}}
        {{--<div class="section-rule p-0">--}}
        {{--<div class="section__title--wrapper">--}}
        {{--<h2 class="section__title">Tradelink</h2>--}}
        {{--<a href="./tradelink.php" class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">--}}
        {{--<path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>--}}
        {{--</svg>View More</a>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Carpenters--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Plumbers--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Electricians--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Painters--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Interior Designers--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Engineers--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Air Conditioning--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}
        {{--<article class="col-sm-6 col-md-4 col-lg-3">--}}
        {{--<a href="#" class="card">--}}
        {{--<div class="card__img">--}}
        {{--<svg></svg>--}}
        {{--</div>--}}
        {{--<h2 class="card__title">--}}
        {{--Packers and Movers--}}
        {{--</h2>--}}

        {{--</a>--}}
        {{--</article>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}

        <section class="nepal">
            <div class="section-rule">

                <h2 class="section__title">Properties in Nepal to Buy or Rent</h2>
                <div class="carousel">
                    @foreach($property_categories as $property_category)
                        <div class="item">
                            <a href="{{route('property.category',['propertyCategory'=>$property_category->id,'slug'=>$property_category->slug])}}" class="card">
                                <div class="card__img"><img src="{{asset('images/propertyCategory/'.$property_category->image)}}" alt=""></div>
                                <div class="card__body">
                                    <h2 class="card__title">{{$property_category->name}}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="blog">
            <div class="section-rule">
                <div class="section__title--wrapper">
                    <h2 class="section__title">Latest Blogs</h2>
                    <a href=" " class="section__link"><svg xmlns="http://www.w3.org/2000/svg" width="14.727" height="14.727" viewBox="0 0 14.727 14.727">
                            <path id="Union_6" data-name="Union 6" d="M.127,10.749V2.379L0,2.389.127.8,10.079,0,9.951,1.592l-8.232.66v8.5Z" transform="translate(14.727 7.6) rotate(135)" fill="#313131" opacity="0.8"/>
                        </svg>View More</a>
                </div>

                <div class="row">
                    @foreach($blogs as $blog)
                        <article class="col-md-4">
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
                        </article>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="trade estate">
            <div class="section-rule pt-0">
                <h2 class="section__title">Trusted Real Estate</h2>
                <div class="row">
                    <article class="col">
                        <div  class="card">
                            <div class="card__img">
                                <img src="{{asset('frontend/gallery/brand/img01.png')}}" alt="">
                            </div>


                        </div>
                    </article>
                    <article class="col">
                        <div  class="card">
                            <div class="card__img">
                                <img src="{{asset('frontend/gallery/brand/img02.png')}}" alt="">
                            </div>


                        </div>
                    </article>
                    <article class="col">
                        <div  class="card">
                            <div class="card__img">
                                <img src="{{asset('frontend/gallery/brand/img03.png')}}" alt="">
                            </div>


                        </div>
                    </article>
                    <article class="col">
                        <div  class="card">
                            <div class="card__img">
                                <img src="{{asset('frontend/gallery/brand/img04.png')}}" alt="">
                            </div>


                        </div>
                    </article>
                    <article class="col">
                        <div  class="card">
                            <div class="card__img">
                                <img src="{{asset('frontend/gallery/brand/img01.png')}}" alt="">
                            </div>


                        </div>
                    </article>
                </div>
            </div>
        </section>

        <div class="category-page search-page">
            <section class="filter">
                <div class="sticky">
                    <a href="#!" class="close ">
                        <span class="material-icons"> keyboard_backspace</span> Back
                    </a>
                    <!-- <a href="#!" class="close d-lg-none">
                        <span class="material-icons"> close</span>
                    </a> -->
                    <h2 class="card__title title1">Search Filter</h2>
                    <div class="form-row top-check">
                        <div class="form-group form-check">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck1" checked="">
                            <label class="form-check-label" for="exampleCheck1">Buy</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Rent</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3">Share</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck4">
                            <label class="form-check-label" for="exampleCheck4">Loans</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck7">
                            <label class="form-check-label" for="exampleCheck7">Insurance</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck5">
                            <label class="form-check-label" for="exampleCheck5">Property Management</label>
                        </div>
                        <div class="form-group form-check trade">
                            <input type="radio" name="categoryFilter" class="form-check-input" id="exampleCheck6">
                            <label class="form-check-label" for="exampleCheck6">Tradelink</label>
                        </div>

                    </div>


                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Search by region or postcode" >
                    </div>

                    <!-- <p class="para d-flex justify-content-between"><a href="#!" >Provinces  profile </a><span class="material-icons" data-toggle="tooltip" data-placement="bottom" title="Information about Provinces  profile">help</span></p> -->


                    <h2 class="card__title title2">Property Types</h2>
                    <ul class="brand">
                        <div class="form-row">
                            <div class="form-group form-check">
                                <input type="checkbox"  class="form-check-input" id="pt01">
                                <label class="form-check-label" for="pt01">
                                    <img src="{{asset('frontend/gallery/filter/003-house.png')}}" alt="">
                                    <h2 class="small__title">Home</h2>
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox"  class="form-check-input" id="pt02">
                                <label class="form-check-label" for="pt02">
                                    <img src="{{asset('frontend/gallery/filter/005-architect.png')}}" alt="">
                                    <h2 class="small__title">Land</h2>

                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox"  class="form-check-input" id="pt03">
                                <label class="form-check-label" for="pt03">
                                    <img src="{{asset('frontend/gallery/filter/007-appartments-1.png')}}" alt="">

                                    <h2 class="small__title">Appartment</h2>
                                </label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox"  class="form-check-input" id="pt04">
                                <label class="form-check-label" for="pt04">
                                    <img src="{{asset('frontend/gallery/filter/009-building.png')}}" alt="">
                                    <h2 class="small__title">Flat</h2>
                                </label>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox"  class="form-check-input" id="pt05">
                                <label class="form-check-label" for="pt05">
                                    <img src="{{asset('frontend/gallery/filter/hotel.png')}}" alt="">
                                    <h2 class="small__title">Hostel</h2>
                                </label>
                            </div>



                        </div>

                    </ul>


                    <ul class="nav flex-column range">
                        <h2 class="card__title title1">Price</h2>
                        <div class="example outer_link">
                            <div class="d-flex flex__parent">
                                <div class="form-group d-flex">
                                    <label for="sortby"></label>
                                    <select id="input-select"></select>
                                    <i class="material-icons ">unfold_more</i>
                                </div>
                                <div class="form-group d-flex">
                                    <label for="sortby"></label>
                                    <select id="input-select2"></select>
                                    <i class="material-icons ">unfold_more</i>
                                </div>
                            </div>
                            <div id="html5"></div>

                        </div>
                    </ul>
                    <ul class="nav flex-column">
                        <h2 class="card__title title2">Land Area</h2>

                        <div class="d-flex flex__parent">
                            <div class="form-group d-flex">
                                <select >
                                    <option value="1" selected="">Area (min)</option>
                                    <option>1000 sq.</option>
                                    <option>2000 sq.</option>
                                    <option>3000 sq.</option>
                                    <option>4000 sq.</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                            <div class="form-group d-flex">
                                <select>
                                    <option value="1" selected="">Area (m)</option>
                                    <option>1000 sq.</option>
                                    <option>2000 sq.</option>
                                    <option>3000 sq.</option>
                                    <option>4000 sq.</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                        </div>
                    </ul>
                    <ul class="nav flex-column">
                        <h2 class="card__title title2">Bed Rooms</h2>

                        <div class="d-flex flex__parent">
                            <div class="form-group d-flex">
                                <select >
                                    <option value="1" selected="">max</option>
                                    <option>1000 sq.</option>
                                    <option>2000 sq.</option>
                                    <option>3000 sq.</option>
                                    <option>4000 sq.</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                            <div class="form-group d-flex">
                                <select>
                                    <option value="1" selected="">max</option>
                                    <option>1000 sq.</option>
                                    <option>2000 sq.</option>
                                    <option>3000 sq.</option>
                                    <option>4000 sq.</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                        </div>
                    </ul>
                    <ul class="nav flex-column">
                        <h2 class="card__title title2">Bathrooms</h2>

                        <div class="d-flex flex__parent">
                            <div class="form-group d-flex">
                                <select >
                                    <option value="1" selected="">min</option>
                                    <option>1000 sq.</option>
                                    <option>2000 sq.</option>
                                    <option>3000 sq.</option>
                                    <option>4000 sq.</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                            <div class="form-group d-flex">
                                <select>
                                    <option value="1" selected="">max</option>
                                    <option>1000 sq.</option>
                                    <option>2000 sq.</option>
                                    <option>3000 sq.</option>
                                    <option>4000 sq.</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                        </div>
                    </ul>

                    <p class="card__title title2">
                        <a  data-toggle="collapse" href="#!" class="adsTrigger">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-filter-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            Advance search
                        </a>
                    </p>
                    <div class="collapse" id="advanceSearch">
                        <ul class="nav flex-column">
                            <h2 class="card__title title2">Parking</h2>

                            <div class="d-flex flex__parent">
                                <div class="form-group d-flex">
                                    <select >
                                        <option value="1" selected="">min</option>
                                        <option>1000 sq.</option>
                                        <option>2000 sq.</option>
                                        <option>3000 sq.</option>
                                        <option>4000 sq.</option>
                                    </select>
                                    <i class="material-icons ">unfold_more</i>
                                </div>
                                <div class="form-group d-flex">
                                    <select>
                                        <option value="1" selected="">max</option>
                                        <option>1000 sq.</option>
                                        <option>2000 sq.</option>
                                        <option>3000 sq.</option>
                                        <option>4000 sq.</option>
                                    </select>
                                    <i class="material-icons ">unfold_more</i>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <button class="submit" onclick="window.location.href='./category-page.php'">
                        Search
                    </button>
                </div>
            </section>
            <div>

    </main>
    <script type="text/javascript" src="{{asset('frontend/node_modules/multiselect-master/multiselect.min.js')}}"></script>

    <section class="join">
        <div class="section-rule">
            <div class="section__title--wrapper plus">
                <h2 class="section__title">Join Our professional team & agents to start selling your Property </h2>
                <button onclick="window.location.href='#'">Join Us</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- custom -->
<script src="{{asset('frontend/node_modules/nouislider/distribute/nouislider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/custom.js')}}"></script>
@endpush