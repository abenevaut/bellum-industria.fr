@extends('frontend.layouts.default')

@section('css')
	<link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

	<style>
		.youtube-carousel .btn {
			font-size: 25px;
			font-weight: 100;
		}
	</style>
@endsection

@section('js')
	<script src="plugins/masonry/imagesloaded.pkgd.min.js"></script>
	<script src="plugins/masonry/masonry.pkgd.min.js"></script>
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
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

				var carousel = $('.owl-carousel');
				var $ytb_background = $('.youtube-background');
				var $ytb_carousel = $('.youtube-carousel');

				$.ajax({
					type: "GET",
					url: "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={{ env('BI_YOUTUBE_CHANNEL_ID') }}&maxResults=8&order=date&type=video&key={{ env('BI_GOOGLE_API_KEY') }}",
					cache: false,
					dataType: 'jsonp',
					success: function (data) {
						var last_video = data.items[0];
						$ytb_background.css('background-image', 'url(https://img.youtube.com/vi/' + last_video.id.videoId + '/maxresdefault.jpg)');
						$ytb_background.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + last_video.id.videoId + '?rel=0&amp;showinfo=0');
						$.each(data.items, function(index, item) {
							carousel.append(
								'<div class="card card-video">' +
								'<div class="card-img">' +
								'<a href="javascript:void(0);" class="youtube-carousel-load-video" data-video_id="'+item.id.videoId+'">' +
								'<img src="https://img.youtube.com/vi/' + item.id.videoId + '/maxresdefault.jpg" alt=""></a>' +
								'<div class="time">' + item.snippet.title + '</div>' +
								'</div>' +
								'</div>'
							);
						});
						// start carousel
						carousel.owlCarousel({
							autoPlay: true,
							nav: true,
							items : 6, //4 items above 1000px browser width
							itemsDesktop : [1600,3], //3 items between 1000px and 0
							itemsTablet: [940,1], //1 items between 600 and 0
							itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
						});
						$(".next").click(function(){
							carousel.trigger('owl.next');
							return false;
						});
						$(".prev").click(function(){
							carousel.trigger('owl.prev');
							return false;
						});
						$('.youtube-carousel-load-video').click(function() {
							$ytb_background.css('background-image', 'url(https://img.youtube.com/vi/' + $(this).attr('data-video_id') + '/maxresdefault.jpg)');
							$ytb_background.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + $(this).attr('data-video_id') + '?rel=0&amp;showinfo=0');
						});
						$ytb_background.show();
						$ytb_carousel.show();
					},
					error: function() {
						$ytb_background.hide();
						$ytb_carousel.hide();
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

	<section class="padding-top-15 padding-bottom-10 youtube-carousel" style="display:none;">
		<div class="owl-carousel owl-video"></div>
		<div class="row">
			<div class="col-md-1">&nbsp;</div>
			<div class="col-md-4" style="text-align: left;">
				<a href="#" class="prev btn"><i class="fa fa-angle-left"></i> Vidéo précedente</a>
			</div>
			<div class="col-md-2" style="text-align: center;">
				<a href="https://www.youtube.com/channel/UCSBq3Ozx_nY6eQ4RJDvxSCA" class="btn" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Youtube"><i class="fa fa-youtube-square"></i></a>
			</div>
			<div class="col-md-4" style="text-align: right;">
				<a href="#" class="next btn">Vidéo suivante <i class="fa fa-angle-right"></i></a>
			</div>
			<div class="col-md-1">&nbsp;</div>
		</div>
	</section>

@endsection
