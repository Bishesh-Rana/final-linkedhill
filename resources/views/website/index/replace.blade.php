<div class="replace">
    @php
        $i = 1;
    @endphp
    @foreach($feature_values as $key=>$values)
        @php
            $name = App\Models\Feature::where('id',$key)->value('title');
        @endphp
        <div class="option_a1">
            <select name="properties[{{$key}}]">
                <option data-element="0bed" value="" selected>{{$name}}</option>
                    @foreach($values as $value)
                        <option data-element="1bed" value="{{$value}}">{{$value}}+</option>
                    @endforeach
            </select>
        </div>
        @php
            $i += 1;
        @endphp
    {{-- @if($i > 2 )
        @break
    @endif --}}
    @endforeach
</div>