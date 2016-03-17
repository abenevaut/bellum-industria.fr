/*
 * form_validation
 */
(function ($, W, D) {
    $(D).bind('CVEPDB_FORM_VALIDATION_READY', function(){

        cvepdb.fv.on_submit(function () {
            return true;
        });

        cvepdb.fv.set_rules(
            '.forms',
            {
                rules: {

                    APP_URL: {
                        required: true,
                        maxlength: 254,
                        url: true
                    },

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
                    password: {
                        required: true,
                        maxlength: 254
                    },

                    DB_HOST: {
                        required: true,
                        maxlength: 254
                    },
                    DB_DATABASE: {
                        required: true,
                        maxlength: 254
                    },
                    DB_USERNAME: {
                        required: true,
                        maxlength: 254
                    },
                    DB_PASSWORD: {
                        required: true,
                        maxlength: 254
                    }

                },
                messages: {

                    APP_URL: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH'),
                        url: cvepdb.globalize.translate('FIELD_VALID_URL')
                    },

                    last_name: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    },
                    first_name: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    },
                    email: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH'),
                        email: cvepdb.globalize.translate('FIELD_VALID_EMAIL')
                    },
                    password: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    },

                    DB_HOST: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    },
                    DB_DATABASE: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    },
                    DB_USERNAME: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    },
                    DB_PASSWORD: {
                        required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                        maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH')
                    }

                },
                ignore: [':textarea:hidden.not(".js-call-tinymce")'],
                highlight: function(element) { // <-- fires when element has error
                    $(element)
                        .closest('.form-group')
                        .removeClass("has-success")
                        .addClass("has-error");
                },
                unhighlight: function(element) { // <-- fires when element is valid
                    $(element)
                        .closest('.form-group')
                        .removeClass("has-error")
                        .addClass("has-success");
                },
                success: function(element) {
                    element
                        .closest('.form-group')
                        .removeClass("has-error")
                        .addClass("has-success");
                },
                errorElement: "div",
                errorClass: 'required',
                errorPlacement: function(error, element) {
                    element
                        .closest('.form-group')
                        .removeClass("has-success")
                        .addClass("has-error");

                    if (element.attr('type') == 'checkbox') {
                        error.insertBefore(element.closest('div'));
                    }
                    else {
                        error.insertAfter(element);
                    }
                }
            }
        );

    });

})(jQuery, window, document);