@extends('adminlte::layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ trans('environments.index.title') }}</h3>
					<div class="box-tools hidden-xs pull-right">
						<a href="javascript:void(0);"
						   class="btn btn-box-tool btn-box-tool-primary"
						   data-toggle="modal"
						   data-target="#add_environment">
							<i class="fa fa-plus"></i> {{ trans('environments.index.btn.add') }}
						</a>
					</div>
				</div>
				@if (count($environments))
					<div class="box-body no-padding">
						<div class="overlay hidden">
							<i class="fa fa-refresh fa-spin"></i>
						</div>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th class="cell-center">{{ trans('global.name') }}</th>
									<th class="cell-center">{{ trans('global.reference') }}</th>
									<th class="cell-center">{{ trans('global.domain') }}</th>
									<th class="hidden-xs cell-center" width="20%">{{ trans('global.actions') }}</th>
								</tr>
								@foreach ($environments['data'] as $environment)
									<tr>
										<td class="cell-center">
											{{ $environment['name'] }}
										</td>
										<td class="cell-center">
											{{ $environment['reference'] }}
										</td>
										<td class="cell-center">
											{{ $environment['domain'] }}
										</td>
										<td class="hidden-xs cell-center">
											<a href="{{ url('admin/environments/' . $environment['id'] . '/edit') }}"
											   class="btn btn-warning btn-flat btn-mobile"
											   data-toggle="modal"
											   data-target="#environment_show_{{ $environment['id'] }}">
												<i class="fa fa-pencil"></i> {{ trans('global.edit') }}
											</a>
											<button type="button" class="btn btn-danger btn-flat btn-mobile"
													@if (\Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE === $environment['reference'])
													disabled="disabled"
													@else
													data-toggle="modal"
													data-target="#delete_environments_{{ $environment['id'] }}"
													@endif
											>
												<i class="fa fa-trash"></i>
												{{ trans('global.remove') }}
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="box-footer clearfix">
						{!! with(
							new \Core\Paginations\AdminltePagination(
								new \Illuminate\Pagination\LengthAwarePaginator(
									$environments['meta']['pagination']['total'],
									$environments['meta']['pagination']['count'],
									$environments['meta']['pagination']['per_page'],
									$environments['meta']['pagination']['current_page']
								)
							)
						)->render() !!}
					</div>
				@else
					<div class="box-body">
						<div class="overlay hidden">
							<i class="fa fa-refresh fa-spin"></i>
						</div>
						<div class="callout callout-info" role="alert">
							<h4>
								<i class="icon fa fa-info"></i> {{ trans('environments.index.no_data.title') }}
							</h4>
							<p>{{ trans('environments.index.no_data.description') }}</p>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

	@foreach ($environments['data'] as $environment)
		<div class="modal modal-danger" id="delete_environments_{{ $environment['id'] }}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title">{{ trans('environments.index.modal.delete.title') }}</h4>
					</div>
					<div class="modal-body">
						<p>{{ trans('users::admin.index.delete.question') }} {{ $environment['name'] }} <small>({{ $environment['reference'] }})</small> ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">
							{{ trans('users::admin.index.btn.cancel_delete') }}
						</button>
						{!! Form::open(['route' => ['admin.environments.destroy', $environment['id']], 'method' => 'delete']) !!}
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-trash"></i> {{ trans('users::admin.index.btn.valid_delete') }}
						</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

		<div class="modal modal-default" id="environment_show_{{ $environment['id'] }}">
			<div class="modal-dialog"><div class="modal-content"></div></div>
		</div>

	@endforeach

	<div class="modal" id="add_environment">
		<div class="modal-dialog">
			<div class="modal-content">
				{!! Form::open(['route' => 'admin.environments.store', 'class' => 'forms js-call-form_validation']) !!}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title">{{ trans('environments.index.modal.add.title') }}</h4>
				</div>
				<div class="modal-body">

					<div class="form-group form-group-default">
						<label>{{ trans('global.name') }}</label>
						<input type="text" class="form-control" name="name" required="required"
							   value="" placeholder="{{ trans('global.name') }}">
					</div>

					<div class="form-group form-group-default">
						<label>{{ trans('global.reference') }}</label>
						<input type="text" class="form-control"
							   name="reference"
							   required="required"
							   {{--readonly="readonly"--}}
							   value="" placeholder="{{ trans('global.reference') }}">
					</div>

					<div class="form-group form-group-default">
						<label>{{ trans('global.domain') }}</label>
						<input type="text" class="form-control" name="domain" required="required"
							   value="" placeholder="{{ trans('global.domain') }}">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">
						{{ trans('global.cancel') }}
					</button>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-plus"></i> {{ trans('global.add') }}
					</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
