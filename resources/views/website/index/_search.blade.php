<div class="linked_hill_search_wrapper">
    <form class="searchProperty" method="get" action="{{ route('front.search-properties') }}">
        <div class="linked_hill_flex_wrap">
            <div class="linked_hill_search_top ">
                <ul>
                    @foreach ($purposes as $key => $type)
                        <li>
                            <input type='radio' data-element="adpurpose{{ $key }}" name="purpose"
                                value="{{ $type->name }}" id="purpose{{ $key }}" />
                            <label for="purpose{{ $key }}">{{ $type->name }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="linked_hill_search_area d-flex">
                <?php $name = '';
                ?>
                <div class="multiple_select2option">
                    <select class="js-example-basic-multiple" name="property_address[]" multiple="multiple"
                        value="{{ $type->property_address }}">
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
                    </select>
                </div>
                <button class="btn btn-dark" type="submit"><i class="las la-search"></i></button>
            </div>
        </div>
        <div class="for_toggle_view">
            <div class="link_hill_flex_bottom_wrapper">
                <div class="surround_search">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                            checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Surrounding
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="advance-search">
            <p data-bs-toggle="modal" data-bs-target="#advanceSearch">Advance Search</p>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            var category_ids = [];
            $('.category').on('change', function() {
                let {
                    value,
                    id,
                    checked
                } = event.target;
                if (id == "category") {
                    if (checked) {
                        category_ids.push(value);
                    } else {
                        category_ids = category_ids.filter(function(data) {
                            return data != value;
                        })
                    }
                }
                $.ajax({
                    url: "{{ route('filter') }}",
                    type: 'get',
                    data: {
                        category_ids: category_ids,
                    },
                    // dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        $(".replace").replaceWith(response);
                    },
                    error: function(response) {}
                });

            });

        });
    </script>
@endpush
