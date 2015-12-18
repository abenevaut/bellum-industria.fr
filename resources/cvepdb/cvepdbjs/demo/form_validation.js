(function ($, D, W) {

	$(D).bind('CVEPDB_FORM_VALIDATION_JQREADY', function () {
		cvepdb.debug('form_validation.js > CVEPDB_FORM_VALIDATION_JQREADY : success : Start demo');

		cvepdb.fv.on_submit(function () {
			return true;
		});

		cvepdb.fv.set_rules('form#commentForm2', {
			errorPlacement : function (error, element) {

				if (element.attr('type') == 'checkbox') {
					error.insertBefore(element.closest('div'));
				} else {
					error.insertAfter(element);
				}
				var current_form_group = element.closest(".form-group");
				current_form_group.removeClass("has-success");
				current_form_group.addClass("has-error");

			}, errorElement: "div", errorClass: 'required', rules: {
				email: {
					required: true, email: true
				}
			}, messages    : {
				email: {
					required: cvepdb.globalize.translate('FIELD_REQUIRED'), email: cvepdb.globalize.translate('FIELD_VALID_EMAIL')
				}
			}, highlight   : function (element) { // <-- fires when element has error
				var current_form_group = $(element).closest(".form-group");
				current_form_group.removeClass("has-success");
				current_form_group.addClass("has-error");
			}, unhighlight : function (element) { // <-- fires when element is valid
				var current_form_group = $(element).closest(".form-group");
				current_form_group.removeClass("has-error");
				current_form_group.addClass("has-success");
			}, success     : function (element) {
				var current_form_group = element.closest(".form-group");
				current_form_group.removeClass("has-error");
				current_form_group.addClass("has-success");
			}
		});

		cvepdb.debug('form_validation.js > CVEPDB_FORM_VALIDATION_JQREADY : success : End demo');
	});

})(jQuery, document, window);