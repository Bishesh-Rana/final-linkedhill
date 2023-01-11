@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')
    <main class="about-us-page inner-page contact-us">

        <section class="main-content ">
            <div class="section-rule">
                <article class="card--lg">
                    <div class="card--top">
                        <div class="card--img">
                            <!-- <img src="./gallery/card__img/img08.png" alt=""/> -->
                            <h2 class="section__title">Contact Information</h2>
                            <div class="card__grid">
                                <div class="card__left">
                                    <img src="{{asset('images/'.$website->logo)}}" alt="" class="logo">
                                </div>
                                <div class="card__right">
                                    <ul>
                                        <li>
                                            <span class="material-icons">email</span>
                                        </li>
                                        <li><a href="mailto:contact@linkedhill.com">{{$website->email}}</a></li>
                                        <li><a href="mailto:info@linkedhill.com">{{$website->alternate_email}}</a></li>
                                        <li></li>
                                        <li>
                                            <span class="material-icons">call</span>
                                        </li>
                                        <li><a href="mailto:{{$website->phone}}">{{$website->phone}}</a></li>
{{--                                        <li><a href="mailto:+977 9875462180">+977 9875462180</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card--text">
                            <form action="{{route('store.enquiry')}}" class="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Full Name" name="name" autofocus="" class="form-control" id="name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" placeholder="Contact Info" name="contact_info"  class="form-control" id="number" required>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" name="message" placeholder="Write Your Messages" class="form-control"></textarea>
                                </div>

                                @if(\Session::has('message'))
                                <div class="form-group">
                                    <span style="color: #3f8809;font-size: 14px;font-weight: bold"> {{\Session::get('message')}}</span>
                                </div>
                                @endif



                                <div class="form-group d-flex">
                                    <button type="submit">Send</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </article>
            </div>

        </section>


    </main>
@endsection
