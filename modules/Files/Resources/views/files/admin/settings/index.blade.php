@extends('adminlte::layouts.default')

@section('js')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('files::settings.title') }}</h3>
                    <div class="box-tools hidden-xs pull-right">
                        <a href="javascript:void(0);" class="btn btn-box-tool btn-box-tool-primary"
                           data-toggle="modal" data-target="#add_folder">
                            <i class="fa fa-folder"></i> {{ trans('files::settings.btn.add_folder') }}
                        </a>
                        <a href="javascript:void(0);" class="btn btn-box-tool btn-box-tool-primary"
                           data-toggle="modal" data-target="#add_amazon">
                            <i class="fa fa-amazon"></i> {{ trans('files::settings.btn.add_amazon') }}
                        </a>
                        <a href="javascript:void(0);" class="btn btn-box-tool btn-box-tool-primary"
                           data-toggle="modal" data-target="#add_dropbox">
                            <i class="fa fa-dropbox"></i> {{ trans('files::settings.btn.add_dropbox') }}
                        </a>
                    </div>
                </div>
                {!! Form::open(array('route' => 'admin.files.settings.store', 'class' => 'forms js-call-form_validation')) !!}
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






                    @if (count([]))
                        @foreach ([] as $widget)
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            <div class="callout callout-info">
                                <h4>{{ trans('files::settings.nodata_title') }}</h4>
                                <p>{{ trans('files::settings.nodata_description') }}</p>
                            </div>
                        </div>
                    @endif








                </div>
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        <a href="{{ URL::current() }}" class="btn btn-default btn-flat">
                            <i class="fa fa-cancel"></i> {{ trans('global.cancel') }}
                        </a>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-flat" type="submit">
                            <i class="fa fa-pencil"></i> {{ trans('files::settings.btn.edit') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal" id="add_folder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ trans('files::settings.btn.add_folder') }}</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">


                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        {{ trans('global.cancel') }}
                    </button>


                    {!! Form::open(['route' => ['admin.users.destroy_multiple'], 'method' => 'delete', "class" => "js-users_multi_delete-container"]) !!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> {{ trans('users::admin.index.btn.valid_delete') }}
                    </button>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="add_amazon">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ trans('files::settings.btn.add_amazon') }}</h4>
                </div>
                <div class="modal-body">


                    <div class="form-group form-group-default">
                        <label>{{ trans('files::settings.filesystems_disks_s3_key') }}</label>
                        <input type="text" class="form-control" name="filesystems_disks_s3_key"
                               value="{{ old('filesystems_disks_s3_key') }}">
                    </div>
                    <div class="form-group form-group-default">
                        <label>{{ trans('files::settings.filesystems_disks_s3_secret') }}</label>
                        <input type="text" class="form-control" name="filesystems_disks_s3_secret"
                               value="{{ old('filesystems_disks_s3_secret') }}">
                    </div>
                    <div class="form-group form-group-default">
                        <label>{{ trans('files::settings.filesystems_disks_s3_region') }}</label>
                        {{ Form::select('filesystems_disks_s3_region', config('files.amazon.region'), old('mail_driver'), ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group form-group-default">
                        <label>{{ trans('files::settings.filesystems_disks_s3_bucket') }}</label>
                        <input type="text" class="form-control" name="filesystems_disks_s3_bucket"
                               value="{{ old('filesystems_disks_s3_bucket') }}">
                    </div>


                </div>
                <div class="modal-footer">


                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        {{ trans('global.cancel') }}
                    </button>


                    {!! Form::open(['route' => ['admin.users.destroy_multiple'], 'method' => 'delete', "class" => "js-users_multi_delete-container"]) !!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> {{ trans('users::admin.index.btn.valid_delete') }}
                    </button>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="add_dropbox">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ trans('files::settings.btn.add_dropbox') }}</h4>
                </div>
                <div class="modal-body">


                    <div class="form-group form-group-default">
                        <label>{{ trans('files::settings.filesystems_disks_dropbox_appSecret') }}</label>
                        <input type="text" class="form-control" name="filesystems_disks_dropbox_appSecret"
                               value="{{ old('filesystems_disks_dropbox_appSecret') }}">
                    </div>
                    <div class="form-group form-group-default">
                        <label>{{ trans('files::settings.filesystems_disks_dropbox_accessToken') }}</label>
                        <input type="text" class="form-control" name="filesystems_disks_dropbox_accessToken"
                               value="{{ old('filesystems_disks_dropbox_accessToken') }}">
                    </div>


                </div>
                <div class="modal-footer">


                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        {{ trans('global.cancel') }}
                    </button>


                    {!! Form::open(['route' => ['admin.users.destroy_multiple'], 'method' => 'delete', "class" => "js-users_multi_delete-container"]) !!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> {{ trans('users::admin.index.btn.valid_delete') }}
                    </button>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection
