<!DOCTYPE html>
<html lang="en">
	<head>
		@include('frontend.partials.default.metadatas')
	</head>
	<body class="fixed-header">
		@include('frontend.partials.default.header')
		<div id="wrapper">
			@yield('content')
		</div>
		@include('frontend.partials.default.footer')
		@include('frontend.partials.default.footerjs')
	</body>
</html>
