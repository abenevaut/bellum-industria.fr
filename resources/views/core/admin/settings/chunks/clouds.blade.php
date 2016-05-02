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
            <label>{{ trans('filesystems_disks_dropbox_appSecret') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_dropbox_appSecret"
                   value="{{ old('filesystems_disks_dropbox_appSecret', $settings->get('filesystems.disks.dropbox.appSecret')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems_disks_dropbox_accessToken') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_dropbox_accessToken"
                   value="{{ old('filesystems_disks_dropbox_accessToken', $settings->get('filesystems.disks.dropbox.accessToken')) }}">
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
            <label>{{ trans('filesystems_disks_s3_key') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_s3_key"
                   value="{{ old('filesystems_disks_s3_key', $settings->get('filesystems.disks.s3.key')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems_disks_s3_secret') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_s3_secret"
                   value="{{ old('filesystems_disks_s3_secret', $settings->get('filesystems.disks.s3.secret')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems_disks_s3_region') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_s3_region"
                   value="{{ old('filesystems_disks_s3_region', $settings->get('filesystems.disks.s3.region')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('filesystems_disks_s3_bucket') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_s3_bucket"
                   value="{{ old('filesystems_disks_s3_bucket', $settings->get('filesystems.disks.s3.bucket')) }}">
        </div>
    </div>
</div>