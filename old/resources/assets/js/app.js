/*
 * Give default behaviours for window.console if browser doesn't
 */

if (typeof window.console === 'undefined') {
	window.console = {
		log: function () {
		},
		warn: function () {
		},
		error: function () {
		},
		trace: function () {
		}
	}
}

/*
 * AppException to manage errors

 try {
 throw new AppException("Test TRY");
 }
 catch (error) {
 panacea.exception(error);
 }
 */
AppException = function () {

	this.__proto__.__proto__ = Error.apply(null, arguments);

	var current_stack = this.stack || this.stacktrace || '';
	var current_stack_index = 0;

	current_stack = current_stack.split(/\n/);

	$.each(current_stack, function (i, value) {
		if (value.match(/AppException/g)) {
			current_stack_index = Number(i);
		}
	});

	if (current_stack.length > 1) {
		current_stack.splice(1, 1);
	}

	// Split to catch the line and the column of the error
	var current_stack_tmp = current_stack_index
		? current_stack[current_stack_index].split(/:/)
		: [""];

	/*
	 * Class arguments
	 */

	this.name = "AppException";

	this.stack = current_stack.join("\n");

	this.fileName = (current_stack_tmp !== null && current_stack_tmp.length > 1)
		? current_stack_tmp[1]
		: "N/A";

	this.lineNumber = (current_stack_tmp !== null && current_stack_tmp.length > 1)
		? current_stack_tmp[2]
		: "N/A";

	this.columnNumber = (current_stack_tmp !== null && current_stack_tmp.length > 1)
		? current_stack_tmp[3].replace(')', '')
		: "N/A";

	this.toString = function () {
		return this.name + ' : ' + this.fileName
			+ "\n Msg : \"" + this.message.toString() + "\" "
			+ "\n File name : " + (this.fileName === 'undefined' ? 'N/A' : this.fileName)
			+ "\n Line : " + (this.lineNumber === 'undefined' ? 'N/A' : this.lineNumber)
			+ "\n Column : " + (this.columnNumber === 'undefined' ? 'N/A' : this.columnNumber)
			+ "\n Stack:\n" + this.stack;
	};
};
// !AppException

/*
 * Panacea App
 */
