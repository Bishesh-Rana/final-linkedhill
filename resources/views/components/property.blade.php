@props(['other','label', 'value' => null, 'type' => 'text', 'id'])
<div class="form-group row">
    @if ($type == 'text')
        <label class="label-style text-capitalize col-md-3">
            {{ $label }}
        </label>
        <div class="col-md-6">
            <input class="form-control" name="features[{{ $id }}]" value="{{ $value }}" type="text"
                disabled />
        </div>
    @else
        <label class="label-style text-capitalize col-md-3">
            {{ $label }}
        </label>
        <div class="togglebutton col-md-3">
            <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                False <input type="checkbox" value="1" name="features[{{ $id }}]" disabled> True
            </label>
        </div>
    @endif
</div>
