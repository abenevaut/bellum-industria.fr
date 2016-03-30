(function ($, W, D) {
    $(D).bind('CVEPDB_READY', function () {
        cvepdb.debug('admin.form.js > CVEPDB_READY : success : Start');
        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
        cvepdb.debug('admin.form.js > CVEPDB_READY : success : End');
    });

    $(D).bind('CVEPDB_FORM_VALIDATION_READY', function () {
        cvepdb.debug('admin.form.js > CVEPDB_FORM_VALIDATION_READY : success : Start');

        cvepdb.fv.on_submit(function() {
            return true;
        });

        cvepdb.fv.set_rules('form.forms', {
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
                    email: true,
                    maxlength: 254
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
                    email: cvepdb.globalize.translate('FIELD_VALID_EMAIL'),
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
        cvepdb.debug('admin.form.js > CVEPDB_FORM_VALIDATION_READY : success : End');
    });
})(jQuery, window, document);