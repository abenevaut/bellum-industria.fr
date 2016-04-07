(function ($, W, D) {

    $(D).bind('CVEPDB_TINYMCE_READY', function () {
        cvepdb.editor.elfinder_editor('#content');
    });

    $(D).bind('CVEPDB_TINYMCE_EDITOR_READY', function (e, params) {
        cvepdb.debug('tinymce.js > CVEPDB_TINYMCE_EDITOR_READY : success : Start');
        cvepdb.debug('tinymce.js > CVEPDB_TINYMCE_EDITOR_READY : success : editor ID : #' + params.editor.id);

        tinyMCE.DOM.setStyle(
            tinyMCE.DOM.get(params.editor.id + '_ifr'),
            'height',
            '400px'
        );

        $('#' + params.editor.id + '_ifr')
            .closest('div.mce-tinymce')
            .css('width', '100%');

        cvepdb.debug('tinymce.js > CVEPDB_TINYMCE_EDITOR_READY : success : End');
    });

    $(D).bind('CVEPDB_TINYMCE_CHANGE', function (e, params) {
        cvepdb.debug('tinymce.js > CVEPDB_TINYMCE_CHANGE : success : Start');
        cvepdb.debug('tinymce.js > CVEPDB_TINYMCE_CHANGE : success : editor ID : #' + params.editor.id);

        $('#' + params.editor.id).text(params.content);

        cvepdb.debug('tinymce.js > CVEPDB_TINYMCE_CHANGE : success : End');
    });
})(jQuery, window, document);