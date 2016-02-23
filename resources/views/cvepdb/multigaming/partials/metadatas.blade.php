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
                LONGWAVE_SCRIPT_LOADED: (cvepdb_config.url_theme + 'assets/js/longwave.js')
            },
            trigger: 'always',
            mobile: true,
            browser: true
        }
    ];
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
