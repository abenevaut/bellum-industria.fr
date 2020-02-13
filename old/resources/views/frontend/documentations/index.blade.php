@extends('frontend.layouts.homepage-thedocs')

@section('title', $metadata['title'])
@section('description', 'Retrouvez les documentations techniques des services et packages que j\'ai crée et que j\'utilise au quotidien.')
@section('tweetable', 'Retrouvez les documentations techniques des services et packages que j\'ai crée et que j\'utilise au quotidien.')
{{--@section('keywords', $metadata['keywords'])--}}
{{--@section('image', $metadata['image'])--}}
{{--@section('type')--}}
{{--@endsection--}}
{{--@section('card', $metadata['card'])--}}

@section('banner')
	<div class="container text-center">
		<h1>Documentations techniques</h1>
		<h5>Retrouvez <strong>les documentations techniques</strong> des services et packages que j'ai crée et que j'utilise au quotidien.</h5>
		<br><br>
		<p>
			<a class="btn btn-white btn-xl btn-outline" href="{{ url('/documentations#services_list') }}" role="button">Les services</a>
			<a class="btn btn-white btn-xl btn-outline" href="{{ url('/documentations#packages_list') }}" role="button">Les packages</a>
		</p>
	</div>
	<ul class="social-icons">
		<li><a href="https://twitter.com/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
		<li><a href="https://www.facebook.com/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
		<li><a href="https://steamcommunity.com/groups/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Steam"><i class="fa fa-steam"></i></a></li>
		<li><a href="https://www.youtube.com/channel/UCSBq3Ozx_nY6eQ4RJDvxSCA" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Youtube"><i class="fa fa-youtube-square"></i></a></li>
		<li><a href="https://twitch.tv/bellumindustria" target="_blank" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="" data-original-title="Follow us on Twitch.tv"><i class="fa fa-twitch"></i></a></li>
	</ul>
@endsection

@section('sidebar')
	<ul class="sidenav dropable sticky">
		<li><a href="{{ url('/documentations#services_list') }}">Les Services</a></li>
		<li><a href="{{ url('/documentations#packages_list') }}">Les Packages</a></li>
	</ul>
@endsection

@section('content')
	<header>
		<h1>Cette espace est en construction</h1>
		<p>Cette espace n'est pas encore terminé, retrouvez <strong>la totalités de mes projets</strong> sur <a href="https://github.com/42antoine">github.com</a>.</p>
	</header>
	<section>
		<h2 id="services_list">Services</h2>
		<ul class="categorized-view view-col-3">
			@foreach($files->split(3) as $filesGroup)
			<li>
				@foreach($filesGroup as $key => $file)
					@if ($key % 1 === 0)
						<a href="{{ url('/documentations' . $file['url']) }}">{{ $file['title'] }}</a>
					@endif
				@endforeach
			</li>
			@endforeach
		</ul>
	</section>
	<section>
		<h2 id="packages_list">Packages</h2>
		<ul class="categorized-view view-col-3">
			<li>
				<h5>bellumindustria</h5>
				<a href="https://github.com/bellumindustria/docker-teamspeak-server" target="_blank" rel="noopener">docker-teamspeak-server</a>
			</li>
		</ul>
	</section>
@endsection
