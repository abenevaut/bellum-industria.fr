@extends('adminlte::layouts.default')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/adminlte/css/jquery-ui_custom/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('modules/files/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('modules/files/css/theme.css') }}">
@endsection

@section('js')
    <script src="{{ asset('modules/files/js/elfinder.min.js') }}"></script>
    {{--@if ($locale)--}}
    {{--<script src="{{ asset('modules/files/js/i18n/elfinder.'.$locale.'.js') }}"></script>--}}
    {{--@endif--}}

    <script type="text/javascript" charset="utf-8">
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        $().ready(function() {
            $('#elfinder').elfinder({
                // set your elFinder options here
                @if ($locale)
                    lang: 'en', // locale
                @endif
                customData: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                url : '{{ route("elfinder.connector") }}'  // connector URL
            });
        });
    </script>
@endsection

@section('content')
    <div id="elfinder"></div>
@endsection
