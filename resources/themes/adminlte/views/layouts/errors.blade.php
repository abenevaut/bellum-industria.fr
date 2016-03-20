<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.metadata')
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>
</div>
@include('admin.partials.js-footer')
</body>
</html>
