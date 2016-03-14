@extends('admin.layouts.default')

@section('content')

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">

					<div class="box-header with-border">

						<h3 class="box-title">Users list</h3>

						<div class="box-tools pull-right">

							<a href="{{ url('admin/users/create') }}" class="btn btn-box-tool"><i class="fa fa-plus"></i> Add user</a>

						</div>

					</div>

					@if ($users->count())
						<!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered">
								<tbody>

								<tr>
									<th>Full name</th>
									<th>Email</th>
									<th width="20%">Actions</th>
								</tr>

								@foreach ($users as $user)
									<tr>
										<td>{{ $user->full_name }}</td>
										<td>{{ $user->email }}</td>
										<td>

											<a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i> Edit</a>
											<button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#delete_user_{{ $user->id }}"><i class="fa fa-trash"></i> Remove</button>

										</td>
									</tr>
								@endforeach

								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
						<div class="box-footer clearfix">

							<div class="no-margin pull-right">
								{!! $users->render() !!}
							</div>

						</div>

					@else

						<div class="box-body">
							<div class="callout callout-info" role="alert">
								<h4><i class="icon fa fa-info"></i> There is no user</h4>
								<p>Currently no user was register in website</p>
							</div>
						</div>

					@endif

				</div>
			</div>
		</div>
	</section>


	@foreach ($users as $user)
		<div class="modal modal-danger" id="delete_user_{{ $user->id }}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Attention</h4>
					</div>
					<div class="modal-body">
						<p>Would you really remove the user : {{ $user->full_name }} ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">No, cancel</button>
						{!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
							<button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Yes, remove</button>
						{!! Form::close() !!}
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	@endforeach


@stop