{{-- <div class="replace d-flex">
    @php
        $i = 1;
    @endphp
    @foreach($feature_values as $key=>$values)
    @php
        $name = App\Models\Feature::where('id',$key)->value('title');
    @endphp
        <div class="option_a1" id="{{$name}}">  
            <select name="property[{{$key}}]">
                <option value="">{{$name}}</option>
                @foreach ($values as $value)
                <option value="{{$value}}">{{$value}}</option>
                @endforeach               
            </select>
        </div>
        @php
            $i += 1;
            if($i==4){
                break;
            }
        @endphp
    @endforeach
</div> --}}

<div class="replace">
    @php $i=1 @endphp
    @foreach($feature_values as $key=>$values)
        @if($i>3)
            @php $name = App\Models\Feature::where('id',$key)->value('title'); @endphp
            <label for="buildingtype"> {{$name}}:-</label>
            <select name="properties[{{$key}}]" id="buildingtype">
                <option value=""> Select {{$name}}</option>
                @foreach($values as $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        @endif
        @php $i += 1  @endphp
    @endforeach
</div>