@extends('website.layouts.app', ['pageTitle' => $pagedata->name])
@section('meta')
    @include('website.shared.meta', ['meta' => $meta])
@endsection
@section('content')
    <section id="bread_crumb_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a>/</li>
                        <li><a href="">{{ $pagedata->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="ads_inside_subpage">
        <div class="container">
            <div class="ads_section_cover">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($advertisements as $ad)
                            <div class="ads_wrap">
                                <img src="{{ $ad->image }}" alt="{{ $ad->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="propertyListing_wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-10">
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
                                        <div class="property_detail_">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="property_thumbnail_">
                                                        <a
                                                            href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">
                                                            <img src="{{ @$property->images->first()->name }}"
                                                                alt="">
                                                        </a>
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
                                                            title="{{ $property->total_area . ' ' . $property->area_unit->name }}"><i
                                                                class="las la-crop-alt"></i><span
                                                                class="type_badge">{{ $property->total_area . ' ' . $property->area_unit->name }}</span></span>
                                                        {{-- <span>Owner: {{ @$property->owner_name }}</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="top_tv_verified">

                                                        @isset($property->type)
                                                            <span><i class="las la-check"></i>{{ $property->type }}</span>
                                                        @endisset
                                                        {{-- @dd($property->negotiable) --}}
                                                        @if($property->negotiable ==false)
                                                        @isset($property->negotiable)
                                                            {{-- @if (!is_null($property->negotiable)) --}}
                                                            {{-- <span><i class="las la-check"></i>NONE NEGOTIABLE</span> --}}
                                                            {{-- @endif --}}
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
                                                        <a
                                                            href="{{ route('property.detail', ['id' => $property->id, 'slug' => $property->slug]) }}">{{ @$property->title }}</a>
                                                    </div>
                                                    @if ($property->amenities->count() > 0)
                                                        <div class="property_type_ptd_detail">
                                                            <ul>
                                                                @foreach ($property->amenities as $amenity)
                                                                    <li><img src=""
                                                                            alt="">{{ $amenity->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <div class="property_facing">
                                                        <p><i class="las la-check"></i>
                                                            {{ @$property->property_facing }} Facing Property</p>
                                                        <div class="show_button_area">
                                                            <span class="button_show"><i
                                                                    class="las la-angle-down"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="property_text">
                                                        {!! @$property->property_detail !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="property_Side text-center">
                                                        <h2>Rs:
                                                            {{ @$property->start_price }}
                                                        </h2>
                                                        <a href="tel:{{ @$property->owner_phone }}"
                                                            class="btn btn-custom">Contact Owner</a>
                                                        <a href="#" class="" data-bs-toggle="modal"
                                                            data-bs-target="#send_message_model">Send message</a>
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
                            <input type="email" name="email" id="Email_id" class="form-control" id="email_address"
                                placeholder="Email address" value="{{ old('email') }}">
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



@endpush
