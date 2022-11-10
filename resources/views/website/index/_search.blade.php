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
                            <li >
                                <input type='radio' data-element="adpurpose{{$key}}" name="initialpurpose" value="{{ $type->name }}" id="purpose{{$key}}"/>
                                <label for="purpose{{$key}}">{{ $type->name }}</label>
                            </li>
                             @endforeach
                           
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
                                    <div class="list_group_category"> 
                                        <input class="form-check-input front-category" data-element="#advance{{ $propertyC->id }}" type="checkbox" name="category_id" value="{{ $propertyC->id }}" id="initial{{ $propertyC->id }}">
                                        <label class="form-check-label" for="initial{{ $propertyC->id }}">{{ $propertyC->name }}</label>
                                    </div>
                                    @if ($propertyC->id == 3)
                                    @break
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="option_a1">
                            <select  id="bed" name="bed">
                                <option data-element="0bed" selected>Any Bed</option>
                                <option data-element="1bed" value="1">1+</option>
                                <option data-element="2bed" value="2">2+</option>
                                <option data-element="3bed" value="3">3+</option>
                                <option data-element="4bed" value="3">4+</option>
                                <option data-element="5bed" value="3">5+</option>
                                <option data-element="6bed" value="3">6+</option>
                                <option data-element="7bed" value="3">7+</option>
                                <option data-element="8bed" value="3">8+</option>
                                <option data-element="9bed" value="3">9+</option>
                                <option data-element="10bed" value="3">10+</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="bath" id="bath">
                                <option  data-element="bath-0"  selected>Any Bath</option>
                                <option  data-element="bath-1" value="1">1+</option>
                                <option  data-element="bath-2" value="2">2+</option>
                                <option data-element="bath-3"  value="3">3+</option>
                                <option  data-element="bath-4" value="3">4+</option>
                                <option data-element="bath-5"  value="3">5+</option>
                                <option data-element="bath-6"  value="3">6+</option>
                                <option  data-element="bath-7" value="3">7+</option>
                                <option  data-element="bath-8" value="3">8+</option>
                                <option  data-element="bath-9" value="3">9+</option>
                                <option  data-element="bath-10" value="3">10+</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select id="parking">
                                <option data-element="park-0" selected>Any Parking</option>
                                <option data-element="park-1" value="1">1+</option>
                                <option data-element="park-2" value="2">2+</option>
                                <option data-element="park-3" value="3">3+</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="start_prize" id="start_prize">
                                <option value="0.00" selected>Min Price</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="end_prize" id="end_prize">
                                <option selected>Max Price</option>
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
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
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