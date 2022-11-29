<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
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
                    {!! Form::select('city_id', $cities, old('city_id', $property->city_id), ['class' => 'form-control select2', 'id' => 'city_id', 'required' => true, 'style' => 'width: 100%;']) !!}
                    <x-error name='city_id' />

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group" style="margin-top:10px;">
                    <label class="label-style">Select Area </label>
                    {!! Form::select('area_id', $areas, old('area_id', $property->area_id), ['class' => 'form-control select2', 'id' => 'area_id', 'required' => true, 'style' => 'width: 100%;']) !!}
                    <x-error name='area_id' />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Enter Address/Landmark
                        <span class='required-error'>*</span>
                    </label>
                    <input class="form-control" name="property_address"
                        value="{{ old('property_address', $property->property_address) }}" type="text"
                        data-parsley-trigger="keyup" required />
                    <x-error name='property_address' />

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group  label-floating" style="margin-top:15px;">
                    <label class="label-style">
                        Enter Zipcode
                        <span class='required-error'>*</span>
                    </label>
                    <input class="form-control" name="zipcode" value="{{ old('zipcode', $property->zipcode) }}"
                        type="text" data-parsley-trigger="keyup" data-parsley-type="number"
                        data-parsley-type-message="Enter Valid Zipcode" required />
                    <x-error name='zipcode' />

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var area_id = "{{ $property->area_id }}";
            $('#city_id').on('change', () => {
                var city_id = $('#city_id').val();
                $.ajax({
                    url: "{{ route('search-area') }}",
                    type: "GET",
                    data: {
                        '_token': csrf_token,
                        'city_id': city_id
                    },
                    success: function(response) {
                        document.getElementById("area_id").innerHTML =
                            response.data.reduce((tmp, x) =>
                                `${tmp}<option value='${x.id}' ${x.id == area_id ? "selected" : null}>${x.name}</option>`,
                                '');
                    },
                    error: function(response) {
                        document.getElementById("area_id").innerHTML =
                            `<option value="null">Area Not Available</option>`;
                    }
                })
            })
            $('#city_id').trigger('change');

        });
    </script>
@endpush
