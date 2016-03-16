@extends('admin.layouts.default')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="small-box" style="background-color: white;">

                <div class="" style="padding: 5px; ">

                    <a href="{{ url('admin/dashboard/create') }}" class="btn btn-default btn-flat">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                </div>

            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>























    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable ui-sortable">


            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>

                    <h3 class="box-title">To Do List</h3>

                    <div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list ui-sortable">
                        <li>
                            <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Design a nice theme</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Make the theme responsive</span>
                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Check your messages and notifications</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Let theme shine like a star</span>
                            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item
                    </button>
                </div>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable ui-sortable">


            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-calendar"></i>

                    <h3 class="box-title">Calendar</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Add new event</a></li>
                                <li><a href="#">Clear events</a></li>
                                <li class="divider"></li>
                                <li><a href="#">View calendar</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i
                                    class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%">
                        <div class="datepicker datepicker-inline">
                            <div class="datepicker-days" style="display: block;">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th class="prev" style="visibility: visible;">«</th>
                                        <th colspan="5" class="datepicker-switch">March 2016</th>
                                        <th class="next" style="visibility: visible;">»</th>
                                    </tr>
                                    <tr>
                                        <th class="dow">Su</th>
                                        <th class="dow">Mo</th>
                                        <th class="dow">Tu</th>
                                        <th class="dow">We</th>
                                        <th class="dow">Th</th>
                                        <th class="dow">Fr</th>
                                        <th class="dow">Sa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="old day">28</td>
                                        <td class="old day">29</td>
                                        <td class="day">1</td>
                                        <td class="day">2</td>
                                        <td class="day">3</td>
                                        <td class="day">4</td>
                                        <td class="day">5</td>
                                    </tr>
                                    <tr>
                                        <td class="day">6</td>
                                        <td class="day">7</td>
                                        <td class="day">8</td>
                                        <td class="day">9</td>
                                        <td class="day">10</td>
                                        <td class="day">11</td>
                                        <td class="day">12</td>
                                    </tr>
                                    <tr>
                                        <td class="day">13</td>
                                        <td class="day">14</td>
                                        <td class="day">15</td>
                                        <td class="day">16</td>
                                        <td class="day">17</td>
                                        <td class="day">18</td>
                                        <td class="day">19</td>
                                    </tr>
                                    <tr>
                                        <td class="day">20</td>
                                        <td class="day">21</td>
                                        <td class="day">22</td>
                                        <td class="day">23</td>
                                        <td class="day">24</td>
                                        <td class="day">25</td>
                                        <td class="day">26</td>
                                    </tr>
                                    <tr>
                                        <td class="day">27</td>
                                        <td class="day">28</td>
                                        <td class="day">29</td>
                                        <td class="day">30</td>
                                        <td class="day">31</td>
                                        <td class="new day">1</td>
                                        <td class="new day">2</td>
                                    </tr>
                                    <tr>
                                        <td class="new day">3</td>
                                        <td class="new day">4</td>
                                        <td class="new day">5</td>
                                        <td class="new day">6</td>
                                        <td class="new day">7</td>
                                        <td class="new day">8</td>
                                        <td class="new day">9</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="7" class="today" style="display: none;">Today</th>
                                    </tr>
                                    <tr>
                                        <th colspan="7" class="clear" style="display: none;">Clear</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="datepicker-months" style="display: none;">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th class="prev" style="visibility: visible;">«</th>
                                        <th colspan="5" class="datepicker-switch">2016</th>
                                        <th class="next" style="visibility: visible;">»</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="7"><span class="month">Jan</span><span
                                                    class="month">Feb</span><span class="month">Mar</span><span
                                                    class="month">Apr</span><span class="month">May</span><span
                                                    class="month">Jun</span><span class="month">Jul</span><span
                                                    class="month">Aug</span><span class="month">Sep</span><span
                                                    class="month">Oct</span><span class="month">Nov</span><span
                                                    class="month">Dec</span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="7" class="today" style="display: none;">Today</th>
                                    </tr>
                                    <tr>
                                        <th colspan="7" class="clear" style="display: none;">Clear</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="datepicker-years" style="display: none;">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th class="prev" style="visibility: visible;">«</th>
                                        <th colspan="5" class="datepicker-switch">2010-2019</th>
                                        <th class="next" style="visibility: visible;">»</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span
                                                    class="year">2011</span><span class="year">2012</span><span
                                                    class="year">2013</span><span class="year">2014</span><span
                                                    class="year">2015</span><span class="year">2016</span><span
                                                    class="year">2017</span><span class="year">2018</span><span
                                                    class="year">2019</span><span class="year new">2020</span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="7" class="today" style="display: none;">Today</th>
                                    </tr>
                                    <tr>
                                        <th colspan="7" class="clear" style="display: none;">Clear</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-black">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Progress bars -->
                            <div class="clearfix">
                                <span class="pull-left">Task #1</span>
                                <small class="pull-right">90%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                            </div>

                            <div class="clearfix">
                                <span class="pull-left">Task #2</span>
                                <small class="pull-right">70%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <div class="clearfix">
                                <span class="pull-left">Task #3</span>
                                <small class="pull-right">60%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                            </div>

                            <div class="clearfix">
                                <span class="pull-left">Task #4</span>
                                <small class="pull-right">40%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.box -->


        </section>
        <!-- right col -->
    </div>
