@extends('adminlte::layouts.default')

@section('content')
    <div class="row">
        @if (count($widgets))
            @foreach ($widgets as $widget)
                {!! Widget::get($widget['name']) !!}
            @endforeach
        @else
            <div class="col-lg-12">
                <div class="callout callout-info">
                    <div class="pull-right">
                        <a href="#" data-toggle="control-sidebar" class="btn btn-info"><i class="fa fa-gears"></i></a>
                    </div>
                    <h4>{{ trans('dashboard::admin.dashboard.nodata_title') }}</h4>
                    <p>{{ trans('dashboard::admin.dashboard.nodata_title') }}</p>
                </div>
            </div>
        @endif
    </div>
@endsection
