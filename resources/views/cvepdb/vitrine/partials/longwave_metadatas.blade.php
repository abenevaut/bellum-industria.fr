<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="My web portfolio presents my adventures in the world of development and software testing.">
<meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP,internet,mobile,site,website">
<meta name="author" content="Antoine Benevaut">

<base href="{{ url() }}"/>

<meta property="og:site_name" content="Ca va ENCORE parler de bits!">
<meta property="og:url" content="{{ url() }}">
<meta property="og:type" content="website">
<meta property="og:type" content="vitrine:page">
<meta property="og:title" content="Ca va ENCORE parler de bits!">
<meta property="og:description" content="My web portfolio presents my adventures in the world of development and software testing.">
<meta property="og:image" content="{{ url('/assets/images/cvepdb/apple-touch-icon-114x114-precomposed.png') }}">
{{--<meta property="fb:app_id" content="1389892087910588">--}}
{{--<meta property="fb:admins" content="579622216,709634581">--}}

<title>Ca va ENCORE parler de bits!</title>

<link href="/assets/images/cvepdb/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />
<link href="/assets/images/cvepdb/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="/assets/css/vitrine/default.css" media="all" />
<link rel="stylesheet" type="text/css" href="/assets/cvepdbjs/libs/jquery-ui/themes/base/all.css" media="all" />
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="../css/ie8.css" media="all" />
<![endif]-->

<link rel="alternate" type="application/rss+xml"
      href="http://cavaencoreparlerdebits.fr/blog/rss" title="Ca va ENCORE parler de bits!">

<script>
    var cvepdb_config = {
        ENV: 'development',
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

    .icon-webmobile-hand:before { content: '\261e'; } /* '☞' */
    @media only screen and (max-width: 767px) {
        .icon-webmobile-hand:before { content: '\261f'; } /* '☟' */
    }

</style>
