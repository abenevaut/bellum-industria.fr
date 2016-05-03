<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
            <span class="username">
                {{ trans('settings.filesystems_disks_directory_title') }}
            </span>
        </div>
    </div>
    <div class="box-body">
        <div class="form-group form-group-default">
            <label>{{ trans('settings.filesystems_disks_directory_name') }}</label>
            <input type="text" class="form-control" name="filesystems_disks_directory_name"
                   value="{{ old('filesystems_disks_directory_name', $settings->get('filesystems.disks.directory.name')) }}">
        </div>
    </div>
</div>
