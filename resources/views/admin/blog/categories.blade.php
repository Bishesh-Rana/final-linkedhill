@extends('admin.layouts.master')
@section('title','Blog Category')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Blog Category:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Manage Blog Categories
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('blog-category.create')}}"  aria-expanded="false">
                                            <i class="material-icons">add</i>Add Blog Category
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">



                        <div class="tab-content">
                            <div class="tab-pane active" id="panel1">

                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>View Subcategory</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><a href="{{route('blog-category.subcategory',$category->id)}}" rel="tooltip" data-original-title="View Subcategories"><span class="material-icons">list_alt</span><sub>({{count($category->children)}})</sub></a></td>
                                                <td class="text-right">
                                                    <a href="{{route('blog-category.edit',$category->id)}}" class="btn btn-xs btn-primary"  data-placement="top" title="Edit Category"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                    <button onclick="deleteCity({{$category->id}})" class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i> </button>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>





                            </div>

                        </div>
                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @foreach($categories as $category)
            <div class="modal fade" id="exampleModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('blog-category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$category->id}}" name="city_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Category  - {{$category->name}}</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Category Name
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="name" id="name" value="{{$category->name}}" type="text" required />
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter Slug
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="slug" id="name" value="{{$category->slug}}" type="text"  required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="togglebutton">
                                            <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                Non Featured <input type="checkbox" name="feature" value="1" @if($category->feature) checked @endif> Featured
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach


    </div>

@endsection

@push('script')

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        toastr.success("{{Session::get('message')}}",'',{

            "positionClass": "toast-top-right",

        });
        @endif

        function convertToSlug(title)
        {
            return title
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/&/g,'and')
                .replace(/[^\w-]+/g,'');

        }

        $('#name').on('keyup',function(){
            var title=$(this).val();
            var slug=convertToSlug(title);
            $('#slug').val(slug);
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
//            "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });


            var table = $('#datatables').DataTable();





        });

        function deleteCity(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {

                $.ajax({
                    url:'{!!URL::to('admin/blog-category/')!!}' + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},

                    success:function(){

                        console.log('success');
                        location.reload();
                    },
                    error:function(){
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });

            });

        }

    </script>


@endpush
