// Define debug mode for JS
switch (cvepdb_config.ENV) {
	case 'production':
	case 'staging': {
		window.debug = false;
		break;
	}
	case 'development':
	default: {
		window.debug = true;
	}
}

if (typeof window.console === 'undefined') {
	window.console = {
		log: function() {},
		warn: function() {},
		error: function() {},
		trace: function() {}
	}
}

/**
 * CVEPDB Exception
 *

 try {
    throw new CVEPDBException("Test TRY");
 }
 catch (error) {
    cvepdb.exception(error);
 }

 */
CVEPDBException = function(){

	this.__proto__.__proto__ = Error.apply(null, arguments);

	var current_stack = this.stack || this.stacktrace || '';
	var current_stack_index = 0;

	current_stack = current_stack.split(/\n/);

	$.each(current_stack, function(i, value){
		if (value.match(/CVEPDBException/g)) {
			current_stack_index = Number(i);
		}
	});

	if (current_stack.length > 1) {
		current_stack.splice(1, 1);
	}

	// On split sur ':' la ligne de log qui definit notre erreur en cours pour extraire le numero de ligne et de colonne
	var current_stack_tmp = current_stack_index
	  ? current_stack[current_stack_index].split(/:/)
	  : [""];

	/*
	 * On definit les arguments de la class
	 */

	this.name = "CVEPDBException";

	this.stack = current_stack.join("\n");

	this.fileName = (current_stack_tmp != null && current_stack_tmp.length > 1)
	  ? current_stack_tmp[1]
	  : "N/A";

	this.lineNumber = (current_stack_tmp != null && current_stack_tmp.length > 1)
	  ? current_stack_tmp[2]
	  : "N/A";

	this.columnNumber = (current_stack_tmp != null && current_stack_tmp.length > 1)
	  ? current_stack_tmp[3].replace(')', '')
	  : "N/A";

	this.toString = function(){
		return this.name + ' : ' + this.fileName
		  + "\n Msg : \"" + this.message.toString() + "\" "
		  + "\n File Name : " + (this.fileName == 'undefined' ? 'N/A' : this.fileName)
		  + "\n Line : " + (this.lineNumber == 'undefined' ? 'N/A' : this.lineNumber)
		  + "\n Column : " + (this.columnNumber == 'undefined' ? 'N/A' : this.columnNumber)
		  + "\n Stack:\n" + this.stack;
	};
};

/**
 * Declaration de la fonction getClassOf qui permet d'obtenir pour une variable de le nom de la classe dont la variable est
 * l'instance. getClassOf(new Date()); => "[object Date]"
 * @type {function(this:Function)}
 */
// var getClassOf = Function.prototype.call.bind(Object.prototype.toString);

/*
 * Main library for CVEPDB App
 */
