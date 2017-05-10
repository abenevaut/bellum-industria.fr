(function ($, D, W) {
	"use strict";

	var _script = {};

	_script = {
		/**
		 * Run script
		 */
		init: function () {
			_script.init_carousel();
			_script.init_youtube();
			_script.init_twitch();
		},
		init_carousel: function () {

			var $container = $('.masonry');

			$($container).imagesLoaded(function () {
				$($container).masonry({
					itemSelector: '.post-grid',
					columnWidth: '.post-grid'
				});
			});
		},
		init_youtube: function () {
			/**
			 * Youtube
			 */

			var carousel = $('.owl-carousel');
			var $ytb_background = $('.youtube-background');
			var $ytb_carousel = $('.youtube-carousel');

			$.ajax({
				type: "GET",
				url: "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=" + bellumindustria.BI_YOUTUBE_CHANNEL_ID + "&maxResults=8&order=date&type=video&key=" + bellumindustria.BI_GOOGLE_API_KEY,
				cache: false,
				dataType: 'jsonp',
				success: function (data) {
					if (data.items.length) {

						var last_video = data.items[0];

						$ytb_background.css('background-image', 'url(https://img.youtube.com/vi/' + last_video.id.videoId + '/maxresdefault.jpg)');
						$ytb_background.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + last_video.id.videoId + '?rel=0&amp;showinfo=0');
						$.each(data.items, function (index, item) {
							carousel.append(
								'<div class="card card-video">' +
								'<div class="card-img">' +
								'<a href="javascript:void(0);" class="youtube-carousel-load-video" data-video_id="' + item.id.videoId + '">' +
								'<img src="https://img.youtube.com/vi/' + item.id.videoId + '/maxresdefault.jpg" alt=""></a>' +
								'<div class="time">' + item.snippet.title + '</div>' +
								'<div class="card-xs-gesture hidden-lg hidden-md hidden-sm"></div>' +
								'</div>' +
								'</div>'
							);
						});
						// start carousel
						carousel.owlCarousel({
							autoPlay: true,
							nav: true,
							items: 6, //4 items above 1000px browser width
							itemsDesktop: [1600, 3], //3 items between 1000px and 0
							itemsTablet: [940, 1], //1 items between 600 and 0
							itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
						});
						$(".next").click(function () {
							carousel.trigger('owl.next');
							return false;
						});
						$(".prev").click(function () {
							carousel.trigger('owl.prev');
							return false;
						});
						$('.youtube-carousel-load-video').click(function () {
							$ytb_background.css('background-image', 'url(https://img.youtube.com/vi/' + $(this).attr('data-video_id') + '/maxresdefault.jpg)');
							$ytb_background.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + $(this).attr('data-video_id') + '?rel=0&amp;showinfo=0');
						});
						$ytb_background.show();
						$ytb_carousel.show();
					}
				},
				error: function () {
					$ytb_background.hide();
					$ytb_carousel.hide();
				}
			});
		},
		/**
		 *
		 */
		init_twitch: function () {
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
		}
	};

	$(D).ready(function () {
		_script.init();
	});
})(jQuery, document, window);
