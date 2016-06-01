@push('widget-scripts')
{{--<script src="{{ asset('modules/users/js/fields/select_roles.js') }}"></script>--}}
<script>
	(function ($, W, D) {
		$(D).bind('CVEPDB_SELECT2_READY', function () {
			var select_role = $('select[name="{{ $name }}"]');

			select_role.select2({
				theme: "bootstrap",
				width: '100%',
				placeholder: "{{ $placeholder }}"
			})
					.on("select2:select", function (e) {
						if (e.params.data.id == 0) { // All selected
							$('select[name="{{ $name }}"] > option').prop("selected", true);
							$('select[name="{{ $name }}"] > option[value="0"]').prop("selected", false);
							$('select[name="{{ $name }}"]').trigger("change");
							return false;
						}
					});

			$('.js-cancel-filters').on('click', function () {
				select_role.select2("val", "{{ $default_env }}");
			});

			if (select_role.val() == null) {
				select_role.select2("val", "{{ $default_env }}");
			}
		});
	})(jQuery, window, document);
</script>
@endpush

<?php $attributes = ['class' => $class, 'multiple' => 'multiple']; ?>

@if (
    !Auth::user()->hasRole(\Core\Domain\Roles\Repositories\RoleRepositoryEloquent::ADMIN)
    && !Auth::user()->hasPermission(\Core\Domain\Roles\Repositories\PermissionRepositoryEloquent::MANAGE_ENVIRONMENT_ITEMS)
)

	<?php $attributes = ['class' => $class, 'multiple' => 'multiple', 'disabled' => 'disabled']; ?>

@endif

{!! Form::select($name, $environments, $value, $attributes) !!}
