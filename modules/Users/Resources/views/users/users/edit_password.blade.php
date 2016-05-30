@extends('lumen::layouts.default')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">


				<div class="page-header" id="banner" style="min-height: 150px;">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1 class="box-title">{{ trans('users::admin.edit.title') }}</h1>
							<p class="lead">{{ $user->full_name }}

								@if ($user->roles->count())
									<small style="font-size:12px;;">
										(<b>Roles</b>
										@foreach ($user->roles as $role) &#8226;
										<a href="javascript:void(0);" title="{!! trans($role->description) !!}"
										   data-toggle="tooltip" data-original-title="{!! trans($role->description) !!}" data-placement="bottom">
											{!! trans($role->display_name) !!}</a>@endforeach)
									</small>
								@endif</p>
						</div>
					</div>
				</div>

				{!! Form::open(array('route' => ['users.update-my-password'], 'class' => 'forms js-call-form_validation well', 'method' => 'PUT')) !!}
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


				<div class="form-group form-group-default">
					<label>{{ trans('users::password.old_password') }}</label>
					<input type="password" class="form-control" name="old_password" required="required"
						   value="" placeholder="{{ trans('users::password.old_password') }}">
				</div>

				<hr>

				<div class="form-group form-group-default">
					<label>{{ trans('users::password.new_password') }}</label>
					<input type="password" class="form-control" name="password" required="required"
						   value="" placeholder="{{ trans('users::password.new_password') }}">
				</div>


				<div class="form-group form-group-default">
					<label>{{ trans('users::password.new_password_confirmation') }}</label>
					<input type="password" class="form-control" name="password_confirmation" required="required"
						   value="" placeholder="{{ trans('users::password.new_password_confirmation') }}">


				</div>

				<hr>

				<div class="clearfix">
					<div class="pull-left">
						<a href="{{ URL::previous() }}" class="btn btn-default">
							<i class="fa fa-caret-left"></i> {{ trans('global.back') }}
						</a>
					</div>
					<div class="pull-right">
						<button class="btn btn-primary" type="submit">
							<i class="fa fa-pencil"></i> {{ trans('users::admin.edit.btn.edit_user') }}
						</button>
					</div>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
