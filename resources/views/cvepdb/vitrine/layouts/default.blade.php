<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        @include('cvepdb.vitrine.partials.metadatas')
    </head>
    <body class="layout layout--full">
        <!-- Begin Body Wrapper -->
        <div class="layout__body-wrapper layout__body-wrapper--full">
            @include('cvepdb.vitrine.partials.header')
            @include('cvepdb.vitrine.partials.breadcrumbs')

            @if (Session::has('message'))
                <div class="{{ Session::get('alert-class', 'info-box') }}">
                    {{ Session::get('message') }}
                </div>
            @endif

            @yield('content')
            @include('cvepdb.vitrine.partials.footer')
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