<div class="replace d-flex">
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
                    {{-- @if( array_key_exists($name,$filter )) 
                        <option data-element="{{$value}}{{$name}}" {{ ( intval( $filter[{{$name}}])== $value) ? 'selected':''}} value="{{$value}}">{{($value == 0)?'':$value}} {{$name}}</option>
                    @else
                        <option data-element="{{$value}}{{$name}}" value="{{$value}}">{{($value == 0)?'':$value}} {{$name}}</option>
                    @endif --}}

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
</div>