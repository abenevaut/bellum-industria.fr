@extends('frontend.layouts.default-thedocs')

@section('title', $metadata['title'])
@section('description', sprintf('Documentation %s', $title))
@section('tweetable', sprintf('Documentation %s', $title))
{{--@section('keywords', $metadata['keywords'])--}}
{{--@section('image', $metadata['image'])--}}
{{--@section('type')--}}
	{{--<meta property="og:type" content="article" />--}}
	{{--<meta property="article:published_time" content="{{ \Carbon\Carbon::createFromDate(2017, 11, 1, 'Europe/Paris')->toIso8601String() }}"/>--}}
	{{--<meta property="article:modified_time" content="{{ \Carbon\Carbon::createFromDate(2017, 11, 1, 'Europe/Paris')->toIso8601String() }}"/>--}}
	{{--<meta property="article:expiration_time" content=""/>--}}
	{{--<meta property="article:author" content="Antoine Benevaut"/>--}}
	{{--<meta property="article:section" content="Technology"/>--}}
	{{--<meta property="article:tag" content="{{ str_replace(' ', ',', $title) }}"/>--}}
{{--@endsection--}}
{{--@section('card', $metadata['card'])--}}

@section('js')
	<script type="text/javascript" src="{{ mix('assets/js/frontend/documentations/show.js') }}"></script>
@endsection

@section('banner')
	<div class="container text-white">
		<h1>{{ $title }}</h1>
		<h5>Documentation</h5>
	</div>
@endsection

@section('sidebar')
	<ul class="sidenav dropable sticky">
		<li><a href="{{ url('/documentations#services_list') }}">Documentations</a></li>
	</ul>
@endsection

@section('content')
	<section>
		{!! $content !!}
	</section>
	<section>
		<div id="disqus_thread"></div>
		<noscript>
			<div class="alert alert-info">
				Activer JavaScript pour voir les commentaires
			</div>
		</noscript>
	</section>
@endsection
