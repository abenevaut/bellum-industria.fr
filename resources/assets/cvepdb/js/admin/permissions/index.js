(function($, D){

    $(D).bind('CVEPDB_READY', function(){

        var permission_delete_btn = $('.js-permission_delete_btn');
        var permission_delete_form = $('#js-permission_delete_form');
        var permission_delete_name = $('#js-permission_delete_name');

        permission_delete_btn.click(function(){
            permission_delete_form.attr('action', 'admin/permissions/' + $(this).attr('data-permission_id'));
            permission_delete_name.html($(this).attr('data-permission_name'));
        });

    });

})(jQuery, document);

