<div class="linked_hill_search_wrapper">
    <div class="container">
        <form class="searchProperty" method="get" action="{{ route('front.search-properties') }}">
        <div class="row">
          
            <div class="col-lg-12">
                <div class="linked_hill_flex_wrap">
                    <div class="linked_hill_search_top ">
                        @csrf
                        
                        <ul>
                            @foreach ($purposes as $key => $type)
                            <li>
                                <input type='radio' name="{{ $type->name }}" value="{{ $type->name }}" id="{{$key}}"/>
                                <label for="{{ $type->name }}">{{ $type->name }}</label>
                            </li>
                             @endforeach
                            {{-- <li>
                                <input type='radio' value='2' name='radio'  id='radio2'/>
                                <label for='radio2'>Value 2</label>
                            </li>
                            <li>
                                <input type='radio' value='3' name='radio'  id='radio3'/>
                                <label for='radio3'>Value 3</label>
                            </li> --}}
                        </ul>
                        {{-- <input id="{{$key}}" type="button" class="px-5 py-1 {{($loop->first) ? 'active' : ''}}" name="{{ $type->name }}" value="{{ $type->name }}"> --}}
                        {{-- <p class="btn ">{{ $type->name }}</p> --}}
    
    
                            {{-- <option value="{{ $type->name }}">{{ $type->name }}</option> --}}
                       
    
                    </div>
                  
                    {{-- <div class="linked_hill_select_area">
                        @csrf
                        <select name="property_status" id="">
                            @foreach ($purposes as $type)
                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="linked_hill_search_area d-flex">
                        <?php $name='';
                        ?>
                       <div class="multiple_select2option">
                        <select class="js-example-basic-multiple" name="property_address" multiple="multiple" value="{{($type->property_address) }}">
                            @foreach ($property as $type)
                            @if($name==$type->property_address)
                            continue;
                        @else
                            <option>{{($type->property_address) }}</option>
                            <?php
                            $name=$type->property_address;
                        ?>
                        @endif
                    @endforeach
                          </select>
                       </div>
                       <button class="btn btn-dark" type="submit"><i class="las la-search"></i></button>
                    </div>
                </div>
                <div class="for_toggle_view">
                    <div class="link_hill_flex_bottom_wrapper">
                        <div class="option_a1 property_item_linkedhill">
                            <div class="option_1 multi_select_dropdown">
                                <p>Category<i class="las la-angle-down"></i></p>
                                <div class="option_listing_dropDown child_dropdown">
                                    @foreach ($propertyCat as $propertyC)
                                    <div class="list_group">
                                        <input class="form-check-input" type="checkbox" name="category_id" value="{{ $propertyC->id }}" id="{{ $propertyC->name }}">
                                        <label class="form-check-label" for="{{ $propertyC->name }}">{{ $propertyC->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="option_a1">
                            <select  id="" name="bed">
                                <option selected>Any Bed</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="3">4+</option>
                                <option value="3">5+</option>
                                <option value="3">6+</option>
                                <option value="3">7+</option>
                                <option value="3">8+</option>
                                <option value="3">9+</option>
                                <option value="3">10+</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="bath" id="">
                                <option selected>Any Bath</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="3">4+</option>
                                <option value="3">5+</option>
                                <option value="3">6+</option>
                                <option value="3">7+</option>
                                <option value="3">8+</option>
                                <option value="3">9+</option>
                                <option value="3">10+</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select id="">
                                <option selected>Any Parking</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="start_prize" id="">
                                <option selected>Min Rent</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="end_prize" id="">
                                <option selected>Max Rent</option>
                                <option value="1100000.00">Rs. 1100000.00</option>
                                <option value="1500000.00">Rs. 1500000.00</option>
                                <option value="2000000.00">Rs. 2000000.00</option>
                                <option value="5000000.00">Rs. 5000000.00</option>
                            </select>
                        </div>
                        <?php
                            $name='';
                        ?>
                       
                        <div class="option_a1  advance-search">
                            <p data-bs-toggle="modal" data-bs-target="#advanceSearch">Advance Search</p>

                            {{-- <div class="advance_options">
                                <p >Advance search options</p>
                            </div> --}}
                            {{-- <select name="" id="">
                                <option selected>Property Type</option>
                                @foreach ($property as $type)
                                    @if($name==$type->type)
                                        continue;
                                    @else
                                    <option val="{{ $type->type }}">{{ $type->type }}</option>
                                    <?php
                                        $name=$type->type;
                                    ?>
                                    @endif
                                @endforeach
                            </select> --}}
                        </div>
                        
                        <div class="surround_search">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Surrounding
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="linked_hill_button_wraper">
                    <p class="click" id="click">More Search </p>
                </div>
               
                {{-- <div class="toggle-botton-wrapper">
                   
                    
                </div> --}}
                
            </div>
        </div>
    </form>
    </div>
</div>