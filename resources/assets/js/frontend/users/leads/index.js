(function ($, D, W) {
	"use strict";

	var _script = {};
	var _form = {};

	_script = {
		/**
		 * Run script
		 */
		init: function () {
			bellumindustria.debug('index.js > init start');

			prettyPrint();

			_script.init_gmap();
			_form.setup();

			bellumindustria.debug('index.js > init end');
		},
		/**
		 *
		 */
		init_gmap: function () {
			bellumindustria.debug('index.js > init_gmap');

            if (typeof google === 'object' && typeof google.maps === 'object') {
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
            }
		}
	};

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

			_form.validation.form = $("#form-contact");

			// validate form on keyup and submit
			_form.validation.validator = bellumindustria
				.form_validation
				.new_validator(
					_form.validation.form,
					{
                        civility: {
                            required: true
                        },
						first_name: {
							required: true,
							maxlength: 255
						},
						last_name: {
							required: true,
							maxlength: 255
						},
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
					{}
				);
		}
	};

	$(D).bind('APP_READY', function () {
		_script.init();
	});
})(jQuery, document, window);
