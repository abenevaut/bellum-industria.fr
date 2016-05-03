<div class="form-group form-group-default">
    <label>{{ trans('settings.mail_from_address') }}</label>
    <input type="text" class="form-control" name="mail_from_address" required="required"
           value="{{ old('mail_from_address', $settings->get('mail.from.address')) }}">
</div>

<div class="form-group form-group-default">
    <label>{{ trans('settings.mail_from_name') }}</label>
    <input type="text" class="form-control" name="mail_from_name" required="required"
           value="{{ old('mail_from_name', $settings->get('mail.from.name')) }}">
</div>

<div class="form-group form-group-default">
    <label>{{ trans('settings.core_mail_mailwatch') }}</label>
    <input type="text" class="form-control" name="core_mail_mailwatch" required="required"
           value="{{ old('core_mail_mailwatch', $settings->get('core.mail.mailwatch')) }}">
</div>

<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
            <span class="username">
                {!! trans('settings.mail_provider_title') !!}
            </span>
        </div>
    </div>
    <div class="box-body">

        <div class="form-group form-group-default">
            <label>{{ trans('settings.mail_host') }}</label>
            <input type="text" class="form-control" name="mail_host" required="required"
                   value="{{ old('mail_host', $settings->get('mail.host')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('settings.mail_username') }}</label>
            <input type="text" class="form-control" name="mail_username" required="required"
                   value="{{ old('mail_username', $settings->get('mail.username')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('settings.mail_password') }}</label>
            <input type="text" class="form-control" name="mail_password" required="required"
                   value="{{ old('mail_password', $settings->get('mail.password')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('settings.mail_driver') }}</label>
            <input type="text" class="form-control" name="mail_driver" required="required"
                   value="{{ old('mail_driver', $settings->get('mail.driver')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('settings.mail_port') }}</label>
            <input type="text" class="form-control" name="mail_port" required="required"
                   value="{{ old('mail_port', $settings->get('mail.port')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('settings.mail_encryption') }}</label>
            <input type="text" class="form-control" name="mail_encryption" required="required"
                   value="{{ old('mail_encryption', $settings->get('mail.encryption')) }}">
        </div>

    </div>
</div>
