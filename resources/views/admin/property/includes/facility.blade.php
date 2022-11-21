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
            <div class="col-md-12">
                <div class="form-group  label-floating row"> 
                    {{-- @dd($property->facility) --}}
                    @foreach($facilities as $facility)
                    
                        <div class="col-sm-2">
                            <input type="checkbox"name="facility[]" id="facility{{$facility->id}}" value="{{$facility->title}}"  @php if($property->facility != null ){foreach($property->facility as $fac){if($fac->title == $facility->title){echo('checked'); }}} @endphp>
                            <label for="facility{{$facility->id}}">{{$facility->title}}</label></div>
                    @endforeach
                    <x-error name='facility' />
                </div>
            </div>
        </div>
    </div>
</div>

