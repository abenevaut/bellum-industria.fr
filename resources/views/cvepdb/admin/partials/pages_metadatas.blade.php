<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description" />
<meta content="Antoine Benevaut" name="author" />

<base href="{{ url() }}"/>

<title>Panel admin | #CVEPDB.fr</title>

<link href="/assets/images/cvepdb/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />

<link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />

<link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/assets/plugins/summernote/css/summernote.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">

<link href="/assets/css/pages-icons.css" rel="stylesheet" type="text/css">

<link class="main-stylesheet" href="/assets/css/admin/default.css" rel="stylesheet" type="text/css" />

<!--[if lte IE 9]>
<link href="/assets/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
    window.onload = function()
    {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/assets/css/windows.chrome.fix.css" />'
    }
</script>

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

@yield('metadatas')