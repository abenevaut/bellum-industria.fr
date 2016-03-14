/*
 * form_validation
 */
(function ($, W, D) {

    _cvepdb_fv = {};

    /**
     *
     */
    $.validator.setDefaults({
        submitHandler: function () {
        }
    });

    $.validator.addMethod(
        'checkDBconnection',
        function(value, element, params){



        },
        message
    );

    $('.forms').validate({
        rules: {

            APP_URL: {
                required: true,
                maxlength: 254
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
                maxlength: 254,
                email: true
            },
            DB_PASSWORD: {
                required: true,
                maxlength: 254
            }

        },
        messages: {

            APP_URL: {
                required: 'Required',
                maxlength: 'Max lenght'
            },

            last_name: {
                required: 'Required',
                maxlength: 'Max lenght'
            },
            first_name: {
                required: 'Required',
                maxlength: 'Max lenght'
            },
            email: {
                required: 'Required',
                maxlength: 'Max lenght',
                email: 'email'
            },
            password: {
                required: 'Required',
                maxlength: 'Max lenght'
            },

            DB_HOST: {
                required: 'Required',
                maxlength: 'Max lenght'
            },
            DB_DATABASE: {
                required: 'Required',
                maxlength: 'Max lenght'
            },
            DB_USERNAME: {
                required: 'Required',
                maxlength: 'Max lenght'
            },
            DB_PASSWORD: {
                required: 'Required',
                maxlength: 'Max lenght'
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
    });

})(jQuery, window, document);