/*
 * Teams
 */
(function ($, W, D) {

    _teams = {};

    /**
     *  Class setup
     */
    _teams = {
        dictionary: {
            en: {
                'QUESTION_TO_CONFIRM_TEAM_DELETION': 'Would you really delete this team ?'
            },
            fr: {
                'QUESTION_TO_CONFIRM_TEAM_DELETION': 'Etes-vous sur de vouloir supprimer cette equipe ?'
            }
        },
        setup: function () {
            cvepdb.debug('teams.js > setup : success : Start');

            cvepdb.globalize.addMessages(_teams.dictionary[cvepdb_config.LANG]);

            if ($('.js-teams-init').length >= 1) {
                _teams.teams.init_add_form();
                _teams.teams.init_delete_form();
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
        },
        init_delete_form: function() {
            var form_submit = $('form.js-teams_delete .btn-submit');
            form_submit.click(function(){
                _teams.teams.confirm_deletion($(this).closest('form'));
                return false;
            });
        },
        confirm_deletion: function($form){

            var question = cvepdb.globalize.translate('QUESTION_TO_CONFIRM_TEAM_DELETION');

            return cvepdb.jquery_ui.confirmation(question).then(function(answer){
                var answer_bool = answer.toString() == "true" ? true : false;
                if (answer_bool) {
                    $form.submit();
                }
                return answer_bool;
            });
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

        input_members.select2({
            width: '100%',
            dropdownAutoWidth : true
        }).on("change", function(e) {

            cvepdb.debug(
                "teams.js > select[name=members[]]:select2(on:change) : success :"
                + " element = " + select_entite.attr('name')
                + " val = " + e.val
            );

        });


        cvepdb.debug('teams.js > CVEPDB_SELECT2_JQREADY : success : End');
    });

})(jQuery, window, document);
