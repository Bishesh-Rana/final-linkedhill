<div class="advance_search_modal">
    <!-- Modal -->
<div class="modal fade" id="advanceSearch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Advance Search</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
            <form class="searchProperty" id="searchform" method="get" action="{{ route('front.search-properties') }}">
                <div class="advance_search_modal">
                    <div class="selector_wrapper purpose_wrapper">
                        @foreach ($purposes as $key => $type)
                            <input type='radio' name="purpose" value="{{ $type->id }}" id="adpurpose{{$key}}"/>
                            <label for="adpurpose{{$key}}">{{ $type->name }}</label>
                         @endforeach
                    </div>

                    {{-- <ul style="position: sticky;top:0;background:white;" class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Buy</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Rent</button>
                        </li>
                       
                    </ul> --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Category</h3>
                                       <div class="d-flex">
                                        @foreach ($propertyCat as $propertyC)
                                        <div class="list_group_category">
                                            <input  class="form-check-input ad_category" type="checkbox" name="ad_category_id" value="{{ $propertyC->id }}" id="advance{{$propertyC->id}}">
                                            <label class="form-check-label" for="advance{{$propertyC->id}}">{{ $propertyC->name }}</label>
                                        </div>
                                        @if ($propertyC->id == 3)
                                        @break
                                        @endif

                                        @endforeach
                                       </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="bed" class="selector_wrapper bedrooms">
                                        <h3>Bedrooms</h3> 
                                        <input type="radio" name="bedCount" value="anybed" id="0bed">
                                        <label for="0bed">Any Bed</label>
                                        <input type="radio" name="bedCount" value="1bed" id="1bed">
                                        <label for="1bed">1+ Bed</label>    
                                        <input type="radio" name="bedCount" value="2bed" id="2bed">
                                        <label for="2bed">2+ Bed</label>     
                                        <input type="radio" name="bedCount" value="3bed" id="3bed">
                                        <label for="3bed">3+ Bed</label>                                       
                                    </div> 
                                    
                                </div>
                                <div class="col-md-12">
                                    <div id="bath" class="selector_wrapper">
                                        <h3>Bathrooms</h3>
                                        <input type='radio' name="bath" value="1" id="bath-0"/>
                                        <label for="bath-0">Any Bath</label>
                                        <input type='radio' name="bath" value="2" id="bath-1"/>
                                        <label for="bath-1">1+</label>
                                        <input type='radio' name="bath" value="3" id="bath-2"/>
                                        <label for="bath-2">2+</label>
                                        <input type='radio' name="bath" value="4" id="bath-3"/>
                                        <label for="bath-3">3+</label>
                                        <input type='radio' name="bath" value="5" id="bath-4"/>
                                        <label for="bath-4">4+</label>
                                        <input type='radio' name="bath" value="6" id="bath-5"/>
                                        <label for="bath-5">5+</label>
                                    </div>
                                  
                                </div>
                                <div class="col-md-12">
                                    <div id="parking" class="selector_wrapper">
                                        <h3>Parking</h3>
                                        <input type='radio' name="parking" value="1" id="park-0"/>
                                        <label for="park-0">Any</label>
                                        <input type='radio' name="parking" value="1" id="park-1"/>
                                        <label for="park-1">1</label>
                                        <input type='radio' name="parking" value="2" id="park-2"/>
                                        <label for="park-2">2</label>
                                        <input type='radio' name="parking" value="3" id="park-3"/>
                                        <label for="park-3">3</label>  
                                    </div>                                  
                                </div>
                                <div class="col-md-6">
                                    <div class="selector_wrapper">
                                        <h3>Min Price</h3>
                                        <select name="min_price" id="min_price">
                                            <option value="0" selected>Min Price</option>
                                            <option value="5000.00">Rs. 5000.00</option>
                                            <option value="10000.00">Rs. 10000.00</option>
                                            <option value="50000.00">Rs. 50000.00</option>
                                            <option value="100000.00">Rs. 100000.00</option>
                                            <option value="1000000.00">Rs. 1000000.00</option>
                                        </select>
                                    </div>
                                     
                                </div>
                                <div class="col-md-6">
                                    <div class="selector_wrapper">
                                        <h3>Max Price</h3>
                                        <select name="end_prize" id="max_price">
                                            <option selected>Max Price</option>
                                            <option value="1100000.00">Rs. 1100000.00</option>
                                            <option value="1500000.00">Rs. 1500000.00</option>
                                            <option value="2000000.00">Rs. 2000000.00</option>
                                            <option value="5000000.00">Rs. 5000000.00</option>
                                        </select>
                                    </div>
                                  
                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Facing direction</h3>
                                        <input type='radio' name="property_facing" value="east " id="east"/>
                                        <label for="east">East</label>
                                        <input type='radio' name="property_facing" value="south " id="south"/>
                                        <label for="south">South</label>
                                        <input type='radio' name="property_facing" value="West " id="West"/>
                                        <label for="West">West</label>
                                        <input type='radio' name="property_facing" value="north " id="north"/>
                                        <label for="north">North</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div id="buildingType" class="selector_wrapper">
                                        <h3>Building Type</h3>
                                        <input type='radio' name="buildingtype" value="underconstruction " id="underconstruction"/>
                                        <label for="underconstruction">Under Construction</label> 
                                        <input type='radio' name="buildingtype" value="new " id="new"/>
                                        <label for="new">Newly Built</label>
                                        <input type='radio' name="buildingtype" value="old " id="old"/>
                                        <label for="old">Already Built</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div id="buildingAge" class="selector_wrapper">
                                        <h3>Building Age</h3>
                                        <input type='radio' name="buildingage" value="ageany " id="ageany"/>
                                        <label for="ageany">Any Age</label> 
                                        <input type='radio' name="buildingage" value="1year " id="1year"/>
                                        <label for="1year">Below 1 year</label> 
                                        <input type='radio' name="buildingage" value="5year " id="5year"/>
                                        <label for="5year">Below 5 year</label>
                                        <input type='radio' name="buildingage" value="10year " id="10year"/>
                                        <label for="10year">Below 10 year</label>
                                        <input type='radio' name="buildingage" value="20year " id="20year"/>
                                        <label for="20year">Below 20 year</label>
                                        <input type='radio' name="buildingage" value="above20 " id="above20"/>
                                        <label for="above20">Above 20 year</label>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Common Facilities</h3>
                                       <div class="d-flex">
                                        <div class="list_group_facilities">
                                            <input class="form-check-input" type="checkbox" name="facilities" value="water" id="facility1">
                                            <label class="form-check-label" for="facility1">Water</label>
                                            <input class="form-check-input" type="checkbox" name="facilities" value="road" id="facility2">
                                            <label class="form-check-label" for="facility2">Road</label>
                                            <input class="form-check-input" type="checkbox" name="facilities" value="fencing" id="facility3">
                                            <label class="form-check-label" for="facility3">Fencing</label>
                                        </div>
                                       </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div id="furnishingType" class="selector_wrapper">
                                        <h3>Furnishing Type</h3>
                                        <input type='radio' name="furnishing" value="anyfurnishing " id="anyfurnishing"/>
                                        <label for="anyfurnishing">Any</label> 
                                        <input type='radio' name="furnishing" value="fullyfurnished " id="fullyfurnished"/>
                                        <label for="fullyfurnished">Fully Furnished</label> 
                                        <input type='radio' name="furnishing" value="semifurnished " id="semifurnished"/>
                                        <label for="semifurnished">Semi Furnished</label> 
                                        <input type='radio' name="furnishing" value="unfurnished " id="unfurnished"/>
                                        <label for="unfurnished">Unfurnished</label> 
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Listed By</h3>
                                        <input type='radio' name="listingby" value="AnyLister " id="AnyLister"/>
                                        <label for="AnyLister">Any</label> 
                                        <input type='radio' name="listingby" value="Owner " id="Owner"/>
                                        <label for="Owner">Owner</label> 
                                        <input type='radio' name="listingby" value="Builder " id="Builder"/>
                                        <label for="Builder">Builder</label> 
                                        <input type='radio' name="listingby" value="Agent " id="Agent"/>
                                        <label for="Agent">Agent</label> 
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                
               
            </form>
        </div>
        <div class="modal-footer">
            <button  type="reset" value="reset" form="searchform" class="btn btn-secondary advance_submit" >Clear Filter</button>
            <button  type="submit" form="searchform" class="btn btn-secondary advance_submit" data-bs-dismiss="modal">Search</button>
        </div>
      
      </div>
    </div>
  </div>
</div>