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
                    <select class="form-control select2 select2-hidden-accessible" name="price_label"
                        data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        <option value="Total" @if ($property->price_label == 'Total') selected @endif>Total</option>
                       
                        <option value="Weekly" @if ($property->price_label == 'Weekly') selected @endif>Weekly</option>
                        <option value="Fortnightly" @if ($property->price_label == 'Fortnightly') selected @endif>Fortnightly</option>
                        <option value="Monthly" @if ($property->price_label == 'Monthly') selected @endif>Monthly</option>
                        <option value="Quarterly" @if ($property->price_label == 'Quarterly') selected @endif>Quarterly</option>
                        <option value="Halfyearly" @if ($property->price_label == 'Halfyearly') selected @endif>Half-Yearly</option>
                        <option value="Annually" @if ($property->price_label == 'Yearly') selected @endif>Annually</option>
                        <option value="other" @if ($property->price_label == 'other') selected @endif>Other(Specify)</option>
                    </select>
                    <x-error name='price_label' />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:10px;">
                <label class="label-style" >Other </label> <br>
                <input type="text" name="Price-tag-other" id="Price-other">
                </div>
            </div>

        </div>
    </div>
</div>
