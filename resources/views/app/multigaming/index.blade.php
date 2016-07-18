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
			<p>
				Si vis <em>pacem</em>, <strong>para bellum</strong>
			</p>
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
		<div class="layout__body-wrapper__content-wrapper__inner">

			<div class="row">

				{{--<div class="one-third ">--}}
				{{--<h2 class="colored">Teamspeak</h2>--}}
				{{--<iframe allowtransparency="true"--}}
				{{--src="http://ts.cvepdb.fr/tsviewpub.php?skey=0&sid=1&showicons=right&bgcolor=ffffff&fontcolor=000000"--}}
				{{--style="height:100%;width:100%"--}}
				{{--scrolling="auto"--}}
				{{--frameborder="0">Your Browser will not show Iframes--}}
				{{--</iframe>--}}
				{{--</div>--}}

				<div class="one-third">
					<div class="layout__body-wrapper__content-wrapper__inner__widget-clients-list">
						<ul class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list">

							@foreach ($team_bot->users as $teammate)
								<li class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame
                                 layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame--tradebot">

									{!! $teammate->steam_summaries['personaname'] !!}

									<a href="{!! $teammate->steam_summaries['profileurl'] !!}" target="_blank">
										<img src="{!! $teammate->steam_summaries['avatarfull'] !!}"
											 alt="{!! $teammate->steam_summaries['personaname'] !!}">
									</a>


									<ul style="list-style-type: none;">
										<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
											<a href="javascript:void(0);" class="gwi-thumbs" original-title="En ligne sur Steam ?">
												@if ($teammate->steam_summaries['personastateflags'] == 1)
													<i class="icon-light-up"></i>
												@else
													<i class="icon-light-up"></i>
												@endif
											</a>
										</li>
										<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
											<a href="steam://friends/add/{!! $teammate->steam_summaries['steamid'] !!}"
											   class="gwi-thumbs"
											   original-title="Ajouté comme Steam ami" target="_blank">
												<i class="icon-user-add"></i>
											</a>
										</li>

									</ul>

								</li>
							@endforeach

						</ul>
					</div>
					<div class="clear"></div>
				</div>

				<div class="two-third last">

					<h3>Latest trade <a href="http://steamcommunity.com/profiles/{!! $trades[0]->trader['steamid'] !!}" target="_blank">with {{ $trades[0]->trader['personaname'] }}</a></h3>

					<div id="DIV_1">
						<form id="FORM_2">
							@if (!count($trades[0]->json->itemsToReceive))
								<div class="info-box">
									This is a gift for <a href="http://steamcommunity.com/profiles/{!! $trades[0]->trader['steamid'] !!}" target="_blank">{{ $trades[0]->trader['personaname'] }}</a>
								</div>
							@else
								@foreach (array_slice($trades[0]->json->itemsToReceive, 0, 9) as $item)
									<div id="DIV_128">
										<div id="DIV_132">
											<img src="https://steamcommunity-a.akamaihd.net/economy/image/{{ $item->icon_url }}/99fx66f" alt="{{ $item->market_name }}" id="IMG_133" />
											<div id="DIV_134"></div>
										</div>
									</div>
									<div id="DIV_128">
										<div id="DIV_132">
											<img src="https://steamcommunity-a.akamaihd.net/economy/image/{{ $item->icon_url }}/99fx66f" alt="{{ $item->market_name }}" id="IMG_133" />
											<div id="DIV_134"></div>
										</div>
									</div>
								@endforeach
							@endif
						</form>
						<form id="FORM_127">
							@if (!count($trades[0]->json->itemsToGive))
								<div class="info-box">
									This is a gift for our trade bot
								</div>
							@else
								@foreach (array_slice($trades[0]->json->itemsToGive, 0, 9) as $item)
									<div id="DIV_128">
										<div id="DIV_129">
											<b id="B_130">{{ $item->name }}</b><br id="BR_131" />
										</div>
										<div id="DIV_132">
											<img src="https://steamcommunity-a.akamaihd.net/economy/image/{{ $item->icon_url }}/99fx66f" alt="{{ $item->market_name }}" id="IMG_133" />
											<div id="DIV_134"></div>
										</div>
									</div>
								@endforeach
							@endif
						</form>
					</div>



				</div>

			</div>
			<div class="clear"></div>


			<div class="toggle">
				<h4 class="title">How to trade with the bot ?</h4>
				<div class="togglebox">
					<div>
						<p>Trade with the bot is very simple, visit his profile and make a trade offer!</p>
					</div>
				</div>
			</div>

			<div class="clear"></div>

		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->

	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">



			<h2 class="colored">Annonces</h2>


			<div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
				<div class="grid">


					@foreach ($announcements as $item)

						<div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
							<div class="frame alignleft">
								<a href="{!! $item->get_link() !!}" target="_blank">
									<img src="/themes/longwave/images/multigaming/logo.png" alt="{!! $item->get_title() !!}"
										 width="142" height="142"/>

									<div></div>
								</a>
							</div>
							<div class="post-content">
								<h5>
									<a href="{!! $item->get_link() !!}" target="_blank">{!! $item->get_title() !!}</a>
								</h5>

								<div class="meta">
									<span class="date">{!! $item->get_date() !!}</span>
								</div>
								{!! str_limit(strip_tags($item->get_description()), 120, ' ..') !!}
							</div>
						</div>

					@endforeach


				</div>
			</div>
			<div class="clear"></div>

			<h2 class="colored">Steam community</h2>


			<div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
				<div class="grid">


					@foreach ($threads as $thread)

						<div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
							<div class="frame alignleft">
								<a href="{{ $thread['url'] }}" target="_blank">
									<img src="/themes/longwave/images/multigaming/logo.png" alt="Ca va ENCORE parler de bits!"
										 width="142" height="142"/>

									<div></div>
								</a>
							</div>
							<div class="post-content">
								<h5>
									<a href="{{ $thread['url'] }}" target="_blank">{{ $thread['title'] }}</a>
								</h5>

								<div class="meta">
									<span class="date">{{-- date($thread['created']) --}}</span>
								</div>
								{!! str_limit($thread['intro'], 120, ' ..') !!}
							</div>
						</div>

					@endforeach


				</div>
			</div>
			<div class="clear"></div>


		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->

	<!-- Begin Evil Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even-evil">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">


				<h4 class="colored">{!! $team_bellumindustria->name !!}</h4>


				<div class="row">
					<div class="layout__body-wrapper__content-wrapper__inner__widget-clients-list">
						<ul class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list">


							@foreach ($team_bellumindustria->users as $teammate)
								<li class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame"
									style="opacity: 0.7;">

									{!! str_limit($teammate->steam_summaries['personaname'], 18, ' ..') !!}

									<a href="{!! $teammate->steam_summaries['profileurl'] !!}" target="_blank">
										<img src="{!! $teammate->steam_summaries['avatarfull'] !!}"
											 alt="{!! $teammate->steam_summaries['personaname'] !!}">
									</a>

									<ul style="list-style-type: none;">
										<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
										<a href="javascript:void(0);" class="gwi-thumbs"
										original-title="En ligne sur Steam ?">
										@if ($teammate->steam_summaries['profilestate'] == 1)
										<i class="icon-light-up"></i>
										@else
										<i class="icon-moon"></i>
										@endif
										</a>
										</li>
										<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
											<a href="http://steamcommunity.com/profiles/{!! $teammate->steam_summaries['steamid'] !!}/"
											   class="gwi-thumbs"
											   original-title="Profile Steam" target="_blank">
												<i class="icon-user"></i>
											</a>
										</li>
										<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
											<a href="steam://friends/add/{!! $teammate->steam_summaries['steamid'] !!}"
											   class="gwi-thumbs"
											   original-title="Ajouté comme Steam ami" target="_blank">
												<i class="icon-user-add"></i>
											</a>
										</li>
									</ul>

								</li>
							@endforeach


						</ul>
					</div>
				</div>

				<div class="clear"></div>


		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Evil Wrapper -->

	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">


			<h2 class="colored">Servers</h2>


			<div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
				<div class="grid">

					@foreach ($game_servers as $server)


						<div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
							<div class="frame alignleft">
								<a href="steam://connect/cvepdb.fr:{{$server['info']['GamePort']}}">
									<img src="/modules/steam/images/csgo/maps/{{ $server['info']['Map'] }}.jpg" alt="Ca va ENCORE parler de bits!"
										 width="142" height="100"/>

									<div></div>
								</a>
							</div>
							<div class="post-content">
								<h5>
									<a href="steam://connect/cvepdb.fr:{{$server['info']['GamePort']}}">cvepdb.fr:{{$server['info']['GamePort']}}</a>
								</h5>

								<div class="meta">
									<span class="date">{{$server['info']['ModDesc']}}</span>
								</div>
								<div>
									{{ $server['info']['HostName'] }}
								</div>
								<div>
									<strong>{{ $server['info']['Map'] }}</strong>
									({{ $server['info']['Players'] }}
									/{{ $server['info']['MaxPlayers'] }})
								</div>
							</div>
						</div>

					@endforeach

				</div>
			</div>
			<div class="clear"></div>

			<hr>

			<div>
				<h4 class="alignleft">Défiez notre communautée :</h4>

				<ul class="layout__body-wrapper__content-wrapper__inner__widget-challenge alignright">

					<li>
						<a href="{{  url('challenge') }}"  style="width: auto;" class="button green">
							challenges
						</a>
					</li>

				</ul>
				<div class="clear"></div>
			</div>

		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->

	<!-- Begin Evil Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--cocsushido">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">

			@if (!empty($coc_clan))
				<img src="/modules/clashofclan/images/Sans_titre-1422709806.png" width="140" height="140" style="float: right">

				<h2 class="colored">{{ $coc_clan->name() }}</h2>



				<p>
					Niveau : {{ $coc_clan->clanLevel() }} -
					Point{{ $coc_clan->clanPoints() > 1 ? 's' : '' }}
					: {{ $coc_clan->clanPoints() }} -
					Victoire{{ $coc_clan->warWins() > 1 ? 's' : '' }}
					: {{ $coc_clan->warWins() }}
				</p>
				<p>
					{{ $coc_clan->description() }}
				</p>

				<div class="grid-wrapper">
					<ul class="retina-icons">
						@foreach ($coc_clan->memberList()->all() as $member)

							<li style="margin-bottom: 15px;">
								<div class="alignleft">
									<img src="{{ $member->league()->icon()->small() }}" alt="rank">
								</div>
								<div class="alignleft" style="padding-left: 8px;">
									<strong>{{ $member->name() }}</strong>
									({{ $member->role() }})<br>
									Trophies : {{ $member->trophies() }}<br>
									Don : {{ $member->donations() ? $member->donations() : '0' }}
									/ {{ $member->donationsReceived() ? $member->donationsReceived() : '0' }}

								</div>

								<div class="clear"></div>
							</li>

						@endforeach

					</ul>
				</div>
			@else
				<div>
					Impossible de récuperer les informations depuis l'API Clash
					of clan.
				</div>
			@endif

		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Evil Wrapper -->

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
