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
                                        <a class="nav-link active toggleProperty"
                                            href="#{{ $property_category->id . 'home' }}"
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
                            <div class="tab-pane row {{ $property->category_id == $property_category->id ? 'active' : null }}"
                                id="{{ $property_category->id . 'home' }}">
                                @forelse ($property_category->features as $key=>$feat)
                                    <div class="col-6">
                                        {{-- @dd(!$feat->value->isEmpty()) --}}
                                        @if(!$feat->value->isEmpty())
                                        <label class="label-style text-capitalize col-md-3">
                                            {{ $feat->title }}
                                        </label>
                                            @foreach($feat->value as $val)
                                                <div class="col-md-2">
                                                    <input class="form-control" value='{{$val->value}}' name="features[{{ $feat->id }}]" type="radio" />
                                                    <label>{{$val->value}}</label>
                                                </div>
                                            @endforeach
                                        @else
                                            <x-property label="{{ $feat->title }}" type="{{ $feat->parsed_type }}"
                                                id="{{ $feat->id }}"
                                                value="{{ optional($selectedFeatures->firstWhere('feature_id', $feat->id))->value }}" />   
                                        @endif
                                    </div>
                                @empty
                                    <div class="col-6">
                                        No Features Found.
                                    </div>
                                @endforelse
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
