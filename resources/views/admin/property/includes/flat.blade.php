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
            <div class="col-md-6 row">
                <div class="col-md-12">
                    <label class="label-style">Total Area <span class="required-error">*</span></label>
                </div>
                <div class="col-md-6">
                    {{-- Total area --}}
                    <div class="form-group  label-floating">
                        <input class="form-control" name="total_area"
                            value="{{ old('total_area', $property->total_area) }}" type="text"
                            data-parsley-trigger="keyup" required />
                        <x-error name='total_area' />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-top:10px;">
                        {!! Form::select('built_up_area_unit', $units, old('built_up_area_unit', $property->built_up_area_unit), ['class' => 'form-control select2','style' => 'width: 100%;']) !!}

                        <x-error name='built_up_area_unit' />
                    </div>
                </div>
            </div>
            <div class="col-md-6 row">
                <div class="col-md-12">
                    <label class="label-style">Built Up Area</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group  label-floating">
                        {{-- built up area --}}
                        <input class="form-control" name="built_up_area" value="{{ $property->built_up_area }}"
                            type="text" />
                        <x-error name='built_up_area' />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-top:10px;">
                        {!! Form::select('total_area_unit', $units, old('total_area_unit', $property->total_area_unit), ['class' => 'form-control select2','style' => 'width: 100%;']) !!}

                        <x-error name='total_area_unit' />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" style="margin-top:10px;">
                    <label class="label-style">Property Facing(Mohada)</label>
                    <select class="form-control select2 select2-hidden-accessible" name="property_facing"
                        data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        <option value="South" @if ($property->property_facing == 'South') selected @endif>South</option>
                        <option value="North" @if ($property->property_facing == 'North') selected @endif>North</option>
                        <option value="East" @if ($property->property_facing == 'East') selected @endif>East</option>
                        <option value="West" @if ($property->property_facing == 'West') selected @endif>West</option>
                        <option value="South-East" @if ($property->property_facing == 'South-East') selected @endif>South-East</option>
                        <option value="South-West" @if ($property->property_facing == 'South-West') selected @endif>South-West</option>
                        <option value="North-East" @if ($property->property_facing == 'North-East') selected @endif>North-East</option>
                        <option value="North-West" @if ($property->property_facing == 'North-West') selected @endif>North-West</option>
                    </select>
                    <x-error name='property_facing' />
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-4">
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Road Access(Mohada Length)

                    </label>
                    <input class="form-control" name="road_access"
                        value="{{ old('road_access', $property->road_access) }}" type="text"
                        placeholder="e.g 34,45" />
                    <x-error name='road_access' />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:15px;">
                    <label class="label-style">Mohada Length Unit</label>
                    <select class="form-control select2 select2-hidden-accessible" name="road_access_unit"
                        data-placeholder="Select Road Length Unit" style="width: 100%;" tabindex="-1" aria-hidden="true"
                        required>
                        <option value="1" @if ($property->road_access_unit == 1) selected @endif>Feet</option>
                        <option value="2" @if ($property->road_access_unit == 2) selected @endif>Meter</option>
                        <option value="3" @if ($property->road_access_unit == 3) selected @endif>Haath</option>
                    </select>
                    <x-error name='road_access_unit' />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:15px;">
                    <label class="label-style">Road Type</label>
                    {!! Form::select('road_type', $road_types, old('road_type', $property->road_type), ['class' => 'form-control select2','style' => 'width: 100%;']) !!}

                    <x-error name='road_type' />
                </div>
            </div>

        </div>
    </div>
</div>
