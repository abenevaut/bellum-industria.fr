<meta charset="utf-8">
<meta name="environment" content="{{ env('APP_ENV') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}?v1"/>
<link href="{{ asset('/img/apple-touch-icon.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/img/apple-touch-icon-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/img/apple-touch-icon-57x57-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/img/apple-touch-icon-72x72-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<link href="{{ asset('/img/apple-touch-icon-114x114-precomposed.png') }}?v1" rel="apple-touch-icon" type="image/x-icon" />
<title>@section('title', 'www.bellum-industria.fr')</title>
<meta name="description" content="www.bellum-industria.fr">
<meta name="author" content="Antoine Benevaut <antoine@bellum-industria.fr>">
<base href="{{ env('APP_URL') }}">
<link href="{{ mix('css/frontend/layouts/core.css') }}" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
<link href="{{ mix('css/frontend/layouts/default.css') }}" rel="stylesheet">
@yield('css')
