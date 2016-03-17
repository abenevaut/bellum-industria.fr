<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>{{ Lang::get('installer::installer.footer_version') }}</b> {{ $footer['version'] }}
    </div>
    <strong>Copyleft {{ date('Y') }} <a href="{{ $footer['url'] }}">{{ $footer['title'] }}</a>.</strong>
</footer>