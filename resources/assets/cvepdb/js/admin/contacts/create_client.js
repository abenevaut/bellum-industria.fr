/*
 * Create user
 */
(function ($, W, D) {
    // A la fin du chargement de la library
    $(D).bind('CVEPDB_READY', function () {
        cvepdb.debug('create_client.js > CVEPDB_READY : success : Start');
        $('form.forms').validate({
            rules: {
                last_name: {
                    required: true
                },
                first_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                last_name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED')
                },
                first_name: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED')
                },
                email: {
                    required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                    email: cvepdb.globalize.translate('FIELD_VALID_EMAIL')
                }
            }
        });
        cvepdb.debug('create_client.js > CVEPDB_READY : success : End');
    });
})(jQuery, window, document);