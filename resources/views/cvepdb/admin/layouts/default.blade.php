<!DOCTYPE html>
<html>
<head>
    @include('cvepdb.admin.partials.pages_metadatas')
</head>
<body class="fixed-header">
@include('cvepdb.admin.partials.pages_sidebar')

        <!-- START PAGE-CONTAINER -->
<div class="page-container">
    <!-- START PAGE HEADER WRAPPER -->
    @include('cvepdb.admin.partials.pages_header')
    <!-- END PAGE HEADER WRAPPER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
            @include('cvepdb.admin.partials.pages_breadcrumbs')
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                @yield('content')
                <!-- END PLACE PAGE CONTENT HERE -->
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
</body>
</html>