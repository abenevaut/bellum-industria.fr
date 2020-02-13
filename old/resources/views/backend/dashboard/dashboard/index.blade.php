@extends('backend.layouts.dashboard')

@section('css')
    <link class="main-stylesheet" href="{{ mix('assets/css/backend/dashboard/dashboard.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('js')
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var google_analytics_dates
            = {!! $totalVisitorsAndPagesViewsLastWeek->pluck('date')->map(function($date) { return $date->format('d/m/Y'); })->toJson() !!};
        var google_analytics_visitors
            = {{ $totalVisitorsAndPagesViewsLastWeek->pluck('visitors')->toJson() }};
        var google_analytics_pageViews
            = {{ $totalVisitorsAndPagesViewsLastWeek->pluck('pageViews')->toJson() }};
    </script>
    <script type="text/javascript" src="{{ mix('assets/js/backend/dashboard/dashboard.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid container-fixed-lg">

        <div class="row">
            <div class="col-md-12 m-b-12">
                <div class="widget-13 panel no-border no-margin widget-loader-circle">
                    <div class="panel-heading pull-up top-right">
                        <div class="panel-controls">
                            <ul>
                                {{--<li>--}}
                                    {{--<a href="#" class="portlet-refresh text-black" data-toggle="refresh">--}}
                                        {{--<i class="portlet-icon portlet-icon-refresh"></i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="container-sm-height no-overflow">
                        <div class="row row-sm-height">
                            <div class="col-sm-5 col-lg-4 col-xlg-3 col-sm-height col-top no-padding">
                                <div class="panel-heading ">
                                    <div class="panel-title">Traffic analyses</div>
                                </div>
                                <div class="panel-body">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab" role="tab" class="b-a b-grey text-master">GA</a>
                                        </li>
                                        {{--<li class="">--}}
                                            {{--<a href="#tab2" data-toggle="tab" role="tab" class="b-a b-grey text-master">GA2</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <h3>Google Analytics</h3>
                                            <p class="hint-text all-caps font-montserrat small no-margin ">
                                                Visitors for the week
                                            </p>
                                            <p class="all-caps font-montserrat  no-margin text-success ">
                                                {{ $totalVisitorsAndPagesViewsLastWeek->sum('visitors') }}
                                            </p>
                                            <br>
                                            <p class="hint-text all-caps font-montserrat small no-margin ">
                                                Views for the week
                                            </p>
                                            <p class="all-caps font-montserrat  no-margin text-success ">
                                                {{ $totalVisitorsAndPagesViewsLastWeek->sum('pageViews') }}
                                            </p>
                                        </div>
                                        {{--<div class="tab-pane" id="tab2">--}}
                                            {{--<h3>Google Analytics 2</h3>--}}
                                            {{--<p class="hint-text all-caps font-montserrat small no-margin ">--}}
                                                {{--Visitors for the week--}}
                                            {{--</p>--}}
                                            {{--<p class="all-caps font-montserrat  no-margin text-success ">--}}
                                                {{--{{ $totalVisitorsAndPagesViewsLastWeek->sum('visitors') }}--}}
                                            {{--</p>--}}
                                            {{--<br>--}}
                                            {{--<p class="hint-text all-caps font-montserrat small no-margin ">--}}
                                                {{--Views for the week--}}
                                            {{--</p>--}}
                                            {{--<p class="all-caps font-montserrat  no-margin text-success ">--}}
                                                {{--{{ $totalVisitorsAndPagesViewsLastWeek->sum('pageViews') }}--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                                {{--<div class="bg-master-light p-l-20 p-r-20 p-t-10 p-b-10 pull-bottom full-width hidden-xs">--}}
                                {{--<p class="no-margin">--}}
                                {{--<a href="#"><i class="fa fa-arrow-circle-o-down text-success"></i></a>--}}
                                {{--<span class="hint-text">Super secret options</span>--}}
                                {{--</p>--}}
                                {{--</div>--}}
                            </div>
                            <div class="col-sm-7 col-lg-8 col-xlg-9 col-sm-height col-top no-padding relative">
                                <div class="bg-success widget-13-map" id="google-analytics-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
