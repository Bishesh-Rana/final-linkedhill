@extends('admin.layouts.master')
@section('title','Create Faq')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">FAQ:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create FAQ
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
                    <form action="{{route('faq.store')}}"  method="post" enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="panel1">
                                    <div class="col-md-12">
                                        <div class="form-group  label-floating">
                                            <label class="label-style">
                                                Enter Question
                                            </label>
                                            <input class="form-control" name="question" id="question" type="text" data-parsley-trigger="keyup"  required />
                                            @if ($errors->has('question'))
                                                <span class="error-message">
                                                *{{ $errors->first('question') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-style">
                                                Enter Answer
                                                <small>*</small>
                                            </label>
                                            <textarea  class="form-control summernote" name="answer" data-parsley-trigger="keyup">{{old('answer')}}</textarea>
                                            @if ($errors->has('answer'))
                                                <span class="error-message">
                                                *{{ $errors->first('answer') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                    Non Featured <input type="checkbox" name="featured" value="1"  checked> Featured
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="panel2">
                                    <div class="row seo">
                                        <div class="form-group margin-style col-md-12">
                                            <label >Keywords</label>
                                            <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
                                            @if ($errors->has('meta_keyword'))
                                                <span class="error-message">
                                                *{{ $errors->first('meta_keyword') }}
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                            <label >Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" data-parsley-trigger="keyup" data-parsley-maxlength="300"> </textarea>
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
                                <button type="submit" class="btn  btn-fill btn-success float-right">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


