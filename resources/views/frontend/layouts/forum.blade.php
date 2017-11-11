<!DOCTYPE html>
<html prefix="bellumindustria: {{ url('/') }}" lang="fr_FR">
	<head>
		@include('frontend.partials.forum.metadatas')
	</head>
	<body class="fixed-header">
		@include('frontend.partials.forum.header')
		<div id="wrapper">
			@yield('content')
		</div>
		@include('frontend.partials.forum.footer')
		@include('frontend.partials.forum.footerjs')
	</body>
</html>
