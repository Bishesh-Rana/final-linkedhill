<div class="row">
    <div class="col-lg-12">
        <div class="owl-carousel" id="property">
            @foreach ($propertiesType as $type)
                <div class="category_card">
                    <a href="{{ route('property.detail', ['id' => $type->id, 'slug' => $type->slug]) }}">
                        <img src="{{ asset($type->image) }}" alt="">
                        <div class="ppt_caption">
                            <h1>{{Str::limit( $type->property_category->name , 10)}}</h1>
                           <span><i class="las la-map-marker-alt"></i> {{ $type->property_address }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
