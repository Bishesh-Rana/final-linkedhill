@extends('admin.layouts.master')
@section('title','City')
@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <b>Add City</b>
                    </div>
                    <div class="card-content">
                        <form action="{{route('city.store')}}"  method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group label-floating is-empty">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">

                                        <img src="{{asset('dashboard/img/placeholder.jpg')}}" id="image" class="img-thumbnail img-responsive" alt="">

                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-default btn-round btn-file">
                                                        <span class="fileinput-new">Add Image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image" id="image" />
                                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group" style="margin-top:10px;">
                                <label class="label-style" for="city_id">Select Province </label>
                                <select class="form-control select2 select2-hidden-accessible" id="province_id" name="province_id"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                       @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Enter City Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control">
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                @endif
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
                        <b>Manage Cities</b>
                    </div>
                    <div class="card-content">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Province</th>
                                            <th>City Name</th>
                                            <th>View Areas</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($cities as $city)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$city->province->name}}</td>
                                            <td>{{$city->name}}</td>
                                            <td><a href="{{route('all.areas',['city_name'=>$city->name,'city_id'=>$city->id])}}" rel="tooltip" data-original-title="View All Area"><span class="material-icons">list_alt</span><sub>({{count($city->areas)}})</sub></a></td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-simple btn-info btn-icon" rel="tooltip" data-original-title="Add Area in City" data-toggle="modal" data-target="#addArea-{{$city->id}}"><i class="material-icons">add</i></a>
                                                <a href="#" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" data-toggle="modal" data-target="#exampleModal-{{$city->id}}"  data-original-title="Edit City"><i class="material-icons">edit</i></a>
                                                <a href="#"  class="btn btn-simple btn-danger btn-icon" onclick="deleteCity({{$city->id}})" rel="tooltip"  data-original-title="Delete City"><i class="material-icons">close</i></a>
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

        @foreach($cities as $city)
            <div class="modal fade" id="exampleModal-{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('city.update',$city->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$city->id}}" name="city_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit City</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">

                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">

                                                <img src="{{asset('images/cities/'.$city->image)}}" id="image" class="img-thumbnail img-responsive" alt="">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                            <span class="btn btn-outline-success btn-round btn-file">
                                                                <span class="fileinput-new">Update Image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="image" id="image" />
                                                            </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="clearfix"></div>


                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter City Name
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="city_name" id="name" value="{{$city->name}}" type="text"  required />
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group  label-floating">
                                        <label>
                                            Enter City Slug
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="city_slug" id="slug" value="{{$city->slug}}" type="text" required  />
                                    </div>
                                </div>




                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="addArea-{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('add.area')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$city->id}}" name="area_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Add Area Under City - {{$city->name}}</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <input type="hidden" value="{{$city->id}}" name="city_id">
                                        <label>
                                            Enter Area Name
                                            {{--<small>*</small>--}}
                                        </label>
                                        <input class="form-control" name="name" type="text"  required/>
                                    </div>
                                </div>




                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@push('script')

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
                url:'{!!URL::to('admin/city/')!!}' + '/' + id,
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

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>

@endpush
