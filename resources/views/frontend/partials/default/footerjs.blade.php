<!-- Javascript -->
<script src="plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="js/core.min.js"></script>
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
			$.ajax({
				type: "GET",
				url: "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={{ env('BI_YOUTUBE_CHANNEL_ID') }}&maxResults=1&order=date&type=video&key={{ env('BI_GOOGLE_API_KEY_JS') }}",
				cache: false,
				dataType: 'jsonp',
				success: function (data) {
					var last_video = data.items[0];
					var $ytb_background = $('.youtube-background');
					$ytb_background.css('background-image', 'url(https://img.youtube.com/vi/' + last_video.id.videoId + '/maxresdefault.jpg)');
					$ytb_background.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + last_video.id.videoId + '?rel=0&amp;showinfo=0');
					$ytb_background.show();
				}
			});
		});
	})(jQuery);
	@if ('production' == env('APP_ENV'))
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-91882126-1', 'auto');
		ga('send', 'pageview');
	@endif
</script>