<div class="form-group form-group-default">
    <label>{{ trans('core.site.name') }}</label>
    <input type="text" class="form-control" name="core.site.name" required="required"
           value="{{ old('core.site.name', $settings->get('core.site.name')) }}">
</div>
<div class="form-group form-group-default">
    <label>{{ trans('core.site.description') }}</label>
    <input type="text" class="form-control" name="core.site.description" required="required"
           value="{{ old('core.site.description', $settings->get('core.site.description')) }}">
</div>