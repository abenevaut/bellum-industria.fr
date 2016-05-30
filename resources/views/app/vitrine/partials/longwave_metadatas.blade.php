<title>#CVEPDB.fr</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="description" content="Conseils et développement pour vos projets web">
<meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP,internet,mobile,site,website">
<meta name="author" content="Antoine Benevaut">

<base href="{{ url() }}"/>

<meta property="og:site_name" content="#CVEPDB.fr">
<meta property="og:url" content="{{ url() }}">
<meta property="og:type" content="website">
<meta property="og:type" content="vitrine:page">
<meta property="og:title" content="Conseils et développement pour vos projets web">
<meta property="og:description" content="Nous vous accompagnons tout au long de la réalisation de vos projet web.">
<meta property="og:image" content="{{ url('/assets/images/cvepdb/apple-touch-icon-114x114-precomposed.png') }}">
{{--<meta property="fb:app_id" content="1389892087910588">--}}
{{--<meta property="fb:admins" content="579622216,709634581">--}}

<link href="/assets/images/cvepdb/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
<link href="/assets/images/cvepdb/apple-touch-icon.png" rel="apple-touch-icon" type="image/x-icon"/>
<link href="/assets/images/cvepdb/apple-touch-icon-precomposed.png" rel="apple-touch-icon" type="image/x-icon"/>
<link href="/assets/images/cvepdb/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon" type="image/x-icon"/>
<link href="/assets/images/cvepdb/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon" type="image/x-icon"/>
<link href="/assets/images/cvepdb/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" href="/assets/css/vitrine/{!! css_file_rev('default.css') !!}" media="all"/>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="../css/ie8.css" media="all"/>
<![endif]-->

<link rel="alternate" type="application/rss+xml"
      href="http://cavaencoreparlerdebits.fr/blog/rss" title="Ca va ENCORE parler de bits!">

<script>
    var cvepdb_config = {
        env: '{{ config('app.debug') ? 'development' : 'production' }}',
        env_ref: '{{ config('app.debug') ? 'development' : 'production' }}',
        env_theme: '',
        iduser: {{ Auth::check() ? Auth::user()->id : 0 }},
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
            mobile: true,
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
                CVEPDB_JQUERYUI_THEME_LOADED: (cvepdb_config.url_theme + cvepdb_config.base_path + 'libs/jquery-ui/themes/base/all.css')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        },
        {
            script: {
                CVEPDB_HIGHCHARTS_LOADED: (cvepdb_config.url_theme + cvepdb_config.base_path + 'scripts/highcharts.js')
            },
            trigger: '.js-call-highcharts',
            mobile: true,
            browser: true
        },
        {
            script: {
                LONGWAVE_SCRIPT_LOADED: (cvepdb_config.url_theme + 'assets/js/longwave.js')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        },
        {
            script: {
                LONGWAVE_SCRIPT_LOADED: (cvepdb_config.url_theme + 'assets/js/vitrine/contact.js')
            },
            trigger: 'always',
            mobile: true,
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
     script: {
     CVEPDB_SELECT2: (cvepdb_config.url_theme + cvepdb_config.base_path + 'scripts/select2.js')
     },
     trigger: '.js-call-select2',
     mobile: true,
     browser: true
     }




     /**
     * Initialize lazy_loading library
     *//**
    head.ready('CVEPDB_TIPSY', function () {
        _cvepdb.debug('cvepdb.js > CVEPDB_TIPSY : success : Start');
        $(D).trigger('CVEPDB_TIPSY_READY');
        _cvepdb.debug('cvepdb.js > CVEPDB_TIPSY : success : End');
    });



    /**
     * Initialize multidatespicker library
     */
    /**
    head.ready('CVEPDB_MULTIDATESPICKER', function () {
        _cvepdb.debug('cvepdb.js > CVEPDB_MULTIDATESPICKER : success : Start');
        $(D).trigger('CVEPDB_MULTIDATESPICKER_READY');
        _cvepdb.debug('cvepdb.js > CVEPDB_MULTIDATESPICKER : success : End');
    });

    /**
     * Initialize filters library
     */
    /**
    head.ready('CVEPDB_PYROCMS_FILTER', function () {
        _cvepdb.debug('cvepdb.js > CVEPDB_PYROCMS_FILTER : success : Start');

        if (
                (typeof(cvepdb_config.FILTERS) != 'undefined')
                && (typeof(cvepdb_config.FILTERS.startup_load_filters) != 'undefined')
        ) {
            cvepdb.filter.startup_load_filters = cvepdb_config.FILTERS.startup_load_filters;
            _cvepdb.debug(
                    'cvepdb.js > CVEPDB_PYROCMS_FILTER : success : cvepdb.filter.startup_load_filters = '
                    + cvepdb.filter.startup_load_filters
            )
        }

        cvepdb.filter.init();
        $(D).trigger('CVEPDB_PYROCMS_FILTER_READY');
        _cvepdb.debug('cvepdb.js > CVEPDB_PYROCMS_FILTER : success : End');
    });


    /**
     * Initialize select2 library
     */
    /**
    head.ready('CVEPDB_SELECT2', function () {
        _cvepdb.debug('cvepdb.js > CVEPDB_SELECT2 : success : Start');
        $(D).trigger('CVEPDB_SELECT2_READY');
        _cvepdb.debug('cvepdb.js > CVEPDB_SELECT2 : success : End');
    });

    /**
     * Initialize filters library
     */
    /**
    head.ready('CVEPDB_HIGHCHARTS', function () {
        _cvepdb.debug('cvepdb.js > CVEPDB_HIGHCHARTS : success : Start');
        $(D).trigger('CVEPDB_HIGHCHARTS_READY');
        _cvepdb.debug('cvepdb.js > CVEPDB_HIGHCHARTS : success : End');
    });



     */
</script>

<style>
    .download-box, .warning-box, .info-box, .note-box {
        clear: both;
        margin: 10px 0px;
        padding: 13px 15px;
    }

    .idea {
        border-left: 3px solid #88b7d5;
        border-bottom-right-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .talk-define {
        border-left: 3px solid #d58888;
        border-bottom-right-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .work-together {
        border-left: 3px solid #f4a85e;
        border-bottom-right-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .gain-control {
        border-left: 3px solid #aa95d6;
        border-bottom-right-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .icon-webmobile-hand:before {
        content: '\261e';
    }

    /* '☞' */
    @media only screen and (max-width: 767px) {
        .icon-webmobile-hand:before {
            content: '\261f';
        }

        /* '☟' */
    }

</style>

@yield('metadatas')