@extends('adminlte::layouts.auth')

@section('content')
	<p class="login-box-msg">{{ trans('adminlte::adminlte.auth_introduction') }}</p>
	<form action="{{ url('admin/login') }}" method="post">
		{!! csrf_field() !!}
		<div class="form-group has-feedback">
			<input type="email" class="form-control" name="email" value="{{ old('email') }}"
				   placeholder="{{ trans('adminlte::adminlte.auth_placeholder_email') }}">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
				<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
			@endif
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" name="password"
				   placeholder="{{ trans('adminlte::adminlte.auth_placeholder_password') }}">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
				<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
			@endif
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
						<input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.auth_label_rememberme') }}
					</label>
				</div>
			</div>
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">
					{{ trans('adminlte::adminlte.auth_btn_login') }}
				</button>
			</div>
		</div>
	</form>
@endsection

@section('social')
	@if (!empty($social_login))
	<div class="social-auth-links text-center">

		<p>- OR -</p>

		@if (in_array('bitbucket', $social_login))
		<a href="{{ url('login/bitbucket') }}" class="btn btn-block btn-social btn-bitbucket">
			<span class="fa fa-bitbucket"></span> Sign in using Bitbucket
		</a>
		@endif

		@if (in_array('facebook', $social_login))
		<a href="{{ url('login/facebook') }}" class="btn btn-block btn-social btn-facebook">
			<span class="fa fa-facebook"></span> Sign in using Facebook
		</a>
		@endif

		@if (in_array('github', $social_login))
		<a href="{{ url('login/github') }}" class="btn btn-block btn-social btn-github">
			<span class="fa fa-github"></span> Sign in using Github
		</a>
		@endif

		@if (in_array('google', $social_login))
		<a href="{{ url('login/google') }}" class="btn btn-block btn-social btn-google">
			<span class="fa fa-google-plus"></span> Sign in using Google+
		</a>
		@endif

		@if (in_array('linkedin', $social_login))
		<a href="{{ url('login/linkedin') }}" class="btn btn-block btn-social btn-linkedin">
			<span class="fa fa-linkedin"></span> Sign in using Linkedin
		</a>
		@endif

		@if (in_array('twitter', $social_login))
		<a href="{{ url('login/twitter') }}" class="btn btn-block btn-social btn-twitter">
			<span class="fa fa-twitter"></span> Sign in using Twitter
		</a>
		@endif

		@if (\CVEPDB\Settings\Facades\Settings::get('steam.login'))
		<a href="{{ url('steam/login') }}" class="btn btn-block btn-social btn-steam">
			<span class="fa fa-steam"></span> Sign in using Steam
		</a>
		@endif

	</div>
	@endif
@endsection

@section('help')
	<a href="{{ url('password/reset') }}">I forgot my password</a><br>
	<a href="{{ url('register') }}" class="text-center">Register a new
		membership</a>
@endsection