@endsection

@section('js')
    <script>
        /*
         * Author: Abdullah A Almsaeed
         * Date: 4 Jan 2014
         * Description:
         *      This is a demo file used only for the main dashboard (index.html)
         **/

        $(function () {

            "use strict";

            //Make the dashboard widgets sortable Using jquery UI
            $(".connectedSortable").sortable({
                placeholder: "sort-highlight",
                connectWith: ".connectedSortable",
                handle: ".box-header, .nav-tabs",
                forcePlaceholderSize: true,
                zIndex: 999999
            });
            $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

            //jQuery UI sortable for the todo list
            $(".todo-list").sortable({
                placeholder: "sort-highlight",
                handle: ".handle",
                forcePlaceholderSize: true,
                zIndex: 999999
            });

            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();

            $('.daterange').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            }, function (start, end) {
                window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            /* jQueryKnob */
            $(".knob").knob();

            //jvectormap data
            var visitorsData = {
                "US": 398, //USA
                "SA": 400, //Saudi Arabia
                "CA": 1000, //Canada
                "DE": 500, //Germany
                "FR": 760, //France
                "CN": 300, //China
                "AU": 700, //Australia
                "BR": 600, //Brazil
                "IN": 800, //India
                "GB": 320, //Great Britain
                "RU": 3000 //Russia
            };
            //World map by jvectormap
            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 1,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 1
                    }
                },
                series: {
                    regions: [{
                        values: visitorsData,
                        scale: ["#92c1dc", "#ebf4f9"],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionLabelShow: function (e, el, code) {
                    if (typeof visitorsData[code] != "undefined")
                        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
                }
            });

            //Sparkline charts
            var myvalues = [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021];
            $('#sparkline-1').sparkline(myvalues, {
                type: 'line',
                lineColor: '#92c1dc',
                fillColor: "#ebf4f9",
                height: '50',
                width: '80'
            });
            myvalues = [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921];
            $('#sparkline-2').sparkline(myvalues, {
                type: 'line',
                lineColor: '#92c1dc',
                fillColor: "#ebf4f9",
                height: '50',
                width: '80'
            });
            myvalues = [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21];
            $('#sparkline-3').sparkline(myvalues, {
                type: 'line',
                lineColor: '#92c1dc',
                fillColor: "#ebf4f9",
                height: '50',
                width: '80'
            });

            //The Calender
            $("#calendar").datepicker();

            //SLIMSCROLL FOR CHAT WIDGET
            $('#chat-box').slimScroll({
                height: '250px'
            });

            /* Morris.js Charts */
            // Sales chart
            var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: [
                    {y: '2011 Q1', item1: 2666, item2: 2666},
                    {y: '2011 Q2', item1: 2778, item2: 2294},
                    {y: '2011 Q3', item1: 4912, item2: 1969},
                    {y: '2011 Q4', item1: 3767, item2: 3597},
                    {y: '2012 Q1', item1: 6810, item2: 1914},
                    {y: '2012 Q2', item1: 5670, item2: 4293},
                    {y: '2012 Q3', item1: 4820, item2: 3795},
                    {y: '2012 Q4', item1: 15073, item2: 5967},
                    {y: '2013 Q1', item1: 10687, item2: 4460},
                    {y: '2013 Q2', item1: 8432, item2: 5713}
                ],
                xkey: 'y',
                ykeys: ['item1', 'item2'],
                labels: ['Item 1', 'Item 2'],
                lineColors: ['#a0d0e0', '#3c8dbc'],
                hideHover: 'auto'
            });
            var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: [
                    {y: '2011 Q1', item1: 2666},
                    {y: '2011 Q2', item1: 2778},
                    {y: '2011 Q3', item1: 4912},
                    {y: '2011 Q4', item1: 3767},
                    {y: '2012 Q1', item1: 6810},
                    {y: '2012 Q2', item1: 5670},
                    {y: '2012 Q3', item1: 4820},
                    {y: '2012 Q4', item1: 15073},
                    {y: '2013 Q1', item1: 10687},
                    {y: '2013 Q2', item1: 8432}
                ],
                xkey: 'y',
                ykeys: ['item1'],
                labels: ['Item 1'],
                lineColors: ['#efefef'],
                lineWidth: 2,
                hideHover: 'auto',
                gridTextColor: "#fff",
                gridStrokeWidth: 0.4,
                pointSize: 4,
                pointStrokeColors: ["#efefef"],
                gridLineColor: "#efefef",
                gridTextFamily: "Open Sans",
                gridTextSize: 10
            });

            //Donut Chart
            var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [
                    {label: "Download Sales", value: 12},
                    {label: "In-Store Sales", value: 30},
                    {label: "Mail-Order Sales", value: 20}
                ],
                hideHover: 'auto'
            });

            //Fix for charts under tabs
            $('.box ul.nav a').on('shown.bs.tab', function () {
                area.redraw();
                donut.redraw();
                line.redraw();
            });

            /* The todo list plugin */
            $(".todo-list").todolist({
                onCheck: function (ele) {
                    window.console.log("The element has been checked");
                    return ele;
                },
                onUncheck: function (ele) {
                    window.console.log("The element has been unchecked");
                    return ele;
                }
            });

        });
    </script>
@endsection