<div class="container-fluid container-fixed-lg footer">
	<div class="copyright sm-text-center">
		<p class="small no-margin pull-left sm-pull-reset">
			<span class="hint-text">© 2016-{{ date('Y') }} </span>
			<span class="font-montserrat"><a href="{{ route('backend.dashboard.index') }}">www.benevaut.fr</a> - {{ config('versiongenerated.version') }}</span>.
			<span class="hint-text">All rights reserved. </span>
			<span class="sm-block"><a href="{{ route('frontend.terms') }}" class="m-l-10 m-r-10">Mentions légales</a> | <a href="{{ route('frontend.cgu') }}" class="m-l-10">Conditions générales d'utilisations</a></span>
		</p>
		<p class="small no-margin pull-right sm-pull-reset">
			{{--<a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>--}}
		</p>
		<div class="clearfix"></div>
	</div>
</div>
