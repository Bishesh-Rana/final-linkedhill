@props(['name' => 'image', 'value' => null, 'javascript' => Str::random(8)])

<div class="form-group label-floating is-empty">
    <label class="control-label">{{ $name }}</label>
    <div class="fileinput fileinput-new text-center">
        <div class="fileinput-new " id="holder-{{ $javascript }}">
            <img src="{{ empty($value) ? asset('assets/img/default.png') : $value }}"
                class="img-thumbnail img-responsive" style="max-width: 150px">
        </div>
        <input id="thumbnail-{{ $javascript }}" class="form-control" type="url" name="{{ $name }}" value="{{ $value }}" style="display: none">
        <a id="{{ $javascript }}" data-input="thumbnail-{{$javascript }}" data-preview="holder-{{ $javascript }}"
            class="btn btn-outline-success btn-round">
            <span><i class="fa fa-picture-o"></i> Choose</span>
        </a>
        <button class="btn btn-danger btn-round" id="removeFile-{{ $javascript }}"><i class="fa fa-times"></i> Remove</button>
        @error('image')
            <span class="error-message">
                *{{ $message }}
            </span>
        @enderror
    </div>
</div>

@push('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $(document).ready(function() {
            selector = "{{ $javascript }}";
            $(`#${selector}`).filemanager('image');
            $(`#removeFile-${selector}`).on('click', function(e) {
                e.preventDefault();
                $(this).siblings('input').val('');
                $(this).parent().find('img').attr('src', '/assets/img/default.png');
            });
        })
    </script>
@endpush
