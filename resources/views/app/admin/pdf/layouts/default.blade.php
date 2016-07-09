<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>

    <title>PDF</title>

    <link href="{{ url('/dist/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('/dist/plugins/boostrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ url('/dist/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ url('/dist/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="{{ url('/dist/css/pages.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        body {
            background-color: white;
        }
        .page-break {
            page-break-after: always;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body class="">
@yield('content')
</body>
</html>