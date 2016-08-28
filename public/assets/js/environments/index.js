(function ($, W, D) {

	$(D).bind('CVEPDB_READY', function () {
		var input_name = $('input[name="name"]');
		var input_reference = $('input[name="reference"]');

		input_name.keyup(function () {
			var slug = cvepdb.string.slugify($(this).val());
			input_reference.val(slug);
		});
	});

	$(D).bind('CVEPDB_FORM_VALIDATION_READY', function () {
		cvepdb.debug('index.js > CVEPDB_FORM_VALIDATION_READY : success : Start');

		cvepdb.fv.on_submit(function () {
			return true;
		});

		cvepdb.fv.add_control(
			"domain",
			function (value, element) {
				var re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/);
				return value.match(re);
			},
			"Not a valid domain"
		);

		if (cvepdb.config.lang == 'en') {
			cvepdb.globalize.addMessages({"FIELD_DOMAIN": "You have to provide a valid domain name (without http:// or https://)"});
		}
		else if (cvepdb.config.lang == 'fr') {
			cvepdb.globalize.addMessages({"FIELD_DOMAIN": "Vous devez renseigner un domaine valide (sans http:// ou https://)"});
		}

		cvepdb.fv.set_rules('form.forms', {
			ignore: [':textarea:hidden.not(".js-call-tinymce")'],
			rules: {
				name: {
					required: true,
					maxlength: 254
				},
				reference: {
					required: true,
					maxlength: 254
				},
				domain: {
					domain: true,
					required: true,
					maxlength: 254
				}
			},
			messages: {
				name: {
					required: cvepdb.globalize.translate('FIELD_REQUIRED'),
					maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
				},
				reference: {
					required: cvepdb.globalize.translate('FIELD_REQUIRED'),
					maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
				},
				domain: {
					domain: cvepdb.globalize.translate('FIELD_DOMAIN'),
					required: cvepdb.globalize.translate('FIELD_REQUIRED'),
					maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
				}
			},
			errorPlacement: function (error, element) {

				if ($(element).attr('type') != 'hidden') {
					error.insertAfter(element);
				}

				var current_form_group = $(element).closest(".form-group");
				current_form_group.removeClass("has-success");
				current_form_group.addClass("has-error");
			},
			errorElement: "div",
			errorClass: 'required',
			highlight: function (element) { // <-- fires when element has error
				var current_form_group = $(element).closest(".form-group");
				current_form_group.removeClass("has-success");
				current_form_group.addClass("has-error");
			},
			unhighlight: function (element) { // <-- fires when element is valid
				var current_form_group = $(element).closest(".form-group");
				current_form_group.removeClass("has-error");
				current_form_group.addClass("has-success");
			},
			success: function (element) {
				var current_form_group = element.closest(".form-group");
				current_form_group.removeClass("has-error");
				current_form_group.addClass("has-success");
			}
		});
		cvepdb.debug('index.js > CVEPDB_FORM_VALIDATION_READY : success : End');
	});
})(jQuery, window, document);