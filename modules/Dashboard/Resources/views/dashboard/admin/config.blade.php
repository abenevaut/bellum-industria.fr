@extends('admin.layouts.default')

@section('content')


    <div class="row">

        <div class="col-lg-12">
            <div class="small-box" style="background-color: white;">

                <div class="" style="padding: 5px; ">

                    <a href="{{ url('admin/dashboard') }}" class="btn btn-default btn-flat">
                        <i class="fa fa-chevron-left"></i> Back
                    </a>
                </div>

            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-lg-5">


            <h4>Inactive widgets</h4>

            <div style="padding:25px;min-height: 140px;background-color: #E6E6E6">


                <!-- Left col -->
                <section class="connectedSortable ui-sortable js-inactive-list">
                    @foreach ($widgets['inactive'] as $widget)

                        <div class="box box-default collapsed-box ui-sortable-handle js-widget"
                             data-id="{{ $widget->id }}">

                            <div class="overlay hidden">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>

                            <div class="box-header with-border">
                                <h3 class="box-title">{{ $widget->name }}</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                Module : {{ $widget->module }}
                            </div>
                            <!-- /.box-body -->
                        </div>

                    @endforeach
                </section>

            </div>


        </div>
        <!-- /.Left col -->

        <section class="col-lg-2" style="min-height: 80px;text-align: center;padding-top: 75px;">

            <i class="fa fa-arrows-h" style="font-size: 100px;"></i>

        </section>

        <div class="col-lg-5">

            <h4>Active widgets</h4>

            <div style="padding:25px;min-height: 140px;background-color: #E6E6E6">

                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class=" connectedSortable ui-sortable js-active-list">
                    @foreach ($widgets['active'] as $widget)

                        <div class="box box-success collapsed-box js-widget" data-id="{{ $widget->id }}">

                            <div class="overlay hidden">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>

                            <div class="box-header with-border">
                                <h3 class="box-title">{{ Widget::get($widget->name, ['info'])['title'] }}</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                Module : {{ $widget->module }}<br/>
                                Description : {{ Widget::get($widget->name, ['info'])['description'] }}
                            </div>
                            <!-- /.box-body -->
                        </div>

                    @endforeach
                </section>
                <!-- right col -->

            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $(function () {
            "use strict";

            function connectedSortableNoDataMessage() {
                $.each($('.connectedSortable'), function (k, elem) {
                    elem = $(elem);
                    if (elem.children().length == 0) {
                        elem.html(
                                '<div class="alert alert-info alert-dismissible no-data">'
                                + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                                + '<h4><i class="icon fa fa-info"></i> No element in this column</h4>'
                                + '</div>'
                        );
                    }
                    else {
                        elem.find('.no-data').remove();
                    }
                });
            }

            $(".connectedSortable").sortable({
                placeholder: "sort-highlight",
                connectWith: ".connectedSortable",
                handle: ".box-header",
                forcePlaceholderSize: true,
                zIndex: 999999,
                receive: function (event, ui) {

                    //var $thisSortable = $(this);
                    var $targetList = $(event.target);
                    var $tagetElement = $(event.toElement.offsetParent);

                    // Fix the drag&drop cursor position
                    if (!$tagetElement.hasClass('box')) {
                        $tagetElement = $tagetElement.closest('.box');
                    }

                    var widgetID = $tagetElement.attr('data-id');

                    if ($targetList.hasClass('js-active-list')) {

                        $tagetElement
                                .find('.overlay')
                                .removeClass('hidden');

                        setTimeout(function () {

                            $.ajax({
                                type: "PUT",
                                url: '{{ url('admin/dashboard/update') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id: widgetID,
                                    type: 'active'
                                },
                                success: function (code_html, statut) {
                                    $tagetElement
                                            .addClass('box-success')
                                            .removeClass('box-default')
                                            .find('.overlay')
                                            .addClass('hidden');

                                    console.log(code_html);
                                    console.log(statut);
                                },
                                error: function (resultat, statut, erreur) {

                                    console.log(resultat);
                                    console.log(statut);
                                    console.log(erreur);

                                },
                                complete: function (jqXHR, status) {
                                    connectedSortableNoDataMessage();
                                },
                                statusCode: {
                                    422: function () {
                                        //$thisSortable.sortable('cancel');
                                    }
                                }
                            });
                        }, 300);
                    }
                    else if ($targetList.hasClass('js-inactive-list')) {

                        $tagetElement
                                .find('.overlay')
                                .removeClass('hidden');

                        setTimeout(function () {

                            $.ajax({
                                type: "PUT",
                                url: '{{ url('admin/dashboard/update') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id: widgetID,
                                    type: 'inactive'
                                },
                                success: function (code_html, statut) {
                                    $tagetElement
                                            .addClass('box-default')
                                            .removeClass('box-success')
                                            .find('.overlay')
                                            .addClass('hidden');

                                    console.log(code_html);
                                    console.log(statut);
                                },
                                error: function (resultat, statut, erreur) {

                                    console.log(resultat);
                                    console.log(statut);
                                    console.log(erreur);

                                },
                                complete: function (jqXHR, status) {
                                    connectedSortableNoDataMessage();
                                },
                                statusCode: {
                                    422: function () {
                                        //$thisSortable.sortable('cancel');

                                        console.log('hik');
                                    }
                                }
                            });

                        }, 300);
                    }
                }
            });

            $(".connectedSortable .box-header").css("cursor", "move");

            connectedSortableNoDataMessage();
        });
    </script>
@endsection