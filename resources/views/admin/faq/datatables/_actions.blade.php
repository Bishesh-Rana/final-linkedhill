@can('faq-edit')
<a href="{{route('faq.edit',$faq->id)}}" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip"
    data-original-title="Edit Property"><i class="material-icons">edit</i></a>
@endcan
{{-- @can('view', $faq)

<a href="{{route('faq.show',$faq->id)}}" class="btn btn-simple btn-info btn-icon edit" rel="tooltip"
    data-original-title="Other Setting"><i class="material-icons">settings</i></a>
@endcan --}}

@can('faq-delete')
<a href="#" class="btn btn-simple btn-danger btn-icon" onclick="deleteFaq({{$faq->id}})" rel="tooltip"
    data-original-title="Delete Property"><i class="material-icons">close</i></a>
@endcan
