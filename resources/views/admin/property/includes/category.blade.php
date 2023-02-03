<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#category" aria-controls="category">
                <i class="more-less glyphicon glyphicon-minus"></i>
                <span class="material-icons"> hvac </span> Other Details / Extra Features
            </a>
        </h4>
    </div>
    <div id="category" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <div class="card card-nav-tabs card-plain">
                <div class="card-header card-header-danger">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                @foreach ($property_categories as $key => $property_category)
                                    <li class="nav-item {{ $property->category_id == $property_category->id ? 'active' : null }}" >
                                        <a class="nav-link toggleProperty " href="#{{ $property_category->id . 'home' }}"
                                            data-toggle="tab">{{ $property_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content property-description">
                        @foreach ($property_categories as $property_category)
                            <div class="tab-pane {{ $property->category_id == $property_category->id ? 'active' : null }}" id="{{$property_category->id.'home' }}">
                                <div class="row g-3">
                                    {{-- @dd($property->features->pivot->value) --}}
                                    @forelse ($property_category->features as $feat)
                                    <div class="col-md-12"> 
                                        <div style="border: 1px solid black">
                                            @if(!$feat->value->isEmpty())
                                            @if($feat->input_type == 'text' )
                                               <div style="display: flex;align-items: center;">
                                                    <label for="featureid_cat{{$property_category->id}}{{ $feat->id }}{{$val->value}}">{{ $feat->title }}:</label>
                                                    <input type="text" class="form-control" style="margin-left:20px;" placeholder="Enter the value"
                                                     name="features[{{ $property_category->id }}][{{ $feat->id }}]" 
                                                     value="@php foreach($property->features as $feature){ if(($property->category_id == $property_category->id)&&($feature->pivot->feature_id == $feat->id )){echo $feature->pivot->value;}}@endphp"
                                                     id="featureid_cat{{$property_category->id}}{{ $feat->id }}{{$val->value}}">
                                               </div>
                                            @else    
                                                <p style="padding:3px 3px 0px 10px;" class="label-style text-capaitalize">
                                                    {{ $feat->title }}
                                                </p>                                        
                                                <div style="padding:2px 10px;display:flex;">                                            
                                                    @foreach($feat->value as $val)
                                                    <div style="margin-right: 10px">
                                                        <label for="featureid_cat{{$property_category->id}}{{ $feat->id }}{{$val->value}}">{{rtrim($val->value, '+')}}</label>
                                                        <input type="radio" value='{{$val->value}}' id="featureid_cat{{$property_category->id}}{{ $feat->id }}{{$val->value}}" name="features[{{ $property_category->id }}][{{ $feat->id }}]" 
                                                        @php foreach($property->features as $feature){ if(($property->category_id == $property_category->id)&&($feature->pivot->feature_id == $feat->id )&&($feature->pivot->value == $val->value)){echo "checked";}}  @endphp/>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @else
                                            <x-property label="{{ $feat->title }}" type="{{ $feat->parsed_type }}" id="{{ $feat->id }}"
                                                value="{{ optional($selectedFeatures->firstWhere('feature_id', $feat->id))->value }}" />   
                                            @endif
                                        </div>
                                    </div>
                                    @empty
                                    <div>
                                        No Features Found.
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                <x-error name='features' />
            </div>
        </div>
    </div>
    </div>
</div>

@once
    @push('script')
        <script>
            $('.feature_value').on('change',function(){

            });
            $(document).ready(function() {
                $('.tab-pane.row.active input').prop('disabled', false);
                $('.toggleProperty').on('click', function() {
                    var categoryId = $(this).attr('href').replace(/\D+/g, '');
                    console.log($(":radio[value=" + categoryId + "]"));
                    $(":radio[value=" + categoryId + "]").prop('checked', true);;
                    $('.property-description input').prop('disabled', true);
                    $(`${$(this).attr('href')} input`).prop('disabled', false);
                });
            })
        </script>
    @endpush
@endonce
