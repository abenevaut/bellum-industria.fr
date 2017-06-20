<header class="site-header navbar-transparent">

	<!-- Top navbar & branding -->
	<nav class="navbar navbar-default">
		<div class="container">

			<!-- Toggle buttons and brand -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
					<span class="glyphicon glyphicon-option-vertical"></span>
				</button>

				<button type="button" class="navbar-toggle for-sidebar" data-toggle="offcanvas">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="index.html"><img src="/img/logo.png" alt="logo"></a>
			</div>
			<!-- END Toggle buttons and brand -->

			<!-- Top navbar -->
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="true" role="banner">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li class="active"><a href="{{ route('frontend.documentations.index') }}">Documentations</a></li>
					<li class="hero"><a href="{{ route('frontend.contacts.index') }}">Contact</a></li>
				</ul>
			</div>
			<!-- END Top navbar -->

		</div>
	</nav>
	<!-- END Top navbar & branding -->

	<!-- Banner -->
	<div class="banner auto-size" style="background-color: #5cc7b2">
		@yield('banner')
	</div>
	<!-- END Banner -->

</header>