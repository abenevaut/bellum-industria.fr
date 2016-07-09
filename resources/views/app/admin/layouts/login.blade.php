<!DOCTYPE html>
<html>
<head>
    @include('cvepdb.admin.partials.pages_metadatas')
</head>
<body class="fixed-header ">
<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="/assets/images/admin/back2.png"
             data-src="/assets/images/admin/back2.png"
             data-src-retina="/assets/images/admin/back2-full.jpg"
             alt=""
             class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">{!! trans('cvepdb/auth/login.intro') !!}</h2>

            <p class="small">© 2012-{{ date('Y') }} <a href="{{ url('/') }}">Ca va ENCORE parler de bits!</a> Tous
                droits réservés.</p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        @yield('content')
    </div>
    <!-- END Login Right Container-->
</div>
@include('cvepdb.admin.partials.pages_jsfooter')
<script>
    $('select[name="language_switcher"]').select2({
        minimumResultsForSearch: -1
    });
</script>
</body>
</html>