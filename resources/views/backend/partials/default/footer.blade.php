<footer>
	<div class="container">
		<div class="widget row">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<h4 class="title">Bellum Industria</h4>
				<p>Communauté de joueurs fun #CSGO #H1Z1KotK #RocketLeague #PayDay2</p>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<h4 class="title">Navigations</h4>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<ul class="nav">
							<li><a href="{{ route('frontend.home') }}">Accueil</a></li>
							@if (!Auth::check())
								<li><a href="{{ route('login') }}">Connexion</a></li>
								<li><a href="{{ route('register') }}">Créer un compte</a></li>
							@endif
							<li><a href="{{ route('frontend.contact.index') }}">Contact</a></li>
						</ul>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<ul class="nav">
							<li><a href="{{ route('forum.index') }}">Forum</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<ul class="list-inline">
				<li><a href="https://twitter.com/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://www.facebook.com/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://steamcommunity.com/groups/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Steam"><i class="fa fa-steam"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UCSBq3Ozx_nY6eQ4RJDvxSCA" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Youtube"><i class="fa fa-youtube-square"></i></a></li>
				<li><a href="https://twitch.tv/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Twitch.tv"><i class="fa fa-twitch"></i></a></li>
			</ul>
			© 2016-{{ date('Y') }} <a href="{{ url('/') }}">www.bellum-industria.fr</a>. All rights reserved.
		</div>
	</div>
</footer>
