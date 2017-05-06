@extends('frontend.layouts.default')

@section('css')
@endsection

@section('js')
	<script src="plugins/masonry/imagesloaded.pkgd.min.js"></script>
	<script src="plugins/masonry/masonry.pkgd.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true&key={{ env('BI_GOOGLE_API_KEY') }}"></script>
	<script src="plugins/gmaps/prettify.js"></script>
	<script src="plugins/gmaps/gmaps.js"></script>
	<script>
		(function ($) {
			"use strict";
			var $container = $('.masonry');
			var map;
			$($container).imagesLoaded(function () {
				$($container).masonry({
					itemSelector: '.post-grid',
					columnWidth: '.post-grid'
				});
			});
			$(document).ready(function() {
				prettyPrint();
				var map = new GMaps({
					div: '#map',
					scrollwheel: false,
					lat: 48.8566,
					lng: 2.3522
				});
				var marker = map.addMarker({
					lat: 48.8566,
					lng: 2.3522
				});
			});
		})(jQuery);
	</script>
@endsection

@section('content')

	<section class="hero" style="background-image: url(img/cover/cover.jpg);">
		<div class="hero-bg-primary"></div>
		<div class="container">
			<div class="page-header">
				<div class="page-title">Contactez nous</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('frontend.home') }}">Accueil</a></li>
					<li><a href="{{ route('frontend.contacts') }}" class="active">Contact</a></li>
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
						<h4><i class="fa fa-envelope"></i> Lets Get In Touch!</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis facilisis justo.</p>
					</div>
					<form>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="7" placeholder="Message"></textarea>
						</div>
						<div class="text-center margin-top-30">
							<button type="button" class="btn btn-primary btn-lg btn-rounded btn-shadow">Send Message</button>
						</div>
					</form>
				</div>
				<div class="col-lg-5 height-300">
					<img src="img/content/contact.jpg" class="image-right" alt="">
				</div>
			</div>
		</div>
	</section>

@endsection
