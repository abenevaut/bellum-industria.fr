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
        admin_btn_edit: $('.js-teams-edit'),
        init_add_form: function () {
            cvepdb.debug('teams.js > init_add_form : success : Start');

            var $form = _teams.teams.admin_box.find('form#teams_add');

            _teams.teams.admin_btn_add.click(function () {

                var post_url = decodeURIComponent($form.attr('data-route_post'));

                $form.attr('action', post_url);

                $form.find('input[name="_method"]').val('POST');
                $form.find('input[name="name"]').val('');

                if (!_teams.teams.admin_box.is(":visible")) {
                    _teams.teams.admin_box.slideDown("slow");
                    _teams.teams.admin_btn_add.find('i')
                        .removeClass('icon-plus-1')
                        .addClass('icon-minus-1');
                }
                else {
                    _teams.teams.admin_box.slideUp("slow");
                    _teams.teams.admin_btn_add.find('i')
                        .removeClass('icon-minus-1')
                        .addClass('icon-plus-1');
                }
            });

            _teams.teams.admin_btn_edit.click(function () {

                var team_id = $(this).attr('data-team_id');
                var team_name = $(this).attr('data-team_name');

                var put_url = decodeURIComponent($form.attr('data-route_put'));
                put_url = put_url.replace('{teams}', '');

                $form.attr('action', put_url + team_id);
                $form.find('input[name="_method"]').val('PUT');
                $form.find('input[name="name"]').val(team_name);

                // Todo : desactiver les boutons edit et prochainement supprimer

                _teams.teams.admin_box.slideDown("slow");
                _teams.teams.admin_btn_add.find('i')
                    .removeClass('icon-plus-1')
                    .addClass('icon-minus-1');
            });

            cvepdb.debug('teams.js > init_add_form : success : End');
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
            return true;
        });

        cvepdb.fv.set_rules('form#teams_add', {
            errorPlacement: function (error, element) {

                error.insertAfter(element);

                var current_form_group = element.closest(".form-row");
                current_form_group.removeClass("has-success");
                current_form_group.addClass("has-error");

            },
            errorElement: "div",
            errorClass: 'required',
            rules: {
                team_name: {
                    required: true
                }
            },
            messages: {
                team_name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED')
                }
            },
            highlight: function (element) { // <-- fires when element has error
                var current_form_group = $(element).closest(".form-row");
                current_form_group.removeClass("has-success");
                current_form_group.addClass("has-error");
            },
            unhighlight: function (element) { // <-- fires when element is valid
                var current_form_group = $(element).closest(".form-row");
                current_form_group.removeClass("has-error");
                current_form_group.addClass("has-success");
            },
            success: function (element) {
                var current_form_group = element.closest(".form-row");
                current_form_group.removeClass("has-error");
                current_form_group.addClass("has-success");
            }
        });

        cvepdb.debug('teams.js > CVEPDB_FORM_VALIDATION_JQREADY : success : End');
    });

    /**
     * A la fin du chargement de la library select2
     */
    head.ready('CVEPDB_SELECT2_JQREADY', function(){
        cvepdb.debug('teams.js > CVEPDB_SELECT2_JQREADY : success : Start');


        var input_members = $('select[name="members[]"]');

        input_members.select2()
            .on("change", function(e) {

                cvepdb.debug(
                    "teams.js > select[name=members[]]:select2(on:change) : success :"
                    + " element = " + select_entite.attr('name')
                    + " val = " + e.val
                );

            });


        cvepdb.debug('teams.js > CVEPDB_SELECT2_JQREADY : success : End');
    });

})(jQuery, window, document);