(function($, W, D){

	_cvepdb = {};

	/*
	 * JS libraries to auto load
	 */
	_cvepdb.libraries = [
		{
			script: {
				CVEPDB_FORM_VALIDATION:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + '/scripts/form_validation.js')
			},
			trigger: '.js-call-form_validation',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_TINYMCE:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/tinymce/tinymce.min.js')
			},
			trigger: '.js-call-tinymce',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_MULTIDATESPICKER:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'scripts/multidatespicker.js')
			},
			trigger: '.js-call-multidatespicker',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_PYROCMS_FILTER:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'scripts/filters.js')
			},
			trigger: '.js-call-pyrofilters',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_LAZYLOAD:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'scripts/lazy_loading.js')
			},
			trigger: '.js-call-lazyload',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_TIPSY:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'scripts/tipsy.js')
			},
			trigger: 'always',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_HIGHCHARTS:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'scripts/highcharts.js')
			},
			trigger: '.js-call-highcharts',
			mobile: false,
			browser: true
		},
		{
			script: {
				CVEPDB_SELECTNAV:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/selectnav/selectnav.min.js')
			},
			trigger: '.js-call-selectnav',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_DDSMOOTHMENU:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/ddsmoothmenu/ddsmoothmenu.js')
			},
			trigger: '.js-call-ddsmoothmenu',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_HOVERDIR:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/DirectionAwareHoverEffect/js/jquery.hoverdir.js')
			},
			trigger: '.js-call-hoverdir',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_ISOTOPE:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/isotope/jquery.isotope.js')
			},
			trigger: '.js-call-isotope',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_FITVIDS:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/jquery.fitvids/jquery.fitvids.js')
			},
			trigger: '.js-call-fitvids',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_REVOLUTION:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/slider-revolution/src/js/jquery.themepunch.revolution.min.js')
			},
			trigger: '.js-call-revolution',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_REVOLUTION_PLUGINS:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/slider-revolution/src/js/jquery.themepunch.plugins.min.js')
			},
			trigger: '.js-call-revolution',
			mobile: true,
			browser: true
		},
		{
			script: {
				CVEPDB_EASYTABS:
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/easytabs/lib/jquery.easytabs.min.js')
			},
			trigger: '.js-call-easytabs',
			mobile: true,
			browser: true
		}
	];

	/*
	 * JS scripts to auto load
	 */
	_cvepdb.scripts = [
	];

	_cvepdb.globalize_initialized = $.Deferred();
	_cvepdb.sentry_initialized = $.Deferred();

	/**
	 *  Class initializer
	 */
	_cvepdb.initialize = function(){
		_cvepdb.debug('cvepdb.js > initialize : success : Start');
		// Load asynchrously all Globalize scripts
		head.load(
		  {'CVEPDB_GLOBALIZE_LOADED': (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + "libs/globalize/lib/globalize.js")},
		  {'CVEPDB_SENTRY_LOADED': (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + "libs/raven-js/dist/raven.min.js")}
		);

		/*
		 * Live reload
		 */

		if (typeof(cvepdb_config.LIVEREALOAD.project) != undefined && cvepdb_config.LIVEREALOAD.project != 0){

			var url = (typeof(cvepdb_config.LIVEREALOAD.url) != 'undefined')
			  ? cvepdb_config.LIVEREALOAD.url
			  : (location.host || 'localhost').split(':')[0];
			var port = (typeof(cvepdb_config.LIVEREALOAD.port) != 'undefined')
			  ? cvepdb_config.LIVEREALOAD.port
			  : '35729';
			var project = (typeof(cvepdb_config.LIVEREALOAD.project) != 'undefined')
			  ? cvepdb_config.LIVEREALOAD.project
			  : '1';

			_cvepdb.debug(
			  'cvepdb.js > initialize : success : Livereload :'
			  + ' - URL = ' + url
			  + ' - PORT = ' + port
			  + ' - PROJECT = ' + project
			);

			D.write('<script src="http://' + url + ':' + port + '/livereload.js?snipver=' + project + '"></' + 'script>');
		}

		_cvepdb.debug('cvepdb.js > initialize : success : End');
	};

	/**
	 *  Class setup
	 */
	_cvepdb.setup = function(){
		_cvepdb.debug('cvepdb.js > setup : success : Start');
		$.each(_cvepdb.libraries, function(index, libjs){
			_cvepdb.headjs.loadjs(libjs);
		});
		$.each(_cvepdb.scripts, function(index, libjs){
			_cvepdb.headjs.loadjs(libjs);
		});
		_cvepdb.debug('cvepdb.js > setup : success : End');
	};

	/**
	 * Display debug in console
	 *
	 * @param string The string to display
	 * @returns {bool} True if debug is allowed
	 */
	_cvepdb.debug = function(string){
		if (true == window.debug) {
			console.log(string);
		}
		return window.debug;
	};

	/**
	 * Display errors in console
	 *
	 * @param string The string to display
	 * @returns {bool} True if debug is allowed
	 */
	_cvepdb.error = function(string){
		if (true == window.debug) {
			console.error(string);
		}
		_cvepdb.sentry.report();
		return window.debug;
	};

	/**
	 * Display warnings in console
	 *
	 * @param string The string to display
	 * @returns {bool} True if debug is allowed
	 */
	_cvepdb.warning = function(string){
		if (true == window.debug) {
			console.warn(string);
		}
		_cvepdb.sentry.report();
		return window.debug;
	};

	/**
	 * Clear browser console.
	 * https://developers.google.com/chrome-developer-tools/docs/console?hl=fr
	 */
	_cvepdb.clear_console = function(){
		if (true == window.debug) {
			console.clear();
		}
		return window.debug;
	};

	_cvepdb.exception = function(error){
		// On doit declarer CVEPDBException en premier car c'est aussi une instance de Error (heritage).
		if (typeof(error) == 'object' && error instanceof CVEPDBException) {
			_cvepdb.error(error.toString());
		}
		else if (typeof(error) == 'object' && error instanceof Error) {
			_cvepdb.error(error.message + '\n' + error.stack);
		}
	};

	_cvepdb.string = {

		/**
		 * Sluggify a string, delete all special char from a string
		 */
		slugify: function(str){
			str = str.replace(/^\s+|\s+$/g, ''); // trim
			str = str.toLowerCase();
			// remove accents, swap ñ for n, etc
			var from = "ĺěščřžýťňďàáäâèéëêìíïîòóöôùůúüûñç·/_,:;";
			var to   = "lescrzytndaaaaeeeeiiiioooouuuuunc------";
			for (var i = 0, l = from.length; i < l; i++) {
				str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
			}
			str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
			  .replace(/\s+/g, '-') // collapse whitespace and replace by _
			  .replace(/-+/g, '-'); // collapse dashes
			return str;
		},

		/**
		 * JS ucfirst, to capitalize first letter of string
		 * http://forwebonly.com/capitalize-the-first-letter-of-a-string-in-javascript-the-fast-way/
		 */
		ucfirst: function(str){
			return str[0].toUpperCase() + str.substring(1);
		},

		/**
		 *
		 * @param str
		 * @param args
		 * @param replaces
		 * @returns {*}
		 */
		jsprintf: function(str, args, replaces){
			$.each(args, function(index, value){

				var regx = new RegExp('%'+value+'%', 'g');

				if (str.match(regx)) {
					str = str.replace(regx, replaces[index]);
				}
			});
			return str;
		}

	};

	_cvepdb.array = {

		/**
		 * Allow to know if a value is in array
		 */
		in_array: function(array, p_val){
			var l = array.length;
			for (var i = 0; i < l; ++i) {
				if (array[i] == p_val) {
					return true;
				}
			}
			return false;
		}

	};

	_cvepdb.object = {

		/**
		 * JS var_dump, display object content on HTML DOM
		 */
		dump: function(obj){
			var out = '';
			for (var i in obj) {
				if (typeof(obj[i]) === 'object') {
					_cvepdb.dump(obj[i]);
				}
				else {
					out += i + ": " + obj[i] + "\n";
				}
			}
			// display on html DOM
			var pre = document.createElement('pre');
			pre.innerHTML = out;
			document.body.appendChild(pre);
			return true;
		}

	};

	_cvepdb.maths = {
		/**
		 *
		 * @author ABE
		 * @param number
		 * @param params
		 * @returns {string}
		 */
		number: function(number, params){
			return (Number(number.replace(',', '.'))).toFixed(2);

			if (typeof params == 'undefined') {
				params = {};
			}

			//		Globalize.formatNumber(number, params, 'en');
		},
		/**
		 *
		 * @author ABE
		 * @param numbers
		 * @param params
		 * @returns {number}
		 */
		sum: function(numbers, params){

			var total = 0;

			$.each(numbers, function(i, number){
				total = (
				_cvepdb.maths.number(number, params)
				+ _cvepdb.maths.number(total, params)
				).toFixed(2);
			});

			return total;

			if (typeof params == 'undefined') {
				params = {};
			}

			//		Globalize.formatNumber(float, params, 'en');
		},
		/**
		 * Donne le pourcentage de n1 par rapport a n2
		 *
		 * @param n1
		 * @param n2
		 * @returns {number}
		 */
		pourcentage: function(n1, n2){
			return n1 * 100 / n2;
		},
		/**
		 * Donne le pourcentage de remise de n1 par rapport a n2
		 *
		 * @param n1
		 * @param n2
		 * @returns {number}
		 */
		remise: function(n1, n2){
			return (n2 - n1) * 100 / n2;
		}

	};

	/**
	 * Dates DRY
	 */
	_cvepdb.dates = {
		/**
		 * Regex patterns for manipulated dates
		 */
		rxDatePattern: {
			// Date pattern dd/mm/yyyy
			fr : /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/,
			// Date pattern yyyy-mm-dd
			en : /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/
		},
		/**
		 */
		_before_diff: function(d1, d2, caller) {
			if (d1 == null || typeof(d1) == 'undefined') {
				throw new CVEPDBException('cvepdb.js > _cvepdb.dates.'+caller+' : error : '+caller+' d1 arg is null');
			}
			//			else if (d1 instanceof Date) {
			//				throw new CVEPDBException(
			//					'cvepdb.js > _cvepdb.dates.'+caller+' : error : '+caller+' d1 arg is not an instance of Date object'
			//					+ ' this is an instance of ' + getClassOf(d1)
			//				);
			//			}
			else if (d2 == null || typeof(d2) == 'undefined') {
				throw new CVEPDBException('cvepdb.js > _cvepdb.dates.'+caller+' : error : '+caller+' d2 arg is null');
			}
			//			else if (d2 instanceof Date) {
			//				throw new CVEPDBException(
			//					'cvepdb.js > _cvepdb.dates.'+caller+' : error : '+caller+' d2 arg is not an instance of Date object'
			//						+ ' this is an instance of ' + getClassOf(d2)
			//				);
			//			}
			cvepdb.main.debug('cvepdb.js > _cvepdb.dates.'+caller+' : success : d1 = ' + d1 + ' && d2 = ' + d2);
		},
		/**
		 * Two dates days diff
		 *
		 * @param d1 Objet date
		 * @param d2 Objet date
		 * @returns {Number}
		 */
		diffInDays: function(d1, d2) {
			_cvepdb.dates._before_diff(d1, d2, 'diffInDays');
			var t2 = d2.getTime();
			var t1 = d1.getTime();
			return parseInt((t2 - t1) / (24 * 3600 * 1000));
		},
		/**
		 * Two dates weeks diff
		 *
		 * @param d1 Objet date
		 * @param d2 Objet date
		 * @returns {Number}
		 */
		diffInWeeks: function(d1, d2) {
			_cvepdb.dates._before_diff(d1, d2, 'diffInWeeks');
			var t2 = d2.getTime();
			var t1 = d1.getTime();
			return parseInt((t2 - t1) / (24 * 3600 * 1000 * 7));
		},
		/**
		 * Two dates months diff
		 *
		 * @param d1 Objet date
		 * @param d2 Objet date
		 * @returns {number}
		 */
		diffInMonths: function(d1, d2) {
			_cvepdb.dates._before_diff(d1, d2, 'diffInMonths');
			var d1Y = d1.getFullYear();
			var d2Y = d2.getFullYear();
			var d1M = d1.getMonth();
			var d2M = d2.getMonth();
			return ((d2M + 12 * d2Y) - (d1M + 12 * d1Y));
		},
		/**
		 * Two dates years diff
		 * @param d1 Objet date
		 * @param d2 Objet date
		 * @returns {number}
		 */
		diffInYears: function(d1, d2) {
			_cvepdb.dates._before_diff(d1, d2, 'diffInYears');
			return (d2.getFullYear() - d1.getFullYear());
		},
		/**
		 * Permet de convertir une date string en objet date.
		 *
		 * Si l'on obtient pas d'objet date avec cette methode :
		 *
		 * - Soit la date n'est pas une date
		 * - Soit la date n'est pas correctement formater (il est aussi possible d'editer cette methode pour ajouter
		 * des formats de dates)
		 *
		 * @param date Une date FR au format 'dd/mm/yyyy' OU une date EN au format 'yyyy-mm-dd'
		 * @returns Date|null Objet Date si le param date est valide, sinon NULL
		 */
		getDateObject: function(date){

			var date_obj      = null;
			var current_date  = date;
			var dateFRArray   = current_date.match(_cvepdb.dates.rxDatePattern.fr);
			var dateENArray   = current_date.match(_cvepdb.dates.rxDatePattern.en);

			if (
			  typeof dateFRArray != 'undefined'
			  && dateFRArray instanceof Array
			  && dateFRArray.length > 0
			) {
				current_date = dateFRArray[5] + '/' + dateFRArray[3] + '/' + dateFRArray[1];
				date_obj = new Date(current_date);
			}
			else if (
			  typeof dateENArray != 'undefined'
			  && dateENArray instanceof Array
			  && dateENArray.length > 0
			) {
				current_date = current_date.replace(new RegExp("-", "g"), '/');
				date_obj = new Date(current_date);
			}
			return date_obj;
		},
		getDateObjectAsFRString: function(date){
			var d = new Date(date || Date.now()),
			  month = '' + (d.getMonth() + 1),
			  day = '' + d.getDate(),
			  year = d.getFullYear();

			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;

			return [day, month, year].join('/');
		},
		getDateObjectAsENString: function(date){
			var d = new Date(date || Date.now()),
			  month = '' + (d.getMonth() + 1),
			  day = '' + d.getDate(),
			  year = d.getFullYear();

			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;

			return [year, month, day].join('-');
		}
	};

	/**
	 * @author ABE
	 * @type {{isValidId: Function}}
	 */
	_cvepdb.checks = {
		/**
		 * Check si la valeur de n est un int valide
		 *
		 * @param n le nombre que l'on check
		 * @returns {boolean} true si int valide sinon false
		 */
		isInt: function(n){
			n = Number(n);
			return (typeof(n) == "number") && isFinite(n) && (n % 1 === 0);
		},
		/**
		 * Check si la valeur de id est un id valide.
		 *
		 * @author ABE
		 * @param id l'id que l'on check
		 * @returns {*} id si id est un id valide sinon 0
		 */
		isValidId: function(id){
			return (_cvepdb.checks.isInt(id) && (Number(id) > 0))
			  ? id
			  : 0;
		}
	};

	_cvepdb.globalize = {

		/**
		 * Globalize functionality to get string from a key
		 *
		 * @param key Globalize dictionnary key. Ex : 'Namespace/key'
		 * @param lang Globalize dictionnary lang. Ex : 'en'
		 * @returns {string} The string conresponding to key
		 */
		translate: function(key, lang){

			if (typeof(lang) == 'undefined' || lang == ''){
				lang = cvepdb_config.LANG;
			}
			return Globalize.culture().messages[key];
		},

		/**
		 * Globalize functionality to load a dictionary
		 *
		 * @param dictionary A dictionary to load { key: word, ... }
		 * @param lang Globalize dictionnary lang. Ex : 'en'
		 */
		loadDictionary: function(dictionary, lang){

			if (typeof(lang) == 'undefined' || lang == ''){
				lang = cvepdb_config.LANG;
			}
			Globalize.addCultureInfo(lang, "default", { messages: dictionary });
		}

	};

	_cvepdb.headjs = {

		/**
		 * HeadJS functionality to load scripts
		 *
		 * @param js
		 */
		loadjs: function(js){
			if (
			  typeof(js.script) != 'undefined'
			  && (
			  $(js.trigger).length > 0
			  || js.trigger == 'always'
			  )
			  && (
			  js.browser == cvepdb_config.UA.BROWSER
			  || js.mobile == cvepdb_config.UA.MOBILE
			  )
			) {
				head.load(js.script);
			}
		}

	};

	_cvepdb.sentry = {
		is_active: false,
		development: {
			key: null,
			url: null,
			project: 0
		},
		staging: {
			key: null,
			url: null,
			project: 0
		},
		production: {
			key: null,
			url: null,
			project: 0
		},
		/**
		 *
		 */
		report: function(){
			if (_cvepdb.sentry.is_active) {

				var tags = {
					KEY: "error",
					/*
					 * PyroCMS tags
					 */
					ENV: cvepdb_config.ENV,
					ENV_REF: cvepdb_config.ENV_REF,
					LANG: cvepdb_config.LANG,
					URI_BASE: cvepdb_config.URI_BASE,
					URL_BASE: cvepdb_config.URL_BASE,
					URL_SITE: cvepdb_config.URL_SITE,
					UA: cvepdb_config.UA,
					/*
					 * Browser tags
					 */
					currentURL: document.URL,
					userAgent: navigator.userAgent,
					platform: navigator.platform,
					userid: localStorage.userid,
					language: navigator.language,
					cookies: navigator.cookiesEnabled
				};

				// record a simple message
				Raven.captureMessage(string, {tags: tags});
			}
		}
	};

	/**
	 * Initialize Globalize library
	 */
	head.ready('CVEPDB_GLOBALIZE_LOADED', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_GLOBALIZE_LOADED : success : Start');
		_cvepdb.debug('cvepdb.js > CVEPDB_GLOBALIZE_LOADED : success : Initialisation de Globalize');
		Globalize.culture(cvepdb_config.LANG);

		var libraries = {};

		if (cvepdb_config.LANG != 'en') {
			libraries = {
				'CVEPDB_DICTIONARY_LOADED':
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + "scripts/globalize/locale_" + cvepdb_config.LANG + ".js")
			};
			// Load Globalize culture
			head.load(cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + "libs/globalize/lib/cultures/globalize.culture." + cvepdb_config.LANG + ".js");
		}
		else {
			/*
			 * Globalize load 'en' cultures by default
			 */
			libraries = {
				'CVEPDB_DICTIONARY_LOADED':
				  (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + "scripts/globalize/locale_en.js")
			};
		}

		head.load(
		  libraries,
		  function(){
			  _cvepdb.globalize_initialized.resolve();
			  $(D).trigger('CVEPDB_GLOB_MESS_READY');
		  }
		);
		$(D).trigger('CVEPDB_GLOBALIZE_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_GLOBALIZE_LOADED : success : End');
	});

	/**
	 * Initialize Globalize message library
	 */
	head.ready('CVEPDB_DICTIONARY_LOADED', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_DICTIONARY_LOADED : success : Start');
		$(D).trigger('CVEPDB_DICTIONARY_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_DICTIONARY_LOADED : success : End');
	});

	/**
	 * Initialize Raven library for Sentry
	 */
	head.ready('CVEPDB_SENTRY_LOADED', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_SENTRY_LOADED : success : Start');
		_cvepdb.sentry_initialized.resolve();
		$(D).trigger('CVEPDB_SENTRY_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_SENTRY_LOADED : success : End');
	});

	/**
	 * Initialize form_validation library
	 */
	head.ready('CVEPDB_FORM_VALIDATION', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_FORM_VALIDATION : success : Start');
		$(D).trigger('CVEPDB_FORM_VALIDATION_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_FORM_VALIDATION : success : End');
	});

	/**
	 * Initialize lazy_loading library
	 */
	head.ready('CVEPDB_LAZYLOAD', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_LAZYLOAD : success : Start');
		$(D).trigger('CVEPDB_LAZYLOAD_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_LAZYLOAD : success : End');
	});

	/**
	 * Initialize lazy_loading library
	 */
	head.ready('CVEPDB_TIPSY', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_TIPSY : success : Start');
		$(D).trigger('CVEPDB_TIPSY_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_TIPSY : success : End');
	});

	/**
	 * Initialize tinymce library
	 */
	head.ready('CVEPDB_TINYMCE', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE : success : Start');
		$(D).trigger('CVEPDB_TINYMCE_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE : success : End');
	});

	/**
	 * Initialize multidatespicker library
	 */
	head.ready('CVEPDB_MULTIDATESPICKER', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_MULTIDATESPICKER : success : Start');
		$(D).trigger('CVEPDB_MULTIDATESPICKER_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_MULTIDATESPICKER : success : End');
	});

	/**
	 * Initialize filters library
	 */
	head.ready('CVEPDB_PYROCMS_FILTER', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_PYROCMS_FILTER : success : Start');

		if (
		  (typeof(cvepdb_config.FILTERS) != 'undefined')
		  && (typeof(cvepdb_config.FILTERS.startup_load_filters) != 'undefined')
		) {
			cvepdb.filter.startup_load_filters = cvepdb_config.FILTERS.startup_load_filters;
			_cvepdb.debug(
			  'cvepdb.js > CVEPDB_PYROCMS_FILTER : success : cvepdb.filter.startup_load_filters = '
			  + cvepdb.filter.startup_load_filters
			)
		}

		cvepdb.filter.init();
		$(D).trigger('CVEPDB_PYROCMS_FILTER_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_PYROCMS_FILTER : success : End');
	});

	/**
	 * Initialize selectnav library
	 */
	head.ready('CVEPDB_SELECTNAV', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_SELECTNAV : success : Start');
		$(D).trigger('CVEPDB_SELECTNAV_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_SELECTNAV : success : End');
	});

	/**
	 * Initialize ddsmoothmenu library
	 */
	head.ready('CVEPDB_DDSMOOTHMENU', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_DDSMOOTHMENU : success : Start');
		$(D).trigger('CVEPDB_DDSMOOTHMENU_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_DDSMOOTHMENU : success : End');
	});

	/**
	 * Initialize hoverdir library
	 */
	head.ready('CVEPDB_HOVERDIR', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_HOVERDIR : success : Start');
		$(D).trigger('CVEPDB_HOVERDIR_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_HOVERDIR : success : End');
	});

	/**
	 * Initialize isotope library
	 */
	head.ready('CVEPDB_ISOTOPE', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_ISOTOPE : success : Start');
		$(D).trigger('CVEPDB_ISOTOPE_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_ISOTOPE : success : End');
	});

	/**
	 * Initialize fitvids library
	 */
	head.ready('CVEPDB_FITVIDS', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_FITVIDS : success : Start');
		$(D).trigger('CVEPDB_FITVIDS_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_FITVIDS : success : End');
	});

	/**
	 * Initialize slider revolution library
	 */
	head.ready('CVEPDB_REVOLUTION', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_REVOLUTION : success : Start');
		$(D).trigger('CVEPDB_REVOLUTION_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_REVOLUTION : success : End');
	});

	/**
	 * Initialize easytabs library
	 */
	head.ready('CVEPDB_EASYTABS', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_EASYTABS : success : Start');
		$(D).trigger('CVEPDB_EASYTABS_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_EASYTABS : success : End');
	});

	/**
	 * Initialize filters library
	 */
	head.ready('CVEPDB_HIGHCHARTS', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_HIGHCHARTS : success : Start');
		$(D).trigger('CVEPDB_HIGHCHARTS_READY');
		_cvepdb.debug('cvepdb.js > CVEPDB_HIGHCHARTS : success : End');
	});

	// Integrate to jQuery
	$.extend({
		cvepdb: _cvepdb
	});

	// A la fin du chargement du DOM et a la fin du chargement des libraries globalize + sentry
	$.when(
	  _cvepdb.globalize_initialized,
	  _cvepdb.sentry_initialized,
	  $(D).data("readyDeferred")
	).done(function() {
		_cvepdb.debug('cvepdb.js > document.ready : success : Start');
		_cvepdb.setup();
		_cvepdb.debug('cvepdb.js > document.ready : success : Trigger CVEPDB Events');
		$(D).trigger('CVEPDB_ONLOAD');
		$(D).trigger('CVEPDB_READY');
		_cvepdb.debug('cvepdb.js > document.ready : success : End');
	});

	// A la fin du chargement du DOM
	$(D).ready(function() {});

	$(D).bind('CVEPDB_SENTRY_READY', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_SENTRY_READY : success : Start');

		var api_url = null;

		switch (cvepdb_config.ENV) {
			case 'production': {
				if (_cvepdb.sentry.production.project) {
					api_url = 'http://'
					+ _cvepdb.sentry.production.key
					+ '@'
					+ _cvepdb.sentry.production.url
					+ '/'
					+ _cvepdb.sentry.production.project;
				}
				break;
			}
			case 'staging': {
				if (_cvepdb.sentry.staging.project) {
					api_url = 'http://'
					+ _cvepdb.sentry.staging.key
					+ '@'
					+ _cvepdb.sentry.staging.url
					+ '/'
					+ _cvepdb.sentry.staging.project;
				}
				break;
			}
			case 'development':
			default: {
				if (_cvepdb.sentry.development.project) {
					api_url = 'http://'
					+ _cvepdb.sentry.development.key
					+ '@'
					+ _cvepdb.sentry.development.url
					+ '/'
					+ _cvepdb.sentry.development.project;
				}
			}
		}

		if (api_url != null) {
			Raven.config(api_url, {
				// we highly recommend restricting exceptions to a domain in order to filter out clutter
				whitelistUrls: [cvepdb_config.URL_THEME + '/js']
			}).install();

			Raven.setUser({ id: cvepdb_config.IDUSER });

			_cvepdb.sentry.is_active = true;
		}

		_cvepdb.debug('cvepdb.js > CVEPDB_SENTRY_READY : success : End');
	});

	$(D).bind('CVEPDB_TINYMCE_READY', function(){
		_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE_READY : success : Start');

		/*
		 * Pour chaque element tinymce
		 *
		 * La doc des arguments est accessible via ce lien :  http://www.tinymce.com/wiki.php/Configuration
		 *
		 * ASTUCE : vous pouvez precise l'argument que vous voulez visionner en precisant l'argument en fin du lien :
		 * http://www.tinymce.com/wiki.php/Configuration:statusbar
		 * http://www.tinymce.com/wiki.php/Configuration:toolbar
		 */
		$('textarea.js-call-tinymce').each(function(){
			tinymce.init({
				selector: 'textarea#' + $(this).attr('id') + '.js-call-tinymce',
				theme: "modern",
				//				width: 300,
				height: 350,
				plugins: [

				],
				// content_css: "css/content.css",
				toolbar: 'undo redo | bold italic | bullist numlist',
				// Barre de status en bas de l'editeur, indique dans quels balises ont se trouve.
				statusbar : false,
				// Barre du haut comme sur un logiciel window (fichier, etc..)
				menubar: false,
				style_formats: [
				],
				setup : function(ed){
					/**
					 * Affectaction d'une callback sur l'evenement onChange a notre editeur tinymce.
					 * A chaque changement de contenu, l'editeur emet un evenement PDLF_TINYMCE_CHANGE, qui contient en parametre :
					 *
					 * - l'evenement qu'il a lui meme recu, 'event'
					 * - l'objet qui correspond a notre editeur, 'editor'
					 * - le contenu de l'editeur, 'content'
					 *
					 * @seealso On trouve l'essemble des methodes de l'objet editor a cette url :
					 * http://www.tinymce.com/wiki.php/api4:class.tinymce.Editor
					 */
					ed.on('NodeChange', function(e){
						_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE_READY : success : l\'objet event ' + e);
						_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE_READY : success : l\'objet editeur ' + ed);
						_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE_READY : success : le contenu ' + ed.getContent());
						$(D).trigger(
						  'PDLF_TINYMCE_CHANGE',
						  [{
							  event: e,
							  editor: ed,
							  content: ed.getContent()
						  }]
						);
					});

					/**
					 * Envoie de l'evenement PDLF_TINYMCE_EDITOR_READY a la fin du chargement de l'editeur
					 */
					ed.on('init', function(e) {
						$(D).trigger(
						  'CVEPDB_TINYMCE_EDITOR_READY',
						  [{
							  event: e,
							  editor: ed
						  }]
						);
					});

					/**
					 * Envoie de l'evenement PDLF_TINYMCE_EDITOR_KEYUP a chaque insertion dans l'editeur
					 */
					ed.on('keyup', function(e) {
						$(D).trigger(
						  'CVEPDB_TINYMCE_EDITOR_KEYUP',
						  [{
							  event: e,
							  editor: ed
						  }]
						);
					});
				}
			});
		});

		_cvepdb.debug('cvepdb.js > CVEPDB_TINYMCE_READY : success : End');
	});

	// window.onload
	$(W).onload = _cvepdb.initialize();

	_cvepdb.redirect = function(href){
		W.location = href;
	};

	_cvepdb.unbeforeunload = function(arg){
		if (arg == null) {
			W.onbeforeunload = null;
		}
		else if (typeof(arg) == "function") {
			W.onbeforeunload = arg;
		}
		else if (typeof(arg) === 'string') {
			W.onbeforeunload = function(){
				return arg;
			};
		}
	};

	/**
	 * Methode to catch JS errors and allow to display it in console with description
	 * http://danlimerick.wordpress.com/2014/01/18/how-to-catch-javascript-errors-with-window-onerror-even-on-chrome-and-firefox/
	 *
	 * @param error_msg
	 * @param url
	 * @param line
	 * @param column
	 * @param error_obj
	 */
	W.onerror = function(error_msg, url, line, column, error_obj) {
		_cvepdb.error('cvepdb.js > W.onerror : error : ' + error_msg
		  + '\n on page: ' + url
		  + '\n on line: ' + line
		  + '\n on column: ' + column
		  + '\n on object: ' + error_obj
		);
	};

})(jQuery, window, document);

// Save CVEPDB object
var cvepdb = $.cvepdb;

// Display CVEPDB state
cvepdb.debug('CVEPDB object running...');
