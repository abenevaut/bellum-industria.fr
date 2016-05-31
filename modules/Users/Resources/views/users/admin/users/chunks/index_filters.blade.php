<div id="filters">
	{!! Form::open(['route' => ['admin.users.index'], 'method' => 'GET', "class" => "hidden-xs js-users_multi_delete-container"]) !!}
	<div class="box box-widget collapsed-box no-margin" style="border:none;">
		<div class="box-header with-border">
			<div class="">
				<span class=""><i class="fa fa-filter"></i> {{ trans('global.filters') }}</span>
			</div>
			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-plus"></i>
				</button>
			</div>
		</div>
		<div class="box-body">

			<input type="hidden" name="f_module" class="form-control" value="users">

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle"></i></span>
						<input type="text" name="name" class="form-control"
							   placeholder="{{ trans('users::admin.index.tab.full_name') }}"
							   value="{{ old('name', $filters['name']) }}">
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="email" class="form-control" placeholder="{{ trans('global.email') }}"
							   value="{{ old('email', $filters['email']) }}">
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user-md"></i></span>
						{!! Widget::roles_fields('roles[]', ['value' => $filters['roles'], 'placeholder' => trans('global.role_s'), 'class' => 'form-control']) !!}
					</div>
				</div>

				@if (
					Auth::user()->hasRole(\Core\Domain\Roles\Repositories\RoleRepositoryEloquent::ADMIN)
					|| Auth::user()->hasPermission(\Core\Domain\Permissions\Repositories\PermissionRepositoryEloquent::SEE_ENVIRONMENT)
				)
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle"></i></span>
						{!! Widget::environments_fields('environments[]', ['value' => $filters['environments'], 'placeholder' => trans('global.environment_s'), 'class' => 'form-control']) !!}
					</div>
				</div>
				@endif

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle"></i></span>
						{!! Form::select('trashed',
						 ['' => 'Active users', 'with_trashed' => 'With trashed', 'only_trashed' => 'Only trashed'],
						 '',
						 ['class' => 'form-control js-call-select2', 'style' => 'border-radius:0px;']) !!}
					</div>
				</div>

			</div>
		</div>
		<div class="box-footer">
			<div class="text-center">
				{{--<button type="submit" class="btn btn-primary btn-flat btn-xs">--}}
				{{--<i class="fa fa-filter"></i> {{ trans('users::admin.index.btn.apply_filters') }}--}}
				{{--</button>--}}
				<a href="javascript:void(0);" class="btn btn-default btn-flat btn-xs cancel js-cancel-filters">
					{{ trans('users::admin.index.btn.reset_filters') }}
				</a>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>