@can('advertisement-edit')
<a href="{{route('advertisements.edit',$advertisement->id)}}" class="btn btn-simple btn-warning btn-icon edit"
    rel="tooltip" data-original-title="Edit Advertisement"><i class="material-icons">edit</i></a>
@endcan
{{-- @can('view', $advertisement)

<a href="{{route('advertisement.show',$advertisement->id)}}" class="btn btn-simple btn-info btn-icon edit" rel="tooltip"
    data-original-title="Other Setting"><i class="material-icons">settings</i></a>
@endcan --}}

@can('advertisement-delete')
<a href="#" class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$advertisement->id}})" rel="tooltip"
    data-original-title="Delete Advertisement"><i class="material-icons">close</i></a>
@endcan
