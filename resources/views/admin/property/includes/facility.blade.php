<style>
    .form-group select {
    appearance: auto;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNew" aria-expanded="true"
                aria-controls="collapseOne">
                <i class="more-less glyphicon glyphicon-minus"></i>
                <span class="material-icons"> hvac </span> Facilities
            </a>
        </h4>
    </div>
    <div id="collapseNew" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Select facility
                        <span class='required-error'>*</span>
                    </label>

                    <select class="form-control" name="facility" value="{{ old('title', $property->facility) }}"
                        data-parsley-trigger="keyup">
                        <option > Select Option </option>
                        @foreach($facilities as $facility)
                            <option value="{{$facility->title}}">{{$facility->title}}</option>
                        @endforeach
                    </select>
                    <x-error name='title' />
                </div>
            </div>
        </div>
    </div>
</div>

