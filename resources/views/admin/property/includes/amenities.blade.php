<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="amenitiesTab">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                href="#amenitiesTabsController" aria-expanded="false" aria-controls="amenitiesTabsController">
                <i class="more-less glyphicon glyphicon-plus"></i>
                <span class="material-icons">add_location_alt</span> Amenities
            </a>
        </h4>
    </div>
    <div id="amenitiesTabsController" class="panel-collapse collapse" role="tabpanel" aria-labelledby="amenitiesTab">
        <div class="panel-body">
            <div class="tab-pane fade in active">
                <div class="row">
                    @foreach ($amenties as $amenity)
                        <div class="form-check form-check-inline col-md-4">
                            <label class="form-check-label">
                                {!! Form::checkbox('amenities[]', $amenity->id, in_array($amenity->id, $selectedAmenities), ['class' => 'form-check-input']) !!}
                                {{ $amenity->name }}
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <x-error name='amenities' />

        </div>
    </div>
</div>
