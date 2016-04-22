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
            <label>{{ trans('settings.CORE_MAIL_HOST') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_HOST"
                   required="required"
                   value="{{ old('CORE_MAIL_HOST', $settings['list']['CORE_MAIL_HOST']) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_USERNAME') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_USERNAME"
                   required="required"
                   value="{{ old('CORE_MAIL_USERNAME', $settings['list']['CORE_MAIL_USERNAME']) }}">
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
            <label>{{ trans('settings.CORE_MAIL_HOST') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_HOST"
                   required="required"
                   value="{{ old('CORE_MAIL_HOST', $settings['list']['CORE_MAIL_HOST']) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_USERNAME') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_USERNAME"
                   required="required"
                   value="{{ old('CORE_MAIL_USERNAME', $settings['list']['CORE_MAIL_USERNAME']) }}">
        </div>
    </div>
</div>