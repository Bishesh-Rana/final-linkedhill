<div class="owl-carousel" id="property">
    @foreach ($propertiesType as $type)
        <div class="item">
            <div class="category_card">
                <a href="{{ route('property.detail', ['id' => $type->id, 'slug' => $type->slug]) }}">
                    <img src="{{ asset($type->image) }}" alt="">
                    <div class="ppt_caption">
                        <h3>{{ Str::limit($type->title) }}</h3>
                        <span><i class="las la-map-marker-alt"></i> {{ $type->property_address }}</span>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
