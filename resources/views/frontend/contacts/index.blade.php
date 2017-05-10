@extends('frontend.layouts.default')

@section('css')
@endsection

@section('js')
	<script src="//maps.google.com/maps/api/js?key={{ env('BI_GOOGLE_API_KEY') }}"></script>
	<script src="{{ mix('js/frontend/contacts/index.js') }}"></script>
@endsection

@section('content')

	<section class="hero" style="background-image: url(/img/cover/cover.jpg);">
		<div class="hero-bg-primary"></div>
		<div class="container">
			<div class="page-header">
				<div class="page-title">Contactez nous</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li><a href="{{ route('frontend.contacts.index') }}" class="active">Contact</a></li>
				</ol>
			</div>
		</div>
	</section>

	<section class="padding-30">
		<div class="container text-center">
			<h2 class="font-size-22 font-weight-300">
				Envoyez nous vos <span class="font-weight-500">remarques</span> et <span class="font-weight-500">idées</span>
			</h2>
		</div>
	</section>

	<section class="border-top-1 border-bottom-1 border-grey-400 section no-padding no-margin">
		<div id="map" class="height-400"></div>
	</section>

	<section class="overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="title">
						<h4><i class="fa fa-envelope"></i> Contactez nous</h4>
						<p>remarques, reproches, idées, donnez nous votre avis</p>
					</div>
					{!! Form::open(['route' => ['frontend.contacts.store'], 'method' => 'POST']) !!}
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
							<button type="submit" class="btn btn-primary btn-lg btn-rounded btn-shadow">Envoyez votre message</button>
						</div>
					{!! Form::close() !!}
				</div>
				<div class="col-lg-5 height-300">
					<img src="/img/content/contact.jpg" class="image-right" alt="">
				</div>
			</div>
		</div>
	</section>

@endsection
