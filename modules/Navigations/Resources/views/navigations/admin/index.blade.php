@extends('adminlte::layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ trans('themes::admin.index.title_frontend') }}</h3>
					<div class="box-tools pull-right">
						{{--<a href="{{ url('admin/users/create') }}" class="btn btn-box-tool btn-box-tool-primary">--}}
						{{--<i class="fa fa-navicon"></i> {{ trans('global.navigation') }}--}}
						{{--</a>--}}
					</div>
				</div>


			</div>
		</div>
	</div>
@endsection
