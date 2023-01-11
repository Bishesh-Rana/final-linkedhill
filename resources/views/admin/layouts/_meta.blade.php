<meta name="csrf-token" content="{{ csrf_token() }}">

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<!-- Canonical SEO -->
<link rel="canonical" href="{{ request()->url() }}" />
<!--  Social tags      -->
<meta name="keywords" content="{{ config('meta . keywords') }}">
<meta name="description" content="{{ config('meta.description') }}">
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ config('meta.title') }}">
<meta itemprop="description" content="{{ config('meta.description') }}">
<meta itemprop="image" content="{{ asset(config('meta.image')) }}">
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@nectardigit">
<meta name="twitter:title" content="{{ config('meta.title') }}">
<meta name="twitter:description" content="{{ config('meta.description') }}">
<meta name="twitter:creator" content="@nectardigit">
<meta name="twitter:image" content="{{ asset(config('meta.image')) }}">
<!-- Open Graph data -->
<meta property="fb:app_id" content="655968634437471">
<meta property="og:title" content="{{ config('meta.title') }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:image" content="{{ asset(config('meta.image')) }}" />
<meta property="og:description" content="{{ config('meta.description') }}" />
<meta property="og:site_name" content="{{ config('meta.name') }}" />
