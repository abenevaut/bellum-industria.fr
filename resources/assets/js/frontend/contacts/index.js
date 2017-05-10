(function ($, D, W) {
	"use strict";

	var _script = {};

	_script = {
		/**
		 * Run script
		 */
		init: function () {

			prettyPrint();

			_script.init_gmap();
			_script.init_validation();
		},
		/**
		 *
		 */
		init_gmap: function () {
			var map = new GMaps({
				div: '#map',
				scrollwheel: false,
				lat: 48.8566,
				lng: 2.3522
			});
			var marker = map.addMarker({
				lat: 48.8566,
				lng: 2.3522
			});
		},
		/**
		 *
		 */
		init_validation: function () {
			$("form").validate({
				rules: {
					subject: {
						required: true,
						maxlength: 255
					},
					email: {
						required: true,
						maxlength: 255,
						email: true
					},
					message: {
						required: true
					}
				},
				errorElement: "div",
				errorClass: 'help-block',
				ignore: ':hidden',
				errorPlacement: function (error, element) {

					if ($(element).hasClass('select2-hidden-accessible')) {
						error.insertAfter(element.next());
					}
					else if ($(element).hasClass('ui-spinner-input')) {
						error.insertAfter($(element).closest('span.ui-spinner').after());
					}
					else if ($(element).is('textarea')) {
						error.insertAfter(element.next());
					}
					else if ($(element).attr('type') != 'hidden') {
						error.insertAfter($(element).closest('div.input').after());
					}

					var current_form_group = $(element).closest(".form-group");
					current_form_group.removeClass("has-success");
					current_form_group.addClass("has-error");
				},
				highlight: function (element) { // <-- fires when element has error
					var current_form_group = $(element).closest(".form-group");
					current_form_group.removeClass("has-success");
					current_form_group.addClass("has-error");
				},
				unhighlight: function (element) { // <-- fires when element is valid
					var current_form_group = $(element).closest(".form-group");
					current_form_group.removeClass("has-error");
					current_form_group.addClass("has-success");
				},
				success: function (element) {
					var current_form_group = element.closest(".form-group");
					current_form_group.removeClass("has-error");
					current_form_group.addClass("has-success");
				}
			});
		}
	};

	$(D).bind('APP_READY', function () {
		_script.init();
	});
})(jQuery, document, window);
