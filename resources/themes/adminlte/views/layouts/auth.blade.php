
<!DOCTYPE html>
<html>
<head>
    @include('adminlte::partials.metadata')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @yield('content')
        @yield('social')
        @yield('help')
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('adminlte::partials.js-footer')
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
