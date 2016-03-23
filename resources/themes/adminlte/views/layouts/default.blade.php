<!DOCTYPE html>
<html>
<head>
    @include('adminlte::partials.metadata')
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">
    @include('adminlte::partials.header')
    @include('adminlte::partials.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ trans($header['title']) }}
                <small>{{ trans($header['description']) }}</small>
            </h1>
            <ol class="breadcrumb">
                {!! $breadcrumbs or '&nbsp;' !!}
            </ol>
        </section>
        <section class="content">

            @if (Session::has('message-success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ trans(Session::get('message-success')) }}
                </div>
            @endif

            @if (Session::has('message-error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Error!</h4>
                    {{ trans(Session::get('message-error')) }}
                </div>
            @endif

            @if (Session::has('message-warning'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Error!</h4>
                    {{ trans(Session::get('message-warning')) }}
                </div>
            @endif

            @yield('content')

        </section>
    </div>
    @include('adminlte::partials.footer')
    @include('adminlte::partials.config_sidebar')
</div>
@include('adminlte::partials.js-footer')
</body>
</html>
