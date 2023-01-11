@can('property-edit')
    <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
        data-original-title="Edit Property"><i class="material-icons">edit</i></a>
@endcan


@can('property-delete')
    <a href="#" class="btn btn-simple btn-danger btn-icon" onclick="deleteProperty({{ $property->id }})" rel="tooltip"
        data-original-title="Delete Property"><i class="material-icons">close</i></a>
@endcan
