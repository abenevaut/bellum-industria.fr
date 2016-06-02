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
				},
				{
					script: {
						CVEPDB_SELECT2: (cvepdb_config.url_theme + cvepdb_config.script_path + 'scripts/select2.js')
					},
					trigger: '.js-call-select2',
					mobile: true,
					browser: true
				}
		);
	</script>
@endsection

@section('js')
	<script src="{{ asset('modules/users/js/admin.users.form.js') }}"></script>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<a href="{{ url('admin/users') }}" class="btn btn-default btn-flat btn-xs">
						<i class="fa fa-caret-left"></i> {{ trans('global.back') }}
					</a>
					<h3 class="box-title">{{ trans('users::admin.edit.title') }}</h3>
				</div>
				{!! Form::open(array('route' => ['admin.users.update', $user->id], 'class' => 'forms js-call-form_validation', 'method' => 'PUT')) !!}
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
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1" data-toggle="tab" aria-expanded="false">General</a>
							</li>
							<li class="">
								<a href="#tab_2" data-toggle="tab" aria-expanded="false">Addresses</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="form-group form-group-default">
									<label>{{ trans('global.last_name') }}</label>
									<input type="text" class="form-control" name="last_name" required="required"
										   value="{{ old('last_name', $user->last_name) }}"
										   placeholder="{{ trans('global.last_name') }}">
								</div>
								<div class="form-group form-group-default">
									<label>{{ trans('global.first_name') }}</label>
									<input type="text" class="form-control" name="first_name" required="required"
										   value="{{ old('first_name', $user->first_name) }}"
										   placeholder="{{ trans('global.first_name') }}">
								</div>
								<div class="form-group form-group-default">
									<label>{{ trans('global.email') }}</label>
									<input type="text" class="form-control" name="email" required="required"
										   value="{{ old('email', $user->email) }}"
										   placeholder="{{ trans('global.email') }}">
								</div>

								@if ($user_can_see_env)
									<div class="form-group form-group-default">
										<label>{{ trans('global.environment_s') }}</label>
										{!! Widget::environments_fields(
											'environments[]',
											[
												'all' => true,
												'value' => '',
												'placeholder' => trans('global.environment_s'),
												'class' => 'form-control'
											]
										) !!}
									</div>
								@endif

								<div class="form-group form-group-default">
									<label>{{ trans('global.roles') }}</label>
									<br>
									@foreach ($roles as $role)
										<div class="box box-primary box-widget collapsed-box">
											<div class="box-header with-border">
												<div class="user-block">
													<button type="button" class="btn btn-box-tool"
															data-widget="collapse">
														<i class="fa fa-plus"></i>
													</button>
													<span class="username">{!! trans($role->display_name) !!}</span>
												</div>
												<div class="box-tools">
													<div class="material-switch pull-right" style="padding-top: 10px;">
														<input type="checkbox" name="user_role_id[]"
															   id="someSwitchOptionDefault{{ $role->id }}"
															   data-init-plugin="switchery" value="{{ $role->id }}"
															   @if ($user->roles->contains($role->id))
															   checked="checked"
																@endif/>
														<label for="someSwitchOptionDefault{{ $role->id }}"
															   class="label-success"></label>
													</div>
												</div>
											</div>
											<div class="box-body">
												{!! trans($role->description) !!}
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="tab-pane" id="tab_2">
								@foreach (\Config::get('addresses.flags') as $type)

									{{-- xABE Todo : Change this --}}
									<?php $current_address = null; ?>
									@foreach ($user->addresses as $address)
										@if ($type == 'primary' && $address->is_primary)
											<?php $current_address = $address; ?>
										@elseif ($type == 'billing' && $address->is_billing)
											<?php $current_address = $address; ?>
										@elseif ($type == 'shipping' && $address->is_shipping)
											<?php $current_address = $address; ?>
										@endif
									@endforeach
									{{-- !xABE Todo : Change this --}}

									<div class="box box-primary box-widget collapsed-box">
										<div class="box-header with-border">
											<div class="user-block">
												<button type="button" class="btn btn-box-tool" data-widget="collapse">
													<i class="fa fa-plus"></i>
												</button>
                                                <span class="username">
                                                    @if ($type == 'primary')
														<i class="fa fa-home"></i>
														Primary address
													@elseif ($type == 'billing')
														<i class="fa fa-credit-card"></i>
														Billing address
													@elseif ($type == 'shipping')
														<i class="fa fa-truck"></i>
														Shipping address
													@endif
                                                </span>
											</div>
										</div>
										<div class="box-body">
											@include('users::users.admin.users.chunks.form_addresses_fields', ['type' => $type, 'address' => $current_address])
										</div>
									</div>

								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer clearfix">
					<div class="pull-left">
						<a href="{{ url('admin/users') }}" class="btn btn-default btn-flat">
							<i class="fa fa-caret-left"></i> {{ trans('global.back') }}
						</a>
					</div>
					<div class="pull-right">
						<button class="btn btn-primary btn-flat" type="submit">
							<i class="fa fa-pencil"></i> {{ trans('users::admin.edit.btn.edit_user') }}
						</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
