<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="UTF-8">
<meta name="robots" content="@yield('robots', config('metadata.robots'))">
<link rel="sitemap" type="application/xml" title="sitemap" href="{{ url('/sitemap.xml') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<meta name="environment" content="{{ config('app.env') }}">
<meta name="locale" content="{{ Session::get('locale') }}">
<meta name="timezone" content="{{ Session::get('timezone') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', config('app.name'))</title>
<meta name="description" content="@yield('description', config('metadata.description'))" />
<meta name="keywords" content="@yield('keywords', config('metadata.keywords'))" />
<meta name="author" content="{{ config('metadata.author') }}" />
<meta name="copyright" content="{{ config('metadata.copyright') }}" />
<meta name="application-name" content="{{ config('metadata.application-name') }}" />
<meta property="og:site_name" content="{{ config('metadata.application-name') }}"/>
<meta property="og:title" content="@yield('title', config('app.name'))"/>
<meta property="og:image" content="@yield('image', asset(config('metadata.image')))" />
<meta property="og:description" content="@yield('description', config('metadata.description'))" />
@section('type')
    <meta property="og:type" content="{{ config('metadata.type') }}" />
@show
<meta property="og:url" content="{{ URL::current() }}"/>
<meta property="fb:app_id" content="{{ config('metadata.fb_app_id') }}"/>
<meta property="fb:admins" content="{{ config('metadata.fb_page_id') }}"/>
<meta name="twitter:title" content="@yield('title', config('app.name'))" />
<meta name="twitter:description" content="@yield('description', config('metadata.description'))" />
<meta name="twitter:image" content="@yield('image', asset(config('metadata.image')))" />
<meta name="twitter:card" content="@yield('card', config('metadata.card'))" />
<meta name="twitter:creator" content="{{ config('metadata.twitter_username') }}" />
<meta name="twitter:site" content="{{ config('metadata.twitter_username') }}" />
<base href="{{ config('app.url') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}?v1"/>
<link href="{{ asset('/apple-touch-icon.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-57x57-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-72x72-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-114x114-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<link class="main-stylesheet" href="{{ mix('assets/themes/pages/css/core-pages.css') }}" rel="stylesheet" type="text/css" />
<!--[if lte IE 9]>
<link href="/assets/themes/pages/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<script type="text/javascript">
	window.onload = function() {
		// fix for windows 8
		if (navigator.appVersion.indexOf("Windows NT 6.2") != -1) {
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />';
        }
	}
</script>
@yield('css')
@include('partials.analytics')
