(function ($, D, W) {

	_form_validation = {};

	_form_validation = {
		/**
		 *
		 * @param $container
		 * @param rules
		 * @param messages
		 */
		new_validator: function ($container, rules, messages) {
			return $container
				.validate({
					lang: bellumindustria.locale,
					rules: rules,
					messages: messages,
					/**
					 *
					 */
					errorElement: "span",
					/**
					 *
					 */
					errorClass: 'help-block',
					/**
					 *
					 */
					ignore: [':textarea:hidden.not(".form-control")'],
					/**
					 *
					 * @param error
					 * @param element
					 */
					errorPlacement: function (error, element) {

						if ($(element).hasClass('select2-hidden-accessible') || $(element).is('textarea')) {
							error.insertAfter(element.next());
						}
						else if ($(element).is('input[type="radio"]')) {
                            error.insertAfter(element.closest('div.radio').after());
						}
						else if ($(element).hasClass('ui-spinner-input')) {
							error.insertAfter($(element).closest('span.ui-spinner').after());
						}
						else if ($(element).attr('type') !== 'hidden') {
							error.insertAfter(element);
						}

						var current_form_group = $(element).closest(".form-group");
						current_form_group.removeClass("has-success");
						current_form_group.addClass("has-error");
					},
					/**
					 *
					 * @param element
					 */
					highlight: function (element) { // <-- fires when element has error
						var current_form_group = $(element).closest(".form-group");
						current_form_group.removeClass("has-success");
						current_form_group.addClass("has-error");
					},
					/**
					 *
					 * @param element
					 */
					unhighlight: function (element) { // <-- fires when element is valid
						var current_form_group = $(element).closest(".form-group");
						current_form_group.removeClass("has-error");
						current_form_group.addClass("has-success");
					},
					/**
					 *
					 * @param element
					 */
					success: function (element) {
						var current_form_group = element.closest(".form-group");
						current_form_group.removeClass("has-error");
						current_form_group.addClass("has-success");
					}
				});
		},
		/**
		 *
		 * @param validator
		 * @param value
		 * @param element
		 * @param thePromise
		 * @param return_message
		 * @returns {*}
		 */
		ruleBasedOnPromise: function (validator, value, element, thePromise, return_message) {
			var method = 'remote';
			var previous = validator.previousValue(element, method);

			if (!validator.settings.messages[element.name]) {
				validator.settings.messages[element.name] = {};
			}

			previous.originalMessage = previous.originalMessage || validator.settings.messages[element.name][method];
			validator.settings.messages[element.name][method] = previous.message;

			var optionDataString = $.param({data: value});

			if (previous.old === optionDataString) {
				return previous.valid;
			}

			previous.old = optionDataString;
			validator.startRequest(element);

			thePromise.then(function (valid) {

				validator.settings.messages[element.name][method] = previous.originalMessage;

				if (valid) {
					submitted = validator.formSubmitted;
					validator.toHide = validator.errorsFor(element);
					validator.formSubmitted = submitted;
					validator.successList.push(element);
					validator.invalid[element.name] = false;
					validator.showErrors();
				} else {
					errors = {};
					message = validator.defaultMessage(element, method);
					errors[element.name] = previous.message = return_message;
					validator.invalid[element.name] = true;
					validator.showErrors(errors);
				}
				previous.valid = valid;
				validator.stopRequest(element, valid);
			});

			return "pending";
		}
	};

	/**
	 * Integrate App library to jQuery
	 */
	$.extend({form_validation: _form_validation});

})(jQuery, document, window);

// Save Panacéa.form_validation instance
bellumindustria.form_validation = $.form_validation;

/**
 *
 */
$.validator.addMethod(
	'price',
	function (value, element) {
		return this.optional(element) || /^(\d+|(\d+,\d{1,2}|\d+.\d{1,2}))$/.test(value);
	},
	'Veuillez fournir un prix valide.'
);

/**
 *
 */
$.validator.addMethod(
	'duration',
	function (value, element) {
		return this.optional(element) || /^(\d+|(\d+,\d{1,2}|\d+.\d{1,2}))$/.test(value);
	},
	'Veuillez fournir une durée valide.'
);

/**
 *
 */
$.validator.addMethod(
    "dateObject",
    function (value, element) {
        var date = value.toDate(bellumindustria.dates.getDatePickerDateFormat());
        return this.optional(element) || !/Invalid|NaN/.test(new Date(date));
    },
	bellumindustria.string.jsprintf("La date doit être au format : %format%", [
		'format'
	], [
		bellumindustria.dates.getDatePickerDateFormat()
	])
);

/**
 *
 */
$.validator.addMethod(
	"frenchDate",
	function (value, element) {
		var bits = value.match(/([0-9]+)/gi);
		var str;
		if (!bits) {
			return this.optional(element) || false;
		}
		str = bits[1] + '/' + bits[0] + '/' + bits[2];
		return this.optional(element) || !/Invalid|NaN/.test(new Date(str));
	},
	"La date doit être au format : jj/mm/aaaa"
);

/**
 *
 */
$.validator.addMethod(
	'filesize',
	function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= (param * 1024 * 1024))
	},
	'La taille du fichier doit être inférieure à  {0} MB'
);

/**
 *
 */
$.validator.addMethod(
	'siret',
	function (value, element) {
		return this.optional(element) || bellumindustria.checks.isValidSiret(value);
	},
	"Veuillez renseigner un SIRET valide."
);

/**
 *
 */
$.validator.addMethod(
    'users_email_exists',
    function (value, element, params) {
        return bellumindustria
            .form_validation
            .ruleBasedOnPromise(
                this,
                value,
                element,
                new Promise(function (fulfill) {

                    if (!value.length) {
                        fulfill(false);
                    }

                    var parameters = {
                        email: value
                    };

                    if (typeof(params.not_user_id) === 'string') {
                        parameters['not_user_id'] = params.not_user_id;
                    }

                    $
						.get('/ajax/users/users/check-user-email', parameters)
						.done(function (data) {
                            fulfill(0 === Number(data.data.count));
                        })
					;
                }),
                "Ce courriel est déjà associé à un utilisateur."
            );
    },
    "Ce courriel est déjà associé à un utilisateur."
);
