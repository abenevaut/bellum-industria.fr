<title>
    @section('title')
        {{ $header['title'] ? $header['title'] : Widget::site_name() }}
    @show
</title>
<meta name="description" itemprop="description"
      content="@section("meta-description"){{ $header['description'] ? $header['description'] : Widget::site_description() }}@show" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" href="{{ asset('themes/flatly/css/bootstrap.min.css') }}" media="screen">
<link rel="stylesheet" href="{{ asset('themes/flatly/css/custom.min.css') }}">
<!--[if lt IE 9]>
<script src="{{ asset('themes/flatly/bower/html5shiv/dist/html5shiv.min.js') }}"></script>
<script src="{{ asset('themes/flatly/bower/respond/dest/respond.min.js') }}"></script>
<![endif]-->
@yield('head')