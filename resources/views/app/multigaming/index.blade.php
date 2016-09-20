@extends('longwave::layouts.default')

@section('head')
	<link rel="stylesheet" href="{{ asset('assets/app/css/index_csgotrades.css') }}">
	<style>
		.layout__body-wrapper__content-wrapper__inner__widget-challenge li a {
			width: 80px;
			display: inline-block;
			text-align: center;
			text-transform: uppercase;
			font-weight: 900;
			font-size: 12px;
			margin-bottom: 4px;
		}
	</style>
@endsection

@section('content')
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
			<h1 class="title alignleft">Si vis <em>pacem</em>, <strong>para bellum</strong></h1>
			<div class="navigation alignright">



				<a href="#" title="My teams"><i class="icon-user-1"></i></a>



			</div>
			<div class="clear"></div>
		</div>
		<!-- End Inner -->
	</div>
	<!-- End Gray Wrapper -->
	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Revolution Slider -->
		<div class="slider-wrapper">
			<div class="bannercontainer bannercontainer--fullsize">
				<div class="banner banner--fullsize">
					<ul class="">
						<li data-transition="fade">
							<!--<img src="../images/art/slider-black.jpg" alt="" />-->
							<div class="caption lft" data-x="0" data-y="0" data-speed="900" data-start="500"
								 data-easing="easeOutExpo">
								<div id="static_video"></div>
								<script type="text/javascript">
									function showVideo(response) {
										if (response.items) {

											var items = response.items;

											if (items.length > 0) {

												var item = items[0];
												var videoid = "http://www.youtube.com/embed/" + item.id.videoId;
												//console.log("Latest ID: '" + videoid + "'");
												var video =
														"<iframe width='100%' height='200' class='js-call-fitvids video' src='"
														+ videoid
														+ "' frameborder='0' allowfullscreen></iframe>";
												document.getElementById('static_video').innerHTML = video;
												//$('#static_video').html(video);
											}
										}
									}
								</script>
								<script type="text/javascript"
										src="https://www.googleapis.com/youtube/v3/search?channelId=UCSBq3Ozx_nY6eQ4RJDvxSCA&part=snippet,id&order=date&maxResults=20&key=AIzaSyBvcEen5Zv3tDTvrTBkF2exD-eI5onw9Hg&callback=showVideo"></script>
							</div>
						</li>
					</ul>
					<div class="tp-bannertimer tp-bottom"></div>
				</div>
			</div>
		</div>
		<!-- End Revolution Slider -->
		<div class="clear"></div>
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner js-call-hoverdir">
			<h2 class="colored">Annonces</h2>
			{!! Widget::steam_community_group_announcements() !!}
			{{-- {!! Widget::vakarm_announcements() !!} --}}
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner js-call-hoverdir">
			<h2 class="colored">Steam community</h2>
			{!! Widget::steam_community_group_threads() !!}
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->
	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner js-call-hoverdir">
			<h2 class="colored">Servers</h2>
				{!! Widget::steam_game_servers() !!}
			<hr>
			<div>
				<h4 class="alignleft">Défiez notre communautée :</h4>
				<ul class="layout__body-wrapper__content-wrapper__inner__widget-challenge alignright">
					<li>
						<a href="{{  url('challenge') }}" style="width: auto;" class="button green">
							challenges
						</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->

	{!! Widget::clashofclan_clan() !!}

	<!-- Begin Grey Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			@include('longwave::partials.share_inline')
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Grey Wrapper -->
@endsection
