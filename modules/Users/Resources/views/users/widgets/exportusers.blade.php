{{--@if (Auth::check() && Auth::hasRole('admin'))--}}
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ trans('users::admin.export.users_list.title') }}</h3>
                <p>{!! trans('users::widgets/exportusers.title') !!}</p>
            </div>
            <div class="icon">
                <i class="fa fa-file-excel-o"></i>
            </div>
            {{--@if (Auth::check() && Auth::hasRole('admin'))--}}
            <a href="{{ url('admin/users/export') }}" class="small-box-footer">
                {!! trans('users::widgets/exportusers.link.bottom') !!} <i class="fa fa-arrow-circle-right"></i>
            </a>
            {{--@endif--}}
        </div>
    </div>
{{--@endif--}}