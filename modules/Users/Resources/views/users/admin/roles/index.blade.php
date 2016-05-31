@extends('adminlte::layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ trans('users::roles.index.title') }}</h3>
					<div class="box-tools hidden-xs pull-right">
						<a href="{{ url('admin/roles/create') }}" class="btn btn-box-tool btn-box-tool-primary">
							<i class="fa fa-plus"></i> {{ trans('users::roles.index.btn.add_role') }}
						</a>
					</div>
				</div>

				@if (count($roles['data']))
					@if (
						Auth::user()->hasRole(\Core\Domain\Roles\Repositories\RoleRepositoryEloquent::ADMIN)
						|| Auth::user()->hasPermission(\Core\Domain\Roles\Repositories\PermissionRepositoryEloquent::SEE_ENVIRONMENT)
					)

						@include ('users::users.admin.roles.chunks.index_with_environments', ['roles' => $roles])

					@else

						@include ('users::users.admin.roles.chunks.index_without_environments', ['roles' => $roles])

					@endif

					<div class="box-footer clearfix">
						<div class="pull-left">
							<a href="{{ url('admin/users') }}" class="btn btn-default btn-flat">
								<i class="fa fa-caret-left"></i> {{ trans('users::roles.index.btn.back_user_panel') }}
							</a>
						</div>
							{!! with(
								new \Modules\Users\Resources\IndexAdminPagination(
									new \Illuminate\Pagination\LengthAwarePaginator(
										$roles['meta']['pagination']['total'],
										$roles['meta']['pagination']['count'],
										$roles['meta']['pagination']['per_page'],
										$roles['meta']['pagination']['current_page']
									)
								)
							)->render() !!}
					</div>

				@else
					<div class="box-body">
						<div class="callout callout-info" role="alert">
							<h4>
								<i class="icon fa fa-info"></i> {{ trans('users::roles.index.no_data.title') }}
							</h4>
							<p>{{ trans('users::roles.index.no_data.description') }}</p>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="pull-left">
							<a href="{{ url('admin/users') }}" class="btn btn-default btn-flat">
								<i class="fa fa-caret-left"></i> {{ trans('global.back') }}
							</a>
						</div>
					</div>
				@endif

				@foreach ($roles['data'] as $role)
					@if (!$role['unchangeable'])
						<div class="modal modal-danger" id="delete_user_{{ $role['id'] }}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h4 class="modal-title">{{ trans('global.attention') }}</h4>
									</div>
									<div class="modal-body">
										<p>{{ trans('users::roles.index.delete.question') }} {!! trans('users::roles.index.tab.name') !!}
											?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">
											{{ trans('users::roles.index.btn.cancel_delete') }}
										</button>
										{!! Form::open(['route' => ['admin.roles.destroy', $role['id']], 'method' => 'delete']) !!}
										<button type="submit" class="btn btn-danger">
											<i class="fa fa-trash"></i> {{ trans('users::roles.index.btn.valid_delete') }}
										</button>
										{!! Form::close() !!}
									</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach

			</div>
		</div>
	</div>
@endsection
