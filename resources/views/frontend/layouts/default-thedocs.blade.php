<!DOCTYPE html>
<html lang="en">
	<head>
		@include('frontend.partials.default-thedocs.metadatas')
	</head>
	<body data-spy="scroll" data-target=".sidebar" data-offset="200">
		@include('frontend.partials.default-thedocs.header')
		<main class="container">
			<div class="row">
				@include('frontend.partials.default-thedocs.sidebar')
				<article class="col-sm-9 main-content" role="main">
					@yield('content')
				</article>
			</div>
		</main>
		@include('frontend.partials.default-thedocs.footer')
		@include('frontend.partials.default-thedocs.footerjs')
	</body>
</html>
