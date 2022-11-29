@extends('admin.layouts.master')
@section('title','Edit Menu')
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
                                <span class="nav-tabs-title">Menu :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Edit Menu
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('menu.index')}}" aria-expanded="false">
                                            <i class="material-icons">settings</i>Mange Manu
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <form action="{{route('menu.update',$data->id)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group col-md-12" style="margin-top:10px;">
                                <label class="label-style">Select Parent Menu </label>
                                <select class="form-control select2 select2-hidden-accessible" name="parent_id"  data-placeholder="Select Parent Menu" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">Select Parent Menu</option>
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Enter Title
                                    </label>
                                    <input class="form-control" name="name" value="{{$data->name}}"  type="text"  id="title" />
                                    @if ($errors->has('name'))
                                        <span class="error-message">
                                                                 *{{ $errors->first('name') }}
                                                         </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Enter Slug
                                    </label>
                                    <input class="form-control" name="slug" value="{{$data->slug}}" id="slug" type="text"  />
                                    @if ($errors->has('slug'))
                                        <span class="error-message">
                                                                 *{{ $errors->first('slug') }}
                                                         </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Enter Url
                                    </label>
                                    <input class="form-control" name="url" id="slug" value="{{$data->url}}" type="text"  />
                                    @if ($errors->has('url'))
                                        <span class="error-message">
                                                                 *{{ $errors->first('url') }}
                                                         </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  label-floating">
                                    <label class="label-style">
                                        Enter Order
                                    </label>
                                    <input class="form-control" name="order" value="{{$data->order}}" id="slug" type="number"  />
                                    @if ($errors->has('order'))
                                        <span class="error-message">
                                                                 *{{ $errors->first('order') }}
                                                         </span>
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="togglebutton">
                                        <label class="lead" style="color:black;font-weight:bold;font-size:11pt; margin: 20px 0px" >
                                            Hide <input type="checkbox" name="active"   value="1"  @if($data->active) checked @endif> Show
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>


                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn  btn-fill btn-success float-right">Update</button>
                            </div>
                        </form>

                    </div>
                </div>


            </div>

        </div>
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

        $('#title').on('keyup',function(){
            var title=$(this).val();
            var slug=convertToSlug(title);
            $('#slug').val(slug);
        });

    </script>

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>

@endpush
