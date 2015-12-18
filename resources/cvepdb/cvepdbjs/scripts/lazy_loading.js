/*
 * Main library for CVEPDB form_validation
 */
(function($, W, D){

	_cvepdb_lazyload = {};

	_cvepdb_lazyload.libraries = [
		{
			script: {
				CVEPDB_LAZYLOAD_JQREADY:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'jquery.lazyload.js')
			},
			trigger: 'always',
			mobile: false,
			browser: true
		}
	];

	/**
	 *  Class setup
	 */
	_cvepdb_lazyload.setup = function(){
		cvepdb.debug('cvepdb_lazy_loading.js > setup : success : Start');
		$.each(_cvepdb_lazyload.libraries, function(index, libjs){
			cvepdb.headjs.loadjs(libjs);
		});
		cvepdb.debug('cvepdb_lazy_loading.js > setup : success : End');
	};

	// Integrate to jQuery
	$.extend({
		lazyload: _cvepdb_lazyload
	});

	/**
	 * Initialize jQuery form validation library
	 */
	head.ready('CVEPDB_LAZYLOAD_JQREADY', function(){
		cvepdb.debug('cvepdb_lazy_loading.js > CVEPDB_LAZYLOAD_JQREADY : success : Start');



		//$(D).trigger('CVEPDB_LAZYLOAD_JQREADY');



		function endLoading(current_img, elements_left, settings)
		{
			cvepdb.debug('cvepdb_lazy_loading.js > endLoading : success : ' + $(this).attr('src') + ' loaded');

			$(this).parent().parent().find('.modal').removeClass('modal');
		}

		$('img.js-call-lazyload').load(function() {
			cvepdb.debug('cvepdb_lazy_loading.js > load : success : ' + $(this).attr('src') + ' loaded');
		});

		$("img.js-call-lazyload").show().lazyload({
			appear : endLoading,
			effect : "fadeIn"
		});




		cvepdb.debug('cvepdb_lazy_loading.js > CVEPDB_LAZYLOAD_JQREADY : success : End');
	});

	// A la fin du chargement de la library
	$(D).bind('CVEPDB_LAZYLOAD_READY', function() {
		cvepdb.debug('cvepdb_lazy_loading.js > CVEPDB_LAZYLOAD_READY : success : Start');
		_cvepdb_lazyload.setup();
		cvepdb.debug('cvepdb_lazy_loading.js > CVEPDB_LAZYLOAD_READY : success : End');
	});

})(jQuery, window, document);

cvepdb.lazyload = $.lazyload;
