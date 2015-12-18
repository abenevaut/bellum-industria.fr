/*
 * Main library for CVEPDB form_validation
 */
(function($, W, D){

	_cvepdb_tipsy = {};

	_cvepdb_tipsy.libraries = [
		{
			script: {
				CVEPDB_TIPSY_CSSREADY:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/tipsy/src/stylesheets/tipsy.css')
			},
			trigger: 'always',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_TIPSY_JQREADY:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/tipsy/src/javascripts/jquery.tipsy.js')
			},
			trigger: 'always',
			mobile: false,
			browser: true
		}
	];

	/**
	 *  Class setup
	 */
	_cvepdb_tipsy.setup = function(){
		cvepdb.debug('cvepdb_tipsy.js > setup : success : Start');
		$.each(_cvepdb_tipsy.libraries, function(index, libjs){
			cvepdb.headjs.loadjs(libjs);
		});
		cvepdb.debug('cvepdb_tipsy.js > setup : success : End');
	};

	// Integrate to jQuery
	$.extend({
		tipsy: _cvepdb_tipsy
	});

	/**
	 * Initialize jQuery form validation library
	 */
	head.ready('CVEPDB_TIPSY_JQREADY', function(){
		cvepdb.debug('cvepdb_tipsy.js > CVEPDB_TIPSY_JQREADY : success : Start');



		//$(D).trigger('CVEPDB_TIPSY_JQREADY');



		$('#gwi-back').tipsy({gravity: 'sw'});
		$('#gwi-thumbs').tipsy({gravity: 'sw', live: true});
		$('#gwi-prev').tipsy({gravity: 'sw', live: true});
		$('#gwi-next').tipsy({gravity: 'sw', live: true});
		$('#gwi-tags').tipsy({gravity: 'sw'});
		$('#gwi-rss').tipsy({gravity: 'sw'});
		$('#gwi-home').tipsy({gravity: 'sw'});




		cvepdb.debug('cvepdb_tipsy.js > CVEPDB_TIPSY_JQREADY : success : End');
	});

	// A la fin du chargement de la library
	$(D).bind('CVEPDB_TIPSY_READY', function() {
		cvepdb.debug('cvepdb_tipsy.js > CVEPDB_TIPSY_READY : success : Start');
		_cvepdb_tipsy.setup();
		cvepdb.debug('cvepdb_tipsy.js > CVEPDB_TIPSY_READY : success : End');
	});

})(jQuery, window, document);

cvepdb.tipsy = $.tipsy;
