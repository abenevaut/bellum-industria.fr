(function ($, W, D) {
    'use strict';

    var _script = {};

    _script = {
        /**
         * Run script
         */
        init: function () {
            bellumindustria.debug('form.js > init');

            var $birthDate = $('input[name="birth_date"]');
            $birthDate
                .datepicker({
                    autoclose: true,
                    todayHighlight: false,
                    startView: 'years',
                    minViewMode: 'days'
                })
                .inputmask(bellumindustria.dates.getDatePickerDateFormat())
            ;

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
                        family_situation: {
                            required: false
                        },
                        maiden_name: {
                            required: false,
                            maxlength: 100
                        },
                        birth_date: {
                            required: false,
                            dateObject: true
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
