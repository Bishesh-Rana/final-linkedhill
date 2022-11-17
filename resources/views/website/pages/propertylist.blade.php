@extends('website.layouts.app', ['pageTitle' => $pagedata->name])
@section('meta')
    @include('website.shared.meta', ['meta' => $meta])
@endsection
@section('content')
    <section class="ads_inside_subpage">
        <div class="container">
            <div class="ads_section_cover">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($advertisements as $ad)
                            <div class="ads_wrap">
                                <img src="{{ image($ad->image) }}" alt="{{ $ad->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container ">
      <form method="get" action="{{ route('front.search-properties') }}">
        <div class="propertylistsearch">                 
            <div class="first-row">
                <div class="row g-1">
                    <div class="col-md-2">
                        <select class="purpose" name="purpose" id="purpose">
                            
                            @foreach ($purposes as $purpose)
                                @if (array_key_exists('purpose', $filter )) 
                                    <option value="{{ $purpose->name }}" {{($purpose->name == $filter['purpose']) ? 'selected':''}}>{{ $purpose->name }}</option>
                                @else
                                    <option value="{{ $purpose->name }}" >{{ $purpose->name }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="search-input d-flex">
                            <?php $name = '';
                            ?>
                            <div class="multiple_select2option">
                                <select class="js-example-basic-multiple" name="property_address" multiple="multiple">
                                    @foreach ($property as $type)
                                        @if ($name == $type->property_address)
                                            continue;
                                        @else
                                            <option>{{ $type->property_address }}</option>
                                            <?php
                                            $name = $type->property_address;
                                            ?>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-update" type="submit">Update</button>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="filter"><span>Show Filters</span><i class="las la-sliders-h"></i></div>
                    </div>
                    <div class="col-md-2">
                        
                        <select name="sorting" class="sorting" id="sorting">
                        @if (array_key_exists('sorting', $filter )) 
                            <option  disabled>Select </option>
                            <option  value="low" {{($filter['sorting'] == 'low') ? 'selected':''}}> Price(low to high)</option>
                            <option value="high" ($filter['sorting'] == 'high') ? 'selected':''}}> Price(high to low)</option>
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                        @else
                            <option  selected disabled>Select </option>
                            <option  value="low"> Price(low to high)</option>
                            <option value="high"> Price(high to low)</option>
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                        @endif
                        </select>
                    </div>
                </div>

            </div>
            <div class="second-row">
                <div class="option_1 multi_select_dropdown">
                    <p>Category<i class="las la-angle-down"></i></p>
                    <div class="option_listing_dropDown child_dropdown">
                        @foreach ($propertyCat as $propertyC)
                            <div class="list_group_category">
                                <input class="form-check-input front-category property" id="property" data-element="#advance{{ $propertyC->id }}"
                                    type="checkbox" name="category_id" value="{{ $propertyC->id }}"
                                    id="initial{{ $propertyC->id }}" selected>
                                <label class="form-check-label"
                                    for="initial{{ $propertyC->id }}">{{ $propertyC->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                
                <div class="option_a1" id="bed"> 
                        @php
                            $id = App\Models\Feature::where('title','=','Bedroom')->value('id');
                        @endphp 
                        <select name="properties[{{$id}}]">
                            <option selected disabled>Bedroom</option>
                            @for($i=1;$i<=10;$i++)


                                {{-- @if( array_key_exists("bed",$filter )) 
                                    <option data-element="{{$i}}bed" {{ ( intval( $filter['bed'])== $i) ? 'selected':''}} value="{{$i}}">{{($i == 0)?'':$value}}</option>
                                @else
                                    <option data-element="{{$i}}bed" value="{{$i}}">{{($i == 0)?'':$i}} </option>
                                @endif --}}


                                <option value="{{$i}}">{{$i}}</option>
                            @endfor           
                        </select>
                    </div>
                    <div class="option_a1" id="bath"> 
                        @php
                            $id = App\Models\Feature::where('title','=','Bathroom')->value('id');
                        @endphp 
                        <select name="properties[{{$id}}]">
                            <option selected disabled>Bathroom</option>
                            @for($i=1;$i<=10;$i++)


                                {{-- @if( array_key_exists("bath",$filter )) 
                                    <option data-element="{{$i}}bath" {{ ( intval( $filter['bath'])== $i) ? 'selected':''}} value="{{$i}}">{{($i == 0)?'':$i}}</option>
                                @else

                                    <option data-element="{{$i}}bath" value="{{$i}}">{{($i == 0)?'':$i}}</option>
                                @endif   --}}


                                <option value="{{$i}}">{{$i}}</option>
                            @endfor           
                        </select>
                    </div>
                    <div class="option_a1" id="parking"> 
                        @php
                            $id = App\Models\Feature::where('title','=','Parking')->value('id');
                        @endphp 
                        <select name="properties[{{$id}}]">
                            <option selected disabled>Parking</option>

                            
                            {{-- @for($i=1;$i<=4;$i++)
                                @if( array_key_exists("parking",$filter )) 
                                    <option data-element="{{$i}}parking" {{ ( intval( $filter['parking'])== $i) ? 'selected':''}} value="{{$i}}">{{($i == 0)?'':$i}}</option>
                                @else
                                    <option data-element="{{$i}}parking" value="{{$i}}">{{($i == 0)?'':$i}}</option>
                                @endif  
                            @endfor           --}}



                            <option value="{{$i}}">{{$i}}</option>
                        </select>
                    </div>
                {{-- chahiyo vane tala xa for design --}}
            <div class="option_a1">
                <select name="start_prize" id="start_prize">
                    @if (array_key_exists('start_prize', $filter ))
                    <option disabled>Min Price</option>
                    <option value="5000.00" {{intval($filter['start_prize']== 5000.00) ?'selected':''}}>Rs. 5000.00</option>
                    <option value="10000.00" {{intval($filter['start_prize']== 10000.00) ?'selected':''}}>Rs. 10000.00</option>
                    <option value="50000.00" {{intval($filter['start_prize']== 50000.00) ?'selected':''}}>Rs. 50000.00</option>
                    <option value="100000.00" {{intval($filter['start_prize']== 100000.00) ?'selected':''}}>Rs. 100000.00</option>
                    <option value="1000000.00" {{intval($filter['start_prize']== 1000000.00) ?'selected':''}}>Rs. 1000000.00</option>

                    @else
                    <option selected disabled>Min Price</option>
                    <option value="5000.00">Rs. 5000.00</option>
                    <option value="10000.00" >Rs. 10000.00</option>
                    <option value="50000.00" >Rs. 50000.00</option>
                    <option value="100000.00" >Rs. 100000.00</option>
                    <option value="1000000.00" >Rs. 1000000.00</option>
                    @endif
                   
                </select>
            </div>
            <div class="option_a1">
                <select name="end_prize" id="end_prize">
                    @if (array_key_exists('end_prize', $filter )) 
                    <option disabled>Max Price</option>
                    <option value="1100000.00" {{(intval($filter['end_prize'])== 1100000)?'selected':''}}>Rs. 1100000.00</option>
                    <option value="1500000.00" {{(intval($filter['end_prize'])== 1500000)?'selected':''}}>Rs. 1500000.00</option>
                    <option value="2000000.00" {{(intval($filter['end_prize'])== 2000000)?'selected':''}}>Rs. 2000000.00</option>
                    <option value="5000000.00" {{(intval($filter['end_prize'])== 5000000)?'selected':''}}>Rs. 5000000.00</option>
                        
                    @else
                    <option selected disabled>Max Price</option>
                    <option value="1100000.00">Rs. 1100000.00</option>
                    <option value="1500000.00">Rs. 1500000.00</option>
                    <option value="2000000.00">Rs. 2000000.00</option>
                    <option value="5000000.00">Rs. 5000000.00</option>
                        
                    @endif

                </select>
            </div>
            <div class="option_a1 moreOption">
                <div class="moreOptionsToggler">
                     <p class=" dropdown-toggle" href="#" role="button" id="moreOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More Options
                     </p>

                </div>
                <div aria-labelledby="moreOptions" class="moreOptions">
                    <div class="option_1 multi_select_dropdown">
                        <p>Common Facilities<i class="las la-angle-down"></i></p>
                        <div class="option_listing_dropDown child_dropdown">
                            @foreach ($facilities as $facility)
                                <div class="list_group_category">
                                    <input class="form-check-input front-category" data-element="#advance{{ $facility->id }}"
                                        type="checkbox" name="facility[]" value="{{ $facility->title }}"
                                        id="initial{{ $facility->id }}">
                                    <label class="form-check-label" for="initial{{ $facility->id }}">{{ $facility->title }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="replace"> 
                        @php $i = 1; @endphp
                        @foreach($feature_values as $key=>$values)
                        @if($i>3)
                        @php $name = App\Models\Feature::where('id',$key)->value('title'); @endphp
                        <div class="option_1 multi_select_dropdown">
                            <p>{{$name}}<i class="las la-angle-down"></i></p>
                            <div class="option_listing_dropDown child_dropdown">
                                @foreach ($values as $value)
                                    <div class="list_group_category">
                                        <input class="form-check-input front-category" data-element="#advance{{ $value }}"
                                            type="checkbox" name="properties[{{$key}}]" value="{{ $value}}"
                                            id="initial{{ $value}}">
                                        <label class="form-check-label" for="initial{{ $value }}">{{ $value }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @php $i += 1; @endphp
                        @endforeach
                    </div> --}}
                    <div class="replace">
                        @php $i=1 @endphp
                        @foreach($feature_values as $key=>$values)
                            @if($i>3)
                                @php $name = App\Models\Feature::where('id',$key)->value('title'); @endphp
                                <label for="buildingtype"> {{$name}}:-</label>
                                <select name="properties[{{$key}}]" id="buildingtype">
                                    <option selected disabled> Select {{$name}}</option>
                                    @foreach($values as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            @endif
                            @php $i += 1  @endphp
                        @endforeach
                    </div>
                    
                    <label for="listedby">listed By</label>
                    <select name="listedby" id="listedby">
                        <option selected disabled>Any</option>
                        <option value="owner">Owner</option>
                        <option value="builder">Builder</option>
                        <option value="agent">Agent</option>
                    </select>
                </div>
            </div>
        </div>
      </form>
    </div>
</section>
<section id="propertyListing_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="property_list_content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="property_list_title">
                                <h1>{{ $pagedata->name }}</h1>
                            </div>
                        </div>
                     
                        <div class="col-lg-12">
                            <div  class="property_pc_cover">
                                <!-- .start form here -->
                                @forelse ($properties as $property) 
                                    <div data-orderprice="{{ $property->start_price }} " data-latest="{{$property->created_at}}" class="property_detail_">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="property_thumbnail_">
                                                    <div id="carouselExampleIndicators" class="carousel slide"
                                                        data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="0" class="active"></li>
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="1"></li>
                                                            <li data-target="#carouselExampleIndicators"
                                                                data-slide-to="2"></li>
                                                        </ol>
                                                        <div class="carousel-inner">

                                                            @foreach ($property->images as $image)
                                                                <div
                                                                    class="carousel-item {{ @$loop->first ? 'active' : '' }}">
                                                                    <img class="d-block w-100"
                                                                        src="{{ image(@$image->name) }}" alt="First slide">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <a class="carousel-control-prev"
                                                            href="#carouselExampleIndicators" role="button"
                                                            data-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next"
                                                            href="#carouselExampleIndicators" role="button"
                                                            data-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>

                                                    <div onclick="favorite({{ $property->id }})" class="favicon">
                                                        <a href="#" class="favorite{{ $property->id }}"><i
                                                                class=" lar la-heart "></i></a>
                                                    </div>
                                                </div>
                                                <div class="property_owner">
                                                    @if ($property->bed !== 0)
                                                        <span title="bedroom"><i class="las la-bed"></i><span
                                                                class="type_badge">{{ $property->bed }}</span></span>
                                                    @endif
                                                    @if ($property->bath !== 0)
                                                        <span title="bathroom"><i class="las la-bath"></i><span
                                                                class="type_badge">{{ $property->bath }}</span></span>
                                                    @endif


                                                    <span
                                                        title="{{ $property->total_area . ' ' . $property->area_unit->name }}">
                                                        <i class="las la-crop-alt"></i>
                                                        <span
                                                            class="type_badge">{{ $property->total_area . ' ' . $property->area_unit->name }}</span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="top_tv_verified">
                                                    <span><i
                                                            class="las la-check"></i>{{ @$property->property_facing }}
                                                    </span>

                                                    @isset($property->type)
                                                        <span><i class="las la-check"></i>{{ $property->type }}</span>
                                                    @endisset
                                                    @if ($property->negotiable == false)
                                                        @isset($property->negotiable)
                                                        @endisset
                                                    @else
                                                        @if ($property->negotiable == true)
                                                            @isset($property->negotiable)
                                                                <span><i class="las la-check"></i>NEGOTIABLE</span>
                                                            @endisset
                                                        @endif
                                                    @endif
                                                    @if ($property->insurance !== false)
                                                        @isset($property->insurance)
                                                            <span><i class="las la-check"></i>Insurance</span>
                                                        @endisset
                                                    @endif

                                                </div>
                                                <div class="top_tt_title">
                                                    <a class="d-flex"
                                                        href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">
                                                        <span>Rs:{{ @$property->start_price }}</span> &nbsp;
                                                        {{ @$property->title }}</a>
                                                </div>
                                                <div class="owner ">
                                                    <p class="me-2">{{ @$property->user->name }}:-&nbsp;</p>
                                                    <a class="icon me-2" href="tel:{{ @$property->owner_phone }}"
                                                        class=" "><i class="las la-phone-volume"></i></a>
                                                    <a class="icon me-2" href="#" class=""
                                                        data-bs-toggle="modal" data-bs-target="#send_message_model"><i
                                                            class="las la-sms"></i></a>
                                                    <div class="show_button_area">
                                                        <span class="button_show"><i class="las la-angle-down"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @if ($property->amenities->count() > 0)
                                                    <div class="property_type_ptd_detail">
                                                        <ul>
                                                            @foreach ($property->amenities as $amenity)
                                                                <li><img src=""
                                                                        alt="">{{ image($amenity->name) }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="property_text">
                                                    {!! @$property->property_detail !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div>
                                        <div class="no_result_found_wrapper">
                                            <img src="{{ asset('frontend/gallery/no_result.jpg') }}" alt="">
                                            <h6>No Properties Found</h6>
                                            <p>Return to search page</p>
                                            <a href="{{ url('properties') }}" class="btn btn-danger">Go Back</a>
                                        </div>
                                    </div>
                                @endforelse
                                <!-- .End form here -->
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="overFlow_pagination">
                                <div class="d-flex justify-content-center">
                                    {!! $properties->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 advertisement">
                <div>
                    <h5>Featured Properties</h5>
                </div>
                @forelse ($properties as $property)
                    <div class="property_detail_ mb-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="property_thumbnail_">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">

                                            @foreach ($property->images as $image)
                                                <div class="carousel-item {{ @$loop->first ? 'active' : '' }}">
                                                    <img class="d-block w-100" src="{{ @$image->name }}"
                                                        alt="First slide">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                            role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators"
                                            role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                    <div onclick="favorite({{ $property->id }})" class="favicon">
                                        <a href="#" class="favorite{{ $property->id }}"><i
                                                class=" lar la-heart "></i></a>
                                    </div>
                                </div>
                                <div class="property_owner">
                                    @if ($property->bed !== 0)
                                        <span title="bedroom"><i class="las la-bed"></i><span
                                                class="type_badge">{{ $property->bed }}</span></span>
                                    @endif

                                    @if ($property->bath !== 0)
                                        <span title="bathroom"><i class="las la-bath"></i><span
                                                class="type_badge">{{ $property->bath }}</span></span>
                                    @endif
                                    <span title="{{ $property->total_area . ' ' . $property->area_unit->name }}">
                                        <i class="las la-crop-alt"></i>
                                        <span
                                            class="type_badge">{{ $property->total_area . ' ' . $property->area_unit->name }}</span></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="top_tv_verified">
                                    <span><i class="las la-check"></i>{{ @$property->property_facing }} </span>

                                    @isset($property->type)
                                        <span><i class="las la-check"></i>{{ $property->type }}</span>
                                    @endisset
                                    @if ($property->negotiable == false)
                                        @isset($property->negotiable)
                                        @endisset
                                    @else
                                        @if ($property->negotiable == true)
                                            @isset($property->negotiable)
                                                <span><i class="las la-check"></i>NEGOTIABLE</span>
                                            @endisset
                                        @endif
                                    @endif
                                    @if ($property->insurance !== false)
                                        @isset($property->insurance)
                                            <span><i class="las la-check"></i>Insurance</span>
                                        @endisset
                                    @endif

                                </div>
                                <div class="top_tt_title">
                                    <a class=""
                                        href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">
                                        <span>Rs:{{ @$property->start_price }}</span> &nbsp; <br>
                                        <span> {{ @$property->title }}</span></a>
                                </div>
                                <div class="owner ">
                                    <p class="me-2">{{ @$property->user->name }}:-&nbsp;</p>
                                    <a class="icon me-2" href="tel:{{ @$property->owner_phone }}" class=" "><i
                                            class="las la-phone-volume"></i></a>
                                    <a class="icon me-2" href="#" class="" data-bs-toggle="modal"
                                        data-bs-target="#send_message_model"><i class="las la-sms"></i></a>
                                    <div class="show_button_area">
                                        <span class="button_show"><i class="las la-angle-down"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($property->amenities->count() > 0)
                                    <div class="property_type_ptd_detail">
                                        <ul>
                                            @foreach ($property->amenities as $amenity)
                                                <li><img src="" alt="">{{ $amenity->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="property_text">
                                    {!! @$property->property_detail !!}
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div>
                        <div class="no_result_found_wrapper">
                            <img src="{{ asset('frontend/gallery/no_result.jpg') }}" alt="">
                            <h6>No Properties Found</h6>
                            <p>Return to search page</p>
                            <a href="{{ url('properties') }}" class="btn btn-danger">Go Back</a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade share_feedback" id="send_message_model" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>Let us know your feedback
                    this will allow us to serve you better</h1>


                <form action="" name="propertyEnquiry">
                    @csrf
                    <div class="form_spacing">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input type="text" name="name" id="Name" class="form-control" id="user_name"
                                placeholder="you name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email_address" class="form-label">Email address</label>
                            <input type="email" name="email" id="Email_id" class="form-control"
                                id="email_address" placeholder="Email address" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="contact_info" id="mobile_number" class="form-control"
                                placeholder="Phone Number" value="{{ old('contact_info') }}">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject"
                                placeholder="Phone Number" value="{{ old('subject') }}">
                        </div>
                        <div class="mb-3">
                            <label for="Message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-danger" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $("form[name='propertyEnquiry']").submit(function(e) {

        // alert();
        e.preventDefault();

        $.ajax({
            url: '{{ route('store.enquiry') }}',
            type: 'post',
            dataType: 'json',
            data: $("form[name='propertyEnquiry']").serialize(),
            success: function(response) {
                $('form[name="propertyEnquiry"').trigger("reset");
                Lobibox.notify('success', {
                    size: 'mini',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    width: 400,
                    rounded: true,
                    msg: 'Enquiry Sent successfully',
                    delay: 3000,
                    delayIndicator: false,
                });

                $('#send_message_model').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
       var category_ids = [];
       $('.property').on('change', function(){
           let{
                   value,
                   id,
                   checked
               } = event.target;
               if(id=="property"){
                   if(checked){
                       category_ids.push(value);
                   }
                   else{
                       category_ids = category_ids.filter(function(data){
                           return data != value;
                       })
                   }
               }
               $.ajax({
                   url: "{{route('filterProperty')}}",
                   type: 'get',
                   data: {
                       category_ids: category_ids,
                   },
                   // dataType: 'JSON',
                   success:function(response)
                   {
                       console.log(response);
                       $(".replace").replaceWith(response);
                   },
                   error: function(response) {
                   }
               });
              
       });
       
    });

   
</script>
@endpush



 
                    


{{-- <div class="option_1 multi_select_dropdown" id="bed">
                    @php $id = App\Models\Feature::where('title','=','Bedroom')->value('id'); @endphp
                    <p>Bedroom<i class="las la-angle-down"></i></p>
                    <div class="option_listing_dropDown child_dropdown">
                        @for($i=1;$i<=10;$i++)
                        <div class="list_group_category">
                            <input class="form-check-input front-category property" id="property" data-element="#advance{{ $i }}"
                                type="checkbox" name="properties[{{$id}}]" value="{{ $i }}"
                                id="initial{{ $i }}" selected>
                            <label class="form-check-label"
                                for="initial{{ $i }}">{{ $i }}</label>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="option_1 multi_select_dropdown" id="bath">
                    @php $id = App\Models\Feature::where('title','=','Bathroom')->value('id'); @endphp
                    <p>Bathroom<i class="las la-angle-down"></i></p>
                    <div class="option_listing_dropDown child_dropdown">
                        @for($i=1;$i<=10;$i++)
                        <div class="list_group_category">
                            <input class="form-check-input front-category property" id="property" data-element="#advance{{ $i }}"
                                type="checkbox" name="properties[{{$id}}]" value="{{ $i }}"
                                id="initial{{ $i }}" selected>
                            <label class="form-check-label"
                                for="initial{{ $i }}">{{ $i }}</label>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="option_1 multi_select_dropdown" id="parking">
                    @php $id = App\Models\Feature::where('title','=','Parking')->value('id'); @endphp
                    <p>Parking<i class="las la-angle-down"></i></p>
                    <div class="option_listing_dropDown child_dropdown">
                        @for($i=1;$i<=5;$i++)
                        <div class="list_group_category">
                            <input class="form-check-input front-category property" id="property" data-element="#advance{{ $i }}"
                                type="checkbox" name="properties[{{$id}}]" value="{{ $i }}"
                                id="initial{{ $i }}" selected>
                            <label class="form-check-label"
                                for="initial{{ $i }}">{{ $i }}</label>
                        </div>
                        @endfor
                    </div>
                </div> --}}