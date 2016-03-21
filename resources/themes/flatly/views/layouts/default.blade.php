<!DOCTYPE html>
<html lang="en">
<head>
    @include('flatly::partials.metadata')
</head>
<body>
@include('flatly::partials.header')
<div class="container">
    @yield('content')
    @include('flatly::partials.footer')
</div>
@include('flatly::partials.js')
</body>
</html>
