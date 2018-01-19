<meta charset="utf-8">
<meta name="robots" content="@yield('robots', config('metadata.robots'))">
<link rel="sitemap" type="application/xml" title="sitemap" href="{{ url('/sitemap.xml') }}" />
<meta name="environment" content="{{ config('app.env') }}">
<meta name="locale" content="{{ Session::get('locale') }}">
<meta name="timezone" content="{{ Session::get('timezone') }}">
<meta name="youtube_channel_id" content="{{ config('services.youtube.key') }}">
<meta name="google_api_key" content="{{ config('services.google_api.key') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}?v1"/>
<link href="{{ asset('apple-touch-icon.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('apple-touch-icon-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('apple-touch-icon-57x57-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('apple-touch-icon-72x72-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('apple-touch-icon-114x114-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
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
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
<link href="{{ mix('assets/themes/gameforest/css/core-gameforest.css') }}" rel="stylesheet">
@yield('css')
<script>
	addEventListener('error', window.__e=function f(e){f.q=f.q||[];f.q.push(e)});
</script>
