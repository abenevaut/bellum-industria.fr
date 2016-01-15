<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            .header,
            .footer {
                width: 100%;
                text-align: center;
                position: fixed;
            }
            .header {
                top: 0px;
                height: 100px;
            }
            .footer {
                bottom: 0px;
                height: 30px;
            }
            .content {
                margin-top: 100px;
                border: 1px solid black;
                height: 900px;
            }
            .page-break {
                page-break-after: always;
            }
            .pagenum:before {
                content: counter(page);
            }
        </style>
    </head>
    <body>

        <div class="header">
            Page <span class="pagenum"></span>
        </div>

        <div class="footer">
            Page <span class="pagenum"></span>
        </div>

        @yield('content')

    </body>
</html>