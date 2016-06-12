@extends('lumen::layouts.default')

@section('title')
	{{ $user->full_name }}
@endsection

@section('head')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.css"/>
@endsection

@section('js')
	<script type="text/javascript" src='//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js'></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src='//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.js'></script>
	<script type="text/javascript">
		$(function () {
			var options = {
				vertical_margin: 10
			};
			$('.grid-stack').gridstack(options);

			var serializeWidgetMap = function (items) {
				console.log(items);
			};

			$('.grid-stack').on('change', function (event, items) {
				serializeWidgetMap(items);
			});

		});
	</script>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header" id="banner" style="min-height: 150px;">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1>{{ $user->full_name }}</h1>
							<div class="pull-right">
								<a href="{{ url('users/edit-my-password') }}" class="btn btn-primary">
									Change password
								</a>
								<a href="{{ url('users/edit-my-profile') }}" class="btn btn-primary">
									{{ trans('global.edit') }}
								</a>
							</div>
							<p class="lead">
								@if ($user->roles->count())
									<small style="font-size:12px;;">
										<b>Roles</b>
										@foreach ($user->roles as $role) &#8226;
										<a href="javascript:void(0);" title="{!! trans($role->description) !!}"
										   data-toggle="tooltip" data-original-title="{!! trans($role->description) !!}" data-placement="bottom">
											{!! trans($role->display_name) !!}</a>@endforeach
									</small>
								@endif
							</p>
						</div>
					</div>
				</div>

				<div class="grid-stack" data-gs-width="12">
					@if (count($widgets))
						@foreach ($widgets as $widget)
							{!! Widget::get($widget['name'], $widget) !!}
						@endforeach
					@else
						<div class="col-lg-12">
							<div class="callout callout-info">
								<h4>{{ trans('dashboard::admin.dashboard.nodata_title') }}</h4>
								<p>{{ trans('dashboard::admin.dashboard.nodata_description') }}</p>
							</div>
						</div>
					@endif
				</div>

			</div>
		</div>
	</div>
@endsection
