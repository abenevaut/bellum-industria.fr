(function ($, D) {

	'use strict';

	// A la fin du chargement de la library
	$(D).bind('CVEPDB_READY', function () {

		$('select[name="language_switcher"]').select2({
			minimumResultsForSearch: -1
		});
	});

})(window.jQuery, document);
