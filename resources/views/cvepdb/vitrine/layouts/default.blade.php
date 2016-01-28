<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        @include('cvepdb.vitrine.partials.longwave_metadatas')
    </head>
    <body class="layout layout--full">
        <!-- Begin Body Wrapper -->
        <div class="layout__body-wrapper layout__body-wrapper--full">
            @include('cvepdb.vitrine.partials.longwave_header')
            @include('cvepdb.vitrine.partials.longwave_breadcrumbs')

            @if (Session::has('message'))
                <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
                    <!-- Begin Inner -->
                    <div class="layout__body-wrapper__content-wrapper__inner" style="padding: 15px 0;">
                        <div class="{{ Session::get('alert-class', 'info-box') }}">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
            @include('cvepdb.vitrine.partials.longwave_footer')
            @include('cvepdb.vitrine.partials.longwave_subfooter')
        </div>
        <!-- End Body Wrapper -->
        <script type="text/javascript" src="/dist/cvepdbjs/libs/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/libs/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/libs/headjs/dist/1.0.0/head.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/cvepdb.js"></script>
        <script type="text/javascript" src="/dist/js/cvepdb-longwave/longwave.js"></script>
    </body>
</html>