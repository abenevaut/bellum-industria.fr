<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.metadata')
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue layout-top-nav">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('admin.partials.js-footer')
</body>
</html>
