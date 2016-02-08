<!DOCTYPE HTML>
<html lang="en-US">
<head>
    @include('cvepdb.multigaming.partials.metadatas')
</head>
<body class="layout layout--full">
<!-- Begin Body Wrapper -->
<div class="layout__body-wrapper layout__body-wrapper--full">
    <!-- Begin Header Wrapper -->
    <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--header">
        <!-- Begin Inner -->
        <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--header">
            <div class="layout__body-wrapper__content-wrapper__inner__logo">
                <a href="{{ url('/') }}">
                    <img src="/assets/images/multigaming/logo.png" alt="Ca va ENCORE parler de bits!" width="200" height="200" />
                </a>
            </div>
            <!-- Begin Menu -->
            <div id="js-layout__body-wrapper__content-wrapper__inner__menu" class="layout__body-wrapper__content-wrapper__inner__menu clearfix js-call-selectnav js-call-ddsmoothmenu js-layout__body-wrapper__content-wrapper__inner__menu">
                <ul id="js-layout__body-wrapper__content-wrapper__inner__menu__list" class="layout__body-wrapper__content-wrapper__inner__menu__list">
                    <li>
                        <a href="{{ url('/') }}">{{ trans('cvepdb/global.home') }}</a>
                    </li>
                    <li>
                        @if (Auth::check())
                            <a href="#">{{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}</a>
                            <ul>
                                @if (Auth::check() && Auth::user()->hasRole('admin'))
                                    <li>
                                        <a href="{{ url('admin/dashboard') }}">{!! trans('cvepdb/global.admin_panel') !!}</a>
                                    </li>
                                @elseif (Auth::check() && Auth::user()->hasRole('client'))
                                    <li>
                                        <a href="{{ url('clients/dashboard') }}">{!! trans('cvepdb/global.client_panel') !!}</a>
                                    </li>
                                @endif
                                <li><a href="{{ url('auth/logout') }}">{!! trans('cvepdb/global.logout') !!}</a></li>
                            </ul>
                        @else
                            <a href="{{ url('auth/login') }}">{!! trans('cvepdb/global.login') !!}</a>
                            <ul>
                                <li><a href="{{ url('auth/login') }}">{!! trans('cvepdb/global.login') !!}</a></li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
            <!-- End Menu -->
            <div class="clear"></div>
        </div>
        <!-- End Inner -->
    </div>
    <!-- End Header Wrapper -->
    {{--@include('cvepdb.multigaming.partials.longwave_breadcrumbs')--}}

    {{--@if (Session::has('message'))--}}
        {{--<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">--}}
            {{--<!-- Begin Inner -->--}}
            {{--<div class="layout__body-wrapper__content-wrapper__inner" style="padding: 15px 0;">--}}
                {{--<div class="{{ Session::get('alert-class', 'info-box') }}">--}}
                    {{--{{ Session::get('message') }}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    @yield('content')
    {{--@include('cvepdb.multigaming.partials.longwave_footer')--}}
    @include('cvepdb.multigaming.partials.subfooter')
</div>
<!-- End Body Wrapper -->
<script type="text/javascript" src="/assets/cvepdbjs/libs/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/assets/cvepdbjs/libs/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/cvepdbjs/libs/headjs/dist/1.0.0/head.min.js"></script>
<script type="text/javascript" src="/assets/cvepdbjs/cvepdb.js"></script>
<script type="text/javascript" src="/assets/js/longwave.js"></script>
</body>
</html>