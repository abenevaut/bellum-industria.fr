<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link rel="stylesheet" href="{{ mix('css/frontend/layouts/thedocs.css') }}">
<link href='//fonts.googleapis.com/css?family=Raleway:100,300,400,500%7CLato:300,400' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}?v1"/>
<link href="{{ asset('/apple-touch-icon.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-57x57-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-72x72-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/apple-touch-icon-114x114-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
@yield('css')
