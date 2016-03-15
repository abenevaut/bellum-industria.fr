<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>{{ trans('installer.footer_version') }}</b> {{ $footer['version'] }}
    </div>
    <strong>Copyleft {{ date('Y') }} <a href="{{ $footer['url'] }}">{{ $footer['title'] }}</a>.</strong>
</footer>