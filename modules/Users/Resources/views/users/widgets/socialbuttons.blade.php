<div id="social_buttons" class="grid-stack-item" data-gs-width="3" data-gs-height="3" data-gs-auto-position>

	<div class="grid-stack-item-content panel panel-default">

		<div class="panel-heading">Link your social accounts</div>

		<div class="panel-body">
			@if (!empty($social_login))
				<div class="social-auth-links text-center">

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