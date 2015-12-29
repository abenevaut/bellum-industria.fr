/*
 * Teams
 */
(function ($, W, D) {

    _teams = {};

    /**
     *  Class setup
     */
    _teams = {
        setup: function () {
            cvepdb.debug('teams.js > setup : success : Start');
            if ($('.js-teams-init').length >= 1) {
                _teams.teams.init_add_form();
            }
            cvepdb.debug('teams.js > setup : success : End');
        }
    };

    _teams.teams = {

        admin_box: $('.js-teams-admin_box'),
        admin_btn_add: $('.js-teams-add_new_team'),

        init_add_form: function () {
            cvepdb.debug('teams.js > init_add_form : success : Start');

            _teams.teams.admin_btn_add.click(function () {
                if (!_teams.teams.admin_box.is(":visible")) {
                    _teams.teams.admin_box.slideDown("slow");

                    _teams.teams.admin_btn_add.find('i').removeClass('icon-plus-1').addClass('icon-minus-1');
                }
                else {
                    _teams.teams.admin_box.slideUp("slow");
                    _teams.teams.admin_btn_add.find('i').removeClass('icon-minus-1').addClass('icon-plus-1');
                }
            });

            cvepdb.debug('teams.js > init_add_form : success : End');
        },
        display_add_form: function () {
            cvepdb.debug('teams.js > display_add_form : success : Start');
            cvepdb.debug('teams.js > display_add_form : success : End');
        },
        hide_add_form: function () {
            cvepdb.debug('teams.js > hide_add_form : success : Start');
            cvepdb.debug('teams.js > hide_add_form : success : End');
        },
        submit_add_form: function () {
            cvepdb.debug('teams.js > submit_add_form : success : Start');
            cvepdb.debug('teams.js > submit_add_form : success : End');
        }
    };

    $(D).bind('CVEPDB_READY', function () {
        cvepdb.debug('teams.js > CVEPDB_READY : success : Start');
        _teams.setup();
        cvepdb.debug('teams.js > CVEPDB_READY : success : End');
    });

    $(D).bind('CVEPDB_FORM_VALIDATION_JQREADY', function () {
        cvepdb.debug('teams.js > CVEPDB_FORM_VALIDATION_JQREADY : success : Start');

        cvepdb.fv.on_submit(function () {
            return false;
        });

        cvepdb.fv.set_rules('form#teams_add', {
            errorPlacement: function (error, element) {

                if (element.attr('type') == 'checkbox') {
                    error.insertBefore(element.closest('div'));
                } else {
                    error.insertAfter(element);
                }
                var current_form_group = element.closest(".form-group");
                current_form_group.removeClass("has-success");
                current_form_group.addClass("has-error");

            }, errorElement: "div", errorClass: 'required', rules: {
                email: {
                    required: true, email: true
                }
            }, messages: {
                name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED')
                }
            }, highlight: function (element) { // <-- fires when element has error
                var current_form_group = $(element).closest(".form-group");
                current_form_group.removeClass("has-success");
                current_form_group.addClass("has-error");
            }, unhighlight: function (element) { // <-- fires when element is valid
                var current_form_group = $(element).closest(".form-group");
                current_form_group.removeClass("has-error");
                current_form_group.addClass("has-success");
            }, success: function (element) {
                var current_form_group = element.closest(".form-group");
                current_form_group.removeClass("has-error");
                current_form_group.addClass("has-success");
            }
        });

        cvepdb.debug('teams.js > CVEPDB_FORM_VALIDATION_JQREADY : success : End');
    });

})(jQuery, window, document);
