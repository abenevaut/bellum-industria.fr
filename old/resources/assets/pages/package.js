/* ============================================================
 * Pages Integration for Meteor
 * package metadata file for Meteor.js
 * Contribution : Jan @mediatainment, 
 * How to : 
 * ============================================================ */

'use strict';

var packageName = 'revox:pages';
var where = 'client'; // where to install: 'client' or 'server'. For both, pass nothing.

Package.describe({
    name: packageName,
    summary: 'Pages Core',
    version: "1.1.1", //packageJson.version,
    git: 'https://github.com/revoxltd/pages'
});

Package.onUse(function(api) {
    api.versionsFrom(['METEOR@0.9.0', 'METEOR@1.0']);
    api.use(['jquery','mizzao:bootstrap-3', 'momentjs:moment', 'bkruse:pace', 'gromo:jquery.scrollbar','mrt:modernizr-meteor','fortawesome:fontawesome'], where);
    api.addFiles([
        'js/pages.js',
        'js/pages.calendar.min.js',
        'css/pages.min.css',
        'css/pages-icons.css',
        'fonts/pages-icon/Pages-icon.eot',
        'fonts/pages-icon/Pages-icon.ttf',
        'fonts/pages-icon/Pages-icon.woff',
        'img/editor_tray.png',
        'img/editor_tray_2x.png',
        'img/icons/top_tray.png',
        'img/icons/top_tray_2x.png',
        'img/icons/noti-cross.png',
        'img/icons/noti-cross-2x.png',], where);
});

Package.onTest(function(api) {
    api.use(packageName, where);
    api.use(['webapp','tinytest', 'jquery', 'momentjs:moment'], where);
});