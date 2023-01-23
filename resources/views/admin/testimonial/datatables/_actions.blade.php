@can('testimonial-edit')
<a href="{{route('testimonial.edit',$testimonial->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
    data-original-title="Edit Property"><i class="material-icons">edit</i></a>
@endcan
{{-- @can('view', $testimonial)

<a href="{{route('testimonial.show',$testimonial->id)}}" class="btn btn-simple btn-info btn-icon edit" rel="tooltip"
    data-original-title="Other Setting"><i class="material-icons">settings</i></a>
@endcan --}}

@can('testimonial-delete')
<a href="#" class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$testimonial->id}})" rel="tooltip"
    data-original-title="Delete Property"><i class="material-icons">close</i></a>
@endcan
