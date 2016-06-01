@extends('adminlte::layouts.default')

@section('head')
	<script>
		cvepdb_config.libraries.push(
				{
					script: {
						CVEPDB_FORM_VALIDATION_LOADED: (cvepdb_config.url_theme + cvepdb_config.script_path + 'scripts/form_validation.js')
					},
					trigger: '.js-call-form_validation',
					mobile: true,
					browser: true
				}
		);
	</script>
@endsection

@section('js')
	<script src="{{ asset('modules/users/js/admin.roles.form.js') }}"></script>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<a href="{{ url('admin/roles') }}" class="btn btn-default btn-flat btn-xs">
						<i class="fa fa-caret-left"></i> {{ trans('global.back') }}
					</a>
					<h3 class="box-title">{{ trans('users::roles.create.title') }}</h3>
				</div>
				{!! Form::open(array('route' => 'admin.roles.store', 'class' => 'forms js-call-form_validation')) !!}
				<div class="box-body">
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
						<label>{{ trans('global.name') }}</label>
						<input type="text" class="form-control" name="display_name" required="required"
							   value="{{ old('display_name') }}" placeholder="{{ trans('global.name') }}">
						<input type="hidden" class="form-control" name="name" value="{{ old('name') }}">
					</div>

					@if ($user_can_see_env)
						<div class="form-group form-group-default">
							<label>{{ trans('global.environment_s') }}</label>
							{!! Widget::environments_fields('environments[]', ['all' => true, 'default' => true, 'value' => '', 'placeholder' => trans('global.environment_s'), 'class' => 'form-control']) !!}
						</div>
					@endif

					<div class="form-group form-group-default">
						<label>{{ trans('users::roles.create.description') }}</label>
                        <textarea id="description" class="js-call-tinymce" name="description"
								  placeholder="{{ trans('users::roles.description') }}">
                            {{ old('description') }}
                        </textarea>
					</div>

					<div class="form-group form-group-default">
						<label>Permissions</label>
						<br>
						@if ($permissions->count())
							@foreach ($permissions as $permission)
								<div class="box box-widget collapsed-box">
									<div class="box-header with-border">
										<div class="user-block">

											<button type="button" class="btn btn-box-tool" data-widget="collapse">
												<i class="fa fa-plus"></i>
											</button>

											<span class="username">{!! trans($permission->display_name) !!}</span>
										</div>
										<div class="box-tools">
											<div class="material-switch pull-right" style="padding-top: 10px;">
												<input type="checkbox" name="role_permission_id[]" id="someSwitchOptionDefault{{ $permission->id }}"
													   data-init-plugin="switchery" value="{{ $permission->id }}"/>
												<label for="someSwitchOptionDefault{{ $permission->id }}" class="label-success"></label>
											</div>
										</div>
									</div>
									<div class="box-body">
										{!! trans($permission->description) !!}
									</div>
								</div>
							@endforeach
						@else
							<div class="alert alert-info" role="alert">
								Il n'y a aucune permission
							</div>
						@endif
					</div>


				</div>
				<div class="box-footer clearfix">
					<div class="pull-left">
						<a href="{{ url('admin/roles') }}" class="btn btn-default btn-flat">
							<i class="fa fa-caret-left"></i> {{ trans('global.back') }}
						</a>
					</div>
					<div class="pull-right">
						<button class="btn btn-primary btn-flat" type="submit">
							<i class="fa fa-plus"></i> {{ trans('users::roles.create.btn.add_role') }}
						</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection