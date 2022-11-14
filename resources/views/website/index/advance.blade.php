<div class="advance">
    @foreach($feature_values as $key=>$values)
        @php
            $name = App\Models\Feature::where('id',$key)->value('title');
        @endphp
        <div class="col-md-12">
            <div id="parking" class="selector_wrapper">
                <h3>{{$name}}</h3>

                @foreach($values as $value)
                    <input type='radio' name="properties[{{$key}}]" value="{{$value}}" id="park-0"/>
                    <label for="park-0">{{$value}}</label>
                @endforeach  
            </div>                                  
        </div>
    @endforeach
</div>