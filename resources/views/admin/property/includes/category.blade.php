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
                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                @foreach ($property_categories as $key => $property_category)
                                    <li class="nav-item">
                                        <a class="nav-link active toggleProperty" href="#{{ $property_category->id . 'home' }}"
                                            data-toggle="tab">{{ $property_category->name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content text-center property-description">
                        @foreach ($property_categories as $key => $property_category)
                            <div class="tab-pane {{ $property->category_id == $property_category->id ? 'active' : null }}"id="{{ $property_category->id . 'home' }}">
                               <div class="row g-3">
                                @forelse ($property_category->features as $key=>$feat)
                                <div class="col-md-12"> 
                                    <div style="border: 1px solid black">
                                        @if(!$feat->value->isEmpty())
                                        <p class="label-style text-capitalize">
                                            {{ $feat->title }}
                                        </p>
                                           <div style="padding:2px 10px;display:flex;">
                                            {{-- @dd($feat->value); --}}
                                            
                                               @foreach($feat->value as $val)
    
                                               {{-- @php foreach($property->features as $feature){ if($feature->pivot->feature_id == $feat->id ){if($feature->pivot->value == $val->value){echo "checked";}}}  @endphp --}}
                                               <div style="margin-right: 10px" class="">
                                                   <label for="featureid{{ $feat->id }}{{$val->value}}">{{$val->value}}</label>
                                                   <input type="radio" value='{{$val->value}}' id="featureid{{ $feat->id }}{{$val->value}}" name="features[{{ $feat->id }}]" 
                                                   @php foreach($property->features as $feature){ if($feature->pivot->feature_id == $feat->id ){if($feature->pivot->value == $val->value){echo "checked";}}}  @endphp/>
                                                   
                                               </div>
                                           @endforeach
                                           </div>
                                        @else
                                            <x-property label="{{ $feat->title }}" type="{{ $feat->parsed_type }}"
                                                id="{{ $feat->id }}"
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
