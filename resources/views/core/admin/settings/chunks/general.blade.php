<div class="form-group form-group-default">
    <label>{{ trans('core_site_name') }}</label>
    <input type="text" class="form-control" name="core_site_name" required="required"
           value="{{ old('core_site_name', $settings->get('core.site.name')) }}">
</div>
<div class="form-group form-group-default">
    <label>{{ trans('core_site_description') }}</label>
    <input type="text" class="form-control" name="core_site_description" required="required"
           value="{{ old('core_site_description', $settings->get('core.site.description')) }}">
</div>