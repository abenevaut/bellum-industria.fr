@extends('adminlte::layouts.default')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			@if (count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					<p class="pull-left">
						{{ count($errors) > 1 ? trans('global.errors') : trans('global.error') }}
					</p>
					<div class="clearfix"></div>
					@foreach ($errors->all() as $error)
						<br>
						<p>{{ trans($error) }}</p>
					@endforeach
				</div>
			@endif

			<div class="box box-primary">
				{!! Form::open(array('route' => 'admin.steam.settings.store', 'class' => 'forms js-call-form_validation')) !!}
				<div class="box-header with-border">
					<h3 class="box-title">{{ trans('steam::admin.settings.title') }}</h3>
				</div>
				<div class="box-body">


							<div class="form-group form-group-default">
								<label>{{ trans('steam::admin.settings.api_key') }}</label>
								<input type="text" class="form-control" name="api_key"
									   value="{{ old('api_key', $api_key) }}">
							</div>


				</div>
				<div class="box-footer clearfix">
					<div class="pull-left">
						<a href="{{ URL::current() }}" class="btn btn-default btn-flat">
							<i class="fa fa-cancel"></i> {{ trans('global.cancel') }}
						</a>
					</div>
					<div class="pull-right">
						<button class="btn btn-primary btn-flat" type="submit">
							<i class="fa fa-pencil"></i> {{ trans('steam::admin.settings.btn.edit') }}
						</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
@endsection
