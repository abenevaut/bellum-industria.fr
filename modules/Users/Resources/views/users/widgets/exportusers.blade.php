<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3>{{ trans('users::admin.export.users_list.title') }}</h3>
            <p>All your users exported as a Excel file</p>
        </div>
        <div class="icon">
            <i class="fa fa-file-excel-o"></i>
        </div>
        {{--@if (Auth::check() && Auth::hasRole('admin'))--}}
        <a href="{{ url('admin/users/export') }}" class="small-box-footer">Export now <i class="fa fa-arrow-circle-right"></i></a>
        {{--@endif--}}
    </div>
</div>