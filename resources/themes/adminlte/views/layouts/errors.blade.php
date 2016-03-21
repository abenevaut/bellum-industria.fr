<!DOCTYPE html>
<html>
<head>
    @include('adminlte::partials.metadata')
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>
</div>
@include('adminlte::partials.js-footer')
</body>
</html>
