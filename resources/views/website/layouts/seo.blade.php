
<title></title>
<meta charset="utf-8" />
<link rel="shortcut icon" href="" type="image/png" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html">
<meta name="title" content="">
<meta name="referrer" content="">
<meta name="robots" content="">
<meta name="Googlebot" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="">
<meta name="keywords" content="">
@if(config('meta.geo_region') !=='')
<meta name="geo.region" content="">
@endif
@if(config('meta.geo_position') !=='')
<meta name="geo.position" content="">
<meta name="ICBM" content="">
@endif
<meta name="geo.placename" content="">
<!-- Dublin Core basic info -->
<meta name="dcterms.Format" content="text/html">
<meta name="dcterms.Language" content="{{ config('app.locale') }}">
<meta name="dcterms.Identifier" content="{{ url()->current() }}">
<meta name="dcterms.Relation" content="">
<meta name="dcterms.Publisher" content="">
<meta name="dcterms.Type" content="text/html">
<meta name="dcterms.Coverage" content="{{ url()->current() }}">
<meta name="dcterms.Title" content="">
<meta name="dcterms.Subject" content="">
<meta name="dcterms.Contributor" content="">
<meta name="dcterms.Description" content="">
<!-- Facebook OpenGraph -->
<meta property="og:locale" content="{{  config('app.locale') }}">
<meta property="og:type" content="">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:image" content="">
<meta property="og:site_name" content="">

@if(config('meta.fb_app_id') !=='')
<meta property="fb:app_id" content=""/>
@endif
<!-- Twitter Card -->
<meta name="twitter:card" content="">
<meta name="twitter:site" content="">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="">
