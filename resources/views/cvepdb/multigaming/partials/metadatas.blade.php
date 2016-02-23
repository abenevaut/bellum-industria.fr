<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<base href="{{ url() }}"/>

<title>Multigamgin#CVEPDB.fr</title>

<link href="/assets/images/multigaming/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="/assets/images/multigaming/apple-touch-icon.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/multigaming/apple-touch-icon-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/multigaming/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/multigaming/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/multigaming/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="/assets/css/multigaming/default.css" media="all" />
<link rel="stylesheet" type="text/css" href="/assets/cvepdbjs/libs/jquery-ui/themes/base/all.css" media="all" />
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="../css/ie8.css" media="all" />
<![endif]-->

<link rel="alternate" type="application/rss+xml"
      href="https://steamcommunity.com/groups/Bellum-Industria/rss" title="Bellum Industria #CVEPDB | Steamcommunity">

<script>
    var cvepdb_config = {
        env: '{{ config('app.debug') ? 'development' : 'production' }}',
        env_ref: '{{ config('app.debug') ? 'development' : 'production' }}',
        env_theme: '',
        iduser: {{ Auth::user()->id ? Auth::user()->id : 0 }},
        lang: '{{ Session::get('lang') }}',
        uri_base: '',
        url_base: '',
        url_site: '',
        url_theme: '../',
        base_path: 'assets/cvepdbjs/',
        livereload: {
            //			url: '',
            //			port: '',
            project: '0'
        },
        ua: {
            mobile: false,
            browser: true
        },
        sentry: {
            /**
             *
             */
            development: {
                key: "cdfb1217505e4c21a06abccf407711d8",
                url: "sentry.cvepdb.fr",
                project: 8
            },
            /**
             *
             */
            staging: {
                key: "d8e3d03a69514f92a7b3007a14fc4620",
                url: "sentry.cvepdb.fr",
                project: 7
            },
            /**
             *
             */
            production: {
                key: "5a4240a22c75445c93d8aeab837cfd67",
                url: "sentry.cvepdb.fr",
                project: 3
            }
        }
    };

    cvepdb_config.libraries = [
        {
            script: {
                CVEPDB_HIGHCHARTS_LOADED: (cvepdb_config.url_theme + cvepdb_config.base_path + 'scripts/highcharts.js')
            },
            trigger: '.js-call-highcharts',
            mobile: false,
            browser: true
        }
    ];

    /*
     {
     script: {
     CVEPDB_PYROCMS_FILTER: (cvepdb_config.url_theme + cvepdb_config.base_path + 'scripts/filters.js')
     },
     trigger: '.js-call-pyrofilters',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_TIPSY: (cvepdb_config.url_theme + cvepdb_config.base_path + 'scripts/tipsy.js')
     },
     trigger: 'always',
     mobile: false,
     browser: true
     },
     {

     {
     script: {
     CVEPDB_SELECTNAV: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/selectnav/selectnav.min.js')
     },
     trigger: '.js-call-selectnav',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_DDSMOOTHMENU: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/ddsmoothmenu/ddsmoothmenu.js')
     },
     trigger: '.js-call-ddsmoothmenu',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_HOVERDIR: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/DirectionAwareHoverEffect/js/jquery.hoverdir.js')
     },
     trigger: '.js-call-hoverdir',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_ISOTOPE: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/isotope/jquery.isotope.js')
     },
     trigger: '.js-call-isotope',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_FITVIDS: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/jquery.fitvids/jquery.fitvids.js')
     },
     trigger: '.js-call-fitvids',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_REVOLUTION: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/slider-revolution/src/js/jquery.themepunch.revolution.min.js')
     },
     trigger: '.js-call-revolution',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_REVOLUTION_PLUGINS: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/slider-revolution/src/js/jquery.themepunch.plugins.min.js')
     },
     trigger: '.js-call-revolution',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_EASYTABS: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/easytabs/lib/jquery.easytabs.min.js')
     },
     trigger: '.js-call-easytabs',
     mobile: true,
     browser: true
     },
     {
     script: {
     CVEPDB_SELECT2: (cvepdb_config.url_theme + cvepdb_config.base_path + 'scripts/select2.js')
     },
     trigger: '.js-call-select2',
     mobile: true,
     browser: true
     }
     */
</script>

<style>
    .download-box, .warning-box, .info-box, .note-box {
        clear: both;
        margin: 10px 0px;
        padding: 13px 15px;
    }
    .required {
        color: #ff0000;
    }
    .forms fieldset .has-error .text-input {
        border-color: #ff0000;
    }
    .forms fieldset .has-success .text-input {
        border-color: #2E7D32;
    }
</style>
