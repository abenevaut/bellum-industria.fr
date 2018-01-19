@extends('frontend.layouts.default')

@section('css')
@endsection

@section('js')
	<script src="//maps.google.com/maps/api/js?key={{ config('services.google_api.key') }}"></script>
	<script src="{{ mix('assets/js/frontend/contact/index.js') }}"></script>
@endsection

@section('content')

	<section class="hero" style="background-image: url(/assets/images/cover/cover.jpg);">
		<div class="hero-bg-primary"></div>
		<div class="container">
			<div class="page-header">
				<h1 class="page-title">Contactez nous</h1>
				<ol class="breadcrumb">
					<li><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li>
						<a href="{{ route('frontend.contact.index') }}" class="active">Contact</a>
					</li>
				</ol>
			</div>
		</div>
	</section>

	<section class="padding-30">
		<div class="container text-center">
			<h2 class="font-size-22 font-weight-300">
				Envoyez nous vos <span class="font-weight-500">remarques</span>
				et <span class="font-weight-500">idées</span>
			</h2>
		</div>
	</section>

	<section class="border-top-1 border-bottom-1 border-grey-400 section no-padding no-margin">
		<div id="map" class="height-400"></div>
	</section>

	<section class="overflow-hidden">
		<div class="container">

			@include('frontend.partials.default.alerts')

			<div class="row">
				<div class="col-lg-7">
					<div class="title">
						<h4><i class="fa fa-envelope"></i> Contactez nous</h4>
						<p>remarques, reproches, idées, donnez nous votre avis</p>
					</div>
					{!! Form::open(['route' => ['frontend.contact.store'], 'method' => 'POST', 'id' => 'form-contact']) !!}
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Prénom" name="first_name" value="{{ old('first_name') }}">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Nom" name="last_name" value="{{ old('last_name') }}">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Courriel" name="email" value="{{ old('email') }}">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Sujet" name="subject" value="{{ old('subject') }}">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="7" placeholder="Message" name="message">{{ old('message') }}</textarea>
					</div>
					<div class="text-center margin-top-30">
						<button type="submit" class="btn btn-primary btn-lg btn-rounded btn-shadow">
							Envoyez votre message
						</button>
					</div>
					{!! Form::close() !!}
				</div>
				<div class="col-lg-5 height-300">
					<img src="/assets/images/content/contact.jpg" class="image-right" alt="">
				</div>
			</div>
		</div>
	</section>

@endsection
