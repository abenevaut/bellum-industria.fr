<header class="site-header navbar-fullwidth navbar-transparent">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
					<span class="glyphicon glyphicon-option-vertical"></span>
				</button>
				<button type="button" class="navbar-toggle for-sidebar" data-toggle="offcanvas">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="/assets/images/logo.png" alt="logo"></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="true" role="banner">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li class="active"><a href="{{ route('frontend.documentations.index') }}">Documentations</a></li>
					<li class="hero"><a href="{{ route('frontend.contact.index') }}">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="banner banner-full-height overlay-black" style="background-image: url(/assets/images/thedocs-banner1-pexels.com.jpeg);">
		@yield('banner')
	</div>
</header>
