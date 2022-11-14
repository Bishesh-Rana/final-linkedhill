<div class="replace" id="feature">
    @foreach($feature_values as $key=>$values)
        <div class="option_a1">
            <select name="{{$key}}">
                <option data-element="0bed" value="" selected>{{$key}}</option>
                    @foreach($values as $value)
                        <option data-element="1bed" value="{{$value}}">{{$value}}+</option>
                    @endforeach
            </select>
        </div>
    @endforeach
</div>