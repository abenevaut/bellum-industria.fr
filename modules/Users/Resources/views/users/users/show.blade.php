@extends('lumen::layouts.default')

@section('title')
	{{ $user->full_name }}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


				<div class="page-header" id="banner" style="min-height: 150px;">
					<div class="row">


						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1>My profile</h1>
							<p class="lead">
								{{ $user->full_name }}

								@if ($user->roles->count())
									<small style="font-size:12px;;">
										(<b>Roles</b>
										@foreach ($user->roles as $role) &#8226;
										<a href="javascript:void(0);" title="{!! trans($role->description) !!}"
										   data-toggle="tooltip" data-original-title="{!! trans($role->description) !!}" data-placement="bottom">
											{!! trans($role->display_name) !!}</a>@endforeach)
									</small>
								@endif
							</p>
						</div>
					</div>


				</div>








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






				<table class="table table-bordered">
					<tbody>
						<tr class="cell-center">
							<th>
								<b>Email</b>
							</th>
							<td>
								{{ $user->email }}
							</td>
						</tr>
						{{--<tr>--}}
						{{--<td>--}}
						{{--<b>API key</b>--}}
						{{--</td>--}}
						{{--<td>--}}
						{{--{{ !is_null($user->apikey) ? $user->apikey->key : trans('users::admin.show.message.no_apikey') }}--}}
						{{--<div class="pull-right">--}}
						{{--<button class="btn btn-flat btn-xs"><i class="fa fa-eye"></i> show</button>--}}
						{{--<button class="btn btn-flat btn-xs"><i class="fa fa-refresh"></i> regenerate</button>--}}
						{{--</div>--}}
						{{--</td>--}}
						{{--</tr>--}}
					</tbody>
				</table>

				@if ($user->addresses->count())
					<table class="table table-bordered">
						<tbody>
							<tr class="cell-center">
								<th colspan="2">
									<b>Addresses</b>
								</th>
							</tr>
							@foreach ($user->addresses as $addresse)
								<tr class="cell-center">
									<td class="cell-center" width="15%">
										@if ($addresse->is_primary)
											Primary<br/>address
										@elseif ($addresse->is_billing)
											Billing<br/>address
										@elseif ($addresse->is_shipping)
											Shipping<br/>address
										@endif
									</td>
									<td>
										{!! trans($addresse->organization) !!}
										<br/>
										{!! trans($addresse->street) !!}
										{!! trans($addresse->street_extra) !!}
										<br/>
										{!! trans($addresse->city) !!}
										{{--{!! trans($addresse->state_a2) !!}--}}
										{!! trans($addresse->state_name) !!}
										{!! trans($addresse->zip) !!}<br/>
										{{--{!! trans($addresse->country_a2) !!}--}}
										{!! trans($addresse->country_name) !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif

				<div class="pull-right">

					<a href="{{ url('users/edit-my-password') }}" class="btn btn-primary">
						Change password
					</a>

					<a href="{{ url('users/edit-my-profile') }}" class="btn btn-primary">
						{{ trans('global.edit') }}
					</a>

				</div>


			</div>



		</div>
	</div>
@endsection
