<!DOCTYPE html>
<html>
<head>
    @include('installer.partials.metadata')

    <style>
        .instruction {
            font-size: 12px;
            font-weight: normal;
        }
        .require {
            color: red;
        }
        .p-b-60 {
            padding-bottom: 60px;
        }
        div[id$="-error"] {
            margin-bottom: 25px;
        }
    </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    @include('installer.partials.header')
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Installer
                    <small>({{ $footer['version'] }})</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Installer</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    @include('installer.partials.footer')
</div>
<!-- ./wrapper -->
@include('installer.partials.js-footer')
</body>
</html>
