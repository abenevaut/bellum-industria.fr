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
		}
	};

	$(D).ready(function () {
		_script.init();
	});
})(jQuery, document, window);
