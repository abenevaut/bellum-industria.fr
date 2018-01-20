@extends('frontend.layouts.longwave-full')

@section('title', $metadata['title'])
{{--@section('description', $metadata['description'])--}}
{{--@section('tweetable', $metadata['tweetable'])--}}
{{--@section('keywords', $metadata['keywords'])--}}
{{--@section('image', $metadata['image'])--}}
{{--@section('type')--}}
{{--@endsection--}}
{{--@section('card', $metadata['card'])--}}

@section('css')
	<style>
		.error {
			color: #d18282;
		}
	</style>
@endsection

@section('js')
	<script src="https://maps.google.com/maps/api/js?key={{ config('services.google_api.key') }}"></script>
	<script type="text/javascript" src="{{ mix('assets/js/frontend/users/leads/index.js') }}"></script>
@endsection

@section('content')
	<div class="dark-wrapper page-title">
		<div class="inner">
			<h1 class="title alignleft">Contact</h1>
			<div class="navigation alignright">
				{{--<a href="{{ route('frontend.terms') }}"><i style="width: 240px;">Mentions légales</i></a>--}}
				{{--<a href="{{ route('frontend.cgu') }}"><i style="width: 240px;">Conditions générales d'utilisations</i></a>--}}
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="light-wrapper">
		<div class="inner">
			<div class="map">
				<div id="map" style="height: 450px;"></div>
			</div>
			<br />
			<br />
			<div class="content">
				<h1>Formulaire de contact</h1>
				{{--<p>Maecenas vehicula condimentum consequat. Ut suscipit ipsum eget leotero convallis feugiat upsoyut fermentum leo auctor consequat turpis aturo nisiper.</p>--}}
				<div class="form-container">
					<div class="response"></div>
					{!! Form::open(['route' => ['frontend.contact.store'], 'method' => 'POST', 'class' => 'forms', 'data-user_identifier' => (Auth::check() ? Auth::user()->uniqid : 0)]) !!}
						<fieldset>
							<ol>
								<li class="form-row text-input-row name-field">
									<select name="civility" id="civility" class="text-input">
										@foreach ($civilities as $key => $trans)
										<option value="{{ $key }}" @if (Auth::check() && $key === Auth::user()->civility) selected="selected" @endif>{{ $trans }}</option>
										@endforeach
									</select>
								</li>
								<li class="form-row text-input-row email-field">
									<input type="text" name="last_name" class="text-input defaultText" placeholder="Nom" value="@if (Auth::check()){{ Auth::user()->last_name }}@endif"/>
								</li>
								<li class="form-row text-input-row subject-field">
									<input type="text" name="first_name" class="text-input defaultText" placeholder="Prénom" value="@if (Auth::check()){{ Auth::user()->first_name }}@endif"/>
								</li>
								<li class="form-row subject-field">
									<input type="text" name="email" class="text-input defaultText email" placeholder="Courriel" value="@if (Auth::check()){{ Auth::user()->email }}@endif"/>
								</li>
								<li class="form-row subject-field">
									<input type="text" name="subject" class="text-input defaultText" placeholder="Sujet"/>
								</li>
								<li class="form-row text-area-row">
									<textarea name="message" class="text-area" placeholder="Votre message"></textarea>
								</li>
								<li class="button-row">
									<input type="submit" value="Submit" name="submit" class="btn-submit" />
								</li>
							</ol>
						</fieldset>
					{!! Form::close() !!}
				</div>
			</div>
			<div class="sidebar">
				<div class="sidebox">
					<h3>Adresse</h3>
					{{--<p>Intervention à distance ou en régie.</p>--}}
					<i class="icon-location contact"></i> 1 rue de Malabry<br/>92350 Le Plessis Robinson <br />
					{{--<i class="icon-phone contact"></i> 0247 541 65 87 <br />--}}
					{{--<i class="icon-mail contact"></i> <a href="mailto:contact@benevaut.fr">contact@benevaut.fr</a>--}}
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="dark-wrapper">
		<div class="inner">
			@include('frontend.partials.longwave.share_inline')
		</div>
	</div>
@endsection
