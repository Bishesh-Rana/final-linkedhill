@extends('website.layouts.app', ['pageTitle' => $pagedata->name])
@section('meta')
    @include('website.shared.meta', ['meta' => $meta])
@endsection
@section('content')
<div style="position: fixed; right:20px;top:0px;width:fit-content;z-index:1000; display:none;"
 class="alert alert-success alert-dismissible" id="favalert" role="alert">
  </div>
  <div style="position: fixed; right:20px;top:0px;width:fit-content;z-index:1000; display:none;"
 class="alert alert-danger alert-dismissible" id="favRemovedalert" role="alert">
  </div>
  <div style="position: fixed; right:20px;top:0px;width:fit-content;z-index:1000; display:none;"
  class="alert alert-danger alert-dismissible" id="loginfirst" role="alert">
   </div>
  
    <section class="ads_inside_subpage d-none d-md-block">
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
                                    @if (array_key_exists('purpose', $filter))
                                        <option value="{{ $purpose->name }}"
                                            {{ $purpose->name == $filter['purpose'] ? 'selected' : '' }}>
                                            {{ $purpose->name }}</option>
                                    @else
                                        <option value="{{ $purpose->name }}">{{ $purpose->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="search-input d-flex">
                                <?php $name = '';
                                ?>
                                <div class="multiple_select2option">
                                    <select class="js-example-basic-multiple" name="property_address[]" multiple="multiple">
                                        @isset($addresses)
                                            @foreach ($addresses as $type)
                                                @if ($name == $type)
                                                    continue;
                                                @else
                                                    <option>{{ $type }}</option>
                                                    <?php
                                                    $name = $type;
                                                    ?>
                                                @endif
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <button class="btn btn-update" type="submit">Update</button>
                            </div>

                        </div>
                        <div class="col-md-2 col-6">
                            <div data-bs-toggle="modal" data-bs-target="#advanceSearch" class="filter">
                                <span>Show Filters</span><i class="las la-sliders-h"></i>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <select name="sorting" class="sorting" id="sorting">
                                @if (array_key_exists('sorting', $filter))
                                    <option value="">Sort By </option>
                                    <option value="low" {{ $filter['sorting'] == 'low' ? 'selected' : '' }}> Price(low to
                                        high)</option>
                                    <option value="high" {{ $filter['sorting'] == 'high' ? 'selected' : '' }}> Price(high
                                        to low)</option>
                                    <option value="latest" {{ $filter['sorting'] == 'latest' ? 'selected' : '' }}>Latest
                                    </option>
                                    <option value="oldest" {{ $filter['sorting'] == 'oldest' ? 'selected' : '' }}>Oldest
                                    </option>
                                @else
                                    <option selected value="">Sort By </option>
                                    <option value="low"> Price(low to high)</option>
                                    <option value="high"> Price(high to low)</option>
                                    <option value="latest">Latest</option>
                                    <option value="oldest">Oldest</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>


            </div>
        </form>
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
                                <div class="property_pc_cover">
                                    <!-- .start form here -->
                                    @forelse ($properties as $property)
                                        <div data-orderprice="{{ $property->start_price }} "
                                            data-latest="{{ $property->created_at }}" class="property_detail_">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="property_thumbnail_">
                                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach ($property->images as $image)
                                                                <div class="carousel-item {{ @$loop->first ? 'active' : '' }}">
                                                                    <a href="{{ image(@$image->name) }}" class="lightbox"
                                                                        title="">
                                                                        <img src="{{ image(@$image->name) }}" alt="Thumbnail 1">
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                        @if (auth()->user())
                                                            <div class="favicon">
                                                                @php
                                                                    $data = auth()->user()->favProperties;
                                                                @endphp
                                                                {{-- @if (auth()->user()->favProperties->contains($property->id))
                                                                    @dd(auth()->user()->favProperties)
                                                                @endif --}}
                                                                @if (!empty($data))
                                                                    @php
                                                                        $count = 0;
                                                                    @endphp
                                                                    @foreach ($data as $fav)
                                                                        @if ((int) $fav->property_id === (int) $property->id)
                                                                            <a href="javascript:;"
                                                                                class="favorite{{ $property->id }}  fav"
                                                                                data-id="{{ $property->id }}"><i
                                                                                    class="las la-heart "></i></a>
                                                                            @php
                                                                                $count++;
                                                                            @endphp
                                                                        @endif
                                                                    @endforeach
                                                                    @if ($count <= 0)
                                                                        <a href="javascript:;"
                                                                            class="favorite{{ $property->id }}  fav"
                                                                            data-id="{{ $property->id }}"><i
                                                                                class="lar la-heart "></i></a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        @else
                                                            <div onclick="favorite({{ $property->id }})" class="favicon">
                                                                <a href="javascript:;"
                                                                    class="favorite{{ $property->id }}  fav"
                                                                    data-id="{{ $property->id }}"><i
                                                                        class="lar la-heart "></i></a>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="col-md-8">
                                                    <div class="property-block">
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
                                                                <span>Rs: {{ formattedNepaliNumber(@$property->start_price) }}</span> &nbsp;
                                                                {{ @$property->title }}</a>
                                                        </div>
                                                        <div class="premium_options">
                                                            <ul>
                                                                @foreach($property->featureProperty as $feature)
                                                                {{-- bed --}}
                                                                @if (($feature->feature_id == 19)&&(isset($feature->value))) 
                                                                    <li>
                                                                        <i class="las la-bed" title="Bed"></i><span> {{rtrim($feature->value, "+")}}</span>
                                                                    </li>
                                                                @endif
                                                                {{-- bath --}}
                                                                @if ( ($feature->feature_id == 20)&&(isset($feature->value)))
                                                                    <li>
                                                                        <i class="las la-bath" title="Bathroom"></i><span>{{rtrim($feature->value, "+")}}</span>
                                                                    </li>
                                                                @endif
                                                                {{-- park --}}
                                                                @if ( ($feature->feature_id == 18)&&(isset($feature->value)))
                                                                <li>
                                                                    <i class="las la-car" title="Parking"></i><span>{{rtrim($feature->value, "+")}}</span>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                                <li>
                                                                    <span title="Area">
                                                                        <i class="las la-crop-alt"></i>{{ $property->total_area . ' ' . $property->area_unit->name }}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="owner d-flex mt-2 ">
                                                            <p class="me-2">{{ @$property->user->name }}:-&nbsp;</p>
                                                            <a class="icon me-2" href="tel:{{ @$property->owner_phone }}"
                                                                class=" "><i class="las la-phone-volume"></i></a>
                                                            <a class="icon me-2" href="#" class=""
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#send_message_model"><i
                                                                    class="las la-sms"></i></a>
                                                            <div class="show_button_area">
                                                                <span class="button_show"><i
                                                                        class="las la-angle-down"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @if ($property->amenities->count() > 0)
                                                            <div class="property_type_ptd_detail">
                                                                <ul>
                                                                    @foreach ($property->amenities as $amenity)
                                                                        <li><img src=""
                                                                                alt="">{{ image($amenity->name) }}
                                                                        </li>
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
                                {{-- {!! $data->appends(['sort' => 'votes'])->links() !!} --}}
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

                    @forelse ($featured_properties as $property)
                        @if ($property['feature'])
                            <div class="featuredProducts mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="property_thumbnail_">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($property->images as $image)
                                                        <div class="carousel-item {{ @$loop->first ? 'active' : '' }}">
                                                            <a href="{{ image(@$image->name) }}" class="lightbox"
                                                                title="">
                                                                <img src="{{ image(@$image->name) }}" alt="Thumbnail 1">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            {{-- <div onclick="favorite({{ $property->id }})" class="favicon">
                                                <a href="#" class="favorite{{ $property->id }}"><i
                                                        class=" lar la-heart "></i></a>
                                            </div> --}}
                                            @if (auth()->user())
                                            <div class="favicon">
                                                @php
                                                    $data = auth()->user()->favProperties;
                                                @endphp
                                              
                                                @if (!empty($data))
                                                    @php
                                                        $count = 0;
                                                    @endphp
                                                    @foreach ($data as $fav)
                                                        @if ((int) $fav->property_id === (int) $property->id)
                                                            <a href="javascript:;"
                                                                class="favorite{{ $property->id }}  fav"
                                                                data-id="{{ $property->id }}"><i
                                                                    class="las la-heart "></i></a>
                                                            @php
                                                                $count++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if ($count <= 0)
                                                        <a href="javascript:;"
                                                            class="favorite{{ $property->id }}  fav"
                                                            data-id="{{ $property->id }}"><i
                                                                class="lar la-heart "></i></a>
                                                    @endif
                                                @endif
                                            </div>
                                        @else
                                            <div onclick="favorite({{ $property->id }})" class="favicon">
                                                <a href="javascript:;"
                                                    class="favorite{{ $property->id }}  fav"
                                                    data-id="{{ $property->id }}"><i
                                                        class="lar la-heart "></i></a>
                                            </div>
                                        @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="top_tt_title">
                                            <a class=""
                                                href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">
                                                <span>Rs: {{ formattedNepaliNumber(@$property->start_price)}}</span> &nbsp; <br>
                                                <span> {{ @$property->title }}</span></a>
                                        </div>
                                        <div class="owner mt-2">
                                            <p class="me-2">{{ @$property->user->name }}:-&nbsp;</p>
                                            <a class="icon me-2" href="tel:{{ @$property->owner_phone }}"
                                                class=" "><i class="las la-phone-volume"></i></a>
                                            <a class="icon me-2" href="#" class="" data-bs-toggle="modal"
                                                data-bs-target="#send_message_model"><i class="las la-sms"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                                        <div class="premium_options">
                                            <ul>
                                                @foreach($property->featureProperty as $feature)
                                                {{-- bed --}}
                                                @if (($feature->feature_id == 19)&&(isset($feature->value))) 
                                                    <li>
                                                        <i class="las la-bed" title="Bed"></i><span> {{rtrim($feature->value, "+")}}</span>
                                                    </li>
                                                @endif
                                                {{-- bath --}}
                                                @if ( ($feature->feature_id == 20)&&(isset($feature->value)))
                                                    <li>
                                                        <i class="las la-bath" title="Bathroom"></i><span>{{rtrim($feature->value, "+")}}</span>
                                                    </li>
                                                @endif
                                                {{-- park --}}
                                                @if ( ($feature->feature_id == 18)&&(isset($feature->value)))
                                                <li>
                                                    <i class="las la-car" title="Parking"></i><span>{{rtrim($feature->value, "+")}}</span>
                                                </li>
                                                @endif
                                                @endforeach
                                                <li>
                                                    <span title="Area">
                                                        <i class="las la-crop-alt"></i>{{ $property->total_area . ' ' . $property->area_unit->name }}
                                                    </span>
                                                </li>
                                            </ul>
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
                                        {{-- <div class="show_button_area">
                                            <span class="button_show"><i class="las la-angle-down"></i>
                                            </span>
                                        </div> --}}

                                        <div class="property_text">
                                            {!! @$property->property_detail !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif

                    @empty
                        <div class="mt-3">
                            <div class="no_result_found_wrapper">
                                {{-- <img src="{{ asset('frontend/gallery/no_result.jpg') }}" alt=""> --}}
                                <h6>Featured Properties Not Found</h6>
                                {{-- <p>Return to search page</p> --}}
                                <a href="{{ url('properties') }}" class="btn btn-danger">Go Back</a>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
            <section class="ads_inside_subpage d-md-none d-sm-block">
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
        </div>
    </section>
    {{-- @dd($filter['properties']) --}}
    <!-- Modal -->
    @include('website.pages.showfilter')

    <!-- Modal -->
    <div class="modal fade share_feedback" id="send_message_model" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Let us know your feedback this will allow us to serve you better</h1>
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
                                <button class="btn btn-danger" type="submit" data-bs-dismiss="modal"
                                    aria-label="Close">Send Message</button>
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
        $(document).ready(function() {
            $(".fav").on('click', function() {
                var property = $(this).data('id');
                $.ajax({
                    url: "{{ route('favorite') }}",
                    type: 'get',
                    data: {
                        property_id: property,
                    },
                    success: function(response) {
                        if (response.success) {
                            $(".favorite" + property + ">.la-heart ").toggleClass("lar las");
                            $('#favalert').html(response.success);
                            $('#favalert').css('opacity', 1).slideDown();
                            window.setTimeout(function() {
                                $(favalert).fadeTo(500, 0).slideUp(500);
                            }, 3000);
                        } 
                        else if(response.removed){
                            $(".favorite" + property + ">.la-heart ").toggleClass("lar las");
                            $('#favRemovedalert').html(response.removed);
                            $('#favRemovedalert').css('opacity', 1).slideDown();
                            window.setTimeout(function() {
                                $(favRemovedalert).fadeTo(500, 0).slideUp(500);
                            }, 3000);
                        }
                        else {
                            $('#loginfirst').html(response.error);
                            $('#loginfirst').css('opacity', 1).slideDown();
                            window.setTimeout(function() {
                                $(loginfirst).fadeTo(500, 0).slideUp(500);
                            }, 3000);
                        }
                    },
                    error: function(response) {
                    }
                });
            });
        });
    </script>
    <script>
      
    </script>
    <script>
        $("form[name='propertyEnquiry']").submit(function(e) {
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
            $('.property').on('change', function() {
                let {
                    value,
                    id,
                    checked
                } = event.target;
                if (id == "property") {
                    if (checked) {
                        category_ids.push(value);
                    } else {
                        category_ids = category_ids.filter(function(data) {
                            return data != value;
                        })
                    }
                }
                $.ajax({
                    url: "{{ route('filterProperty') }}",
                    type: 'get',
                    data: {
                        category_ids: category_ids,
                    },
                    // dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        $(".replace").replaceWith(response);
                    },
                    error: function(response) {}
                });

            });

        });
    </script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=637c7e261de3a500195a0afd&product=inline-share-buttons&source=platform"
        async="async"></script>
@endpush
