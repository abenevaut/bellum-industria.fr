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
        ENV: '{{ config('app.debug') ? 'development' : 'production' }}',
        ENV_REF: 'dev',
        ENV_THEME: '',
        IDUSER: 0,
        LANG: '{{ Session::get('lang') }}',
        URI_BASE: '',
        URL_BASE: '',
        URL_SITE: '',
        URL_THEME: '../',
        BASE_PATH: 'assets/cvepdbjs/',
        LIVEREALOAD: {
            //			url: '',
            //			port: '',
            project: '0'
        },
        UA: {
            MOBILE: false,
            BROWSER: true
        }
    };
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
