<!DOCTYPE html>
<html>
	<head>
		@include('backend.partials.grey_form.metadatas')
	</head>
	<body class="fixed-header ">
		@include('partials.ribbon')
		@yield('content')
		@include('backend.partials.grey_form.overlay')
		@include('backend.partials.grey_form.footerjs')
	</body>
</html>
