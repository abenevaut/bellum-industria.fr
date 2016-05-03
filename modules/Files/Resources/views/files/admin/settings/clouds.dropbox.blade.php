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
                   value="{{ old('filesystems_disks_dropbox_appSecret', $settings->get('filesystems.disks.dropbox.appSecret')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.filesystems_disks_dropbox_accessToken') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_dropbox_accessToken"
                   value="{{ old('filesystems_disks_dropbox_accessToken', $settings->get('filesystems.disks.dropbox.accessToken')) }}">
        </div>
    </div>
</div>