@extends('admin.layouts.master')
@section('title','Staff')
@push('styles')
<style>
    .select2-container{
        width: 100%!important;
    }
</style>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <x-image name="profile" value="{{ @$staff->profile }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-image name="Pan Card" value="{{ @$staff->hasAgency->pan }}" />
                                    
                                </div>
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

                                @if (auth()->user()->isAdmin())
                                {{-- @dd($agents) --}}
                                @isset($staff)
                                {{-- @dd($staff ) --}}
                                    
                                @endisset
                                <div class="form-group col-md-6">
                                    <label class="control-label">Company</label> <br>
                                    <select class="js-example-basic-single" name="user_id">
                                        <option disabled selected>Select Company</option>
                                        @foreach ($agents as $user )
                                        <option value="{{$user->user_id}}" @isset($staff)  {{ ($user->user_id == $staff->user_id) ? 'selected':'' }} @endisset>{{$user->agency_name}}</option>
                                        @endforeach
                                      </select>
                                </div>                                
                                @endif

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
<Script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</Script>



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
