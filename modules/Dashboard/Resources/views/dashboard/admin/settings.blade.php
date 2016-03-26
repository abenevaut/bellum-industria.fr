@extends('adminlte::layouts.default')

@section('js')
    <script src="{{ asset('modules/dashboard/js/dashboard.settings.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <h4>Inactive widgets</h4>
            <div style="padding:25px;min-height: 140px;background-color: #E6E6E6">
                <section class="connectedSortable ui-sortable js-inactive-list">
                    @foreach ($widgets['inactive'] as $widget)
                        <div class="box box-default collapsed-box ui-sortable-handle js-widget js-widget-{{ $widget->id }}"
                             data-id="{{ $widget->id }}">
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
                            </div>
                            <div class="box-body">
                                Module : {{ $widget->module }}<br/>
                                Description : {{ Widget::get($widget->name, ['info'])['description'] }}
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="min-height: 80px;text-align: center;padding-top: 75px;">
            <i class="fa fa-arrows-h" style="font-size: 100px;"></i>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <h4>Active widgets</h4>
            <div style="padding:25px;min-height: 140px;background-color: #E6E6E6">
                <section class=" connectedSortable ui-sortable js-active-list">
                    @foreach ($widgets['active'] as $widget)
                        <div class="box box-success collapsed-box js-widget js-widget-{{ $widget->id }}" data-id="{{ $widget->id }}">
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
                            </div>
                            <div class="box-body">
                                Module : {{ $widget->module }}<br/>
                                Description : {{ Widget::get($widget->name, ['info'])['description'] }}
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
@endsection
