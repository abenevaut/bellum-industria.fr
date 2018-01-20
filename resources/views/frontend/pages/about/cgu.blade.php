@extends('frontend.layouts.longwave-boxed')

@section('title', $metadata['title'])
{{--@section('description', $metadata['description'])--}}
{{--@section('tweetable', $metadata['tweetable'])--}}
{{--@section('keywords', $metadata['keywords'])--}}
{{--@section('image', $metadata['image'])--}}
{{--@section('type')--}}
	{{--<meta property="og:type" content="profile" />--}}
	{{--<meta property="profile:first_name" content="Antoine"/>--}}
	{{--<meta property="profile:last_name" content="Benevaut"/>--}}
	{{--<meta property="profile:username" content="abenevaut"/>--}}
	{{--<meta property="profile:gender" content="male"/>--}}
{{--@endsection--}}
{{--@section('card', $metadata['card'])--}}

@section('css')
	<link rel="stylesheet" type="text/css" media="all" href="https://cdn.rawgit.com/konpa/devicon/4f6a4b08efdad6bb29f9cc801f5c07e263b39907/devicon.min.css">
@endsection

@section('content')
	<div class="dark-wrapper page-title">
		<div class="inner">
			<h1 class="title alignleft">Conditions générales d'utilisations</h1>
			<div class="navigation alignright">
				<a href="{{ route('frontend.terms') }}"><i style="width: 240px;">Mentions légales</i></a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="light-wrapper">
		<div class="inner">
			<h3 class="colored">Utilitaires de tracking</h3>
			<p>
				www.benevaut.fr utilise des services d’analyses de site internet, pour ameliorer la qualité de son service, cela est fait de façon anonyme, ce qui signifie que les données transmisent aux services tiers ne peuvent vous identifier directement.
				<h4>Définitions</h4>
				Les cookies sont des fichiers texte placés sur votre ordinateur, pour aider le site internet à analyser l’utilisation du site par ses utilisateurs
			</p>
			<h4>Facebook</h4>
			<p>
				Ce site utilise Facebook, qui propose un service d’analyse de site internet fourni par Facebook Inc. (« Facebook »). Facebook utilise des cookies.
			</p>
			<h4>Google Analytics</h4>
			<p>
				Ce site utilise Google Analytics, un service d’analyse de site internet fourni par Google Inc. (« Google »). Google Analytics utilise des cookies.
			</p>
			<h4>Disqus</h4>
			<p>
				Ce site utilise Disqus, qui propose un service de suggestion de contenu fourni par Disqus Inc. (« Disqus »). Disqus utilise des cookies.
			</p>
			<div class="clear"></div>
		</div>
	</div>
	{{--<div class="dark-wrapper">--}}
		{{--<div class="inner">--}}

			{{--<h2 class="colored">Auto-évaluation de mes compétences</h2>--}}


		{{--</div>--}}
	{{--</div>--}}

@endsection
