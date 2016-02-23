@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-8 col-xlg-8 m-b-10">

            <!-- START WIDGET widget_graphTile-->
            <div class="widget-users panel no-border  no-margin widget-loader-bar">
                <div class="container-sm-height full-height">
                    <div class="row-sm-height">
                        <div class="col-sm-height col-top">
                            <div class="panel-heading ">
                                <div class="panel-title text-black hint-text">
                                  <span class="font-montserrat fs-11 all-caps">
	                                  Statistiques des utilisateurs <i class="fa fa-chevron-right"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row-sm-height">
                        <div class="m-l-50 m-r-50">
                            <div id="js-widget-users-charts" class="js-call-highcharts line-chart ">
                                <svg></svg>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END WIDGET -->

        </div>


        <div class="col-sm-12 col-md-12 col-lg-4 col-xlg-4 m-b-10">

            <!-- START WIDGET widget_graphTile-->
            <div class="widget-users panel no-border  no-margin widget-loader-bar">
                <div class="container-sm-height full-height">
                    <div class="row-sm-height">
                        <div class="col-sm-height col-top">
                            <div class="panel-heading ">
                                <div class="panel-title text-black hint-text">
                                  <span class="font-montserrat fs-11 all-caps">
	                                  Statistiques des roles <i class="fa fa-chevron-right"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row-sm-height">
                        <div class="m-l-50 m-r-50">
                            <div id="js-widget-users_by_roles-charts" class="js-call-highcharts line-chart ">
                                <svg></svg>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END WIDGET -->

        </div>


    </div>
@endsection

@section('metadatas')
    {{--<link href="/assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />--}}
    {{--<link href="/assets/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" />--}}
    {{--<link href="/assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />--}}
    {{--<link href="/assets/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" media="screen" />--}}


    {{--<link href="/assets/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" media="screen" />--}}
@endsection

@section('jsfooter')

    {{--<script src="/assets/plugins/nvd3/lib/d3.v3.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/nv.d3.min.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/src/utils.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/src/tooltip.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/src/interactiveLayer.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/src/models/axis.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/src/models/line.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>--}}

    {{--<script src="/assets/plugins/mapplic/js/hammer.js"></script>--}}
    {{--<script src="/assets/plugins/mapplic/js/jquery.mousewheel.js"></script>--}}
    {{--<script src="/assets/plugins/mapplic/js/mapplic.js"></script>--}}

    {{--<script src="/assets/plugins/rickshaw/rickshaw.min.js"></script>--}}

    {{--<script src="/assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>--}}
    {{--<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>--}}

    {{--<script src="/assets/plugins/skycons/skycons.js" type="text/javascript"></script>--}}

    {{--<script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>--}}



    {{--<script src="/assets//cvepdbjs/libs/highcharts/highcharts.js" type="text/javascript"></script>--}}


    <script>

        (function ($, D) {

            'use strict';

            $(D).bind('CVEPDB_HIGHCHARTS_READY', function () {

                var users_charts = cvepdb.graph.stacked(
                        'js-widget-users-charts',
                        '',
                        ['Tous'],
                        'Nombre d\'utilisateur',
                        [{
                            name: 'Tous les utilisateurs',
                            data: [{{ $users['statistiques']['all'] }}]
                        }],
                        175,
                        true,
                        "<span>{series.name}</span>: <b>{point.y}</b><br/>",
                        false
                );

                var users_by_roles_charts = cvepdb.graph.camembert(
                        'js-widget-users_by_roles-charts',
                        '',
                        [{
                            name: 'Les rôles',
                            colorByPoint: true,
                            data: [{
                                name: 'Admins',
                                y: {{ $users['statistiques']['roles']['admins'] }}
                            }, {
                                name: 'Users',
                                y: {{ $users['statistiques']['roles']['users'] }}
                            }, {
                                name: 'Clients',
                                y: {{ $users['statistiques']['roles']['clients'] }},
                                sliced: true,
                                selected: true
                            }, {
                                name: 'Gamers',
                                y: {{ $users['statistiques']['roles']['gamers'] }}
                            }]
                        }],
                        175
                );

            });

        })(window.jQuery, document);


        //        (function ($, D) {
        //
        //            'use strict';
        //
        //            $(D).ready(function () {
        //
        //                d3.json('http://revox.io/json/charts.json', function(data) {
        //
        //                        nv.addGraph(function() {
        //                            var chart = nv.models.lineChart()
        //                                    .x(function(d) {
        //                                        return d[0]
        //                                    })
        //                                    .y(function(d) {
        //                                        return d[1] / 100
        //                                    })
        //                                    .color([
        //                                        $.Pages.getColor('success')
        //                                    ])
        //                                    .forceY([0, 2])
        //                                    .useInteractiveGuideline(true)
        //
        //                                    .margin({
        //                                        top: 60,
        //                                        right: -10,
        //                                        bottom: -10,
        //                                        left: -10
        //                                    })
        //                                    .showLegend(false);
        //
        //
        //                            d3.select('.js-widget-users-charts svg')
        //                                    .datum(data.nvd3.productRevenue)
        //                                    .transition().duration(500)
        //                                    .call(chart);
        //
        //
        //                            nv.utils.windowResize(function() {
        //
        //                                chart.update();
        //
        //                            });
        //
        //                            $('.widget-4-chart').data('chart', chart);
        //
        //                            return chart;
        //                        }, function() {
        //
        //                        });
        //                });
        //
        //
        //            });
        //
        //        })(window.jQuery, document);
    </script>
@endsection