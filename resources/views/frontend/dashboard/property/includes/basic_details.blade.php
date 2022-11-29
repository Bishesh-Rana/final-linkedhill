<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="more-less glyphicon glyphicon-minus"></i>
                                                    <span class="material-icons"> hvac </span> Basic Details
                                                </a>
                                            </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="form-group col-md-6">
                                                    <label class="label-style">Purpose to Post Property</label>
                                                    <div class="radio">
                                                        @foreach($purposes as $purpose)
                                                            <label>
                                                                <input type="radio" name="property_status" value="{{$purpose->name}}" @if($loop->index == 0) checked="true" @endif ><span class="circle"></span><span class="check"></span> {{$purpose->name}}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="label-style">Property Type</label>
                                                    <div class="radio">
                                                        @foreach($property_types as $property_type)
                                                            <label>
                                                                <input type="radio" name="type" @if($loop->index == 0) checked="true" @endif  value="{{$property_type->name}}"><span class="circle"></span><span class="check"></span> {{$property_type->name}}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="label-style">Property Category</label>
                                                    <div class="radio">
                                                        @foreach($property_categories as $property_category)
                                                            <label>
                                                                <input type="radio" onclick="propertyCategory({{$property_category->id}})" name="category_id" @if($loop->index == 0) checked="true" @endif value="{{$property_category->id}}"><span class="circle"></span><span class="check"></span> {{$property_category->name}}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating">
                                                        <label class="label-style">
                                                            Enter Title
                                                            <span class='required-error'>*</span>
                                                        </label>
                                                        <input class="form-control" name="title" id="title" type="text" data-parsley-trigger="keyup" required/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating">
                                                        <label class="label-style">
                                                            Enter Slug
                                                            <span class='required-error'>*</span>
                                                        </label>
                                                        <input class="form-control" name="slug" id="slug" type="text" data-parsley-trigger="keyup" required/>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-style">
                                                            Property Details
                                                            <span class='required-error'>*</span>
                                                        </label>
                                                        <textarea  class="form-control summernote" name="property_detail" data-parsley-trigger="keyup" required>{{old('short_description')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
</div>
