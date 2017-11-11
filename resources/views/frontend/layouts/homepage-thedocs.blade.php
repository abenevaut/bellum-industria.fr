<!DOCTYPE html>
<html prefix="bellumindustria: {{ url('/') }}" lang="fr_FR">
	<head>
		@include('frontend.partials.homepage-thedocs.metadatas')
	</head>
	<body>
		@include('frontend.partials.homepage-thedocs.header')
		<main class="container">
			<div class="row">
				@include('frontend.partials.homepage-thedocs.sidebar')
				<article class="col-md-9 col-sm-9 main-content" role="main">
					@yield('content')
				</article>
			</div>
		</main>
		@include('frontend.partials.homepage-thedocs.footer')
		@include('frontend.partials.homepage-thedocs.footerjs')
	</body>
</html>
