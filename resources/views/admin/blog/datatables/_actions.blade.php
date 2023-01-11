@can('blog-edit')
<a href="{{route('blog.edit',$blog->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
    data-original-title="Edit Property"><i class="material-icons">edit</i></a>
@endcan
{{-- @can('view-blog')

<a href="{{route('blog.show',$blog->id)}}" class="btn btn-simple btn-info btn-icon edit" rel="tooltip"
    data-original-title="Other Setting"><i class="material-icons">settings</i></a>
@endcan --}}

@can('blog-delete')
<a href="#" class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$blog->id}})" rel="tooltip"
    data-original-title="Delete Property"><i class="material-icons">close</i></a>
@endcan
