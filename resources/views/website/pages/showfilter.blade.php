<div class="advance_search_modal">
    <!-- Modal -->
    <div class="modal fade" id="advanceSearch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Advance Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="searchProperty" id="searchform" method="get" action="{{ route('front.search-properties') }}">
                        <div class="purpose_wrapper">
                            {{-- @dd( $purpose->name == $filter['purpose']) --}}
                            @foreach ($purposes as $key => $type)
                                <input class="rentbuy" type='radio' name="purpose" value="{{ $type->name }}"
                                    id="adpurpose{{ $key }}" @if(array_key_exists('purpose',$filter)) {{ $type->name == $filter['purpose'] ? 'checked' : '' }} @endif/>
                                <label for="adpurpose{{ $key }}">{{ $type->name }}</label>
                            @endforeach
                        </div>
                        <div class="linked_hill_search_area d-flex">
                            <?php $name = '';
                            ?>
                            <div class="multiple_select2option">
                                <select class="js-example-basic-multiple" name="property_address[]" multiple="multiple">
                                    @isset($addresses)
                                    @foreach ($addresses as $type)
                                    @if ($name == $type)
                                        continue;
                                    @else
                                        <option>{{ $type }}</option>
                                        <?php
                                        $name = $type;
                                        ?>
                                    @endif
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <button class="btn btn-dark" type="submit"><i class="las la-search"></i></button>
                        </div>
                        <div class="advance_search_modal">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                        <div class="selector_wrapper">
                                            <h3>Property Type</h3>
                                            <div class="d-flex">
                                                <div class="categoryselector">
                                                    @foreach ($propertyCat as $key => $propertyC)
                                                        <input class="form-check-input ad_category filter"  data-ele="filter" id="advance{{ $propertyC->id }}" type="checkbox" name="category_id" value="{{ $propertyC->id }}">
                                                        <label class="form-check-label" for="advance{{ $propertyC->id }}">{{ $propertyC->name }}</label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selector_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{-- @dd($filter['start_prize']) --}}
                                                    <h3>Min Price</h3>
                                                    <select name="start_prize" id="min_price">
                                                        <option selected disabled>Min Price</option>
                                                        <option value="">Any</option>
                                                        @if(array_key_exists('start_prize',$filter))
                                                        <option value="5000.00" {{$filter['start_prize'] == "5000.00"?'selected':''}}>Rs. 5000.00</option>
                                                        <option value="10000.00" {{$filter['start_prize'] == '10000.00'?'selected':''}}>Rs. 10000.00</option>
                                                        <option value="50000.00" {{$filter['start_prize'] == '50000.00'?'selected':''}}>Rs. 50000.00</option>
                                                        <option value="100000.00" {{$filter['start_prize'] == '100000.00'?'selected':''}}>Rs. 100000.00</option>
                                                        <option value="1000000.00" {{$filter['start_prize'] == '1000000.00'?'selected':''}}>Rs. 1000000.00</option>
                                                        @else
                                                        <option value="5000.00">Rs. 5000.00</option>
                                                        <option value="10000.00">Rs. 10000.00</option>
                                                        <option value="50000.00">Rs. 50000.00</option>
                                                        <option value="100000.00">Rs. 100000.00</option>
                                                        <option value="1000000.00">Rs. 1000000.00</option>
                                                        @endif
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Max Price</h3>
                                                    <select name="end_prize" id="max_price">
                                                        <option selected disabled>Max Price</option>
                                                        <option value="">Any</option>
                                                        @if(array_key_exists('end_prize',$filter))
                                                        <option value="1100000.00" {{$filter['end_prize'] == '1100000.00'}}>Rs. 1100000.00</option>
                                                        <option value="1500000.00" {{$filter['end_prize'] == '1500000.00'}}>Rs. 1500000.00</option>
                                                        <option value="2000000.00" {{$filter['end_prize'] == '2000000.00'}}>Rs. 2000000.00</option>
                                                        <option value="5000000.00" {{$filter['end_prize'] == '5000000.00'}}>Rs. 5000000.00</option>
                                                        @else
                                                        <option value="1100000.00">Rs. 1100000.00</option>
                                                        <option value="1500000.00">Rs. 1500000.00</option>
                                                        <option value="2000000.00">Rs. 2000000.00</option>
                                                        <option value="5000000.00">Rs. 5000000.00</option>
                                                        @endif
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selector_wrapper landarea"  style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h3>Area</h3>
                                                        <input type="number" name="area" id="area" placeholder="Area" style="visibility: visible;display:block;"
                                                        @if(array_key_exists('area',$filter)) value="{{$filter['area']}}" @endif>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h3>Unit</h3>
                                                        <select class="areaunit" name="areaunit" id="areaunit">
                                                            <option selected value="">Unit</option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}" @if(array_key_exists('areaunit',$filter)) {{ $unit->id == $filter['areaunit'] ? 'checked' : '' }} @endif>{{ $unit->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="advance">
                                        @foreach ($feature_values as $key => $values)
                                            @php
                                                $name = App\Models\Feature::where('id', $key)->value('title');
                                            @endphp
                                            <div class="selector_wrapper">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h3>{{ $name }}</h3>
                                                            <div id="parking">
                                                                <div class="dynamic ">
                                                                    <select name="properties[{{$key}}]">
                                                                        <option value="any">Any</option>
                                                                        @foreach ($values as $key1 => $value)
                                                                        @if(array_key_exists( 'properties' , $filter))                                                                        
                                                                            <option value="{{ $value }}" @foreach($filter['properties'] as $keys=>$data){{($data == $value)?'selected':''}} @endforeach>{{ $value }}</option>
                                                                        @else
                                                                        <option value="{{ $value }}" >{{ $value }}</option>
                                                                        @endif
                                                                        
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        @endforeach
                                        </div>
                                        <div class="selector_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h3>Road Type</h3>
                                                        <select name="roadtype">
                                                            <option value="">Any</option>
                                                            @isset($roadtypes)
                                                            @foreach ($roadtypes as $key1 => $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }} </option>
                                                            @endforeach                                                                
                                                            @endisset
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selector_wrapper">
                                            <h3>Common Facilities</h3>
                                            <div class="d-flex">
                                                <div class="list_group_facilities">
                                                    @foreach ($facilities as $key => $facility)
                                                        <input class="form-check-input" type="checkbox" name="facility[]" value="{{ $facility->title }}" id="facility{{ $key + 1 }}"
                                                        @if(array_key_exists('facility',$filter)) {{ in_array($facility->title, $filter) ? 'checked' : '' }} @endif>
                                                        <label class="form-check-label" for="facility{{ $key + 1 }}">{{ $facility->title }}</label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selector_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3>Property Facing</h3>
                                                    <select name="facing">
                                                        <option value="">Any</option>
                                                        <option value="East">East</option>
                                                        <option value="South">South</option>
                                                        <option value="West">West</option>
                                                        <option value="North">North</option>
                                                        <option value="North-East">North-East</option>
                                                        <option value="North-West">North-West</option>
                                                        <option value="South-East">South-East</option>
                                                        <option value="South-West">South-West</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Listed By</h3>
                                                    <select name="listingby" id="">
                                                        <option value="">Any</option>
                                                        <option value="Owner">Owner</option>
                                                        <option value="Builder">Builder</option>
                                                        <option value="Agent">Agent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" value="reset" form="searchform"
                                class="">Clear Filter</button>
                            <button type="submit" form="searchform" class="advance_submit"
                                data-bs-dismiss="modal">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        
        $(document).ready(function() {
            $('.multiple-facility').select2();
        });

        $(document).ready(function() {
            var category_ids = [];
            $('.filter').on('change', function() {
                let {
                    value,
                    dataset,
                    checked
                } = event.target;
                if (dataset.ele == "filter") {
                    if (checked) {
                        category_ids.push(value);
                    } else {
                        category_ids = category_ids.filter(function(data) {
                            return data != value;
                        })
                    }
                }
                if(category_ids.length == 0){
                    category_ids[0] = 9;
                    $.ajax({
                    url: "{{ route('advanceFilter') }}",
                    type: 'get',

                    data: {
                        category_ids: category_ids,
                    },
                    success: function(response) {
                        $(".advance").replaceWith(response);

                    },
                    error: function(response) {}
                });
                category_ids = [];

                }
                else{
                    $.ajax({
                    url: "{{ route('advanceFilter') }}",
                    type: 'get',

                    data: {
                        category_ids: category_ids,
                    },
                    success: function(response) {
                        $(".advance").replaceWith(response);

                    },
                    error: function(response) {}
                });

                }


            });
        });
    </script>
@endpush