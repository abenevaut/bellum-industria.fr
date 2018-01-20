<!DOCTYPE html>
<html>
	<head>
		@include('backend.partials.login.metadatas')
	</head>
	<body class="fixed-header ">
		@include('partials.ribbon')
		@yield('content')
		@include('backend.partials.login.overlay')
		@include('backend.partials.login.footerjs')
		@include('backend.partials.login.session_flash_message')
	</body>
</html>
