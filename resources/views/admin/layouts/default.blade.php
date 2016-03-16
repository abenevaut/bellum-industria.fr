<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.metadata')
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
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
    <!-- /.content-wrapper -->
    @include('admin.partials.footer')
    @include('admin.partials.config_sidebar')
</div>
<!-- ./wrapper -->
@include('admin.partials.js-footer')
@yield('js')
</body>
</html>
