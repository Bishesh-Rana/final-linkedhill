<form class="form-inline main-form" action="{{route('search')}}" method="get" autocomplete="off">
    <aside>
        <div class="form-row "><!-- add  only__two  class if there is only Buy and rent like this  <div class="form-group form-check only__two"> -->
            <!-- Property status-->
            @foreach($purposes as $purpose)
                <div class="form-group form-check">
                    <input type="radio" name="property_status" value="{{$purpose->name}}" class="form-check-input" id="categoryFilter{{$purpose->id}}" checked="">
                    <label class="form-check-label" for="categoryFilter{{$purpose->id}}">{{$purpose->name}}</label>
                </div>
            @endforeach
        <!-- /Property status-->

            @foreach($property_types as $key => $property_type)
                <div class="form-group form-check">
                    <input type="radio" name="property_type" @if($key==0) checked @endif value="Residential" class="form-check-input" id="categoryFilterType{{$property_type->id}}">
                    <label class="form-check-label" for="categoryFilterType{{$property_type->id}}">{{$property_type->name}}</label>
                </div>
            @endforeach

        </div>
        <div class="form-row second">

            <div class="form-group">
                <i class="material-icons material-icons-outlined">location_on</i>
                <select  multiple class="form-control" id='testSelect1'>
                    @foreach($provinces as $province)
                        <option value='{{$province->id}}'>{{$province->name}}</option>
                    @endforeach
                </select>
                <i class="material-icons arrow">expand_more</i>
                <!-- province_0 should start from 0 -->
                @foreach($provinces as $key=>$province)
                    <div class="city province_{{$key}}">
                        <!-- ps: donot put space  after cities name  -->
                        <ul >
                            @foreach($province->cities as $city)
                                <li>
                                    <label class="custom-control custom-checkbox">
                                        <input name="cities[]" value="{{$city->id}}" class="multiselect-checkbox custom-control-input" type="checkbox">
                                        <span class="multiselect-text custom-control-label">{{$city->name}}</span>
                                    </label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                @endforeach

            </div>
            <div class="form-group" id="appendtag">
                <div class="tag__container">

                </div>
                <div class="form-group">
                    <input type="search" name="search_query" class="form-control" placeholder="Search by Region or Postcode"  autocomplete="anyrandomstring" >
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
                <select  multiple class="form-control" name="category_id[]" id='testSelect2'>
                    <!-- home must be first -->
                    @foreach($property_categories as $property_category)
                        <option value='{{$property_category->id}}' >{{$property_category->name}}</option>
                @endforeach
                <!-- <option value='5'>Office</option> -->
                </select>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <div class="form-group" id="add_home">
                <ul class="nav flex-column">
                    <div class="example outer_link">
                        <div class="d-flex flex__parent">
                            <div class="form-group d-flex">
                                <select id="input-select--hr" name="min_price">
                                    <option value=" " selected>Min Price</option>
                                    <option value="0">Rs: 0</option>
                                    <option value="20000">Rs: 20000</option>
                                    <option value="40000">Rs: 40000</option>
                                    <option value="60000">Rs: 60000</option>
                                    <option value="80000">Rs: 80000</option>
                                    <option value="100000">Rs: 100000</option>
                                    <option value="120000">Rs: 120000</option>
                                    <option value="140000">Rs: 140000</option>
                                    <option value="160000">Rs: 160000</option>
                                    <option value="180000">Rs: 180000</option>
                                    <option value="200000">Rs: 200000</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                            <div class="form-group d-flex">
                                <select id="input-select2--hr" name="max_price">
                                    <option value=" ">Max Price</option>
                                    <option value="0">Rs: 0</option>
                                    <option value="20000">Rs: 20000</option>
                                    <option value="40000">Rs: 40000</option>
                                    <option value="60000">Rs: 60000</option>
                                    <option value="80000">Rs: 80000</option>
                                    <option value="100000">Rs: 100000</option>
                                    <option value="120000">Rs: 120000</option>
                                    <option value="140000">Rs: 140000</option>
                                    <option value="160000">Rs: 160000</option>
                                    <option value="180000">Rs: 180000</option>
                                    <option value="200000">Rs: 200000</option>
                                </select>
                                <i class="material-icons ">unfold_more</i>
                            </div>
                        </div>
                    </div>
                </ul>
                <!-- land area -->
                <ul class="nav flex-column only_land">

                    <div class="d-flex flex__parent">
                        <div class="form-group d-flex">
                            <select name="total_area">
                                <option value=" " selected>Land Area</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="4000">4000</option>
                            </select>
                            <i class="material-icons ">unfold_more</i>
                        </div>
                    </div>

                </ul>
                <ul class="nav flex-column only_home">

                    <div class="d-flex flex__parent">
                        <div class="form-group d-flex">
                            <select name="total_bed_room">
                                <option value=" " selected="">Bed Rooms</option>
                                <option value="1">1 Bed.</option>
                                <option value="2">2 Bed</option>
                                <option value="3">3 Bed</option>
                                <option value="4">4+ Bed </option>
                            </select>
                            <i class="material-icons ">unfold_more</i>
                        </div>

                    </div>
                </ul>
                <ul class="nav flex-column only_home">
                    <div class="d-flex flex__parent">
                        <div class="form-group d-flex">
                            <select name="total_bathroom">
                                <option value=" ">Bathrooms</option>
                                <option value="1">1 Bathroom</option>
                                <option value="2">2 Bathroom</option>
                                <option value="3">3 Bathroom</option>
                                <option value="4">4+ Bathroom</option>
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
