@extends('cvepdb.admin.layouts.default')

@section('content')

    <div class="row">


        <div class="col-md-6 col-lg-4 m-b-10">
            <!-- START WIDGET widget_tableWidgetBasic-->
            <div class="widget-11-2 panel no-border panel-condensed no-margin widget-loader-circle">
                <div class="panel-heading top-right">
                    <div class="panel-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="padding-25">
                    <div class="pull-left">
                        <h2 class="text-success no-margin">webarch</h2>
                        <p class="no-margin">Today's sales</p>
                    </div>
                    <h3 class="pull-right semi-bold"><sup>
                            <small class="semi-bold">$</small>
                        </sup> 102,967
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="auto-overflow widget-11-2-table">
                    <table class="table table-condensed table-hover">
                        <tbody>


                        <tr>
                            <td class="font-montserrat all-caps fs-12 col-lg-6">Purchase CODE #2345</td>
                            <td class="text-right hidden-lg">
                                <span class="hint-text small">dewdrops</span>
                            </td>
                            <td class="text-right b-r b-dashed b-grey col-lg-3">
                                <span class="hint-text small">Qty 1</span>
                            </td>
                            <td class="col-lg-3">
                                <span class="font-montserrat fs-18">$27</span>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <div class="padding-25">
                    <p class="small no-margin">
                        <a href="#"><i class="fa fs-16 fa-arrow-circle-o-down text-success m-r-10"></i></a>
                        <span class="hint-text ">Show more details of APPLE . INC</span>
                    </p>
                </div>
            </div>
            <!-- END WIDGET -->
        </div>



        <div class="col-md-6 col-lg-4 m-b-10">
            <!-- START WIDGET widget_tableWidgetBasic-->
            <div class="widget-11-2 panel no-border panel-condensed no-margin widget-loader-circle">
                <div class="panel-heading top-right">
                    <div class="panel-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="padding-25">
                    <div class="pull-left">
                        <h2 class="text-success no-margin">Utilisateurs</h2>
                        <p class="no-margin">Les derniers inscrits</p>
                    </div>
                    <h3 class="pull-right semi-bold">
                        102
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="auto-overflow widget-11-2-table">
                    <table class="table table-condensed table-hover">
                        <tbody>


                        <tr>
                            <td class="font-montserrat all-caps fs-12 col-lg-6">Purchase CODE #2345</td>
                            <td class="text-right hidden-lg">
                                <span class="hint-text small">dewdrops</span>
                            </td>
                            <td class="text-right b-r b-dashed b-grey col-lg-3">
                                <span class="hint-text small">Qty 1</span>
                            </td>
                            <td class="col-lg-3">
                                <span class="font-montserrat fs-18">$27</span>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <div class="padding-25">
                    <p class="small no-margin">
                        <a href="#"><i class="fa fs-16 fa-arrow-circle-o-down text-success m-r-10"></i></a>
                        <span class="hint-text ">Show more details of APPLE . INC</span>
                    </p>
                </div>
            </div>
            <!-- END WIDGET -->
        </div>

        <div class="col-md-6 col-lg-4 m-b-10">
            <!-- START WIDGET widget_tableWidgetBasic-->
            <div class="widget-11-2 panel no-border panel-condensed no-margin widget-loader-circle">
                <div class="panel-heading top-right">
                    <div class="panel-controls">
                        <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="padding-25">
                    <div class="pull-left">
                        <h2 class="text-success no-margin">Paiements</h2>
                        <p class="no-margin">Gains total</p>
                    </div>
                    <h3 class="pull-right semi-bold">
                        {{ $total_amount_per_year['total'] }}
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="auto-overflow widget-11-2-table">
                    <table class="table table-condensed table-hover">
                        <tbody>


                        @foreach ($total_amount_per_year as $year => $total_amount_this_year)
                        <tr>
                            <td class="font-montserrat all-caps fs-12 col-lg-6">{{ $year }}</td>
                            <td class="col-lg-6">
                                <span class="font-montserrat fs-18">{{ $total_amount_this_year }} &euro; T.T.C</span>
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="padding-25">
                    <p class="small no-margin">
                        <a href="#"><i class="fa fs-16 fa-arrow-circle-o-down text-success m-r-10"></i></a>
                        <span class="hint-text ">Show more details of APPLE . INC</span>
                    </p>
                </div>
            </div>
            <!-- END WIDGET -->
        </div>




    </div>








    <div class="row">
        <div class="col-md-4 col-lg-3 col-xlg-2 ">




            <div class="row">
                <div class="col-md-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
                        <div class="container-xs-height full-height">
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="panel-heading  top-left top-right">
                                        <div class="panel-title text-black">
                                <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                                    </span>
                                        </div>
                                        <div class="panel-controls">
                                            <ul>
                                                <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="p-l-20 p-t-15">
                                        <h3 class="no-margin p-b-5 text-white">$23,000</h3>
                                        <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
                                        </a>
                                        <span class="small hint-text">65% lower than last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-bottom">
                                    <div class="progress progress-small m-b-20">
                                        <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                        <div class="progress-bar progress-bar-white" style="width:45%"></div>
                                        <!-- END BOOTSTRAP PROGRESS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>



        </div>

        <div class="col-md-4 col-lg-3 col-xlg-2 ">




            <div class="row">
                <div class="col-md-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
                        <div class="container-xs-height full-height">
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="panel-heading  top-left top-right">
                                        <div class="panel-title text-black">
                                <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                                    </span>
                                        </div>
                                        <div class="panel-controls">
                                            <ul>
                                                <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="p-l-20 p-t-15">
                                        <h3 class="no-margin p-b-5 text-white">$23,000</h3>
                                        <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
                                        </a>
                                        <span class="small hint-text">65% lower than last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-bottom">
                                    <div class="progress progress-small m-b-20">
                                        <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                        <div class="progress-bar progress-bar-white" style="width:45%"></div>
                                        <!-- END BOOTSTRAP PROGRESS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>



        </div>

        <div class="col-md-4 col-lg-3 col-xlg-2 ">




            <div class="row">
                <div class="col-md-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
                        <div class="container-xs-height full-height">
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="panel-heading  top-left top-right">
                                        <div class="panel-title text-black">
                                <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                                    </span>
                                        </div>
                                        <div class="panel-controls">
                                            <ul>
                                                <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="p-l-20 p-t-15">
                                        <h3 class="no-margin p-b-5 text-white">$23,000</h3>
                                        <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
                                        </a>
                                        <span class="small hint-text">65% lower than last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-bottom">
                                    <div class="progress progress-small m-b-20">
                                        <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                        <div class="progress-bar progress-bar-white" style="width:45%"></div>
                                        <!-- END BOOTSTRAP PROGRESS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <!-- START WIDGET widget_statTile-->
                    <div class="widget-10 panel no-border bg-white no-margin widget-loader-bar">
                        <div class="panel-heading top-left top-right ">
                            <div class="panel-title text-black hint-text">
                          <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                        </span>
                            </div>
                            <div class="panel-controls">
                                <ul>
                                    <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body p-t-40">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="no-margin p-b-5 text-danger semi-bold">APPL 2.032</h4>
                                    <div class="pull-left small">
                                        <span>WMHC</span>
                              <span class=" text-success font-montserrat">
                                                    <i class="fa fa-caret-up m-l-10"></i> 9%
                                                </span>
                                    </div>
                                    <div class="pull-left m-l-20 small">
                                        <span>HCRS</span>
                              <span class=" text-danger font-montserrat">
                                                    <i class="fa fa-caret-up m-l-10"></i> 21%
                                                </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="p-t-10 full-width">
                                <a href="#" class="btn-circle-arrow b-grey"><i class="pg-arrow_minimize text-danger"></i></a>
                                <span class="hint-text small">Show more</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>


        </div>

        <div class="col-md-4 col-lg-3 col-xlg-2 ">




            <div class="row">
                <div class="col-md-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
                        <div class="container-xs-height full-height">
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="panel-heading  top-left top-right">
                                        <div class="panel-title text-black">
                                <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                                    </span>
                                        </div>
                                        <div class="panel-controls">
                                            <ul>
                                                <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-top">
                                    <div class="p-l-20 p-t-15">
                                        <h3 class="no-margin p-b-5 text-white">$23,000</h3>
                                        <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
                                        </a>
                                        <span class="small hint-text">65% lower than last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xs-height">
                                <div class="col-xs-height col-bottom">
                                    <div class="progress progress-small m-b-20">
                                        <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                        <div class="progress-bar progress-bar-white" style="width:45%"></div>
                                        <!-- END BOOTSTRAP PROGRESS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- START WIDGET widget_statTile-->
                    <div class="widget-10 panel no-border bg-white no-margin widget-loader-bar">
                        <div class="panel-heading top-left top-right ">
                            <div class="panel-title text-black hint-text">
                          <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                                        </span>
                            </div>
                            <div class="panel-controls">
                                <ul>
                                    <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body p-t-40">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="no-margin p-b-5 text-danger semi-bold">APPL 2.032</h4>
                                    <div class="pull-left small">
                                        <span>WMHC</span>
                              <span class=" text-success font-montserrat">
                                                    <i class="fa fa-caret-up m-l-10"></i> 9%
                                                </span>
                                    </div>
                                    <div class="pull-left m-l-20 small">
                                        <span>HCRS</span>
                              <span class=" text-danger font-montserrat">
                                                    <i class="fa fa-caret-up m-l-10"></i> 21%
                                                </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="p-t-10 full-width">
                                <a href="#" class="btn-circle-arrow b-grey"><i class="pg-arrow_minimize text-danger"></i></a>
                                <span class="hint-text small">Show more</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>



    </div>



@endsection

@section('overlay')
@endsection

@section('quickview')
@endsection