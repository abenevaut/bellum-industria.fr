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
            },
            errorElement: "div",
            errorClass: 'required',
            ignore: [':textarea:hidden.not(".js-call-tinymce")'],
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
                    required: "Ce champ est obligatoire",
                    maxlength: "Ce champ est limité à {0} caractères"
                },
                first_name: {
                    required: "Ce champ est obligatoire",
                    maxlength: "Ce champ est limité à {0} caractères"
                },
                email: {
                    required: "Ce champ est obligatoire",
                    maxlength: "Ce champ est limité à {0} caractères",
                    email: "Ce champ doit être remplit avec un courriel valide"
                },
                subject: {
                    required: "Ce champ est obligatoire",
                    maxlength: "Ce champ est limité à {0} caractères"
                },
                message: {
                    required: "Ce champ est obligatoire"
                }

            },
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
            }
        });


        cvepdb.debug('contact.js > CVEPDB_FORM_VALIDATION_READY : success : End');
    });

})(jQuery, window, document);
