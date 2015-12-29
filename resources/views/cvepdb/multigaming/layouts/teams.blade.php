<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        @include('cvepdb.multigaming.partials.metadatas')
    </head>
    <body class="layout layout--full">
        <!-- Begin Body Wrapper -->
        <div class="layout__body-wrapper layout__body-wrapper--full">
            @include('cvepdb.multigaming.partials.header')
            @include('cvepdb.multigaming.partials.breadcrumbs')

            @if (Session::has('message'))
                <div class="{{ Session::get('alert-class', 'info-box') }}">
                    {{ Session::get('message') }}
                </div>
            @endif

            @yield('content')
            @include('cvepdb.multigaming.partials.subfooter')
        </div>
        <!-- End Body Wrapper -->
        <script type="text/javascript" src="/dist/cvepdbjs/libs/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/libs/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/libs/headjs/dist/1.0.0/head.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/cvepdb.js"></script>
        <script type="text/javascript" src="/dist/js/cvepdb-longwave/longwave.js"></script>

        <script>
            // Patch
            jQuery(document).ready(function () {
                jQuery(document).bind('CVEPDB_DDSMOOTHMENU_READY', function () {
                    // Patch
                    $('#js-layout__body-wrapper__content-wrapper__inner__menu')
                            .addClass('layout__body-wrapper__content-wrapper__inner__menu--multigaming');
                });
            });
        </script>

        <script type="text/javascript" src="/dist/js/multigaming/teams.js"></script>

    </body>
</html>