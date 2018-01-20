(function ($, W, D) {
    'use strict';

    var _script = {
        /**
         *
         */
        user_identifier: 0
    };

    _script = {
        /**
         * Run script
         */
        init: function () {
            bellumindustria.debug('form.js > init');

            _script.user_identifier = $('form').data('user_identifier');

            $('input[name="email"]').inputmask({alias: 'email'});

            _script.init_validation();
        },
        /**
         *
         */
        init_validation: function () {
            bellumindustria.debug('form.js > init_validation');

            bellumindustria
                .form_validation
                .new_validator(
                    $('form'),
                    {
                        civility: {
                            required: true
                        },
                        first_name: {
                            required: true,
                            maxlength: 100
                        },
                        last_name: {
                            required: true,
                            maxlength: 100
                        },
                        email: {
                            required: true,
                            maxlength: 80,
                            email: true,
                            users_email_exists: {
                                not_user_id: _script.user_identifier
                            }
                        }
                    },
                    {}
                );
        }
    };

    $(D).bind('APP_READY', function () {
        _script.init();
    });

})(window.jQuery, window, document);
