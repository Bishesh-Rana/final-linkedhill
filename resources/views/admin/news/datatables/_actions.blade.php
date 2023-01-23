@can('news-edit')
<a href="{{route('news.edit',$news->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
    data-original-title="Edit Property"><i class="material-icons">edit</i></a>
@endcan
@can('news-delete')
<a href="#" class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$news->id}})" rel="tooltip"
    data-original-title="Delete Property"><i class="material-icons">close</i></a>
@endcan