(function ($, W, D) {

	_app = {
        environment: null,
        locale: null,
        timezone: null,
        token: null,
        version: null,
        user_id: 'visitor',
        user_role: 'visitor',
        youtube_channel_id: null,
        google_api_key: null
	};

	/**
	 *  Class initializer.
	 */
	_app.initialize = function () {

        _app.environment = $('meta[name="environment"]').attr('content');
        _app.locale = $('meta[name="locale"]').attr('content');
        _app.timezone = $('meta[name="timezone"]').attr('content');
        _app.token = $('meta[name="csrf-token"]').attr('content');
        _app.version = $('meta[name="version"]').attr('content');
        _app.user_id = $('meta[name="user_id"]').attr('content');
        _app.user_role = $('meta[name="user_role"]').attr('content');
        _app.youtube_channel_id = $('meta[name="youtube_channel_id"]').attr('content');
        _app.google_api_key = $('meta[name="google_api_key"]').attr('content');

		/*
		 * Add default token for Ajax query to Laravel.
		 */

		$.ajaxSetup({headers: {'X-CSRF-TOKEN': _app.token}});

        /*
         * Add default locale to date system
         */

        // Bootstrap dates picker
        if (typeof($.fn.datepicker) !== 'undefined' && (typeof($.ui) === 'undefined' || (typeof($.ui) !== 'undefined' && typeof($.ui.datepicker) === 'undefined'))) {
            $.fn.datepicker.defaults.language = _app.locale;
            $.fn.datepicker.dates['en'].format = 'mm/dd/yyyy';
        }
        // jQuery dates picker
        else if (typeof($.ui) !== 'undefined' && typeof($.ui.datepicker) !== 'undefined') {
            $.datepicker.setDefaults($.datepicker.regional[_app.locale]);
        }

		/*
		 * Define debug mode for JS.
		 */

		switch (_app.environment) {
			case 'production':
			case 'staging': {
				window.debug = false;
				break;
			}
			case 'development':
			case 'local':
			default: {
				window.debug = true;
			}
		}

		_app.debug('app.js > initialize : success : End');
	};

	/**
	 *  Class setup.
	 */
	_app.setup = function () {
		_app.debug('app.js > setup : success : Start');
		_app.debug('app.js > setup : success : End');
	};

	/**
	 * Display debug in console.
	 *
	 * @param string
	 * @returns {*}
	 */
	_app.debug = function (string) {
		if (true === window.debug) {
			console.log(string);
		}
		return window.debug;
	};

	/**
	 * Display errors in console.
	 *
	 * @param string
	 * @returns {*}
	 */
	_app.error = function (string) {
		if (true === window.debug) {
			console.error(string);
		}
		return window.debug;
	};

	/**
	 * Display warnings in console.
	 *
	 * @param string
	 * @returns {*}
	 */
	_app.warning = function (string) {
		if (true === window.debug) {
			console.warn(string);
		}
		return window.debug;
	};

	/**
	 * Clear browser console.
	 *
	 * @returns {*}
	 * @seealso https://developers.google.com/chrome-developer-tools/docs/console?hl=fr
	 */
	_app.clear_console = function () {
		if (true === window.debug) {
			console.clear();
		}
		return window.debug;
	};

	/**
	 * Display errors from code exception in console.
	 *
	 * @param error
	 * @returns {*}
	 */
	_app.exception = function (error) {
		if (typeof(error) === 'object' && error instanceof AppException) {
			return _app.error(error.toString());
		}
		else if (typeof(error) === 'object' && error instanceof Error) {
			return _app.error(error.message + '\n' + error.stack);
		}
		return _app.error('app.js > _app.exception : error : No correct exception found!');
	};

	/**
	 * Strings library.
	 *
	 * @type {{slugify: _app.string.slugify, ucfirst: _app.string.ucfirst, jsprintf: _app.string.jsprintf}}
	 */
	_app.string = {

		/**
		 * Sluggify a string, delete all special char from a string.
		 *
		 * @param str
		 * @returns {*}
		 */
		slugify: function (str) {
			str = str.replace(/^\s+|\s+$/g, ''); // trim
			str = str.toLowerCase();
			// remove accents, swap ñ for n, etc
			var from = "ĺěščřžýťňďàáäâèéëêìíïîòóöôùůúüûñç·/_,:;";
			var to = "lescrzytndaaaaeeeeiiiioooouuuuunc------";
			for (var i = 0, l = from.length; i < l; i++) {
				str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
			}
			str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
				.replace(/\s+/g, '-') // collapse whitespace and replace by _
				.replace(/-+/g, '-'); // collapse dashes
			return str;
		},

		/**
		 * JS ucfirst, to capitalize first letter of string.
		 *
		 * @param str
		 * @returns {string}
		 * @seealso http://forwebonly.com/capitalize-the-first-letter-of-a-string-in-javascript-the-fast-way/
		 */
		ucfirst: function (str) {
			return str[0].toUpperCase() + str.substring(1);
		},

		/**
		 * A printf like function.
		 *
		 * cvepdb.string.jsprintf(' A %w1% %w2% :-)', ['%w1%', '%w2%'], ['super', 'function']);
		 * -> output : " A super function :-)"
		 *
		 * @param str The string to complete
		 * @param args Array containing keys to replace
		 * @param replaces Array containing keys to place in text
		 * @returns {string} Final string
		 */
		jsprintf: function (str, args, replaces) {
			$.each(args, function (index, value) {
				var regx = new RegExp('%' + value + '%', 'g');
				if (str.match(regx)) {
					str = str.replace(regx, replaces[index]);
				}
			});
			return str;
		}

	};

	/**
	 * Arrays library.
	 *
	 * @type {{in_array: _app.array.in_array}}
	 */
	_app.array = {

		/**
		 * Allow to know if a value is in array.
		 *
		 * @param array
		 * @param p_val
		 * @returns {boolean}
		 */
		in_array: function (array, p_val) {
			var l = array.length;
			for (var i = 0; i < l; ++i) {
				if (array[i] === p_val) {
					return true;
				}
			}
			return false;
		}

	};

	/**
	 * Ajax library.
	 *
	 * @type {{isAsync: boolean, sync: _app.ajax.sync, async: _app.ajax.async, switch: _app.ajax.switch}}
	 */
	_app.ajax = {
		/**
		 * Define is Ajax is currently async or sync, default true
		 */
		isAsync: true,
		/**
		 * Set Ajax as Synchronious
		 */
		sync: function () {
			_app.ajax.isAsync = false;
			$.ajaxSetup({async: _app.ajax.isAsync});
			_app.debug('app.js > _app.ajax.sync : success : Ajax : async -> sync');
		},
		/**
		 * Set Ajax as Asynchronious
		 */
		async: function () {
			_app.ajax.isAsync = true;
			$.ajaxSetup({async: _app.ajax.isAsync});
			_app.debug('app.js > _app.ajax.sync : success : Ajax : sync -> async');
		},
		/**
		 * Allow to switch between sync to async or async to sync
		 */
		switch: function () {
			if (_app.ajax.isAsync) {
				_app.ajax.sync();
			}
			else {
				_app.ajax.async();
			}
		}
	};

	/**
	 * Maths library.
	 *
	 * @type {{number: _app.maths.number, sum: _app.maths.sum, pourcentage: _app.maths.pourcentage, remise: _app.maths.remise}}
	 */
	_app.maths = {

		/**
		 *
		 * @param number
		 * @param params
		 * @returns {string}
		 */
		number: function (number, params) {
			return (Number(number.replace(',', '.'))).toFixed(2);

			if (typeof params === 'undefined') {
				params = {};
			}
		},

		/**
		 *
		 * @param numbers
		 * @param params
		 * @returns {number}
		 */
		sum: function (numbers, params) {

			var total = 0;

			$.each(numbers, function (i, number) {
				total = (
					_app.maths.number(number, params)
					+ _app.maths.number(total, params)
				).toFixed(2);
			});

			return total;
		},

		/**
		 * Percentage between n1 and n2.
		 *
		 * @param n1
		 * @param n2
		 * @returns {number}
		 */
		percentage: function (n1, n2) {
			return n1 * 100 / n2;
		}

	};

	/**
	 * Dates library.
	 */
	_app.dates = {

        /**
         *
         * @param d1
         * @param d2
         * @param caller
         * @private
         */
        _before_diff: function (d1, d2, caller) {
            if (d1 === null || typeof(d1) === 'undefined') {
                throw new AppException('app.js > _app.dates.' + caller + ' : error : ' + caller + ' d1 arg is null');
            }
            else if (!(d1 instanceof Date)) {
                throw new AppException(
                    'app.js > _app.dates.' + caller + ' : error : ' + caller + ' d1 arg is not an instance of Date object'
                    + ' this is an instance of ' + getClassOf(d1)
                );
            }
            else if (d2 === null || typeof(d2) === 'undefined') {
                throw new AppException('app.js > _app.dates.' + caller + ' : error : ' + caller + ' d2 arg is null');
            }
            else if (!(d2 instanceof Date)) {
                throw new AppException(
                    'app.js > _app.dates.' + caller + ' : error : ' + caller + ' d2 arg is not an instance of Date object'
                    + ' this is an instance of ' + getClassOf(d2)
                );
            }
            _app.debug('app.js > _app.dates.' + caller + ' : success : d1 = ' + d1 + ' && d2 = ' + d2);
        },

        /**
         * Two dates days diff.
         *
         * @param d1
         * @param d2
         * @returns {Number}
         */
        diffInDays: function (d1, d2) {
            _app.dates._before_diff(d1, d2, 'diffInDays');
            var t2 = d2.getTime();
            var t1 = d1.getTime();
            return parseInt((t2 - t1) / (24 * 3600 * 1000));
        },

        /**
         * Two dates weeks diff.
         *
         * @param d1
         * @param d2
         * @returns {Number}
         */
        diffInWeeks: function (d1, d2) {
            _app.dates._before_diff(d1, d2, 'diffInWeeks');
            var t2 = d2.getTime();
            var t1 = d1.getTime();
            return parseInt((t2 - t1) / (24 * 3600 * 1000 * 7));
        },

        /**
         * Two dates months diff.
         *
         * @param d1
         * @param d2
         * @returns {number}
         */
        diffInMonths: function (d1, d2) {
            _app.dates._before_diff(d1, d2, 'diffInMonths');
            var d1Y = d1.getFullYear();
            var d2Y = d2.getFullYear();
            var d1M = d1.getMonth();
            var d2M = d2.getMonth();
            return ((d2M + 12 * d2Y) - (d1M + 12 * d1Y));
        },

        /**
         * Two dates years diff.
         *
         * @param d1
         * @param d2
         * @returns {number}
         */
        diffInYears: function (d1, d2) {
            _app.dates._before_diff(d1, d2, 'diffInYears');
            return (d2.getFullYear() - d1.getFullYear());
        },

        /**
         *
         * @param date
         * @returns {string}
         */
        getDateObjectAsTimeZonedString: function (date) {
            return (new Date(date || Date.now())).toLocaleString(_app.locale, {timeZone: _app.timezone});
        },

        /**
         *
         * @param date
         * @returns {string}
         */
        getDateFromDateObjectAsTimeZonedString: function (date) {
            return (new Date(date || Date.now())).toLocaleDateString(_app.locale, {timeZone: _app.timezone});
        },

        /**
         *
         * @param date
         * @returns {string}
         */
        getTimeFromDateObjectAsTimeZonedString: function (date) {
            return (new Date(date || Date.now())).toLocaleTimeString(_app.locale, {timeZone: _app.timezone});
        },

        /**
         *
         * @param locale
         */
        getDatePickerDateFormat: function (locale) {
            // Bootstrap dates picker
            if (typeof($.fn.datepicker) !== 'undefined' && (typeof($.ui) === 'undefined' || (typeof($.ui) !== 'undefined' && typeof($.ui.datepicker) === 'undefined'))) {
                return $.fn.datepicker.dates[locale || _app.locale].format;
            }
            // jQuery dates picker
            else if (typeof($.ui) !== 'undefined' && typeof($.ui.datepicker) !== 'undefined') {
                return $.datepicker.regional[_app.locale].dateFormat;
            }

            throw AppException('app.js > getDatePickerDateFormat, no date format defined');
        }
	};

	/**
	 * Checks library.
	 *
	 * @type {{isInt: _app.checks.isInt, isValidId: _app.checks.isValidId}}
	 */
	_app.checks = {

		/**
		 * Check if a number is a valid integer.
		 *
		 * @param n
		 * @returns {boolean}
		 */
		isInt: function (n) {
			n = Number(n);
			return (typeof(n) === "number") && isFinite(n) && (n % 1 === 0);
		},

		/**
		 * Check if an ID is valid.
		 *
		 * @param id
		 * @returns {number}
		 */
		isValidId: function (id) {
			return (_app.checks.isInt(id) && (Number(id) > 0))
				? id
				: 0;
		},

		/**
		 * Base validation code to check SIREN and SIRET
		 *
		 * @param number
		 * @param size
		 * @returns {boolean}
		 *
		 * @seealso https://github.com/steevelefort/siret/blob/master/index.js
		 */
		baseValidationForSirenAndSiret: function (number, size) {

			if (isNaN(number) || number.length !== size) {
				return false;
			}

			var bal = 0;
			var total = 0;

			for (var i = size - 1; i >= 0; i--) {
				var step = (number.charCodeAt(i) - 48) * (bal + 1);
				total += (step > 9) ? step - 9 : step;
				bal = 1 - bal;
			}

			return (total % 10 === 0);
		},

		/**
		 * Check if an SIREN is valid.
		 *
		 * @param siren
		 * @returns {*}
		 */
		isValidSiren: function (siren) {
			return _app.checks.baseValidationForSirenAndSiret(siren, 9);
		},

		/**
		 * Check if an SIRET is valid.
		 *
		 * @param siren
		 * @returns {*}
		 */
		isValidSiret: function (siren) {
			return _app.checks.baseValidationForSirenAndSiret(siren, 14);
		}

	};

	/**
	 * Integrate App library to jQuery
	 */
	$.extend({app: _app});

	/**
	 * Execute when document ready
	 */
	$(D).ready(function () {
		_app.debug('app.js > document.ready : success : Start');
		_app.setup();
		_app.debug('app.js > document.ready : success : Trigger APP_READY Event');
		$(D).trigger('APP_READY');
		_app.debug('app.js > document.ready : success : End');
	});

	/**
	 * window.onload
	 */
	$(W).onload = _app.initialize();

	/**
	 * window.resize
	 */
	$(W).resize(function () {
	});

	/**
	 *
	 * @param href
	 */
	_app.redirect = function (href) {
		W.location = href;
	};

	/**
	 *
	 * @param arg
	 */
	_app.unbeforeunload = function (arg) {
		if (arg === null) {
			W.onbeforeunload = null;
		}
		else if (typeof(arg) === "function") {
			W.onbeforeunload = arg;
		}
		else if (typeof(arg) === 'string') {
			W.onbeforeunload = function () {
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
	W.onerror = function (error_msg, url, line, column, error_obj) {
		_app.error('app.js > W.onerror : error : ' + error_msg
			+ '\n on page: ' + url
			+ '\n on line: ' + line
			+ '\n on column: ' + column
			+ '\n on object: ' + error_obj
		);
	};

})(jQuery, window, document);

// Save Bellum Industria instance
var bellumindustria = $.app;
bellumindustria.debug('Bellum Industria JS App object running...');

window.setTimeout(function () {
	$(".alert").not('.alert-module').fadeTo(200, 0).slideUp(500, function () {
		$(this).remove();
	});
}, 8000);
