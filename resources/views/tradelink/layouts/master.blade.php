<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('dashboard/img/favicon.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('dashboard/css/material-dashboard.css?v=1.2.0')}}" rel="stylesheet" />

    @stack('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom.css')}}">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('dashboard/css/demo.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .error-message{
            color: darkred;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>

<body>
<div class="wrapper">
    @include('tradelink.layouts.sidebar')
    <div class="main-panel">
        @include('tradelink.layouts.nav')
        <div class="content">
            @yield('content')
        </div>
        @include('tradelink.layouts.footer')
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('dashboard/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
{{--<script type="text/javascript" src="{{asset('dashboard/js/lightbox-plus-jquery.min.js')}}"></script>--}}

<script src="{{asset('dashboard/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('dashboard/js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('dashboard/js/jquery.validate.min.js')}}"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{asset('dashboard/js/es6-promise-auto.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('dashboard/js/moment.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
{{--<script src="{{asset('dashboard/js/chartist.min.js')}}"></script>--}}
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('dashboard/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('dashboard/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('dashboard/js/jquery.sharrre.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('dashboard/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('dashboard/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{asset('dashboard/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('dashboard/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('dashboard/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('dashboard/js/sweetalert2.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('dashboard/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('dashboard/js/fullcalendar.min.js')}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('dashboard/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('dashboard/js/material-dashboard.js?v=1.2.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('dashboard/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>

 <!--  Tinymce-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.6/tinymce.min.js"></script>

<script>

    tinymce.init({

        selector: 'textarea.arka-tinymce',

        menu    : {

            file  : {title: 'File', items: 'newdocument'},

            insert: {title: 'Insert', items: 'link media image | template'},

            view  : {title: 'View', items: 'visualaid'},

            format: {

                title: 'Format',

                items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'

            },

            table : {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},

            tools : {title: 'Tools', items: 'spellchecker code'}

        },

        plugins : "link image advlist lists charmap print preview anchor autosave code codesample textcolor colorpicker table searchreplace media print hr preview",

        toolbar : [

            'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist link unlink charmap code', // image media indent outdent

            'formatselect fontselect fontsizeselect | forecolor backcolor'

        ]

    });

</script>
@stack('script')
</html>
