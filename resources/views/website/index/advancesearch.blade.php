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
                            <input type='radio' name="purpose" value="{{ $type->name }}" id="adpurpose{{$key}}"/>
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
                                <div id="feature">

                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Category</h3>
                                       <div class="d-flex">
                                        
                                        {{-- <div class="list_group_category "> --}}
                                        <div>
                                            @foreach ($propertyCat as $propertyC)
                                            <input  class="form-check-input ad_category filter" id="filter" type="checkbox" name="category_id" value="{{$propertyC->id}}" >
                                            <label class="form-check-label" for="filter">{{ $propertyC->name }}</label>
                                            {{-- @if ($propertyC->id == 3)
                                            @break
                                            @endif --}}
    
                                            @endforeach
                                        </div>
                                        
                                       </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="selector_wrapper">
                                        <h3>Min Price</h3>
                                        <select name="start_prize" id="min_price">
                                            <option value="" selected>Min Price</option>
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
                                            <option value="" selected>Max Price</option>
                                            <option value="1100000.00">Rs. 1100000.00</option>
                                            <option value="1500000.00">Rs. 1500000.00</option>
                                            <option value="2000000.00">Rs. 2000000.00</option>
                                            <option value="5000000.00">Rs. 5000000.00</option>
                                        </select>
                                    </div>                                 
                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Common Facilities</h3>
                                       <div class="d-flex">
                                        <div class="list_group_facilities">
                                            @foreach($facilities as $key=>$facility)
                                                <input class="form-check-input" type="checkbox" name="facility[]" value="{{$facility->title}}" id="facility{{$key+1}}">
                                            <label class="form-check-label" for="facility{{$key+1}}">{{$facility->title}}</label>
                                            @endforeach
                                        </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="advance">
                                    {{-- feature comes here --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Property Facing</h3>
                                        <input type='radio' name="facing" selected disabled id="AnyFacing"/>
                                        <label for="AnyFacing">Any</label> 
                                        <input type='radio' name="facing" value="East" id="East"/>
                                        <label for="East">East</label> 
                                        <input type='radio' name="facing" value="West" id="West"/>
                                        <label for="West">West</label> 
                                        <input type='radio' name="facing" value="North" id="North"/>
                                        <label for="North">North</label> 

                                        <input type='radio' name="facing" value="North-East" id="North-East"/>
                                        <label for="North-East">North-East</label> 
                                        <input type='radio' name="facing" value="North-West" id="North-West"/>
                                        <label for="North-West">North-West</label> 
                                        <input type='radio' name="facing" value="South-East" id="South-East"/>
                                        <label for="South-East">South-East</label> 
                                        <input type='radio' name="facing" value="South-West" id="South-West"/>
                                        <label for="South-West">South-West</label> 

                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="selector_wrapper">
                                        <h3>Listed By</h3>
                                        <input type='radio' name="listingby" selected disabled id="AnyLister"/>
                                        <label for="AnyLister">Any</label> 
                                        <input type='radio' name="listingby" value="Owner" id="Owner"/>
                                        <label for="Owner">Owner</label> 
                                        <input type='radio' name="listingby" value="Builder" id="Builder"/>
                                        <label for="Builder">Builder</label> 
                                        <input type='radio' name="listingby" value="Agent" id="Agent"/>
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

@push('scripts')
<script>
     $(document).ready(function() {
        var category_ids = [];
        $('.filter').on('change', function(){
            let{
                    value,
                    id,
                    checked
                } = event.target;
                if(id=="filter"){
                    if(checked){
                        category_ids.push(value);
                    }
                    else{
                        category_ids = category_ids.filter(function(data){
                            return data != value;
                        })
                    }
                }
                $.ajax({
                    url: "{{route('advanceFilter')}}",
                    type: 'get',
                    data: {
                        category_ids: category_ids,
                    },
                    success:function(response)
                    {
                        $(".advance").replaceWith(response);

                    },
                    error: function(response) {
                    }
                });
               
        });
        
     });

    
</script>
@endpush