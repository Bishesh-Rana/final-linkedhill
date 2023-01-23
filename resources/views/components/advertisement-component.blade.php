@if ($advertisement->count())
    <section id="ads_section" class="cs_top_padding">
        <div class="container">
            <div class="row">
                @foreach ($advertisement as $item)
                    <div class="{{ $item->display_size }}">
                        <img src="{{ $item->image }}" alt="{{ $item->title }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
