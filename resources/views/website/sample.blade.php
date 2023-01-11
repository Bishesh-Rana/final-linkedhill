@extends('website.layouts.app')

@section('content')
<section id="property_detail_wrapper" class="cs_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site_title">
                    <h2>Properties in Nepal to Buy or Rent</h2>
                    <p>We offers a wide variety of properties in Kathmandu and in Nepal.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel" id="property">
                    <div>
                        <div class="category_card">
                            <img src="images/z1.jpg" alt="">
                            <h1>Hostel</h1>
                        </div>
                    </div>
                    <div>
                        <div class="category_card">
                            <img src="images/z2.jpg" alt="">
                            <h1>Office space</h1>
                        </div>
                    </div>
                    <div>
                        <div class="category_card">
                            <img src="images/z3.jpg" alt="">
                            <h1>Business</h1>
                        </div>
                    </div>
                    <div>
                        <div class="category_card">
                            <img src="images/z4.jpg" alt="">
                            <h1>Apartment</h1>
                        </div>
                    </div>
                    <div>
                        <div class="category_card">
                            <img src="images/z5.jpg" alt="">
                            <h1>Flat</h1>
                        </div>
                    </div>
                    <div>
                        <div class="category_card">
                            <img src="images/z6.jpg" alt="">
                            <h1>Land</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



 <section>
     <!-- search filter start -->
     <div class="caption_search">
            <div class="container">
                <div class="search_wrapper">
                    <div class="left_pannel_search">
                        <h2>Search rental properties</h2>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-buy-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-buy" type="button" role="tab" aria-controls="pills-buy"
                                    aria-selected="true">Buy</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-rent-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-rent" type="button" role="tab" aria-controls="pills-rent"
                                    aria-selected="false">Rent</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-sold-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-sold" type="button" role="tab" aria-controls="pills-sold"
                                    aria-selected="false">Sold</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-property-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-property" type="button" role="tab"
                                    aria-controls="pills-property" aria-selected="false">Property value</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-agents-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-agents" type="button" role="tab" aria-controls="pills-agents"
                                    aria-selected="false">Find agents</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-buy" role="tabpanel"
                                aria-labelledby="pills-buy-tab">
                                <div class="text_search_wrapper">
                                    <i class="las la-search"></i>
                                    <input type="text" placeholder="search by state, suburb or postcode">
                                    <button class="btn btn-danger" type="submit">Search</button>
                                </div>
                                <div class="text_filter_option">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Property types</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-rent" role="tabpanel" aria-labelledby="pills-rent-tab">
                                <div class="text_search_wrapper">
                                    <i class="las la-search"></i>
                                    <input type="text" placeholder="search by state, suburb or postcode">
                                    <button class="btn btn-danger" type="submit">Search</button>
                                </div>
                                <div class="text_filter_option">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Property types</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-sold" role="tabpanel" aria-labelledby="pills-sold-tab">
                                <div class="text_search_wrapper">
                                    <i class="las la-search"></i>
                                    <input type="text" placeholder="search by state, suburb or postcode">
                                    <button class="btn btn-danger" type="submit">Search</button>
                                </div>
                                <div class="text_filter_option">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Property types</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-property" role="tabpanel"
                                aria-labelledby="pills-property-tab">
                                <div class="text_search_wrapper">
                                    <i class="las la-search"></i>
                                    <input type="text" placeholder="search by state, suburb or postcode">
                                    <button class="btn btn-danger" type="submit">Search</button>
                                </div>
                                <div class="text_filter_option">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Property types</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-agents" role="tabpanel"
                                aria-labelledby="pills-agents-tab">
                                <div class="text_search_wrapper">
                                    <i class="las la-search"></i>
                                    <input type="text" placeholder="search by state, suburb or postcode">
                                    <button class="btn btn-danger" type="submit">Search</button>
                                </div>
                                <div class="text_filter_option">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Property types</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Bed (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (min)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>price (max)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right_pannel_search">
                        <h2>Home Loans</h2>
                        <p>Finally, there’s one place to look for your home and your loan.</p>
                        <a href="#" class="btn btn-info">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end filter -->
 </section>
 <section id="mission_wrapper">
    <div class="container">
        <div class="row">
            <div class="ms-auto col-lg-7">
                <div class="mission_content">
                    <div class="missin_pannel">
                        <h1>Our Mission</h1>
                        <p>OUR MISSION IS TO EMPOWER CONSUMERS WITH INFORMATION TO MAKE SMART DECISIONS. FYAFULLAA IS A
                            REAL ESTATE MARKET PLACE DEDICATED TO HELPING HOMEOWNERS, HOME BUYERS, APARTMENT BUYERS,
                            APARTMENT SELLERS, LAND BUYERS, LAND SELLERS, RENTERS
                            AND AGENTS FIND AND SHARE INFORMATION ABOUT HOMES, APARTMENTS, LANDS REAL ESTATE AND
                            PROPERTY IMPROVEMENT.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mission_left">
                                <span><i class="las la-coins"></i></span>
                                <h3>SAVE MONEY</h3>
                                <p>It starts with our living database of more than 500. including homes for sale, homes
                                    for rent, land for sale, land for rent, apartment for sale, apartment for rent,
                                    hotel for sale restaurant for sale and flat or room for rent.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mission_left">
                                <span><i class="lar la-chart-bar"></i></span>
                                <h3>GOOD SALES & MARKETING</h3>
                                <p>In addition, Fyafullaa real estate operates the largest real estate and rental
                                    advertising networks in Nepal in advertising with 35 plus social sites and websites!
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mission_left">
                                <span><i class="las la-sun"></i></span>
                                <h3>COMFORT</h3>
                                <p>We are transforming the way consumers make real estate-related decisions and connect
                                    with professionals.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mission_left">
                                <span><i class="las la-search"></i></span>
                                <h3>EASY TO FIND</h3>
                                <p>It starts with our living database of more than 500 Nepal. homes – apartments – lands
                                    – hotels – restaurants and flat/rooms not currently on the market.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="product_thumbnail">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <div class="premium_thumbnail">
                    <div class="premium_thumb_images">
                        <div class="premium_images_wrap">
                            <img src="images/v1.jpg" alt="">
                        </div>
                        <div class="featured_in_wrapper">
                            Featured
                        </div>
                        <div class="for_rent_in_wrapper">
                            For Rent
                        </div>
                        <div class="for_location_in_wrapper">
                            <i class="las la-map-marker-alt"></i>
                            <a href="">Karyabinayak, kathmandu</a>
                        </div>
                        <div class="view_camera_in_wrapper">
                            <i class="las la-camera"></i> 10
                        </div>
                    </div>

                    <div class="premium_content_area">
                        <a href="">
                            <h4> Residential House On Sale At Kadaghari, Kath</h4>
                            <span>NPR 29,000,000 </span>
                            <p> Residential House on Sale At Kadaghari, Kathmandu with land size
                                4 aana and facing towards east/north with road acc </p>
                            <div class="premium_option">
                                <div>
                                    <span><i class="las la-bed"></i>11</span>
                                    <span><i class="las la-bath"></i>4</span>
                                </div>
                                <div>
                                    <span class="small_btn">full info</span>
                                </div>
                            </div>
                        </a>
                        <div class="premium_share">
                            <div class="small_thumb">
                                <span><img src="images/v1.jpg" alt=""></span>
                                <span>Smartdestate</span>
                            </div>
                            <div class="share_pannel">
                                <span>
                                    <i data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"
                                        class="las la-share-alt-square"></i>
                                    <ul class="hover_social_link">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="las la-envelope"></i></a></li>
                                        <li><a href="#"><i class="lab la-pinterest-p"></i></a></li>
                                    </ul>
                                </span>
                                <span><i class="lar la-plus-square"></i></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
