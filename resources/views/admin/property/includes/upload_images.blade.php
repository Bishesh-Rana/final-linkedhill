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
                <label class="label-style"> Image Upload </label>
                <div class="file-loading">
                    <input id="file-5" name="property_images[]" class="file" type="file" multiple
                        data-preview-file-type="any" data-upload-url="#" data-theme="fas" value="">
                </div>
                <x-error name='property_images' />
            </div>
            <div class="col-md-12">
                <div style="margin-top: 20px">
                    @foreach ($property->images as $image)
                        <div class="col-md-3 property-image" id="proimage-{{ $image->id }}">
                            <a href="{{ $image->name }}" data-lightbox="example{{ $image->id }}"><img
                                    class="img-style" src="{{ $image->name }}" /></a>
                            <button class="btn btn-simple btn-danger delButton" value="{{ $image->id }}"
                                type="button"><i class="material-icons">close</i></button>
                        </div>
                    @endforeach

                </div>
            </div>

            <input type="hidden" value="{{ count($property->images) }}" id="countImages">

            <div class="col-md-12">
                <div class="form-group  label-floating">
                    <label class="label-style">
                        Youtube Id
                        {{-- <small>*</small> --}}
                    </label>
                    <input class="form-control" name="youtube_video_id" value="{{ $property->youtube_video_id }}"
                        type="text" />
                    <x-error name='youtube_video_id' />
                </div>
            </div>

        </div>
    </div>
</div>
@push('script')
    <script>
        //Script For Deleting The image
        $(document).ready(function() {
            $('.delButton').on('click', function() {
                var image = $(this).parent('.property-image');
                var id = $(this).attr('value');
                let url = "{{ route('delete-property-image', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: $("meta[name = 'csrf-token']").attr('content')
                    },
                    success: function(result) {
                        image.remove();
                    }
                });
            })
        })
    </script>
@endpush
