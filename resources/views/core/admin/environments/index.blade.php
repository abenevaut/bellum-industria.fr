@extends('adminlte::layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-12">

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

			{!! Form::open(array('route' => 'admin.settings.store', 'class' => 'forms js-call-form_validation')) !!}
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#control-sidebar-settings-tab" data-toggle="tab">
							<i class="fa fa-gear"></i> {{ trans('global.general') }}
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-content">
						<div class="tab-pane active" id="control-sidebar-settings-tab">

							envs

						</div>
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
							<i class="fa fa-pencil"></i> {{ trans('settings.btn.edit') }}
						</button>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
