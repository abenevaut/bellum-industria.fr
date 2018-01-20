(function ($, W, D) {
    'use strict';

    var _script = {};

    _script = {
        /**
         * Run script
         */
        init: function () {
            bellumindustria.debug('app-profiles.js > init');

            _script.init_sidebar_listener();
        },
        /**
         *
         */
        init_sidebar_listener: function () {
            bellumindustria.debug('app-profiles.js > init_sidebar_listener');
            $(D).on('click.pg.sidebar.data-api', '[data-toggle-pin="sidebar"]', function(e) {
                e.preventDefault();
                var data = {
                    is_sidebar_pined: 0,
                    _method: 'PUT'
                };
                var $target = $('[data-pages="sidebar"]');
                if ($target.data('pg.sidebar').$body.hasClass('menu-pin')) {
                    data.is_sidebar_pined = 1;
                }
                $.post('/ajax/users/profiles/change-sidebar-pin-status', data);
            });
        }
    };

    $(D).bind('APP_READY', function () {
        _script.init();
    });

})(window.jQuery, window, document);
