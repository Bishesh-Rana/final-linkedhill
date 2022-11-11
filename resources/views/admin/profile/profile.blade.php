@extends('admin.layouts.master')
@section('content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Admins</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                <?php if (isset($admin)) {
                    echo "Edit Profile";
                } else {
                    echo "Add Admin";
                } ?>
            </div>
        </div>
        <div class="ibox-body">
            <?php
            if (isset($admin)) {
                $button = 'Update';
            } else {
                $action = url('/ns-admin/admins/add');
                $button = 'Add';
            } ?>
            <form action="{{route('update',$admin->id)}}" id="form-sample-1" class="form-horizontal" method="post" novalidate="novalidate" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter your full name" value="<?php if (isset($admin->name)) {
                                echo $admin->name;
                            } else {
                                echo old('name');
                            } ?>" >
                        </div>

                        <div class="form-group">
                            <label>Phone</label> 
                            <input class="form-control" type="number" name="phone" placeholder="Enter your phone" value="<?php if (isset($admin->phone )) {
                                echo $admin->phone;
                            } else {
                                echo old('phone');
                            } ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter your password">
                        </div>

                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm your password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Enter your email" value="<?php if (isset($admin->email)) {
                                echo $admin->email;
                            } else {
                                echo old('email');
                            } ?>">
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <div></div>
                            <div class="custom-file" style="width:40%">
                                <input type="file" name="profile" >
                                <div><br></div>
                                <img src="" id="profile-img-tag" width="100px" height="58px" style="display:none;" />
                            </div>
                            @if (!empty($admin->profile))
                            <br>
                            <img id="profile" src="{{ asset('uploads/'.'admins/'.$admin->profile) }}" alt="<?php if (isset($admin->profile)) {
                                echo $admin->profile;
                            } ?>" height="100" width="100">
                            <a title="Delete" id="delete" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></a>

                            @endif
                        </div>
                        <div><br></div>

                        <div class="form-group m-form__group">                       
                        </div>

                        <div class="check-list">
                            <label for="">Publish Status</label>
                            <label class="ui-radio ui-radio-primary">
                                {{-- @dd($admin) --}}
                                <input type="radio" name="is_active" value="0" <?php echo ($admin->is_active == 0 ?  'checked="checked"' : ''); ?>>
                                <span class="input-span"></span>
                                Banned
                            </label>
                            <label class="ui-radio ui-radio-primary">
                                <input type="radio" name="is_active" value="1" <?php echo ($admin->is_active == 1 ?  'checked="checked"' : ''); ?>>
                                <span class="input-span"></span>
                                Active
                            </label>
                        </div>
                    </div>
                </div><br>
                <button class="btn btn-info confirm" type="submit">Submit</button>

            </form>

        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->

@stop

@section('footer')

<!-- FOR FORM VALIDATION -->
<script type="text/javascript">
    $("#form-sample-1").validate({
        rules: {
            name: {
                minlength: 2,
                required: !0
            },
            email: {
                required: !0,
                email: !0
            },
            url: {
                required: !0,
                url: !0
            },
            number: {
                required: !0,
                number: !0
            },
            min: {
                required: !0,
                minlength: 3
            },
            max: {
                required: !0,
                maxlength: 4
            },
            // password: {
            //     required: !0
            // },
            // password_confirmation: {
            //     required: !0,
            //     equalTo: "#password"
            // }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
</script>

<!-- Delete(Hide) image -->
<script>
    $(document).ready(function() {
        $('#pro_image').change(function(e) {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#profile-img-tag').css('display', '');
            $('#profile').css('display','none');
            $('#delete').css('display','none');
            readURL(this);
        });

        $('a#delete').click(function(){
            $('img#profile').hide();
            $('a#delete').hide();
        })
    });
</script>


@stop