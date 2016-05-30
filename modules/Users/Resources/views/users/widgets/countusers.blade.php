{{--@if (Auth::check() && Auth::hasRole('admin'))--}}
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $nb_users }}</h3>
                <p>{{ trans('users::admin.index.total_users') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            {{--@if (Auth::check() && Auth::hasRole('admin'))--}}
            <a href="{{ url('admin/users') }}" class="small-box-footer">
                {!! trans('users::widgets/countusers.link.bottom') !!} <i class="fa fa-arrow-circle-right"></i>
            </a>
            {{--@endif--}}
        </div>
    </div>
{{--@endif--}}