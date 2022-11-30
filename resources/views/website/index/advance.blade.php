<div class="advance">
    @foreach($feature_values as $key=>$values)
        @php
            $name = App\Models\Feature::where('id',$key)->value('title');
        @endphp
        <div class="selector_wrapper">
            <h3>{{ $name }}</h3>
            <div id="parking">
                <div class="dynamic ">
                    <select name="properties[{{ $key }}]">
                        <option value="any">Any</option>
                        @foreach ($values as $key1 => $value)
                        <option value="{{ $value }}">{{ $value }}+ </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> 
    @endforeach
</div>