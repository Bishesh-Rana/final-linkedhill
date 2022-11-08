<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
               aria-expanded="false" aria-controls="collapseThree">
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
                <input type="text" class="form-control" placeholder="Built Year" name="built_year">
            </div>
            <div class="col-md-4">
                <select class="form-control select2 select2-hidden-accessible" name="built_year_month"
                        data-placeholder="Month" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>


                </select>
            </div>
            <div class="col-md-4">
                <select class="form-control select2 select2-hidden-accessible" name="furnished"
                        data-placeholder="Furnishing" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                    <option value="Full Furnished">Full Furnished</option>
                    <option value="Semi Furnished">Semi Furnished</option>
                    <option value="Unfurnished">Unfurnished</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Kitchen
                    </label>
                    <input class="form-control" name="total_kitchen" type="number" min="0" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Living Room
                    </label>
                    <input class="form-control" name="total_living_room" type="number" min="0" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Bedroom
                    </label>
                    <input class="form-control" name="total_bed_room" type="number" min="0" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Number of Bathroom
                    </label>
                    <input class="form-control" name="total_bathroom" type="number" min="0" />
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Total Number of Floor
                    </label>
                    <input class="form-control" name="total_floor" type="number" min="0" />
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Parking for Car
                    </label>
                    <input class="form-control" name="car_parking" type="number" min="0" />
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Parking for Bike
                    </label>
                    <input class="form-control" name="bike_parking" type="number" min="0" />
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
                            <input type="checkbox" name="amenties[]" value="{{$amenty->id}}"> {{$amenty->name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
