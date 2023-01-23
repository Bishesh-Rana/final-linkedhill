@extends('admin.layouts.master')
@section('title','Blog Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Add Blog Category</b>
                    </div>
                    <div class="card-content">
                        <form action="{{route('blog-category.store')}}"  method="post" id="parsleyValidationForm" data-parsley-validate="">
                            @csrf

                            <div class="form-group" style="margin-top:18px;">
                                <label>Select Parent Category</label>
                                <select class="form-control select2 select2-hidden-accessible" name="parent_id"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value=" ">Select Parent Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Enter Category Name</label>
                                <input type="text" name="name" id="name" class="form-control" data-parsley-trigger="keyup" required >
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" data-parsley-trigger="keyup" required >
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="togglebutton">
                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                        Non Featured <input type="checkbox" name="feature" value="1" checked> Featured
                                    </label>
                                </div>
                            </div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-sm btn-fill btn-success float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Manage Blog Categories</b>
                    </div>
                    <div class="card-content">
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
                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" data-toggle="modal" data-target="#exampleModal-{{$category->id}}"  data-original-title="Edit Category"><i class="material-icons">edit</i></a>
                                            <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$category->id}})" rel="tooltip"  data-original-title="Delete Category"><i class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
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
