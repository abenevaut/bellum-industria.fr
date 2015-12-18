/*
 * Main library for CVEPDB form_validation
 */
(function($, W, D){

	_cvepdb_fv = {};

	_cvepdb_fv.libraries = [
		{
			script: {
				CVEPDB_FORM_VALIDATION_JQREADY:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/jquery-validation/dist/jquery.validate.min.js')
			},
			trigger: 'always',
			mobile: false,
			browser: true
		}
	];

	/**
	 *  Class setup
	 */
	_cvepdb_fv.setup = function(){
		cvepdb.debug('cvepdb_form_validation.js > setup : success : Start');
		$.each(_cvepdb_fv.libraries, function(index, libjs){
			cvepdb.headjs.loadjs(libjs);
		});
		cvepdb.debug('cvepdb_form_validation.js > setup : success : End');
	};

	/**
	 *
	 * @param submit_callback
	 */
	_cvepdb_fv.on_submit = function(submit_callback){
		if (typeof(submit_callback) == 'undefined') {
			submit_callback = function(){
				alert('cvepdb_form_validation on_submit callback undefined!');
			};
		}
		$.validator.setDefaults({ submitHandler: submit_callback });
	};

	/**
	 *
	 * @param name
	 * @param callback
	 * @param message
	 */
	_cvepdb_fv.add_control = function(name, callback, message){
		if (typeof(callback) != 'function') {
			callback = function(){ return false; };
		}
		if (typeof(message) == 'undefined' || message == null) {
			message = '';
		}
		$.validator.addMethod(name, callback, message);
	};

	/**
	 *
	 * @param container
	 * @param rules
	 */
	_cvepdb_fv.set_rules = function(container, rules){

		if (typeof(rules.ignore) == 'undefined') {
			rules.ignore = [':textarea:hidden.not(".js-call-tinymce")'];
		}

		// validate form on keyup and submit
		$(container).validate(rules);
	};

	// Integrate to jQuery
	$.extend({
		fv: _cvepdb_fv
	});

	/**
	 * Initialize jQuery form validation library
	 */
	head.ready('CVEPDB_FORM_VALIDATION_JQREADY', function(){
		cvepdb.debug('cvepdb_form_validation.js > CVEPDB_FORM_VALIDATION_JQREADY : success : Start');
		$(D).trigger('CVEPDB_FORM_VALIDATION_JQREADY');
		cvepdb.debug('cvepdb_form_validation.js > CVEPDB_FORM_VALIDATION_JQREADY : success : End');
	});

	// A la fin du chargement de la library
	$(D).bind('CVEPDB_FORM_VALIDATION_READY', function() {
		cvepdb.debug('cvepdb_form_validation.js > CVEPDB_FORM_VALIDATION_READY : success : Start');
		_cvepdb_fv.setup();
		cvepdb.debug('cvepdb_form_validation.js > CVEPDB_FORM_VALIDATION_READY : success : End');
	});

})(jQuery, window, document);

cvepdb.fv = $.fv;
