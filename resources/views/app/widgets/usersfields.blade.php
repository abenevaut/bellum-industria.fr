@push('widget-scripts')
<script>
	(function ($, W, D) {
		$(D).bind('CVEPDB_SELECT2_READY', function () {
			var select_user = $('select[name="{{ $name }}"]');

			select_user.select2({
				theme: "bootstrap",
				width: '100%',
				placeholder: "{{ $placeholder }}",
				minimumInputLength: 3,
				minimumResultsForSearch: 0
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
				select_user.select2("val", "");
			});
		});
	})(jQuery, window, document);
</script>
@endpush


{!! Form::select($name, $users, $value, ['class' => $class, 'multiple' => 'multiple']) !!}
