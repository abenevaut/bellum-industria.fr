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
			<h1 class="title alignleft">Mentions légales</h1>
			<div class="navigation alignright">
				<a href="{{ route('frontend.cgu') }}"><i style="width: 240px;">Conditions générales d'utilisations</i></a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="light-wrapper">
		<div class="inner">
			<h2 class="colored">Antoine Benevaut</h2>
			<div class="one-half">
				<ul>
					<li>Dénomination Sociale : Antoine Benevaut</li>
					<li>Raison Sociale : Profession libérale (close en date du 31/12/2017)</li>
					<li>Identification SIRET : 80352602900019</li>
					<li>Identification TVA : FR59803526029</li>
				</ul>
			</div>
			<div class="one-half last">
				<ul>
					<li><i class="icon-location contact"></i> 1 rue de Malabry 92350 Le Plessis Robinson France</li>
					<li><i class="icon-mail contact"></i> contact@benevaut.fr</li>
					<li><i class="icon-mail contact"></i> <a href="{{ route('frontend.contact.index') }}">Formulaire de contact</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="dark-wrapper">
		<div class="inner">
			<div class="one-half">
				<h3 class="colored">Le site</h3>
				<h4>www.benevaut.fr</h4>
				<p>
					est une platerforme d'information sur des sujets informatiques liés au développement et également une plateforme de gestion de projets informatiques.<br>
					Aujourd'hui, l'activité de préstation informatique est close (en date du 31/12/2017) le site est néanmoins ouvert pour que les anciens clients puissent poursuivre la consultation de leurs archives.
				</p>
			</div>
			<div class="one-half last">
				<h3 class="colored">Hébergement</h3>
				<h4>Fortrabbit.com</h4>
				<p>
					https://www.fortrabbit.com<br>
					Adresse : Görlitzer Str. 52 10997 Berlin<br>
					Téléphone : +49 30 609 80 784 0
				</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>

@endsection
