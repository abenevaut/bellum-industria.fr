<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        @include('cvepdb.vitrine.partials.metadatas')
    </head>
    <body class="layout layout--full">
        <!-- Begin Body Wrapper -->
        <div class="layout__body-wrapper layout__body-wrapper--full">
            @include('cvepdb.vitrine.partials.header')
            @yield('content')
            @include('cvepdb.vitrine.partials.subfooter')
        </div>
        <!-- End Body Wrapper -->
        <script type="text/javascript" src="/dist/cvepdbjs/libs/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/libs/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/libs/headjs/dist/1.0.0/head.min.js"></script>
        <script type="text/javascript" src="/dist/cvepdbjs/cvepdb.js"></script>
        <script type="text/javascript" src="/dist/js/cvepdb-longwave/longwave.js"></script>
    </body>
</html>