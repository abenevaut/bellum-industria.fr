<div class="form-group form-group-default">
	<label>{{ trans('settings.core_site_name') }}</label>
	<input type="text" class="form-control" name="core_site_name" required="required"
		   value="{{ old('core_site_name', $settings->get('core.site.name')) }}">
</div>

<div class="form-group form-group-default">
	<label>{{ trans('settings.core_site_description') }}</label>
	<input type="text" class="form-control" name="core_site_description" required="required"
		   value="{{ old('core_site_description', $settings->get('core.site.description')) }}">
</div>

<div class="form-group form-group-default">
	<label>{{ trans('settings.core_site_logo') }}</label>

	{!! Widget::files_fields(
			'core_site_logo', [
                'value' => $settings->get('core.site.logo'),
                'old_value' => old('core_site_logo'),
                'placeholder' => '',
                'class' => '',
            ]) !!}

</div>

<div class="form-group form-group-default">
	<label>{{ trans('settings.core_site_favico') }}</label>

	{!! Widget::files_fields(
			'core_site_favico', [
                'value' => $settings->get('core.site.favico'),
                'old_value' => old('core_site_favico'),
                'placeholder' => '',
                'class' => '',
            ]) !!}

</div>
