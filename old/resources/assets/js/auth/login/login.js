(function ($, W, D) {

	'use strict';

	var _form = {};

	/**
	 *
	 * @type {{setup: setup}}
	 * @private
	 */
	_form = {
		/**
		 *
		 */
		setup: function () {
			_form.validation.init();
		}
	};

	/**
	 *
	 * @type {{init: init}}
	 */
	_form.validation = {
		/**
		 *
		 */
		validator: null,
		/**
		 *
		 */
		form: null,
		/**
		 *
		 */
		init: function () {

			_form.validation.form = $("#form-login");

			// validate form on keyup and submit
			_form.validation.validator = bellumindustria
				.form_validation
				.new_validator(
					_form.validation.form,
					{
						email: {
							required: true,
							email: true,
							maxlength: 255
						},
						password: {
							required: true,
							maxlength: 255
						}
					},
					{}
				);
		}
	};

	/**
	 *
	 */
	$(document).bind('APP_READY', function () {
		_form.setup();
	});

})(window.jQuery, window, document);
