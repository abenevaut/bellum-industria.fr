@if (Session::has('alert-success'))
	<div class="alert alert-success alert-dismissible" style="margin-top:5px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> {!! trans('alerts.success_title') !!}</h4>
		{!! trans(Session::get('alert-success')) !!}
	</div>
@endif

@if (Session::has('alert-error'))
	<div class="alert alert-danger alert-dismissible" style="margin-top:5px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-warning"></i> {!! trans('alerts.error_title') !!}</h4>
		{!! trans(Session::get('alert-error')) !!}
	</div>
@endif

@if (Session::has('alert-warning'))
	<div class="alert alert-warning alert-dismissible" style="margin-top:5px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-warning"></i> {!! trans('alerts.warning_title') !!}</h4>
		{!! trans(Session::get('alert-warning')) !!}
	</div>
@endif
