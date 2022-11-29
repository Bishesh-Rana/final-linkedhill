@extends('admin.layouts.master')
@section('title','Edit News Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">News Category:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Edit News Category
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#panel2" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">travel_explore</i>SEO
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <form method="post" action="{{route('news-category.update',$news_category->id)}}" class="form-horizontal" enctype="multipart/form-data"  id="parsleyValidationForm" data-parsley-validate="">
                            @csrf
                            @method('put')
                            <div class="tab-content">
                                <div class="tab-pane active" id="panel1">

                                    <div class="form-group" style="margin-top:18px;">
                                        <label>Select Parent Category</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="parent_id"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value=" ">Select Parent Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($category->id == $news_category->parent_id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Enter Category Name</label>
                                        <input type="text" name="name" value="{{$news_category->name}}" id="title" class="form-control" data-parsley-trigger="keyup" required>
                                        @if ($errors->has('name'))
                                            <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Slug</label>
                                        <input type="text" name="slug" value="{{$news_category->slug}}" id="slug" class="form-control" data-parsley-trigger="keyup" required>
                                        @if ($errors->has('slug'))
                                            <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="togglebutton">
                                            <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                Non Featured <input type="checkbox" name="feature" value="1" @if($news_category->feature) checked @endif> Featured
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="panel2">

                                    <div class="row seo">
                                        <div class="form-group margin-style col-md-12">
                                            <label >Keywords</label>
                                            <textarea name="meta_keyword"  id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300">{!! $news_category->meta_keyword !!}</textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                                        *{{ $errors->first('meta_keyword') }}
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label >Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300">{!! $news_category->meta_description !!}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <span class="error-message">
                                                        *{{ $errors->first('meta_description') }}
                                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-fill btn-success float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>




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
