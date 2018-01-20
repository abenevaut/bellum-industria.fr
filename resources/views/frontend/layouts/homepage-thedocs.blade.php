<!DOCTYPE html>
<html prefix="abenevaut: {{ route('frontend.home') }}" lang="fr_FR">
	<head>
		@include('frontend.partials.homepage-thedocs.metadatas')
	</head>
	<body>
		@include('frontend.partials.homepage-thedocs.header')
		<main class="container">
			<div class="row">
				@include('frontend.partials.default-thedocs.sidebar')
				<article class="col-md-9 col-sm-9 main-content" role="main">
					@yield('content')
					@include('frontend.partials.default-thedocs.share')
				</article>
			</div>
		</main>
		@include('frontend.partials.default-thedocs.footer')
		@include('frontend.partials.default-thedocs.footerjs')
	</body>
</html>
