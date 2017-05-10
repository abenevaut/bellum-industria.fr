<script src="{{ elixir('js/frontend/layouts/core.js') }}"></script>
@if ('production' == env('APP_ENV'))
	<script src="{{ elixir('js/frontend/layouts/googleanalytics.js') }}"></script>
@endif
@yield('js')
