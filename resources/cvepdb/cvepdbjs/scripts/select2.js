/*
 * Main library for CVEPDB select2
 */
(function($, W, D){

    _cvepdb_s2 = {};

    _cvepdb_s2.libraries = [
        {
            script: {
                CVEPDB_SELECT2_JQREADY:
                    (cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/select2/dist/js/select2.min.js')
            },
            trigger: 'always',
            mobile: false,
            browser: true
        },
        {
            script: cvepdb_config.URL_THEME + cvepdb_config.BASE_PATH + 'libs/select2/dist/css/select2.min.css',
            trigger: 'always',
            mobile: false,
            browser: true
        }
    ];

    /**
     *  Class setup
     */
    _cvepdb_s2.setup = function(){
        cvepdb.debug('cvepdb_select2.js > setup : success : Start');
        $.each(_cvepdb_s2.libraries, function(index, libjs){
            cvepdb.headjs.loadjs(libjs);
        });
        cvepdb.debug('cvepdb_select2.js > setup : success : End');
    };

    /**
     * Initialize jQuery select2 library
     */
    head.ready('CVEPDB_SELECT2', function(){
        cvepdb.debug('cvepdb_select2.js > CVEPDB_SELECT2_READY : success : Start');
        $(D).trigger('CVEPDB_SELECT2_READY');
        cvepdb.debug('cvepdb_select2.js > CVEPDB_SELECT2_READY : success : End');
    });

    // A la fin du chargement de la library
    $(D).bind('CVEPDB_SELECT2_READY', function() {
        cvepdb.debug('cvepdb_select2.js > CVEPDB_SELECT2_READY : success : Start');
        _cvepdb_s2.setup();
        cvepdb.debug('cvepdb_select2.js > CVEPDB_SELECT2_READY : success : End');
    });

})(jQuery, window, document);
