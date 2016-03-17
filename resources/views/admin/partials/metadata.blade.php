<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | #CVEPDB CMS</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/bower/components-font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bower/Ionicons/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/' . css_file_rev('style.css')) }}">
<!--[if lt IE 9]>
<script src="{{ asset('assets/bower/html5shiv/dist/html5shiv.min.js') }}"></script>
<script src="{{ asset('assets/bower/respond/dest/respond.min.js') }}"></script>
<![endif]-->

<script>
    var cvepdb_config = {
        env: '{{ config('app.debug') ? 'development' : 'production' }}',
        env_ref: '{{ config('app.debug') ? 'development' : 'production' }}',
        env_theme: '',
        iduser: {{ Auth::check() ? Auth::user()->id : 0 }},
        lang: '{{ Session::get('lang') }}',
        uri_base: '',
        url_base: '{{ url('admin') }}',
        url_site: '{{ url('/') }}',
        url_theme: '{{ url('/') }}',
        base_path: '/assets/bower/',
        script_path: '/assets/bower/cvepdbjs/',
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
            development: {
                key: "",
                url: "sentry.cvepdb.fr",
                project: 0
            },
            staging: {
                key: "",
                url: "sentry.cvepdb.fr",
                project: 0
            },
            production: {
                key: "",
                url: "sentry.cvepdb.fr",
                project: 0
            }
        },
        maps: {
            google: {
                key_js: '{{ env('GOOGLE_PLACES_API_KEY_JS') }}',
                key_server: '{{ env('GOOGLE_PLACES_API_KEY') }}'
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
        },
        {
            script: {
                CVEPDB_THEME_ADMIN_JS_LOADED: ('{{ asset('assets/bower/bootstrap-sass-official/assets/javascripts/bootstrap.min.js') }}')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        },
        {
            script: {
                CVEPDB_THEME_ADMIN_JS_LOADED: ('{{ asset('assets/bower/jquery-slimscroll/jquery.slimscroll.min.js') }}')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        },
        {
            script: {
                CVEPDB_THEME_ADMIN_JS_LOADED: ('{{ asset('assets/bower/fastclick/lib/fastclick.js') }}')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        },
        {
            script: {
                CVEPDB_THEME_ADMIN_JS_LOADED: ('{{ asset('assets/bower/admin-lte.scss/javascripts/app.js') }}')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        }
    ];

</script>

@yield('head')
