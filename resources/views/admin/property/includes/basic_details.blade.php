<style>
    .form-group select {
    appearance: auto;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                <i class="more-less glyphicon glyphicon-minus"></i>
                <span class="material-icons"> hvac </span> Basic Details
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="form-group col-md-6">
                <label class="label-style">Purpose to Post Property</label>
                <div class="radio">
                    
                    @foreach ($purposes as $purpose)
                        <label>
                            <input type="radio" name="property_status" value="{{ $purpose->name }}"
                                @if ($property->property_status == $purpose->name) checked="true" @endif><span
                                class="circle"></span><span class="check"></span>
                                {{$purpose->name == "Buy" ? "Sell" : $purpose->name}}
                        </label>
                    @endforeach
                </div>
                <x-error name='property_status' />

            </div>
            <div class="form-group col-md-6">
                <label class="label-style">Property Type</label>
                <div class="radio">
                    @foreach ($property_types as $property_type)
                        <label>
                            <input type="radio" name="type" @if ($property->type == $property_type->name) checked="true" @endif
                                value="{{ $property_type->name }}"><span class="circle"></span><span
                                class="check"></span> {{ $property_type->name }}
                        </label>
                    @endforeach
                </div>
                <x-error name='type' />
            </div>
            <div class="form-group col-md-12">
                <label class="label-style">Property Category</label>
                <div class="radio" id="categorytype"> 
                    @foreach ($property_categories as $property_category)
                        <label>
                            <input type="radio" name="category_id"  id="category_id"
                                @if ($property->category_id == $property_category->id) checked="true" @endif
                                value="{{ $property_category->id }}" 
                                data-testval="{{ $property_category->name }}">
                                <span class="circle"></span>
                                <span class="check"></span> 
                                {{ $property_category->name }}
                        </label>
                    @endforeach
                </div>
                <x-error name='category_id' />
            </div>

            <div class="col-md-6">
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Enter Title
                        <span class='required-error'>*</span>
                    </label>
                    <input class="form-control" name="title" id="title" value="{{ old('title', $property->title) }}"
                        type="text" data-parsley-trigger="keyup" required />
                    <x-error name='title' />
                </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Enter Slug
                        <span class='required-error'>*</span>
                    </label>
                    <input class="form-control" name="slug" value="{{ old('slug', $property->slug) }}" id="slug"
                        type="text" data-parsley-trigger="keyup" required />
                    <x-error name='slug' />

                </div>
            </div> --}}


{{-- --------------------------------------------- --}}

{{-- <div class="col-md-6">
    <div class="form-group" style="margin-top:15px;">
        <label class="label-style">Bedroom</label>
        <select class="form-control" name="bed" required style="padding: 7px 10px;">
            <option value="1" @if ($property->bed == 1) selected @endif>1</option>
            <option value="2" @if ($property->bed == 2) selected @endif>2</option>
            <option value="3" @if ($property->bed == 3) selected @endif>3</option>
            <option value="4" @if ($property->bed == 4) selected @endif>4</option>
            <option value="5" @if ($property->bed == 5) selected @endif>5</option>
            <option value="6" @if ($property->bed == 6) selected @endif>6</option>
            <option value="7" @if ($property->bed == 7) selected @endif>7</option>
            <option value="8" @if ($property->bed == 8) selected @endif>8</option>
            <option value="9" @if ($property->bed == 9) selected @endif>9</option>
            <option value="10" @if ($property->bed == 10) selected @endif>10</option>
        </select>
        <x-error name='bed' />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group" style="margin-top:15px;">
        <label class="label-style">Bathroom</label>
        <select class="form-control" name="bath" required style="padding: 7px 10px;">
            <option value="1" @if ($property->bath == 1) selected @endif>1</option>
            <option value="2" @if ($property->bath == 2) selected @endif>2</option>
            <option value="3" @if ($property->bath == 3) selected @endif>3</option>
            <option value="4" @if ($property->bath == 4) selected @endif>4</option>
            <option value="5" @if ($property->bath == 5) selected @endif>5</option>
            <option value="6" @if ($property->bath == 6) selected @endif>6</option>
            <option value="7" @if ($property->bath == 7) selected @endif>7</option>
            <option value="8" @if ($property->bath == 8) selected @endif>8</option>
            <option value="9" @if ($property->bath == 9) selected @endif>9</option>
            <option value="10" @if ($property->bath == 10) selected @endif>10</option>
        </select>
        <x-error name='bath' />
    </div>
</div> --}}

{{-- --------------------------------------------- --}}


            <div class="col-md-12">
                <div class="form-group">
                    <label class="label-style">
                        Property Details
                        <span class='required-error'>*</span>
                    </label>
                    <textarea class="form-control summernote" name="property_detail">{!! old('property_detail', $property->property_detail) !!}</textarea>
                    <x-error name='property_detail' />

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('input[name="category_id"]').on('click', function() {
                href = `#${$(this).val()}home`;
                $(`a[href="${href}"]:first`).trigger('click');
            })
        })
    </script>
@endpush
