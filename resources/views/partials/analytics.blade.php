<meta name="version" content="{{ config('versiongenerated.version') }}">
<meta name="user_id" content="@if (Auth::check()){{ Auth::user()->uniqid }}@else{{ 'visitor' }}@endif">
<meta name="user_role" content="@if (Auth::check()){{ Auth::user()->role }}@else{{ 'visitor' }}@endif">
<script type="application/javascript">
    addEventListener('error', window.__e=function f(e){f.q=f.q||[];f.q.push(e)});
</script>
