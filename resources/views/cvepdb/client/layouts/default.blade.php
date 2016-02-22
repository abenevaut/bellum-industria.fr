<!DOCTYPE html>
<html>
<head>
    @include('cvepdb.client.partials.pages_metadatas')
</head>
<body class="fixed-header   mac desktop pace-done menu-behind">

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
    <div id="appMenu" class="sidebar-overlay-slide from-top"></div>
    @include('cvepdb.client.partials.pages_sidebar')
</div>
<!-- END SIDEBAR -->

<!-- START PAGE-CONTAINER -->
<div class="page-container">
    <!-- START PAGE HEADER WRAPPER -->
    @include('cvepdb.client.partials.pages_header')
            <!-- END PAGE HEADER WRAPPER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">

            @include('cvepdb.client.partials.pages_help_modal')
            @yield('modals')

            @include('cvepdb.client.partials.pages_breadcrumbs')
                    <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                @yield('content')
                        <!-- END PLACE PAGE CONTENT HERE -->
            </div>
            <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        @include('cvepdb.client.partials.pages_footer')
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@yield('quickview')
@yield('overlay')
@include('cvepdb.client.partials.pages_jsfooter')
@yield('jsfooter')

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