<!DOCTYPE html>
<html>
<head>
    @include('cvepdb.admin.partials.pages_metadatas')

    <link href="/assets/css/themes/simple.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body class="fixed-header  no-header mac desktop pace-done menu-behind">

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
    <div id="appMenu" class="sidebar-overlay-slide from-top"></div>
    @include('cvepdb.admin.partials.pages_sidebar')
</div>
<!-- END SIDEBAR -->

<!-- START PAGE-CONTAINER -->
<div class="page-container">
    <!-- START PAGE HEADER WRAPPER -->
    @include('cvepdb.admin.partials.pages_header')
            <!-- END PAGE HEADER WRAPPER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">

            <div class="social-wrapper">
                <div class="social " data-pages="social">
                    @yield('modals')
                    @yield('content')
                </div>
                <!-- /container -->
            </div>
            <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        @include('cvepdb.admin.partials.pages_footer')
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@yield('quickview')
@yield('overlay')
@include('cvepdb.admin.partials.pages_jsfooter')
@yield('jsfooter')

<script src="/assets/plugins/jquery-isotope/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="/assets/js/pages.social.min.js"></script>

<div class="pgn-wrapper" data-position="top">
@if (Session::has('message'))
    <div class="pgn pgn-bar">
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <span>{{ Session::get('message') }}</span>
        </div>
    </div>
@endif
</div>

</body>
</html>

