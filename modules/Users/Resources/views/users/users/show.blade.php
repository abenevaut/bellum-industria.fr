@extends('lumen::layouts.default')

@section('title')
	{{ $user->full_name }}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">


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

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">




				@if (!empty($social_login))
				<div class="social-auth-links text-center">

					<hr class="hidden-md hidden-lg">

					<h2>Link your social accounts</h2>

					<hr>

					@if (in_array('bitbucket', $social_login))
						<a href="{{ url('login/bitbucket') }}"
						   class="btn btn-primary btn-social btn-bitbucket
						   	@if (Auth::user()->tokens->where('provider', 'bitbucket')->count())
								   disabled
						    @endif">
							<i class="fa fa-bitbucket"></i>
							| {{ trans('flatly::login.signin_bitbucket') }}
						</a>
					@endif

					@if (in_array('facebook', $social_login))
						<a href="{{ url('login/facebook') }}" class="btn btn-primary btn-social btn-facebook
						   	@if (Auth::user()->tokens->where('provider', 'facebook')->count())
								disabled
						 @endif">
							<i class="fa fa-facebook"></i>
							| {{ trans('flatly::login.signin_facebook') }}
						</a>
					@endif

					@if (in_array('github', $social_login))
						<a href="{{ url('login/github') }}" class="btn btn-primary btn-social btn-github
						   	@if (Auth::user()->tokens->where('provider', 'github')->count())
								disabled
						 @endif">
							<i class="fa fa-github"></i>
							| {{ trans('flatly::login.signin_github') }}
						</a>
					@endif

					@if (in_array('google', $social_login))
						<a href="{{ url('login/google') }}" class="btn btn-primary btn-social btn-google
						   	@if (Auth::user()->tokens->where('provider', 'google')->count())
								disabled
						 @endif">
							<i class="fa fa-google-plus"></i>
							| {{ trans('flatly::login.signin_google_plus') }}
						</a>
					@endif

					@if (in_array('linkedin', $social_login))
						<a href="{{ url('login/linkedin') }}" class="btn btn-primary btn-social btn-linkedin
						   	@if (Auth::user()->tokens->where('provider', 'linkedin')->count())
								disabled
						 @endif">
							<i class="fa fa-linkedin"></i>
							| {{ trans('flatly::login.signin_linkedin') }}
						</a>
					@endif

					@if (in_array('twitter', $social_login))
						<a href="{{ url('login/twitter') }}" class="btn btn-primary btn-social btn-twitter
						   	@if (Auth::user()->tokens->where('provider', 'twitter')->count())
								disabled
						 @endif">
							<i class="fa fa-twitter"></i>
							| {{ trans('flatly::login.signin_twitter') }}
						</a>
					@endif

					@if (\CVEPDB\Settings\Facades\Settings::get('steam.login'))
						<a href="{{ url('steam/login') }}" class="btn btn-primary btn-social btn-steam
						   	@if (Auth::user()->tokens->where('provider', 'steam')->count())
								disabled
						 @endif">
							<i class="fa fa-steam"></i>
							| {{ trans('flatly::login.signin_steam') }}
						</a>
					@endif

				</div>
				@endif

			</div>

		</div>
	</div>
@endsection
