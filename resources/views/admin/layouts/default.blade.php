<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.metadata')
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $header['title'] }}
                <small>{{ $header['description'] }}</small>
            </h1>
            <ol class="breadcrumb">
                {!! $breadcrumbs or '&nbsp;' !!}
            </ol>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('admin.partials.footer')
    @include('admin.partials.config_sidebar')
</div>
@include('admin.partials.js-footer')
</body>
</html>
