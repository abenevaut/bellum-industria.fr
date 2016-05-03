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
                        <a href="{{ url('admin/users/create') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-folder"></i> {{ trans('users::admin.index.btn.add_user') }}
                        </a>
                        <a href="{{ url('admin/roles') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-amazon"></i> {{ trans('users::admin.index.btn.roles') }}
                        </a>
                        <a href="{{ url('admin/users/export') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-dropbox"></i> {{ trans('users::admin.index.btn.export') }}
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

                    <div class="box box-primary box-widget collapsed-box">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <button type="button" class="btn btn-box-tool"
                                        data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
            <span class="username">
                {{ trans('settings.filesystems_disks_dropbox_title') }}
            </span>
                            </div>
                        </div>
                        <div class="box-body">







                            <div class="form-group form-group-default">
                                <label>{{ trans('settings.filesystems_disks_dropbox_appSecret') }}</label>
                                <input type="text" class="form-control" name="filesystems_disks_dropbox_appSecret"
                                       value="{{ old('filesystems_disks_dropbox_appSecret') }}">
                            </div>
                            <div class="form-group form-group-default">
                                <label>{{ trans('settings.filesystems_disks_dropbox_accessToken') }}</label>
                                <input type="text" class="form-control" name="filesystems_disks_dropbox_accessToken"
                                       value="{{ old('filesystems_disks_dropbox_accessToken') }}">
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary box-widget collapsed-box">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <button type="button" class="btn btn-box-tool"
                                        data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
            <span class="username">
                {{ trans('settings.filesystems_disks_s3_title') }}
            </span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group form-group-default">
                                <label>{{ trans('settings.filesystems_disks_s3_key') }}</label>
                                <input type="text" class="form-control" name="filesystems_disks_s3_key"
                                       value="{{ old('filesystems_disks_s3_key') }}">
                            </div>
                            <div class="form-group form-group-default">
                                <label>{{ trans('settings.filesystems_disks_s3_secret') }}</label>
                                <input type="text" class="form-control" name="filesystems_disks_s3_secret"
                                       value="{{ old('filesystems_disks_s3_secret') }}">
                            </div>
                            <div class="form-group form-group-default">
                                <label>{{ trans('settings.filesystems_disks_s3_region') }}</label>
                                {{ Form::select('filesystems_disks_s3_region', ['us-east-1' => 'US East (N. Virginia)', 'us-west-1' => 'US West (N. California)', 'us-west-2' => 'US West (Oregon)', 'eu-west-1' => 'EU (Ireland)', 'eu-central-1' => 'EU (Frankfurt)', 'ap-northeast-1' => 'Asia Pacific (Tokyo)', 'ap-northeast-2' => 'Asia Pacific (Seoul)', 'ap-southeast-1' => 'Asia Pacific (Singapore)', 'ap-southeast-2' => 'Asia Pacific (Sydney)', 'sa-east-1' => 'South America (São Paulo)'], old('mail_driver'), ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group form-group-default">
                                <label>{{ trans('settings.filesystems_disks_s3_bucket') }}</label>
                                <input type="text" class="form-control" name="filesystems_disks_s3_bucket"
                                       value="{{ old('filesystems_disks_s3_bucket') }}">
                            </div>
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
                            <i class="fa fa-pencil"></i> {{ trans('settings.btn.edit') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
