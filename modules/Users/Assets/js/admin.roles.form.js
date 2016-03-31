(function ($, W, D) {
    $(D).bind('CVEPDB_FORM_VALIDATION_READY', function () {
        cvepdb.debug('admin.roles.form.js > CVEPDB_FORM_VALIDATION_READY : success : Start');

        cvepdb.fv.on_submit(function() {
            return true;
        });

        cvepdb.fv.set_rules('form.forms', {
            rules: {
                name: {
                    required: true,
                    maxlength: 254
                },
                display_name: {
                    required: true,
                    maxlength: 254
                },
                description: {
                    required: true,
                    maxlength: 254
                }
            },
            messages: {
                name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
                },
                display_name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
                },
                description: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    maxlength: cvepdb.globalize.translate('FIELD_MAXLENGTH').replace('%text%', '{0}')
                }
            },
            errorPlacement: function (error, element) {

                error.insertAfter(element);

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
        cvepdb.debug('admin.roles.form.js > CVEPDB_FORM_VALIDATION_READY : success : End');
    });
})(jQuery, window, document);