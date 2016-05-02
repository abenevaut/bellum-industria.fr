
<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_CONTACT_MAIL') }}</label>
    <input type="text" class="form-control" name="CORE_CONTACT_MAIL" required="required"
           value="{{ old('CORE_CONTACT_MAIL', $settings->get('core.site.name')) }}">
</div>
<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_CONTACT_DISPLAY_NAME') }}</label>
    <input type="text" class="form-control" name="CORE_CONTACT_DISPLAY_NAME"
           required="required"
           value="{{ old('CORE_CONTACT_DISPLAY_NAME', $settings->get('core.site.name')) }}">
</div>

<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_MAILWATCH_MAIL') }}</label>
    <input type="text" class="form-control" name="CORE_MAILWATCH_MAIL" required="required"
           value="{{ old('CORE_MAILWATCH_MAIL', $settings->get('core.site.name')) }}">
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
                   value="{{ old('CORE_MAIL_HOST', $settings->get('core.site.name')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_USERNAME') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_USERNAME"
                   required="required"
                   value="{{ old('CORE_MAIL_USERNAME', $settings->get('core.site.name')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_PASSWORD') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_PASSWORD"
                   required="required"
                   value="{{ old('CORE_MAIL_PASSWORD', $settings->get('core.site.name')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_DRIVER') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_DRIVER" required="required"
                   value="{{ old('CORE_MAIL_DRIVER', $settings->get('core.site.name')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_PORT') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_PORT" required="required"
                   value="{{ old('CORE_MAIL_PORT', $settings->get('core.site.name')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('settings.CORE_MAIL_ENCRYPTION') }}</label>
            <input type="text" class="form-control" name="CORE_MAIL_ENCRYPTION"
                   required="required"
                   value="{{ old('CORE_MAIL_ENCRYPTION', $settings->get('core.site.name')) }}">
        </div>


    </div>
</div>