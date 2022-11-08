 <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    <span class="material-icons">add_location_alt</span> Address
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">

                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-top:10px;">
                                                        <label class="label-style">Select City </label>
                                                        <select class="form-control select2 select2-hidden-accessible" name="city_id"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-top:10px;">
                                                        <label class="label-style">Select Area </label>
                                                        <select class="form-control select2 select2-hidden-accessible" name="area_id"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                            @foreach($areas as $area)
                                                                <option value="{{$area->id}}">{{$area->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating" style="margin-top:15px;">
                                                        <label class="label-style">
                                                            Enter Address/Landmark
                                                            <span class='required-error'>*</span>                                                        </label>
                                                        <input class="form-control" name="property_address" type="text" data-parsley-trigger="keyup"  required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating" style="margin-top:15px;">
                                                        <label class="label-style">
                                                            Enter Zipcode
                                                            <span class='required-error'>*</span>                                                        </label>
                                                        <input class="form-control" name="zipcode" type="text" data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-type-message="Enter Valid Zipcode" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group  label-floating" style="margin-top:15px;">
                                                        <label class="label-style">
                                                            Google Map Iframe
                                                        </label>
                                                        <textarea class="form-control" name="map_location" row="2"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
 </div>
