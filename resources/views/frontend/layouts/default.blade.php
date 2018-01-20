<!DOCTYPE html>
<html prefix="bellumindustria: {{ url('/') }}" lang="fr_FR">
	<head>
		@include('frontend.partials.default.metadatas')
	</head>
	<body class="fixed-header">
		@include('partials.ribbon')
		@include('frontend.partials.default.header')
		<div id="wrapper">
			@yield('content')
		</div>
		@include('frontend.partials.default.footer')
		@include('frontend.partials.default.footerjs')
	</body>
</html>
