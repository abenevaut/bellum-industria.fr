<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_SITE_NAME') }}</label>
    <input type="text" class="form-control" name="CORE_SITE_NAME" required="required"
           value="{{ old('CORE_SITE_NAME', $settings['list']['CORE_SITE_NAME']) }}">
</div>
<div class="form-group form-group-default">
    <label>{{ trans('settings.CORE_SITE_DESCRIPTION') }}</label>
    <input type="text" class="form-control" name="CORE_SITE_DESCRIPTION" required="required"
           value="{{ old('CORE_SITE_DESCRIPTION', $settings['list']['CORE_SITE_DESCRIPTION']) }}">
</div>