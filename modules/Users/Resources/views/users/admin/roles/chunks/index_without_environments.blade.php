<div class="box-body no-padding">
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th class="cell-center">{!! trans('users::roles.index.tab.name') !!}</th>
				<th class="cell-center">{!! trans('users::roles.index.tab.description') !!}</th>
				<th class="hidden-xs cell-center" width="20%">{{ trans('global.actions') }}</th>
			</tr>
			@foreach ($roles as $role)
				<tr>
					<td class="cell-center">
						{!! trans($role->display_name) !!}
					</td>
					<td class="">
						{!! trans($role->description) !!}
					</td>
					<td class="hidden-xs cell-center">

						@if ($role->unchangeable)
							{{ trans('global.unchangeable') }}
						@else
							<a href="{{ url('admin/roles/' . $role->id . '/edit') }}"
							   class="btn btn-warning btn-flat btn-mobile">
								<i class="fa fa-pencil"></i> {{ trans('global.edit') }}
							</a>
							<button type="button" class="btn btn-danger btn-flat btn-mobile"
									data-toggle="modal"
									data-target="#delete_user_{{ $role->id }}"><i
										class="fa fa-trash"></i>
								{{ trans('global.remove') }}
							</button>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
