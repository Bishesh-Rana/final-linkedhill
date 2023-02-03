<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                aria-expanded="false" aria-controls="collapseThree">
                <i class="more-less glyphicon glyphicon-plus"></i>
                <span class="material-icons">perm_media</span> Upload Images
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">
            <div class="col-md-12">
                <label class="label-style"> Image Upload <span class="required-error">*</span></label>
                <div class="file-loading">
                    <input id="file-5" name="property_images[]" class="file" type="file" multiple
                        data-preview-file-type="any" data-upload-url="#" data-theme="fas" >
                </div>
                @if ($errors->has('property_images'))
                    <span class="error-message">
                        *{{ $errors->first('property_images') }}
                    </span>
                @endif
            </div>


            <div class="col-md-12">
                <br>
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Youtube Id

                    </label>
                    <input class="form-control" name="youtube_video_id" type="text" />
                </div>
            </div>

        </div>
    </div>
</div>
@push('script')

@endpush
