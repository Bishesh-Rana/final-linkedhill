@extends('website.layouts.app',['pageTitle'=>$pagedata->name])
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
                        <li><a href="#">{{ @$pagedata->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="contact_cw_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact_form_">
                        <h1>Let’s get in touch</h1>



                        <form id="contact" name="contact" action="{{route('store.enquiry')}}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Your name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your name" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Your email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Your phone</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your phone" name="contact_info">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter your subject" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                            onchange="document.getElementById('submit').disabled = !this.checked;">
                                        <label class="form-check-label" for="defaultCheck1">
                                            I have read and completely accept the Terms of service And Privacy policy.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact_submit_button">
                                        <button class="btn btn-danger" type="submit" id="submit" disabled>Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="contact_information">
                        <h1>Contact information</h1>
                        <ul>
                            <li>
                                <span>Address</span>
                                <span>{{ @config('websites.address') }}</span>
                            </li>
                            <li>
                                <span>Phone</span>
                                <span>{{ @config('websites.phone') }}</span>
                            </li>
                            <li>
                                <span>Email</span>
                                <span>{{ @config('websites.email') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="google_map">
            <div class="embed-responsive embed-responsive-21by9">
                {!! config('websites.map_url') !!}
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("form[name='contact']").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('store.enquiry') }}',
                type: 'post',
                dataType: 'json',
                data: $("form[name='contact']").serialize(),
                success: function(response) {
                    $('#contact').trigger("reset");
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
                }
            });
        });
    </script>
@endpush
