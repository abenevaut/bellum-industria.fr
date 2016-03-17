/*
 * form_validation
 */
(function ($, W, D) {

    var msgfield_required = $('.field_required').html();
    var msgfield_maxlen = $('.field_maxlen').html();
    var msgfield_email = $('.field_email').html();
    var msgfield_url = $('.field_url').html();

    /**
     *
     */
    $.validator.setDefaults({
        submitHandler: function () {
            return true;
        }
    });

    //$.validator.addMethod(
    //    'checkDBconnection',
    //    function(value, element, params){
    //
    //
    //
    //    },
    //    message
    //);

    $('.forms').validate({
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
                required: msgfield_required,
                maxlength: msgfield_maxlen,
                url: msgfield_url
            },

            last_name: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
            },
            first_name: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
            },
            email: {
                required: msgfield_required,
                maxlength: msgfield_maxlen,
                email: msgfield_email
            },
            password: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
            },

            DB_HOST: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
            },
            DB_DATABASE: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
            },
            DB_USERNAME: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
            },
            DB_PASSWORD: {
                required: msgfield_required,
                maxlength: msgfield_maxlen
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