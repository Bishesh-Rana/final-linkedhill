<aside class="filter p-0 col-lg-3">
    <form action="{{route('side.filter')}}" method="get">
        <div class="sticky">
            <a href="#!" class="close d-lg-none">
                <span class="material-icons"> close</span>
            </a>
            <h2 class="card__title title1">Search Filter</h2>
            <div class="form-row top-check">
                @foreach($purposes as $purpose)
                <div class="form-group form-check">
                    <input type="radio" name="property_status" value="{{$purpose->name}}" class="form-check-input"
                        id="exampleCheckk{{$purpose->id}}" checked="">
                    <label class="form-check-label" for="exampleCheckk{{$purpose->id}}">{{$purpose->name}}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <input type="text" name="search_query" class="form-control" placeholder="Search by region or postcode"
                    autofocus="">
            </div>

            {{-- <p class="para d-flex justify-content-between"><a href="#!">Provinces profile </a><span
                    class="material-icons" data-toggle="tooltip" data-placement="bottom"
                    title="Information about Provinces  profile">help</span></p> --}}


            <h2 class="card__title title2">Property Types</h2>
            <ul class="brand">
                <div class="form-row">
                    @foreach($property_types as $key => $property_type)

                    <div class="form-group form-check">
                        <input type="radio" value="{{$property_type->name}}" name="property_type"
                            class="form-check-input" id="pt{{$key}}">
                        <label class="form-check-label" for="pt{{$key}}">
                            {{-- <img src="{{asset('frontend/gallery/filter/003-house.png')}}" alt=""> --}}
                            <h2 class="small__title">{{$property_type->name}}</h2>
                        </label>
                    </div>
                    @endforeach
                    {{-- <div class="form-group form-check">
                        <input type="checkbox" value="3" name="category_id[]" class="form-check-input" id="pt02">
                        <label class="form-check-label" for="pt02">
                            <img src="{{asset('frontend/gallery/filter/005-architect.png')}}" alt="">
                            <h2 class="small__title">Land</h2>

                        </label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" value="4" name="category_id[]" class="form-check-input" id="pt03">
                        <label class="form-check-label" for="pt03">
                            <img src="{{asset('frontend/gallery/filter/007-appartments-1.png')}}" alt="">

                            <h2 class="small__title">Appartment</h2>
                        </label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" value="5" name="category_id[]" class="form-check-input" id="pt04">
                        <label class="form-check-label" for="pt04">
                            <img src="{{asset('frontend/gallery/filter/009-building.png')}}" alt="">
                            <h2 class="small__title">Flat</h2>
                        </label>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" value="8" name="category_id[]" class="form-check-input" id="pt05">
                        <label class="form-check-label" for="pt05">
                            <img src="{{asset('frontend/gallery/filter/hotel.png')}}" alt="">
                            <h2 class="small__title">Hostel</h2>
                        </label>
                    </div> --}}
                </div>
            </ul>

            <ul class="nav flex-column range">
                <h2 class="card__title title1">Price</h2>
                <div class="example outer_link">
                    <div class="d-flex flex__parent">
                        <div class="form-group d-flex">
                            <label for="sortby"></label>
                            <select id="input-select" name="min_price"></select>
                            <i class="material-icons ">unfold_more</i>
                        </div>
                        <div class="form-group d-flex">
                            <label for="sortby"></label>
                            <select id="input-select2" name="max_price"></select>
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
                        <select name="min_total_area">
                            <option value=" " selected="">Area (sq)</option>
                            <option value="1000">1000 sq</option>
                            <option value="2000">2000 sq.</option>
                            <option value="3000">3000 sq.</option>
                            <option value="4000">4000 sq.</option>
                        </select>
                        <i class="material-icons ">unfold_more</i>
                    </div>
                    <div class="form-group d-flex">
                        <select name="max_total_area">
                            <option value=" " selected="">Area (sq)</option>
                            <option value="1000">1000 sq.</option>
                            <option value="2000">2000 sq.</option>
                            <option value="3000">3000 sq.</option>
                            <option value="4000">4000 sq.</option>
                        </select>
                        <i class="material-icons ">unfold_more</i>
                    </div>
                </div>
            </ul>
            <ul class="nav flex-column">
                <h2 class="card__title title2">Bed Rooms</h2>

                <div class="d-flex flex__parent">
                    <div class="form-group d-flex">
                        <select name="min_total_bedroom">
                            <option value=" " selected="">max</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <i class="material-icons ">unfold_more</i>
                    </div>
                    <div class="form-group d-flex">
                        <select name="max_total_bedroom">
                            <option value=" " selected="">max</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <i class="material-icons ">unfold_more</i>
                    </div>
                </div>
            </ul>
            <ul class="nav flex-column">
                <h2 class="card__title title2">Bathrooms</h2>

                <div class="d-flex flex__parent">
                    <div class="form-group d-flex">
                        <select name="min_total_bedroom">
                            <option value=" " selected="">min</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <i class="material-icons ">unfold_more</i>
                    </div>
                    <div class="form-group d-flex">
                        <select name="max_total_bedroom">
                            <option value=" " selected="">max</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <i class="material-icons ">unfold_more</i>
                    </div>
                </div>
            </ul>


            <p class="card__title title2">
                <a data-toggle="collapse" href="#!" class="adsTrigger">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-filter-left" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    Advance search
                </a>
            </p>
            <div class="collapse" id="advanceSearch">

                <ul class="nav flex-column">
                    <h2 class="card__title title2">Parking</h2>

                    <div class="d-flex flex__parent">
                        <div class="form-group d-flex">
                            <select name="min_total_parking">
                                <option value="" selected="">min</option>
                                <option value="1000">1000 sq.</option>
                                <option value="2000">2000 sq.</option>
                                <option value="3000">3000 sq.</option>
                                <option value="4000">4000 sq.</option>
                            </select>
                            <i class="material-icons ">unfold_more</i>
                        </div>
                        <div class="form-group d-flex">
                            <select name="max_total_parking">
                                <option value="" selected="">max</option>
                                <option value="1000">1000 sq.</option>
                                <option value="2000">2000 sq.</option>
                                <option value="3000">3000 sq.</option>
                                <option value="4000">4000 sq.</option>
                            </select>
                            <i class="material-icons ">unfold_more</i>
                        </div>
                    </div>
                </ul>
            </div>

            <button class="submit" type="submit">
                Search
            </button>
        </div>
    </form>

</aside>