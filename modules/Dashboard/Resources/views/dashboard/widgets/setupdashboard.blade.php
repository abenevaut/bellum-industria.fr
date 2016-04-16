<div class="row">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4 style="color: #E6E6E6;">{{ trans('dashboard::setupdashboard.inactive_w_title') }}</h4>
        <div style="padding:25px;min-height: 140px;border: 2px solid #E6E6E6">
            <section class="connectedSortable ui-sortable js-inactive-list">
                @foreach ($widgets['inactive'] as $widget)
                <div class="box box-default collapsed-box ui-sortable-handle js-widget js-widget-{{ $widget['name'] }}"
                     data-id="{{ $widget['name'] }}">
                    <div class="overlay hidden">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-arrows"></i> {{ Widget::get($widget['name'], ['info'])['title'] }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="color:black;">
                        {{ trans('global.module') }} : {{ $widget['module'] }}<br/>
                        {{ trans('global.description') }} : {{ Widget::get($widget['name'], ['info'])['description'] }}
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="min-height: 80px;text-align: center;padding-top: 75px;color: #E6E6E6;">
        <i class="fa fa-arrows-h" style="font-size: 100px;"></i>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4 style="color: #E6E6E6;">{{ trans('dashboard::setupdashboard.active_w_title') }}</h4>
        <div style="padding:25px;min-height: 140px;border: 2px solid #E6E6E6">
            <section class=" connectedSortable ui-sortable js-active-list">
                @foreach ($widgets['active'] as $widget)
                <div class="box box-success collapsed-box js-widget js-widget-{{ $widget['name'] }}" data-id="{{ $widget['name'] }}">
                    <div class="overlay hidden">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-arrows"></i> {{ Widget::get($widget['name'], ['info'])['title'] }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="color:black;">
                        {{ trans('global.module') }} : {{ $widget['module'] }}<br/>
                        {{ trans('global.description') }} : {{ Widget::get($widget['name'], ['info'])['description'] }}
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </div>
</div>

@section('js')
    <script src="{{ asset('modules/dashboard/js/dashboard.settings.js') }}"></script>
@endsection