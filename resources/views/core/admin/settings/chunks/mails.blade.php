
<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_CONTACT_MAIL') }}</label>
    <input type="text" class="form-control" name="CORE_CONTACT_MAIL" required="required"
           value="{{ old('CORE_CONTACT_MAIL', $settings['list']['CORE_CONTACT_MAIL']) }}">
</div>
<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_CONTACT_DISPLAY_NAME') }}</label>
    <input type="text" class="form-control" name="CORE_CONTACT_DISPLAY_NAME"
           required="required"
           value="{{ old('CORE_CONTACT_DISPLAY_NAME', $settings['list']['CORE_CONTACT_DISPLAY_NAME']) }}">
</div>

<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_MAILWATCH_MAIL') }}</label>
    <input type="text" class="form-control" name="CORE_MAILWATCH_MAIL" required="required"
           value="{{ old('CORE_MAILWATCH_MAIL', $settings['list']['CORE_MAILWATCH_MAIL']) }}">
</div>

<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
                                        <span class="username">
                                            Mail server configuration
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
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_PASSWORD') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_PASSWORD"
                   required="required"
                   value="{{ old('CORE_MAIL_PASSWORD', $settings['list']['CORE_MAIL_PASSWORD']) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_DRIVER') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_DRIVER" required="required"
                   value="{{ old('CORE_MAIL_DRIVER', $settings['list']['CORE_MAIL_DRIVER']) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_PORT') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_PORT" required="required"
                   value="{{ old('CORE_MAIL_PORT', $settings['list']['CORE_MAIL_PORT']) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_ENCRYPTION') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_ENCRYPTION"
                   required="required"
                   value="{{ old('CORE_MAIL_ENCRYPTION', $settings['list']['CORE_MAIL_ENCRYPTION']) }}">
        </div>


    </div>
</div>