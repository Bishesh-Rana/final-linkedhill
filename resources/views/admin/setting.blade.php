@extends('admin.layouts.master')
@section('title', 'Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Settings :</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">code</i> Website
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#panel2" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">travel_explore</i> SEO
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <form method="post" action="{{ route('setting') }}" class="form-horizontal"
                            enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="panel1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <x-image name="logo" value="{{ $website->logo }}" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-image name="logo_footer" value="{{ $website->logo_footer }}" />

                                        </div>
                                        <div class="col-md-4">
                                            <x-image name="favicon" value="{{ $website->favicon }}" />

                                        </div>
                                        <div class="form-group  margin-style col-md-6">
                                            <label class="">Email At Header</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $website->email }}" data-parsley-trigger="keyup" required>
                                            @if ($errors->has('email'))
                                                <span class="error-message">
                                                    *{{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group  margin-style col-md-6">
                                            <label>Alternate Email At Footer</label>
                                            <input type="email" class="form-control" name="alternate_email"
                                                value="{{ $website->alternate_email }}" data-parsley-trigger="keyup"
                                                required>
                                        </div>

                                        <div class="form-group  margin-style col-md-6">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $website->address }}" data-parsley-trigger="keyup" required>
                                            @if ($errors->has('address'))
                                                <span class="error-message">
                                                    *{{ $errors->first('address') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group  margin-style col-md-6">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $website->phone }}" data-parsley-trigger="keyup" required>
                                            @if ($errors->has('phone'))
                                                <span class="error-message">
                                                    *{{ $errors->first('phone') }}
                                                </span>
                                            @endif
                                        </div>

                                        {{-- <div class="form-group  margin-style col-md-6"> --}}
                                        <div class="clearfix"></div>

                                        <div class="form-group margin-style col-md-6">
                                            <label>Facebook Link</label>
                                            <input type="text" class="form-control" name="fb_url"
                                                value="{{ $website->fb_url }}">
                                        </div>

                                        <div class="form-group margin-style col-md-6">
                                            <label>Twitter Link</label>
                                            <input type="text" class="form-control" name="twitter_url"
                                                value="{{ $website->twitter_url }}">
                                        </div>

                                        <div class="form-group  margin-style col-md-6">
                                            <label>Instagram Link</label>
                                            <input type="text" class="form-control" name="instagram_url"
                                                value="{{ $website->instagram_url }}">
                                        </div>

                                        <div class="form-group margin-style col-md-6">
                                            <label>Youtube Link</label>
                                            <input type="text" class="form-control" name="youtube_url"
                                                value="{{ $website->youtube_url }}">
                                        </div>

                                        <div class="form-group margin-style col-md-6">
                                            <label>Playstore Url</label>
                                            <input type="text" class="form-control" name="playstore_url"
                                                value="{{ $website->playstore_url }}">
                                        </div>

                                        <div class="form-group margin-style col-md-6">
                                            <label>Appstore Url</label>
                                            <input type="text" class="form-control" name="appstore_url"
                                                value="{{ $website->appstore_url }}">
                                        </div>

                                        <div class="form-group margin-style col-md-12">
                                            <label>Map Url</label>
                                            <textarea name="map_url" id=""
                                                class="form-control">{{ $website->map_url }}</textarea>
                                        </div>

                                        <div class="form-group margin-style col-md-12">
                                            <label>Short Introduction At Footer</label>
                                            <textarea name="short_intro" id="summary-ckeditor" cols="30" rows="4"
                                                class="form-control" data-parsley-trigger="keyup"
                                                required>{{ $website->short_intro }}</textarea>
                                            @if ($errors->has('short_intro'))
                                                <span class="error-message">
                                                    *{{ $errors->first('short_intro') }}
                                                </span>
                                            @endif
                                        </div>




                                        <!--------------------------------------------------------------------- -->
                                        <div class="form-group  margin-style col-md-6">
                                            <h4><b>PROPERTY LIST HOME PAGE</b></h4>
                                            <label class="">Title</label>
                                            <input type="text" class="form-control" name="pro_title" value="{{ $website->pro_title }}" >
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label> Sub title</label>
                                            <textarea name="pro_sub_title" cols="30" rows="3" class="form-control">{{ $website->pro_sub_title }}</textarea>
                                        </div>

                                        <!-- Second Property list -->
                                        <div class="form-group  margin-style col-md-6">
                                            <h4><b>SECOND PROPERTY LIST HOME PAGE</b></h4>
                                            <label class="">Title</label>
                                            <input type="text" class="form-control" name="second_pro_title" value="{{ $website->second_pro_title }}" >
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label> Sub title</label>
                                            <textarea name="second_pro_sub_title" cols="30" rows="3" class="form-control">{{ $website->second_pro_sub_title }}</textarea>
                                        </div>
                                        <!-- Second Property list -->

                                        <!-- Our blog list -->
                                        <div class="form-group  margin-style col-md-6">
                                            <h4><b>OUR BLOG HOME PAGE</b></h4>
                                            <label class="">Title</label>
                                            <input type="text" class="form-control" name="blog_title" value="{{ $website->blog_title }}" >
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label>Sub title</label>
                                            <textarea name="blog_sub_title" cols="30" rows="3" class="form-control">{{ $website->blog_sub_title }}</textarea>
                                        </div>
                                        <!-- Our blog list -->

                                        <!-- Our login register -->
                                        <div class="form-group  margin-style col-md-6">
                                            <h4><b>LOGIN REGISTER PAGE</b></h4>
                                            <label class="">Title</label>
                                            <input type="text" class="form-control" name="login_title" value="{{ $website->login_title }}" >
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label>Sub title</label>
                                            <textarea name="login_sub_title" cols="30" rows="3" class="form-control">{{ $website->login_sub_title }}</textarea>
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label>Second Sub title</label>
                                            <textarea name="second_login_sub_title" cols="30" rows="3" class="form-control">{{ $website->second_login_sub_title }}</textarea>
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label>Third Sub title</label>
                                            <textarea name="third_login_sub_title" cols="30" rows="3" class="form-control">{{ $website->third_login_sub_title }}</textarea>
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label>Four Sub title</label>
                                            <textarea name="four_login_sub_title" cols="30" rows="3" class="form-control">{{ $website->four_login_sub_title }}</textarea>
                                        </div>
                                        <!-- Our blog list -->
                                        <!--------------------------------------------------------------------- -->


                                </div>

                                </div>




                                <div class="tab-pane" id="panel2">

                                    <div class="row seo">

                                        <div class="form-group label-floating is-empty col-md-12">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    @if ($website->og_image != null)
                                                        <img src="{{ asset('images/' . $website->og_image) }}" id="image"
                                                            class="img-thumbnail img-responsive" alt="">
                                                    @else
                                                        <img src="{{ asset('dashboard/img/placeholder.jpg') }}" id="image"
                                                            class="img-thumbnail img-responsive" alt="">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-outline-success btn-round btn-file">
                                                        <span class="fileinput-new">Update OG Image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="og_image" id="image" />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                        data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group margin-style col-md-12">
                                            <label> Meta Title</label>
                                            <textarea name="meta_title" id="" cols="30" rows="3" class="form-control"
                                                data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300">{{ $website->meta_title }}</textarea>
                                            @if ($errors->has('meta_title'))
                                                <span class="error-message">
                                                    *{{ $errors->first('meta_title') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12">
                                            <label> Meta Keywords</label>
                                            <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control"
                                                data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300">{{ $website->meta_keyword }}</textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                                    *{{ $errors->first('meta_keyword') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3"
                                                class="form-control" data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300">{{ $website->meta_description }}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <span class="error-message">
                                                    *{{ $errors->first('meta_description') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Og Url</label>
                                            <input type="text" name="og_url" class="form-control"
                                                value="{{ $website->og_url }}" data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300">
                                            @if ($errors->has('og_url'))
                                                <span class="error-message">
                                                    *{{ $errors->first('og_url') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Og Type</label>
                                            <input type="text" name="og_type" class="form-control"
                                                value="{{ $website->og_type }}" data-parsley-trigger="keyup"
                                                data-parsley-maxlength="100">
                                            @if ($errors->has('og_type'))
                                                <span class="error-message">
                                                    *{{ $errors->first('og_type') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Og Title</label>
                                            <textarea name="og_title" id="" cols="30" rows="3" class="form-control"
                                                data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300">{{ $website->og_title }}</textarea>
                                            @if ($errors->has('og_title'))
                                                <span class="error-message">
                                                    *{{ $errors->first('og_title') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label>Og Description</label>
                                            <textarea name="og_description" id="" cols="30" rows="3" class="form-control"
                                                data-parsley-trigger="keyup"
                                                data-parsley-maxlength="300">{{ $website->og_description }}</textarea>
                                            @if ($errors->has('og_description'))
                                                <span class="error-message">
                                                    *{{ $errors->first('og_description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection

@push('script')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>
@endpush
