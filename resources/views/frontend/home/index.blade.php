@extends('frontend.layouts.default')

@section('css')
@endsection

@section('js')
	<script src="plugins/masonry/imagesloaded.pkgd.min.js"></script>
	<script src="plugins/masonry/masonry.pkgd.min.js"></script>
	<script>
		(function ($) {
			"use strict";
			var $container = $('.masonry');
			$($container).imagesLoaded(function () {
				$($container).masonry({
					itemSelector: '.post-grid',
					columnWidth: '.post-grid'
				});
			});
			$(document).ready(function() {

				/**
				 * Youtube
				 */

				var $ytb_background = $('.youtube-background');

				$.ajax({
					type: "GET",
					url: "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={{ env('BI_YOUTUBE_CHANNEL_ID') }}&maxResults=1&order=date&type=video&key={{ env('BI_GOOGLE_API_KEY') }}",
					cache: false,
					dataType: 'jsonp',
					success: function (data) {
						var last_video = data.items[0];
						$ytb_background.css('background-image', 'url(https://img.youtube.com/vi/' + last_video.id.videoId + '/maxresdefault.jpg)');
						$ytb_background.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + last_video.id.videoId + '?rel=0&amp;showinfo=0');
						$ytb_background.show();
					},
					error: function() {
						$ytb_background.hide();
					}
				});

				/**
				 * Twitch
				 */

//				$.ajax({
//					url: 'https://api.twitch.tv/kraken/streams/bellumindustria',
//					dataType: 'jsonp',
//					success: function (channel) {
//						console.log(channel);
//					},
//					error: function () {
//						//request failed
//					}
//				});
			});
		})(jQuery);
	</script>
@endsection

@section('content')

	<section class="border-bottom-1 border-grey-300 padding-10">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="{{ route('frontend.home') }}" class="active">Accueil</a></li>
			</ol>
		</div>
	</section>

	<section class="padding-top-15 padding-bottom-10">
		<div class="owl-carousel owl-video">
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/RZ5EPBx0G7Y/mqdefault.jpg" alt=""></a>
					<div class="time">15:42</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/yjqqwZGNHPg/mqdefault.jpg" alt=""></a>
					<div class="time">13:52</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/zLx09vjKYlA/mqdefault.jpg" alt=""></a>
					<div class="time">08:03</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/6vxWoyIjuJA/mqdefault.jpg" alt=""></a>
					<div class="time">11:15</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/g7d9KM1plyg/mqdefault.jpg" alt=""></a>
					<div class="time">16:20</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/jhv3Jq6O-nw/mqdefault.jpg" alt=""></a>
					<div class="time">05:31</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/IsDX_LiJT7E/mqdefault.jpg" alt=""></a>
					<div class="time">04:55</div>
				</div>
			</div>
			<div class="card card-video">
				<div class="card-img">
					<a href="videos-single.html"><img src="http://i1.ytimg.com/vi/SMp-b_hWj14/mqdefault.jpg" alt=""></a>
					<div class="time">14:17</div>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-grey-50 border-bottom-1 border-grey-300 padding-top-40 padding-bottom-40 padding-top-sm-30">
		<div class="container">
			<div class="headline">
				<h4><i class="fa fa-twitter"></i> Tweets</h4>
				<div class="btn-group pull-right">
				</div>
			</div>
			<div class="row masonry">
				@foreach ($tweets as $tweet)
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post-grid">
						<div class="card card-hover">
							<div class="caption" style="border-width: 1px 1px 1px 1px;">
								<h3 class="card-title">
									<a href="https://twitter.com/{{ $tweet->user->screen_name }}">
										{!! '@' . $tweet->user->screen_name !!}
									</a>
								</h3>
								<p>
									{!! $tweet->text !!}
								</p>
								<ul>
									<li>
										<i class="fa fa-calendar-o"></i> {{ $tweet->created_at }}
									</li>
								</ul>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>

	<section class="background-image youtube-background" style="display:none;">
		<span class="background-overlay"></span>
		<div class="container">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="" allowfullscreen=""></iframe>
			</div>
		</div>
	</section>

@endsection
