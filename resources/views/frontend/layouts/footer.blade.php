@php
    $data = \App\Models\Admin::find(1);
    $website = \App\Models\Website::find(1);
@endphp
<footer>
    <div class="section-rule">
        <div class="row">
            <article class="col-6 col-sm-4">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('images/'.$website->logo)}}" alt="" width="175"  height="42px">
                        </a>
                    </div>

                    <p class="para" style="text-align: justify">
                        {{$website->short_intro}}
                    </p>
                <p class="link"><a href="tel:{{$data->phone}}">{{$data->phone}}</a></p>
                <p class="link"><a href="mailto:{{$website->email}}">{{$website->email}}</a></p>
            </article>
            <article class="col-6 col-sm-4 col-lg-2">
                <h2 class="card__title">Company</h2>
                <ul>
                    <li><a href="{{url('our-company')}}">Our Company</a></li>
                    <li><a href="{{url('properties')}}">Properties</a></li>
                    <li><a href="{{route('trade.vendor.register')}}"><b>Tradelink Vendor Signup</b></a></li>
                </ul>
            </article>
            <article class="col-6 col-sm-4 col-lg-2">
                <h2 class="card__title">Quick Link</h2>
                <ul>
                    <li><a href="{{route('privacy.policyy')}}">Privacy </a></li>
                    <li><a href="{{route('terms.conditions')}}">Terms & Condition</a></li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                </ul>
            </article>
            <article class="col-sm-7 col-lg-4" id="subscribe">
                <h2 class="card__title">Newsletter</h2>
                <form action="{{route('subscribe.us')}}" class="form-inline" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        <button type="submit">Go</button>
                    </div>
                </form>
                @if (session('success'))
                    <p style="color:#3f8809;font-weight:bolder;margin-left: 60px;margin-top: 4px">{{ session('success') }}</p>
                @endif
            </article>
        </div>
        <hr>
        <div class="d-flex last__footer">
            <p>Copyright &copy; 2022 Linkedhill, All Rights Reserved. design: <a href="https://www.thesunbi.com/">SunBi</a></p>
            <div class="d-flex">
                @if($website->fb_url != null)
                <a href="{{$website->fb_url}}" target="_blank"><i class="fab fa-facebook-square"></i></a>
                @endif
                @if($website->twitter_url != null)
                <a href="{{$website->twitter_url}}" target="_blank"><i class="fab fa-twitter"></i></a>
                @endif
                @if($website->youtube_url != null)
                <a href="{{$website->youtube_url}}" target="_blank"><i class="fab fa-youtube"></i></a>
                @endif
                @if($website->instagram_url != null)
                <a href="{{$website->instagram_url}}" target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
            </div>
        </div>
    </div>
</footer>
@include('frontend.includes.login_modal')
{{--{{ \TawkTo::widgetCode() }}--}}
<!--jquery  -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="https://kit.fontawesome.com/021b940a03.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'en,ne', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
        document.getElementById(':0.targetLanguage').nextSibling.remove()

    }

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- fancybox -->
<script type="text/javascript" src="{{asset('frontend/css/fancybox/jquery.fancybox.min.js')}}"></script>
<!-- owl -->
<script type="text/javascript" src="{{asset('frontend/css/slick/slick.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<!-- bootstrap -->
<script type="text/javascript" src="{{asset('frontend/css/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/css/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- commom js -->
<script type="text/javascript" src="{{asset('frontend/js/commonjs.js')}}"></script>


