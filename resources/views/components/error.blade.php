@props(['name'])
@error($name)
    <span class="error-message">
        *{{ $message }}
    </span>
@enderror
