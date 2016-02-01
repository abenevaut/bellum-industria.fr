/*
 * Contact page
 */
(function ($, W, D) {

    _contact = {};

    // A la fin du chargement de la library
    $(D).bind('CVEPDB_FORM_VALIDATION_JQREADY', function () {
        cvepdb.debug('contact.js > CVEPDB_FORM_VALIDATION_READY : success : Start');

        cvepdb.fv.on_submit(function () {
            var return_value = true;
            return return_value;
        });

        /*
         * On lance la validation du formulaire
         */
        cvepdb.fv.set_rules('form#contact', {
            rules: {
                last_name: {
                    required: true,
                    maxlength: 254
                },
                first_name: {
                    required: true,
                    maxlength: 254
                },
                email: {
                    required: true,
                    maxlength: 254,
                    email: true
                },
                subject: {
                    required: true,
                    maxlength: 254
                },
                message: {
                    required: true
                }
            },
            messages: {
                last_name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
                },
                first_name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
                },
                email: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}'),
                    email: cvepdb.globalize.translate('FIELD_VALID_EMAIL')
                },
                subject: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
                },
                message: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED')
                }
            },
            ignore: [':textarea:hidden.not(".js-call-tinymce")'],
            highlight: function(element) { // <-- fires when element has error
                $(element)
                    .removeClass("has-success")
                    .addClass("has-error");
            },
            unhighlight: function(element) { // <-- fires when element is valid
                $(element)
                    .removeClass("has-error")
                    .addClass("has-success");
            },
            success: function(element) {
                element
                    .removeClass("has-error")
                    .addClass("has-success");
            },
            errorElement: "div",
            errorClass: 'required',
            errorPlacement: function(error, element) {
                element
                    .removeClass("has-success")
                    .addClass("has-error");

                if (element.attr('type') == 'checkbox') {
                    error.insertBefore(element.closest('div'));
                }
                else {
                    error.insertAfter(element);
                }
            }
        });


        cvepdb.debug('contact.js > CVEPDB_FORM_VALIDATION_READY : success : End');
    });

})(jQuery, window, document);
