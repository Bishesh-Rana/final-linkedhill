<template>
    <div class="filter_style">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="search_filter_wrapper">
                        <ul
                            class="nav nav-pills mb-3"
                            id="pills-search-tap"
                            role="tablist"
                        >
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="pills-buys-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-buys"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-buys"
                                    aria-selected="true"
                                >
                                    Rent
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-Rent-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-Rent"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-Rent"
                                    aria-selected="false"
                                >
                                    Sale
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-PG-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-PG"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-PG"
                                    aria-selected="false"
                                >
                                    Lease
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-Commercial-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-Commercial"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-Commercial"
                                    aria-selected="false"
                                >
                                    Residential
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-luxury-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-luxury"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-luxury"
                                    aria-selected="false"
                                >
                                    Commercial
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="pills-agriculture-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-agriculture"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-agriculture"
                                    aria-selected="false"
                                >
                                    Agriculture
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="pills-buys"
                                role="tabpanel"
                                aria-labelledby="pills-buys-tab"
                            >
                                <!-- search filter start -->
                                <div class="search_filter-content">
                                    <div class="search_tx_select_option">
                                        <i class="las la-map-marker-alt"></i>
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>Province</option>
                                            <option value="1">bagmati</option>
                                            <option value="1">gandaki</option>
                                            <option value="1">lumbnini</option>
                                        </select>
                                    </div>
                                    <div class="search_tx-input">
                                        <i class="lar la-keyboard"></i>
                                        <input
                                            type="text"
                                            placeholder="Type locality or Project/Society or Builder"
                                        />
                                    </div>
                                    <div class="search_tx_property-type">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="property_type"
                                            >
                                                <i class="las la-home"></i>
                                                Property Type
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_option-ps property_type_menu"
                                            id=""
                                        >
                                            <ul
                                                id="tabs_gs"
                                                class="custom_tab_gs"
                                            >
                                                <li>
                                                    <a id="tab1">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential"
                                                                id="Residential"
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Residential"
                                                            >
                                                                Residential
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tab2">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential"
                                                                id="Commercial"
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Commercial"
                                                            >
                                                                Commercial
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="get_contenter"
                                                id="tab1C"
                                            >
                                                <ul id="residential_items">
                                                    <li>
                                                        <a href="#"
                                                            >Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Villa/individual
                                                            house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Builder floor</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Row House</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Farm house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Services
                                                            Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >studio
                                                            appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >residential plot</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >penthouse
                                                            appartment</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="get_contenter"
                                                id="tab2C"
                                            >
                                                <ul id="commercial_items">
                                                    <li>
                                                        <a href=""
                                                            >office space</a
                                                        >
                                                    </li>
                                                    <li><a href="">shop</a></li>
                                                    <li>
                                                        <a href="">warehouse</a>
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >commercial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Agricultural
                                                            land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >hotel/resorts</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Industrial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="">showroom</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-budgetRange">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="Budget_type"
                                            >
                                                <i class="las la-coins"></i>
                                                Budget Range
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_cost_ps Budget_type_menu"
                                            id=""
                                        >
                                            <div class="property_cost_flex">
                                                <div class="min_mc_cost">
                                                    <h5>Min</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="max_mc_cost">
                                                    <h5>Max</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-searchButton">
                                        <a href="#" class="btn btn-danger"
                                            ><i class="las la-search"></i
                                            >Search</a
                                        >
                                    </div>
                                </div>
                                <div class="search_other_content">
                                    <div class="other_content_flex">
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Land area
                                                </option>
                                                <option value="1">1000</option>
                                                <option value="2">2000</option>
                                                <option value="3">3000</option>
                                                <option value="3">4000</option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bed Rooms
                                                </option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Bed</option>
                                                <option value="3">3 Bed</option>
                                                <option value="3">
                                                    4+ Bed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bathroom
                                                </option>
                                                <option value="1">
                                                    1 Bathroom
                                                </option>
                                                <option value="2">
                                                    2 Bathroom
                                                </option>
                                                <option value="3">
                                                    3 Bathroom
                                                </option>
                                                <option value="3">
                                                    4+ Bathroom
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- search filter End -->
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-Rent"
                                role="tabpanel"
                                aria-labelledby="pills-Rent-tab"
                            >
                                <!-- search filter start -->
                                <div class="search_filter-content">
                                    <div class="search_tx_select_option">
                                        <i class="las la-map-marker-alt"></i>
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>Province</option>
                                            <option value="1">bagmati</option>
                                            <option value="1">gandaki</option>
                                            <option value="1">lumbnini</option>
                                        </select>
                                    </div>
                                    <div class="search_tx-input">
                                        <i class="lar la-keyboard"></i>
                                        <input
                                            type="text"
                                            placeholder="Type locality or Project/Society or Builder"
                                        />
                                    </div>
                                    <div class="search_tx_property-type">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="property_type"
                                            >
                                                <i class="las la-home"></i>
                                                Property Type
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_option-ps property_type_menu"
                                            id=""
                                        >
                                            <ul
                                                id="tabs_gs_100"
                                                class="custom_tab_gs"
                                            >
                                                <li>
                                                    <a id="tab100">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential1"
                                                                id="Residential1"
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Residential1"
                                                            >
                                                                Residential
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tab200">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential1"
                                                                id="Commercial1"
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Commercial1"
                                                            >
                                                                Commercial
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="get_contenter_100"
                                                id="tab100C"
                                            >
                                                <ul id="residential_items">
                                                    <li>
                                                        <a href="#"
                                                            >Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Villa/individual
                                                            house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Builder floor</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Row House</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Farm house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Services
                                                            Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >studio
                                                            appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >residential plot</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >penthouse
                                                            appartment</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="get_contenter_100"
                                                id="tab200C"
                                            >
                                                <ul id="commercial_items">
                                                    <li>
                                                        <a href=""
                                                            >office space</a
                                                        >
                                                    </li>
                                                    <li><a href="">shop</a></li>
                                                    <li>
                                                        <a href="">warehouse</a>
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >commercial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Agricultural
                                                            land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >hotel/resorts</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Industrial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="">showroom</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-budgetRange">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="Budget_type"
                                            >
                                                <i class="las la-coins"></i>
                                                Budget Range
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_cost_ps Budget_type_menu"
                                            id=""
                                        >
                                            <div class="property_cost_flex">
                                                <div class="min_mc_cost">
                                                    <h5>Min</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="max_mc_cost">
                                                    <h5>Max</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-searchButton">
                                        <a href="#" class="btn btn-danger"
                                            ><i class="las la-search"></i
                                            >Search</a
                                        >
                                    </div>
                                </div>
                                <div class="search_other_content">
                                    <div class="other_content_flex">
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Land area
                                                </option>
                                                <option value="1">1000</option>
                                                <option value="2">2000</option>
                                                <option value="3">3000</option>
                                                <option value="3">4000</option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bed Rooms
                                                </option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Bed</option>
                                                <option value="3">3 Bed</option>
                                                <option value="3">
                                                    4+ Bed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bathroom
                                                </option>
                                                <option value="1">
                                                    1 Bathroom
                                                </option>
                                                <option value="2">
                                                    2 Bathroom
                                                </option>
                                                <option value="3">
                                                    3 Bathroom
                                                </option>
                                                <option value="3">
                                                    4+ Bathroom
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- search filter End -->
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-PG"
                                role="tabpanel"
                                aria-labelledby="pills-PG-tab"
                            >
                                <!-- search filter start -->

                                <div class="search_filter-content">
                                    <div class="search_tx_select_option">
                                        <i class="las la-map-marker-alt"></i>
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>Province</option>
                                            <option value="1">bagmati</option>
                                            <option value="1">gandaki</option>
                                            <option value="1">lumbnini</option>
                                        </select>
                                    </div>
                                    <div class="search_tx-input">
                                        <i class="lar la-keyboard"></i>
                                        <input
                                            type="text"
                                            placeholder="Type locality or Project/Society or Builder"
                                        />
                                    </div>
                                    <div class="search_tx_property-type">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="property_type"
                                            >
                                                <i class="las la-home"></i>
                                                Property Type
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_option-ps property_type_menu"
                                            id=""
                                        >
                                            <ul
                                                id="tabs_gs_22"
                                                class="custom_tab_gs"
                                            >
                                                <li>
                                                    <a id="tab1000">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential2"
                                                                id="Residential2"
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Residential2"
                                                            >
                                                                Residential
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tab2000">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential2"
                                                                id="Commercial2"
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Commercial2"
                                                            >
                                                                Commercial
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="get_contenter_1000"
                                                id="tab1000C"
                                            >
                                                <ul id="residential_items">
                                                    <li>
                                                        <a href="#"
                                                            >Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Villa/individual
                                                            house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Builder floor</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Row House</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Farm house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Services
                                                            Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >studio
                                                            appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >residential plot</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >penthouse
                                                            appartment</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="get_contenter_1000"
                                                id="tab2000C"
                                            >
                                                <ul id="commercial_items">
                                                    <li>
                                                        <a href=""
                                                            >office space</a
                                                        >
                                                    </li>
                                                    <li><a href="">shop</a></li>
                                                    <li>
                                                        <a href="">warehouse</a>
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >commercial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Agricultural
                                                            land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >hotel/resorts</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Industrial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="">showroom</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-budgetRange">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="Budget_type"
                                            >
                                                <i class="las la-coins"></i>
                                                Budget Range
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_cost_ps Budget_type_menu"
                                            id=""
                                        >
                                            <div class="property_cost_flex">
                                                <div class="min_mc_cost">
                                                    <h5>Min</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="max_mc_cost">
                                                    <h5>Max</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-searchButton">
                                        <a href="#" class="btn btn-danger"
                                            ><i class="las la-search"></i
                                            >Search</a
                                        >
                                    </div>
                                </div>
                                <div class="search_other_content">
                                    <div class="other_content_flex">
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Land area
                                                </option>
                                                <option value="1">1000</option>
                                                <option value="2">2000</option>
                                                <option value="3">3000</option>
                                                <option value="3">4000</option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bed Rooms
                                                </option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Bed</option>
                                                <option value="3">3 Bed</option>
                                                <option value="3">
                                                    4+ Bed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bathroom
                                                </option>
                                                <option value="1">
                                                    1 Bathroom
                                                </option>
                                                <option value="2">
                                                    2 Bathroom
                                                </option>
                                                <option value="3">
                                                    3 Bathroom
                                                </option>
                                                <option value="3">
                                                    4+ Bathroom
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- search filter End -->
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-Commercial"
                                role="tabpanel"
                                aria-labelledby="pills-Commercial-tab"
                            >
                                <!-- search filter start -->
                                <div class="search_filter-content">
                                    <div class="search_tx_select_option">
                                        <i class="las la-map-marker-alt"></i>
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>Province</option>
                                            <option value="1">bagmati</option>
                                            <option value="1">gandaki</option>
                                            <option value="1">lumbnini</option>
                                        </select>
                                    </div>
                                    <div
                                        class="search_tx-input search_tx_width"
                                    >
                                        <i class="lar la-keyboard"></i>
                                        <input
                                            type="text"
                                            placeholder="Type locality or Project/Society or Builder"
                                        />
                                    </div>
                                    <div class="search_tx_property-type">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="property_type"
                                            >
                                                <i class="las la-home"></i>
                                                Property Type
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_option-ps property_type_menu"
                                            id=""
                                        >
                                            <ul
                                                id="tabs_gs_1"
                                                class="custom_tab_gs"
                                            >
                                                <li>
                                                    <a id="tab11">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential3"
                                                                id="Residential3"
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Residential3"
                                                            >
                                                                Residential
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tab22">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential3"
                                                                id="Commercial3"
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Commercial3"
                                                            >
                                                                Commercial
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="get_contenter_1"
                                                id="tab11C"
                                            >
                                                <ul id="residential_items">
                                                    <li>
                                                        <a href="#"
                                                            >Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Villa/individual
                                                            house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Builder floor</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Row House</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Farm house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Services
                                                            Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >studio
                                                            appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >residential plot</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >penthouse
                                                            appartment</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="get_contenter_1"
                                                id="tab22C"
                                            >
                                                <ul id="commercial_items">
                                                    <li>
                                                        <a href=""
                                                            >office space</a
                                                        >
                                                    </li>
                                                    <li><a href="">shop</a></li>
                                                    <li>
                                                        <a href="">warehouse</a>
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >commercial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Agricultural
                                                            land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >hotel/resorts</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Industrial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="">showroom</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-budgetRange">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="Budget_type"
                                            >
                                                <i class="las la-coins"></i>
                                                Budget Range
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_cost_ps Budget_type_menu"
                                            id=""
                                        >
                                            <div class="property_cost_flex">
                                                <div class="min_mc_cost">
                                                    <h5>Min</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="max_mc_cost">
                                                    <h5>Max</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-searchButton">
                                        <a href="#" class="btn btn-danger"
                                            ><i class="las la-search"></i
                                            >Search</a
                                        >
                                    </div>
                                </div>
                                <div class="search_other_content">
                                    <div class="other_content_flex">
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Land area
                                                </option>
                                                <option value="1">1000</option>
                                                <option value="2">2000</option>
                                                <option value="3">3000</option>
                                                <option value="3">4000</option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bed Rooms
                                                </option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Bed</option>
                                                <option value="3">3 Bed</option>
                                                <option value="3">
                                                    4+ Bed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bathroom
                                                </option>
                                                <option value="1">
                                                    1 Bathroom
                                                </option>
                                                <option value="2">
                                                    2 Bathroom
                                                </option>
                                                <option value="3">
                                                    3 Bathroom
                                                </option>
                                                <option value="3">
                                                    4+ Bathroom
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- search filter End -->
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-luxury"
                                role="tabpanel"
                                aria-labelledby="pills-luxury-tab"
                            >
                                <!-- search filter start -->
                                <div class="search_filter-content">
                                    <div class="search_tx_select_option">
                                        <i class="las la-map-marker-alt"></i>
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>Province</option>
                                            <option value="1">bagmati</option>
                                            <option value="1">gandaki</option>
                                            <option value="1">lumbnini</option>
                                        </select>
                                    </div>
                                    <div class="search_tx-input">
                                        <i class="lar la-keyboard"></i>
                                        <input
                                            type="text"
                                            placeholder="Type locality or Project/Society or Builder"
                                        />
                                    </div>
                                    <div class="search_tx_property-type">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="property_type"
                                            >
                                                <i class="las la-home"></i>
                                                Property Type
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_option-ps property_type_menu"
                                            id=""
                                        >
                                            <ul
                                                id="tabs_gs_33"
                                                class="custom_tab_gs"
                                            >
                                                <li>
                                                    <a id="tab10000">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential4"
                                                                id="Residential4"
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Residential4"
                                                            >
                                                                Residential
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tab20000">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential4"
                                                                id="Commercial4"
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Commercial4"
                                                            >
                                                                Commercial
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="get_contenter_33"
                                                id="tab10000C"
                                            >
                                                <ul id="residential_items">
                                                    <li>
                                                        <a href="#"
                                                            >Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Villa/individual
                                                            house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Builder floor</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Row House</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Farm house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Services
                                                            Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >studio
                                                            appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >residential plot</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >penthouse
                                                            appartment</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="get_contenter_33"
                                                id="tab20000C"
                                            >
                                                <ul id="commercial_items">
                                                    <li>
                                                        <a href=""
                                                            >office space</a
                                                        >
                                                    </li>
                                                    <li><a href="">shop</a></li>
                                                    <li>
                                                        <a href="">warehouse</a>
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >commercial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Agricultural
                                                            land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >hotel/resorts</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Industrial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="">showroom</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-budgetRange">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="Budget_type"
                                            >
                                                <i class="las la-coins"></i>
                                                Budget Range
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_cost_ps Budget_type_menu"
                                            id=""
                                        >
                                            <div class="property_cost_flex">
                                                <div class="min_mc_cost">
                                                    <h5>Min</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="max_mc_cost">
                                                    <h5>Max</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-searchButton">
                                        <a href="#" class="btn btn-danger"
                                            ><i class="las la-search"></i
                                            >Search</a
                                        >
                                    </div>
                                </div>
                                <div class="search_other_content">
                                    <div class="other_content_flex">
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Land area
                                                </option>
                                                <option value="1">1000</option>
                                                <option value="2">2000</option>
                                                <option value="3">3000</option>
                                                <option value="3">4000</option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bed Rooms
                                                </option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Bed</option>
                                                <option value="3">3 Bed</option>
                                                <option value="3">
                                                    4+ Bed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bathroom
                                                </option>
                                                <option value="1">
                                                    1 Bathroom
                                                </option>
                                                <option value="2">
                                                    2 Bathroom
                                                </option>
                                                <option value="3">
                                                    3 Bathroom
                                                </option>
                                                <option value="3">
                                                    4+ Bathroom
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- search filter End -->
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-agriculture"
                                role="tabpanel"
                                aria-labelledby="pills-agriculture-tab"
                            >
                                <!-- search filter start -->
                                <div class="search_filter-content">
                                    <div class="search_tx_select_option">
                                        <i class="las la-map-marker-alt"></i>
                                        <select
                                            class="form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>Province</option>
                                            <option value="1">bagmati</option>
                                            <option value="1">gandaki</option>
                                            <option value="1">lumbnini</option>
                                        </select>
                                    </div>
                                    <div class="search_tx-input">
                                        <i class="lar la-keyboard"></i>
                                        <input
                                            type="text"
                                            placeholder="Type locality or Project/Society or Builder"
                                        />
                                    </div>
                                    <div class="search_tx_property-type">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="property_type"
                                            >
                                                <i class="las la-home"></i>
                                                Property Type
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_option-ps property_type_menu"
                                            id=""
                                        >
                                            <ul
                                                id="tabs_gs_44"
                                                class="custom_tab_gs"
                                            >
                                                <li>
                                                    <a id="tab100000">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential40"
                                                                id="Residential40"
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Residential40"
                                                            >
                                                                Residential
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tab200000">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="Residential40"
                                                                id="Commercial40"
                                                            />
                                                            <label
                                                                class="form-check-label"
                                                                for="Commercial40"
                                                            >
                                                                Commercial
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="get_contenter_44"
                                                id="tab100000C"
                                            >
                                                <ul id="residential_items">
                                                    <li>
                                                        <a href="#"
                                                            >Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Villa/individual
                                                            house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Builder floor</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Row House</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Farm house</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >Services
                                                            Appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >studio
                                                            appartment</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >residential plot</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            >penthouse
                                                            appartment</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="get_contenter_44"
                                                id="tab200000C"
                                            >
                                                <ul id="commercial_items">
                                                    <li>
                                                        <a href=""
                                                            >office space</a
                                                        >
                                                    </li>
                                                    <li><a href="">shop</a></li>
                                                    <li>
                                                        <a href="">warehouse</a>
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >commercial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Agricultural
                                                            land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >hotel/resorts</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href=""
                                                            >Industrial land</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="">showroom</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-budgetRange">
                                        <div class="search_button_ps">
                                            <a
                                                href="javascript:void(0)"
                                                class="Budget_type"
                                            >
                                                <i class="las la-coins"></i>
                                                Budget Range
                                                <span
                                                    ><i
                                                        class="las la-angle-down"
                                                    ></i
                                                ></span>
                                            </a>
                                        </div>
                                        <div
                                            class="property_cost_ps Budget_type_menu"
                                            id=""
                                        >
                                            <div class="property_cost_flex">
                                                <div class="min_mc_cost">
                                                    <h5>Min</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="max_mc_cost">
                                                    <h5>Max</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#"
                                                                >5 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >10 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >15 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >20 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >25 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >30 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >35 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >40 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >45 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >50 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >55 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >60 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >65 lakhs</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                >70 lakhs</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search_tx-searchButton">
                                        <a href="#" class="btn btn-danger"
                                            ><i class="las la-search"></i
                                            >Search</a
                                        >
                                    </div>
                                </div>
                                <div class="search_other_content">
                                    <div class="other_content_flex">
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Land area
                                                </option>
                                                <option value="1">1000</option>
                                                <option value="2">2000</option>
                                                <option value="3">3000</option>
                                                <option value="3">4000</option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bed Rooms
                                                </option>
                                                <option value="1">1 Bed</option>
                                                <option value="2">2 Bed</option>
                                                <option value="3">3 Bed</option>
                                                <option value="3">
                                                    4+ Bed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="option_in">
                                            <select
                                                class="form-select"
                                                aria-label="Default select example"
                                            >
                                                <option selected>
                                                    Bathroom
                                                </option>
                                                <option value="1">
                                                    1 Bathroom
                                                </option>
                                                <option value="2">
                                                    2 Bathroom
                                                </option>
                                                <option value="3">
                                                    3 Bathroom
                                                </option>
                                                <option value="3">
                                                    4+ Bathroom
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- search filter End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "search",
};
</script>

<style></style>
