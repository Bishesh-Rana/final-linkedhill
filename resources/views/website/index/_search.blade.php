<div class="linked_hill_search_wrapper">
    <div class="container">
        <form class="searchProperty" method="get" action="{{ route('front.search-properties') }}">
        <div class="row">
          
            <div class="col-lg-12">
                <div class="linked_hill_flex_wrap">
                    <div class="linked_hill_search_top ">
                        <ul>
                            @foreach ($purposes as $key => $type)
                            <li >
                                <input type='radio' data-element="adpurpose{{$key}}" name="purpose" value="{{ $type->name }}" id="purpose{{$key}}"/>
                                <label for="purpose{{$key}}">{{ $type->name }}</label>
                            </li>
                             @endforeach
                           
                        </ul>
                    </div>
                    <div class="linked_hill_search_area d-flex">
                        <?php $name='';
                        ?>
                       <div class="multiple_select2option">
                        <select class="js-example-basic-multiple" name="property_address[]" multiple="multiple" value="{{($type->property_address) }}">
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
                            <p>Property Type<i class="las la-angle-down"></i></p>
                                <div class="option_listing_dropDown child_dropdown">
                                    @foreach ($propertyCat as $propertyC)
                                        <div class="list_group_category"> 
                                            <input class="form-check-input front-category category" id="category" data-element="#advance{{ $propertyC->id }}" type="checkbox" name="category_id" value="{{ $propertyC->id }}">
                                            <label class="form-check-label" for="initial{{ $propertyC->id }}">{{ $propertyC->name }}</label>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                        </div>
                        <div class="replace d-flex">
                                @php $i=1 @endphp
                                @foreach($feature_values as $key=>$values)
                                @if($i<=3)
                                <div class="option_a1">
                                <select name="properties[{{$key}}]" id="start_prize">
                                    @php $name = App\Models\Feature::where('id',$key)->value('title'); @endphp
                                    <option selected disabled>Select {{$name}}</option>
                                    @foreach($values as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                    @php $i = $i + 1; @endphp
                                </select>
                                </div>
                                @endif
                                @endforeach
                                
                            
                            {{-- @php $i=1 @endphp
                            @foreach($feature_values as $key=>$values)
                                @if($i<=3)
                                    @php $name = App\Models\Feature::where('id',$key)->value('title'); @endphp
                                    <label for="buildingtype"> {{$name}}:-</label>
                                    <select name="properties[{{$key}}]" id="buildingtype">
                                        <option selected disabled> Select {{$name}}</option>
                                        @foreach($values as $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @php $i += 1  @endphp
                            @endforeach --}}
                            {{-- for dynamic feature--}}
                        </div>
                        <div class="option_a1">
                            <select name="start_prize" id="start_prize">
                                <option selected disabled>Min Price</option>
                                <option value="5000.00">Rs. 5000.00</option>
                                <option value="10000.00">Rs. 10000.00</option>
                                <option value="50000.00">Rs. 50000.00</option>
                                <option value="100000.00">Rs. 100000.00</option>
                                <option value="1000000.00">Rs. 1000000.00</option>
                            </select>
                        </div>
                        <div class="option_a1">
                            <select name="end_prize" id="end_prize">
                                <option selected disabled>Max Price</option>
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
                
            </div>
        </div>
    </form>
    </div>
</div>

@push('scripts')
<script>
     $(document).ready(function() {
        var category_ids = [];
        $('.category').on('change', function(){
            let{
                    value,
                    id,
                    checked
                } = event.target;
                if(id=="category"){
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
                    url: "{{route('filter')}}",
                    type: 'get',
                    data: {
                        category_ids: category_ids,
                    },
                    // dataType: 'JSON',
                    success:function(response)
                    {
                        console.log(response);
                        $(".replace").replaceWith(response);
                    },
                    error: function(response) {
                    }
                });
               
        });
        
     });

    
</script>
@endpush