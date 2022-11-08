<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                <i class="more-less glyphicon glyphicon-plus"></i>
                <span class="material-icons">playlist_add</span> Other Details of Property
            </a>
        </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
        <div class="panel-body">
            <div class="col-md-12">
                <label class="label-style">Building Detail</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="{{$property->built_year}}" placeholder="Built Year" name="built_year">
            </div>
            <div class="col-md-4">
                <select class="form-control select2 select2-hidden-accessible"  name="built_year_month" data-placeholder="Month" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value="January" @if($property->built_year_month == "January")selected @endif>January</option>
                    <option value="February" @if($property->built_year_month == "February")selected @endif>February</option>
                    <option value="March" @if($property->built_year_month == "March")selected @endif>March</option>
                    <option value="April" @if($property->built_year_month == "April")selected @endif>April</option>
                    <option value="May" @if($property->built_year_month == "May")selected @endif>May</option>
                    <option value="June" @if($property->built_year_month == "June")selected @endif>June</option>
                    <option value="July" @if($property->built_year_month == "July")selected @endif>July</option>
                    <option value="August" @if($property->built_year_month == "August")selected @endif>August</option>
                    <option value="September" @if($property->built_year_month == "September")selected @endif>September</option>
                    <option value="October" @if($property->built_year_month == "October")selected @endif>October</option>
                    <option value="November" @if($property->built_year_month == "November")selected @endif>November</option>
                    <option value="December" @if($property->built_year_month == "December")selected @endif>December</option>


                </select>
            </div>
            <div class="col-md-4">
                <select class="form-control select2 select2-hidden-accessible" name="furnished"  data-placeholder="Furnishing" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                    <option value="Full Furnished" @if($property->furnished == "Full Furnished") selected @endif>Full Furnished</option>
                    <option value="Semi Furnished" @if($property->furnished == "Semi Furnished") selected @endif>Semi Furnished</option>
                    <option value="Unfurnished" @if($property->furnished == "Unfurnished") selected @endif>Unfurnished</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Kitchen
                    </label>
                    <input class="form-control" name="total_kitchen" value="{{$property->total_kitchen}}" type="number" min="0" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Living Room
                    </label>
                    <input class="form-control" name="total_living_room" value="{{$property->total_living_room}}" type="number" min="0"  />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Bedroom
                    </label>
                    <input class="form-control" name="total_bed_room" value="{{$property->total_bed_room}}" type="number" min="0"  />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Bathroom
                    </label>
                    <input class="form-control" name="total_bathroom" value="{{$property->total_bathroom}}" type="number" min="0"  />
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Total Number of Floor
                    </label>
                    <input class="form-control" name="total_floor" value="{{$property->total_floor}}" type="number" min="0"/>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Parking for Car
                    </label>
                    <input class="form-control" name="car_parking" value="{{$property->car_parking}}" type="number" min="0" />
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Parking for Bike
                    </label>
                    <input class="form-control" name="bike_parking" value="{{$property->bike_parking}}" type="number" min="0"/>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-12">
                <label class="label-style">Amenities </label>
            </div>

            @foreach($amenties as $amenty)
                <div class="col-md-3">
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="checkbox" name="amenties[]" value="{{$amenty->id}}" @foreach($property->amenties as $a) @if($amenty->id == $a->amenity_id) checked @endif @endforeach> {{$amenty->name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
