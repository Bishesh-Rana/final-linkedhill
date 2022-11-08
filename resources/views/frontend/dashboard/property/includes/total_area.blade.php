<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
               aria-expanded="false" aria-controls="collapseThree">
                <i class="more-less glyphicon glyphicon-plus"></i>
                <span class="material-icons">add_road</span> Total Area & Road Detail
            </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <div class="col-md-6">
                <label class="label-style">Total Area<span class="required-error">*</span></label>
            </div>
            <div class="col-md-6">
                <label class="label-style">Built Up Area</label>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                {{-- Total area --}}
                <div class="form-group  label-floating">
                    <input class="form-control" name="total_area" type="text" data-parsley-trigger="keyup" required />

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group" style="margin-top:10px;">
                    <select class="form-control select2 select2-hidden-accessible" name="total_area_unit"
                            data-placeholder="Select Unit" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating">
                    {{-- built up area--}}
                    <input class="form-control" name="built_up_area" type="text" />

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group" style="margin-top:10px;">
                    <select class="form-control select2 select2-hidden-accessible" name="built_up_area_unit"
                            data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group" style="margin-top:10px;">
                    <label class="label-style">Property Facing</label>
                    <select class="form-control select2 select2-hidden-accessible" name="property_facing"
                            data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        <option value="South">South</option>
                        <option value="North">North</option>
                        <option value="East">East</option>
                        <option value="West">West</option>
                        <option value="South-East">South-East</option>
                        <option value="South-West">South-West</option>
                        <option value="North-East">North-East</option>
                        <option value="North-West">North-West</option>
                    </select>
                </div>
            </div>

            <div class="clearfix"></div>
            <br>
            <div class="col-md-4">
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Road Access
                        {{-- <span class="required-error">*</span>--}}
                    </label>
                    <input class="form-control" name="road_access" type="text" placeholder="e.g 34,45" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:15px;">
                    <label class="label-style">Road Length</label>
                    <select class="form-control select2 select2-hidden-accessible" name="road_access_unit"
                            data-placeholder="Select Road Length Unit" style="width: 100%;" tabindex="-1" aria-hidden="true"
                            required>
                        <option value="1">Feet</option>
                        <option value="2">Meter</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:15px;">
                    <label class="label-style">Road Type</label>
                    <select class="form-control select2 select2-hidden-accessible" name="road_type"
                            data-placeholder="Select Road Type" style="width: 100%;" tabindex="-1" aria-hidden="true"
                            required>
                        @foreach($road_types as $road_type)
                            <option value="{{$road_type->id}}">{{$road_type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
</div>
