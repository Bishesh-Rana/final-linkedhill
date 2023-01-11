<div class="advance">
    @foreach($feature_values as $key=>$values)
        @php
            $name = App\Models\Feature::where('id',$key)->value('title');
        @endphp
       
        <div class="selector_wrapper">
            <div class="col-md-6">
            <h3>{{ $name }}</h3>
            <div id="parking">
                <div class="dynamic ">
                    <select name="properties[{{$key}}]">
                        <option value="any">Any</option>
                        @foreach ($values as $key1 => $value)
                        @if(array_key_exists( 'properties' , $filter))                                                                        
                            <option value="{{ $value }}" @foreach($filter['properties'] as $keys=>$data){{($data == $value)?'selected':''}} @endforeach>{{ $value }}</option>
                        @else
                        <option value="{{ $value }}" >{{ $value }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div> 
       </div>
    @endforeach
</div>