
<div class="replace">
    @php $i=1 @endphp
    @foreach($feature_values as $key=>$values)
        @if($i>3)
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
    @endforeach
</div>
{{-- <div class="replace"> 
    @php $i = 1; @endphp
    @foreach($feature_values as $key=>$values)
    @if($i>3)
    @php $name = App\Models\Feature::where('id',$key)->value('title'); @endphp
    <div class="option_1 multi_select_dropdown">
        <p>{{$name}}<i class="las la-angle-down"></i></p>
        <div class="option_listing_dropDown child_dropdown">
            @foreach ($values as $value)
                <div class="list_group_category">
                    <input class="form-check-input front-category" data-element="#advance{{ $value }}"
                        type="checkbox" name="properties[{{$key}}]" value="{{ $value}}"
                        id="initial{{ $value}}">
                    <label class="form-check-label" for="initial{{ $value }}">{{ $value }}</label>
                </div>
            @endforeach
        </div>
    </div>
    @endif
    @php $i += 1; @endphp
    @endforeach
</div> --}}