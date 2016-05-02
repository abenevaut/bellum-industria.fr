
<div class="form-group form-group-default">
    <label>{{ trans('mail.from.address') }}</label>
    <input type="text" class="form-control" name="mail.from.address" required="required"
           value="{{ old('mail.from.address', $settings->get('mail.from.address')) }}">
</div>
<div class="form-group form-group-default">
    <label>{{ trans('mail.from.name') }}</label>
    <input type="text" class="form-control" name="mail.from.name"
           required="required"
           value="{{ old('mail.from.name', $settings->get('mail.from.name')) }}">
</div>

<div class="form-group form-group-default">
    <label>{{ trans('core.mail.mailwatch') }}</label>
    <input type="text" class="form-control" name="core.mail.mailwatch" required="required"
           value="{{ old('core.mail.mailwatch', $settings->get('core.mail.mailwatch')) }}">
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
            <label>{{ trans('mail.host') }}</label>
            <input type="text" class="form-control" name="mail.host"
                   required="required"
                   value="{{ old('mail.host', $settings->get('mail.host')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('mail.username') }}</label>
            <input type="text" class="form-control" name="mail.username"
                   required="required"
                   value="{{ old('mail.username', $settings->get('mail.username')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('mail.password') }}</label>
            <input type="text" class="form-control" name="mail.password"
                   required="required"
                   value="{{ old('mail.password', $settings->get('mail.password')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('mail.driver') }}</label>
            <input type="text" class="form-control" name="mail.driver" required="required"
                   value="{{ old('mail.driver', $settings->get('mail.driver')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('mail.port') }}</label>
            <input type="text" class="form-control" name="mail.port" required="required"
                   value="{{ old('mail.port', $settings->get('mail.port')) }}">
        </div>
        <div class="form-group form-group-default">
            <label>{{ trans('mail.encryption') }}</label>
            <input type="text" class="form-control" name="mail.encryption"
                   required="required"
                   value="{{ old('mail.encryption', $settings->get('mail.encryption')) }}">
        </div>


    </div>
</div>