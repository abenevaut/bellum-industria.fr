(function($, W, D){
    $(D).bind('CVEPDB_SELECT2_READY', function(){
        var select_role = $('select[name="{{ $name }}"]');
        select_role.select2({
            theme: "bootstrap",
            width: '100%',
            placeholder: "{{ $placeholder }}",
            minimumResultsForSearch: Infinity
        });
        $('.js-cancel-filters').on('click', function() {
            select_role.select2("val", "");
        });
    });
})(jQuery, window, document);
