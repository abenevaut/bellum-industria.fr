<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
                                        <span class="username">
                                            Dropbox
                                        </span>
        </div>
    </div>
    <div class="box-body">
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems.disks.dropbox.appSecret') }}</label>
            <input type="text" class="form-control" name="filesystems.disks.dropbox.appSecret"
                   value="{{ old('filesystems.disks.dropbox.appSecret', $settings->get('filesystems.disks.dropbox.appSecret')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems.disks.dropbox.accessToken') }}</label>
            <input type="text" class="form-control" name="filesystems.disks.dropbox.accessToken"
                   value="{{ old('filesystems.disks.dropbox.accessToken', $settings->get('filesystems.disks.dropbox.accessToken')) }}">
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
                                            Amazon S3
                                        </span>
        </div>
    </div>
    <div class="box-body">
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems.disks.s3.key') }}</label>
            <input type="text" class="form-control" name="filesystems.disks.s3.key"
                   value="{{ old('filesystems.disks.s3.key', $settings->get('filesystems.disks.s3.key')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems.disks.s3.secret') }}</label>
            <input type="text" class="form-control" name="filesystems.disks.s3.secret"
                   value="{{ old('filesystems.disks.s3.secret', $settings->get('filesystems.disks.s3.secret')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems.disks.s3.region') }}</label>
            <input type="text" class="form-control" name="filesystems.disks.s3.region"
                   value="{{ old('filesystems.disks.s3.region', $settings->get('filesystems.disks.s3.region')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems.disks.s3.bucket') }}</label>
            <input type="text" class="form-control" name="filesystems.disks.s3.bucket"
                   value="{{ old('filesystems.disks.s3.bucket', $settings->get('filesystems.disks.s3.bucket')) }}">
        </div>
    </div>
</div>