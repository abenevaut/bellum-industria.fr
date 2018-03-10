<footer class="site-footer">
	<div class="container">
		<a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a>
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<p>
					© 2016-{{ date('Y') }} <a href="{{ route('frontend.home') }}">www.benevaut.fr</a> - {{ config('versiongenerated.version') }}. All rights reserved.<br>
					<a href="{{ route('frontend.terms') }}">Mentions légales</a> - <a href="{{ route('frontend.cgu') }}">Conditions générales d'utilisations</a>
				</p>
			</div>
			<div class="col-md-6 col-sm-6">
				<ul class="footer-menu">
					<li><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li class="active"><a href="{{ route('frontend.documentations.index') }}">Documentations</a></li>
					<li><a href="{{ route('frontend.contact.index') }}">Contact</a></li>
					<li><a href="{{ route('frontend.cgu') }}">Conditions générales d'utilisations</a></li>
					<li><a href="{{ route('frontend.terms') }}">Mentions légales</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
