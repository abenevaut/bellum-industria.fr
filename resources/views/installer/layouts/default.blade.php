<!DOCTYPE html>
<html>
<head>
    @include('installer.partials.metadata')

    <style>
        .instruction {
            font-size: 12px;
            font-weight: normal;
        }
        .p-b-60 {
            padding-bottom: 60px;
        }
        div[id$="-error"] {
            margin-bottom: 25px;
            color: #dd4b39;
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
                    {{ trans('installer.title') }}
                    <small>({{ $footer['version'] }})</small>
                </h1>
                <ol class="breadcrumb">
                    {{--<li>{{ trans('installer.title') }}</li>--}}
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

<div class="hidden" style="display:none;">
    <span class="field_required">{{ trans('installer.field_required') }}</span>
    <span class="field_maxlen">{{ trans('installer.field_maxlen') }}</span>
    <span class="field_email">{{ trans('installer.field_email') }}</span>
    <span class="field_url">{{ trans('installer.field_url') }}</span>
</div>

@include('installer.partials.js-footer')
</body>
</html>
