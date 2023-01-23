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
                        <li><a href="#">{{ @$pagedata->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="faq_cw_wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-10">
                    <div class="contact_information">
                        <h1>Frequently Ask Question</h1>
                        <div class="accordion frequently_ask_question" id="accordionExample">
                           @foreach ($faqs as $key=>$faq)
                           <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$key}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                   {{$faq->question}}
                                </button>
                            </h2>
                            <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
