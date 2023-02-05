<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSeven">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                <i class="more-less glyphicon glyphicon-plus"></i>
                <span class="material-icons">monetization_on</span> Price
            </a>
        </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
        <div class="panel-body">

            <div class="col-md-4">
                <div class="form-group  label-floating" style="margin-top:10px;">
                    <label class="label-style">Total Price <span class='required-error'>*</span>
                    </label>
                    <input class="form-control" name="start_price"
                        value="{{ old('start_price', $property->start_price) }}" type="text" data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-type-message="only numbers" required />
                    <x-error name='start_price' />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:10px;">
                    <label class="label-style">Price Label </label>
                    <select class="form-control select2 select2-hidden-accessible" id="price_label" name="price_label"
                        data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        <option value="Total" @if ($property->price_label == 'Total') selected @endif>Total</option>
                        <option value="Weekly" @if ($property->price_label == 'Weekly') selected @endif>Weekly</option>
                        <option value="Fortnightly" @if ($property->price_label == 'Fortnightly') selected @endif>Fortnightly</option>
                        <option value="Monthly" @if ($property->price_label == 'Monthly') selected @endif>Monthly</option>
                        <option value="Quarterly" @if ($property->price_label == 'Quarterly') selected @endif>Quarterly</option>
                        <option value="Halfyearly" @if ($property->price_label == 'Halfyearly') selected @endif>Half-Yearly</option>
                        <option value="Annually" @if ($property->price_label == 'Yearly') selected @endif>Annually</option>
                        <option value="Per Aana" @if ($property->price_label == 'Per Aana') selected @endif>Per Aana</option>
                        <option value="Per Haath" @if ($property->price_label == 'Per Haath') selected @endif>Per Haath</option>
                        <option value="Per Ropani" @if ($property->price_label == 'Per Ropani') selected @endif>Per Ropani</option>
                        <option value="Per Kattha" @if ($property->price_label == 'Per Kattha') selected @endif>Per Kattha</option>
                        <option value="Per Bigha" @if ($property->price_label == 'Per Bigha') selected @endif>Per Bigha</option>
                        <option value="other" @if ($property->price_label == 'other') selected @endif>Other(Specify)</option>
                    </select>
                    <x-error name='price_label' />
                </div>
            </div>
            
            <div class="col-md-4" id="other_type" style="display:{{($property->id && $property->price_label == 'other')?'block':'none'}}">
                <div class="form-group" style="margin-top:10px;">
                <label class="label-style" >Other </label> <br>
                <input type="text" name="price_tag_other" id="Price-other" value="{{$property->price_tag_other}}">
                </div>
            </div>
        </div>
    </div>
</div>


