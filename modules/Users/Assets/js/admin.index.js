(function($, D, W){
    _users = {
        checkboxes_counter: 0,
        setup: function() {
            $multi_delete_check = $('.js-users_multi_delete');
            $multi_delete_form = $('.js-users_multi_delete-container');
            $multi_delete_btn = $('.js-btn-users_multi_delete');
            $multi_delete_check.on('change', function(){
                var current_value = $(this).val();
                if ($(this).is(':checked')) {
                    _users.checkboxes_counter++;
                    $multi_delete_form.append(
                        '<input type="hidden" class="js-users_multi_delete-'
                        + current_value
                        + '" value="'+ current_value +'" name="users_multi_destroy[]" />'
                    );
                }
                else {
                    _users.checkboxes_counter--;
                    $multi_delete_form.find('.js-users_multi_delete-' + current_value).remove();
                }
                if (_users.checkboxes_counter > 0) {
                    $multi_delete_btn.attr('disabled', false).removeClass('disabled');
                }
                else {
                    $multi_delete_btn.attr('disabled', true).addClass('disabled');
                }
            });
        }
    };
    $(D).bind('CVEPDB_READY', function(){
        _users.setup();
    });
})(jQuery, document, window);