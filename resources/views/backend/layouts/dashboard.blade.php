<!DOCTYPE html>
<html>
	<head>
		@include('backend.partials.default.metadatas')
	</head>
	<body class="fixed-header dashboard @if (Auth::check() && Auth::user()->profile->is_sidebar_pined) menu-pin @endif">
		@include('backend.partials.default.sidebar')
		<div class="page-container ">
			@include('backend.partials.default.header')
			<div class="page-content-wrapper ">
				<div class="content sm-gutter">
					<div class="container-fluid padding-25 sm-padding-10">
						@yield('content')
					</div>
				</div>
				@include('backend.partials.default.footer')
			</div>
		</div>
		{{--@include('backend.partials.default.quickview')--}}
		{{--@include('backend.partials.default.overlay')--}}
		@include('backend.partials.default.footerjs')
		@include('backend.partials.default.session_flash_message')
	</body>
</html>
