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

			{!! Form::open(array('route' => 'backend.settings.store', 'class' => 'forms js-call-form_validation')) !!}
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#control-sidebar-settings-tab" data-toggle="tab">
							<i class="fa fa-gear"></i> {{ trans('global.general') }}
						</a>
					</li>
					<li>
						<a href="#control-sidebar-mails-tab" data-toggle="tab">
							<i class="fa fa-envelope"></i> {{ trans('global.mails') }}
						</a>
					</li>
					<li>
						<a href="#control-sidebar-socials-tab" data-toggle="tab">
							<i class="fa fa-share-square-o"></i> {{ trans('settings.socials') }}
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-content">
						<div class="tab-pane active" id="control-sidebar-settings-tab">
							@include('core.admin.settings.chunks.general')
						</div>
						<div class="tab-pane" id="control-sidebar-mails-tab">
							@include('core.admin.settings.chunks.mails')
						</div>
						<div class="tab-pane" id="control-sidebar-socials-tab">
							@include('core.admin.settings.chunks.socials')
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
