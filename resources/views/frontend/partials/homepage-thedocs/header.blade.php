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
				<a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="/assets/images/logo-thedocs.png" alt="logo"></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="true" role="banner">
				<ul class="nav navbar-nav navbar-right">
					<li class="@if (Route::currentRouteNamed('frontend.home')) active @endif"><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li class="@if (Route::currentRouteNamed('frontend.documentations.index') || Route::currentRouteNamed('frontend.documentations.file_path')) active @endif">
						<a href="{{ route('frontend.documentations.index') }}">Documentations</a>
					</li>
					<li class="@if (Route::currentRouteNamed('frontend.contact.index')) active @endif"><a href="{{ route('frontend.contact.index') }}">Contact</a></li>
					@if (Auth::check())
						<li class="hero">

							@if (Gate::allows(\bellumindustria\Domain\Users\Users\User::ROLE_ADMINISTRATOR, Auth::user()))
								<a href="{{ route('backend.dashboard.index') }}">
							@elseif (Gate::allows(\bellumindustria\Domain\Users\Users\User::ROLE_GAMER, Auth::user()))
								<a href="{{ route('customer.dashboard.index') }}">
							@endif

								Mon espace
							</a>
						</li>
					@else
						<li class="hero"><a href="{{ route('login') }}">Se connecter</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="banner banner-full-height overlay-black" style="background-image: url(/assets/images/thedocs-home-banner.jpeg);">
		@yield('banner')
	</div>
</header>
