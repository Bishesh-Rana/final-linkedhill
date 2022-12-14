@extends('admin.layouts.master')
@section('title','Staff')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-header card-header-tabs" data-background-color="red">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Staff:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active">
                                <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">add</i>{{isset($staff) ? 'Edit Staff':'Add Staff'}}
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <form method="post"
                    action="{{isset($staff) ? route('staffs.update', $staff->id) : route('staffs.store')}}"
                    class="form-horizontal" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                    @csrf
                    @isset($staff)
                    @method('PUT')
                    @endisset
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel1">

{{--
                            <div class="form-group label-floating is-empty">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">

                                        <img src="{{isset($staff) ? $staff->imageUrl() : asset('dashboard/img/placeholder.jpg')}}"
                                            id="image" class="img-thumbnail img-responsive" alt="">

                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-default btn-round btn-file">
                                            <span class="fileinput-new">Add Image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="featured_image" id="image" />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                            data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div> --}}
                            <x-image name="profile" value="{{ @$staff->profile }}" />


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Name<span class="required-error">*</span></label>
                                    <input type="text" name="name" id="name"
                                        value="{{isset($staff) ? $staff->name : old('name')}}" class="form-control" data-parsley-trigger="keyup"  required >
                                    @if ($errors->has('name'))
                                    <span class="error-message">
                                        *{{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Email<span
                                            class="required-error">*</span></label>
                                    <input type="text" name="email"
                                        value="{{isset($staff) ? $staff->email : old('email')}}" id="email"
                                        class="form-control" data-parsley-trigger="keyup" data-parsley-type="email"   required >
                                    @if ($errors->has('email'))
                                    <span class="error-message">
                                        *{{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Mobile<span
                                            class="required-error">*</span></label>
                                    <input type="text" name="mobile" id="mobile"
                                        value="{{isset($staff) ? $staff->mobile : old('mobile')}}" data-parsley-type="number" class="form-control" data-parsley-trigger="keyup"  required>
                                    @if ($errors->has('mobile'))
                                    <span class="error-message">
                                        *{{ $errors->first('mobile') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{isset($staff) ? $staff->phone : old('phone')}}" data-parsley-type="number" data-parsley-trigger="keyup">
                                    @if ($errors->has('phone'))
                                    <span class="error-message">
                                        *{{ $errors->first('phone') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>

                                @if(!isset($staff))

                                <div class="form-group col-md-6">
                                    <label class="control-label">Enter Password<span
                                            class="required-error">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control" data-parsley-trigger="keyup"  required>
                                    @if ($errors->has('password'))
                                    <span class="error-message">
                                        *{{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group col-md-6">
                                    <label class="control-label">Confirm Password<span
                                            class="required-error">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" data-parsley-trigger="keyup"  required>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="error-message">
                                        *{{ $errors->first('password_confirmation') }}
                                    </span>
                                    @endif
                                </div>
                                @endif

                                @if (isset($staff))
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">
                                            is_active

                                        </label>
                                        <div class="togglebutton" style="margin-top: 25px;">
                                            <label>
                                                <input type="hidden" value="0" name="is_active">
                                                <input type="checkbox" value="1" name="is_active" @if(isset($staff))
                                                    @if($staff['is_active']===1 ) checked @endif @else
                                                    {{old('is_active')=='1' ? 'checked' : '' }} @endif>
                                                Turn On to active user.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- <div class="row"> --}}
                                    <div class="form-group col-md-12">
                                        <label for="title" class="col-form-label">Assign Roles</label>
                                        <div class="col-sm-12 checkbox-radios">
                                            @forelse ($roles as $role)
                                            {{-- @if ($role- == 'property') --}}
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                                        @if(isset($staff)) @if ($staff->hasRole($role->id))
                                                    checked
                                                    @endif
                                                    @endif
                                                    >
                                                    {{$role->name}}
                                                </label>
                                            </div>

                                            {{-- @endif --}}

                                            @empty

                                            @endforelse

                                            @if ($errors->has('roles'))
                                            <span class="error-message">
                                                *{{ $errors->first('roles') }}
                                            </span>
                                            @endif

                                        </div>
                                    </div>



                                    {{--
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn btn-fill btn-success float-right">{{isset($staff) ?
                                'Update' :
                                'Create'}}</button>
                        </div>
                    </div>
                </form>
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
</script>


@endpush
