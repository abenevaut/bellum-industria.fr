@extends('adminlte::layouts.default')

@section('js')
	<script src="{{ asset('modules/pages/js/tinymce.js') }}"></script>
@endsection

@section('content')

	<div class="row">
		{!! Form::open(array('route' => 'admin.pages.store', 'class' => 'forms')) !!}

		<div class="col-md-12">
			<div class="box box-primary">

				<div class="box-header with-border">

					<h3 class="box-title">Add new page</h3>

				</div>

				<div class="box-body">

					@if (count($errors) > 0)
						<div class="alert alert-danger" role="alert">
							<p class="pull-left">
								Erreur<?php if (count($errors) > 1)
								{
									echo 's';
								} ?></p>

							<div class="clearfix"></div>
							@foreach ($errors->all() as $error)
								<br>
								<p>{{ $error }}</p>
							@endforeach
						</div>
					@endif


					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

							<div class="form-group form-group-default required">
								<label>Page title</label>
								<input type="text" class="form-control input-lg" name="title" required="required"
									   value="{{ old('title') }}" placeholder="Page title">
							</div>

						</div>


						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

							<div class="box box-primary" style="border-left: 3px solid #3c8dbc;box-shadow: none;border-radius: 0px;border-top: none;">

								<div class="box-body" style="margin-top: 8px;">
									<div class="form-group form-group-default required" style="padding-top: 5px;">
										<label style="margin-top: 8px;">Is home page ?</label>

										<div class="material-switch pull-right" style="padding-top: 10px;">
											<input type="checkbox" name="is_home[]"
												   id="someSwitchOptionDefaultIsHome"
												   data-init-plugin="switchery" value="is_home"

												   @if (old('is_home'))
												   checked="checked"
													@endif

											/>
											<label for="someSwitchOptionDefaultIsHome" class="label-success"></label>
										</div>
									</div>
								</div>

							</div>


						</div>


					</div>


				</div>
			</div>

			<div class="box box-primary">

				<div class="box-header with-border">

					<h3 class="box-title">Page content</h3>

					<div class="box-tools pull-right">
						<a href="{{ url('admin/pages/create') }}" class="btn btn-box-tool btn-box-tool-primary">
							<i class="fa fa-plus"></i> Add chunk
						</a>
					</div>

				</div>

				<div class="box-body">


					<div class="box box-widget collapsed-box box-primary" style="border-left: 3px solid #3c8dbc;border-bottom: 3px solid #3c8dbc;box-shadow: none;border-radius: 0px;border-top: none;">

						<div class="box-header with-border">

							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-plus"></i>
							</button>

							<h3 class="box-title">Chunk information</h3>

							<div class="box-tools pull-right">
								<a href="{{ url('admin/pages/create') }}" class="btn btn-box-tool btn-box-tool-primary">
									<i class="fa fa-trash"></i> delete chunk
								</a>
							</div>
						</div>
						<div class="box-body">


							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-group-default required">
										<label>Chunk title</label>
										<input type="text" class="form-control" name="title" required="required"
											   value="{{ old('title') }}" placeholder="Page title">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default required">
										<label>Chunk type</label>
										<select class="form-control" name="chunk_type" id="">
											<option value="test">html
											</option>
										</select>
									</div>
								</div>
							</div>


							<div class="form-group form-group-default required">

								<label>Chunk content</label>
                        <textarea name="content" id="content" class="js-call-tinymce form-control" cols="30" rows="10" required="required">
                            {{ old('content') }}
                        </textarea>

							</div>


						</div>

					</div>







					<div class="box box-widget collapsed-box box-primary" style="border-left: 3px solid #3c8dbc;border-bottom: 3px solid #3c8dbc;box-shadow: none;border-radius: 0px;border-top: none;">

						<div class="box-header with-border">

							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-plus"></i>
							</button>


							<h3 class="box-title">Chunk information</h3>

							<div class="box-tools pull-right">
								<a href="{{ url('admin/pages/create') }}" class="btn btn-box-tool btn-box-tool-primary">
									<i class="fa fa-trash"></i> delete chunk
								</a>
							</div>
						</div>
						<div class="box-body">


							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-group-default required">
										<label>Chunk title</label>
										<input type="text" class="form-control" name="title" required="required"
											   value="{{ old('title') }}" placeholder="Page title">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default required">
										<label>Chunk type</label>
										<select class="form-control" name="chunk_type" id="">
											<option value="test">markdown
											</option>
										</select>
									</div>
								</div>
							</div>


							<div class="form-group form-group-default required">

								<label>Chunk content</label>
                        <textarea name="content" id="content" class="js-call-tinymce form-control" cols="30" rows="10" required="required">
                            {{ old('content') }}
                        </textarea>

							</div>


						</div>

					</div>




				</div>

				<div class="box-footer clearfix">
					<div class="pull-left">

					</div>
					<div class="pull-right">

						<button class="btn btn-primary btn-flat" type="submit">
							<i class="fa fa-plus"></i> Ajouter chunk
						</button>

					</div>
				</div>


			</div>

			<div class="box box-widget collapsed-box box-primary">
				<div class="box-header with-border">
					<div class="user-block">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-plus"></i>
						</button>
						<span class="username">SEO</span>
					</div>
					<div class="box-tools">
					</div>
				</div>
				<div class="box-body">

					<div class="form-group form-group-default required">
						<label>SEO Description</label>
						<input type="text" class="form-control" name="title" required="required"
							   value="{{ old('title') }}" placeholder="Page title">
					</div>

					<div class="form-group form-group-default required">
						<label>SEO Tags</label>
						<input type="text" class="form-control" name="title" required="required"
							   value="{{ old('title') }}" placeholder="Page title">
					</div>

				</div>
			</div>

			<div class="box-footer clearfix">
				<div class="pull-left">
					<a href="{{ URL::current() }}" class="btn btn-default btn-flat">
						<i class="fa fa-cancel"></i> {{ trans('global.cancel') }}
					</a>
				</div>
				<div class="pull-right">

					<button class="btn btn-primary btn-flat" type="submit">
						<i class="fa fa-plus"></i> Ajouter la page
					</button>

				</div>
			</div>
		</div>

		{!! Form::close() !!}
	</div>



@stop