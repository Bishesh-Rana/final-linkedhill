<div class="advance">
    @foreach($feature_values as $key=>$values)
        @php
            $name = App\Models\Feature::where('id',$key)->value('title');
        @endphp
        <div class="col-md-12">
            <div id="parking" class="selector_wrapper" >
                <h3>{{$name}}</h3>
               

                <div class="dynamic ">
                @foreach($values as $key1=>$value)
                   <div  class="selector">
                    <input type='radio' name="properties[{{$key}}]" value="{{$value}}" id="{{$name}}{{$key1}}"/>
                    <label for="{{$name}}{{$key1}}">{{$value}}  {{$name}}{{$key1}}</label>
                   </div>
                @endforeach 
                </div> 
            </div>                                  
        </div>
    @endforeach
</div>