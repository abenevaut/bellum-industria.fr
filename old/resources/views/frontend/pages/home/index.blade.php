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
		@media (max-width: 1000px) {
			.grid .post .frame {
				display: none;
			}
			.grid .post .post-content {
				margin-left: 0px;
			}
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{ mix('assets/css/frontend/home/index.css') }}" media="all"/>
@endsection

@section('js')
	<script type="text/javascript" src="{{ mix('assets/js/frontend/home/index.js') }}"></script>
@endsection

@section('content')
	<div class="dark-wrapper intro">
		<div class="inner">
			<p>{!! trans('frontend/home.slogan') !!}</p>
		</div>
	</div>
	<div class="light-wrapper">
		<div class="inner">
			<h1 class="aligncenter">{!! trans('frontend/home.web_crafter') !!}</h1>
			<hr/>
			<div class="services">
				<div class="one-fourth"><i class="icon-lamp special green"></i>
					<h5>{!! trans('frontend/home.services_your_idea') !!}</h5>
					<p>{!! trans('frontend/home.services_your_idea_desc') !!}</p>
				</div>
				<div class="one-fourth"><i class="icon-chat-1 special blue"></i>
					<h5>{!! trans('frontend/home.services_talk_define') !!}</h5>
					<p>{!! trans('frontend/home.services_talk_define_desc') !!}</p>
				</div>
				<div class="one-fourth">
					<i class="icon-wrench special purple"></i>
					<h5>{!! trans('frontend/home.services_work_together') !!}</h5>
					<p>{!! trans('frontend/home.services_work_together_desc') !!}</p>
				</div>
				<div class="one-fourth last">
					<i class="icon-key special red"></i>
					<h5>{!! trans('frontend/home.services_gain_control') !!}</h5>
					<p>{!! trans('frontend/home.services_gain_control_desc') !!}</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	{{--<div class="dark-wrapper">--}}
		{{--<div class="inner">--}}
			{{--<div id="portfolio">--}}


				{{--<h2 class="colored alignleft">Portfolio</h2>--}}


				{{--<ul class="filter alignright">--}}
					{{--<li><a class="active" href="javascript:void(0)" data-filter="*">All</a></li>--}}
					{{--<li><a href="javascript:void(0)" data-filter=".graphic">Graphic</a></li>--}}
					{{--<li><a href="javascript:void(0)" data-filter=".artwork">Artwork</a></li>--}}
					{{--<li><a href="javascript:void(0)" data-filter=".music">Music</a></li>--}}
					{{--<li><a href="javascript:void(0)" data-filter=".video">Video</a></li>--}}
				{{--</ul>--}}

				{{--<ul class="items col4 isotope" style="position: relative; overflow: hidden; height: 612px;">--}}
					{{--<li class="item graphic isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 0px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post1.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw" class=""><img src="/assets/themes/longwave/images/art/p1.jpg" alt="">--}}
							{{--<div class="da-animate da-slideFromBottom" style="display: block; overflow: hidden;">--}}
								{{--<h5>Receipt Paper<span>Free PSD, Design</span>--}}
								{{--</h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item artwork isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(261px, 0px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post2.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p2.jpg" alt="">--}}
							{{--<div class="da-animate da-slideFromBottom" style="display: block; overflow: hidden;">--}}
								{{--<h5>Polaroid <span>Icon, Camera</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item artwork isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(522px, 0px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post3.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p3.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Bag Icon <span>Icon, Shopping</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item graphic isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(783px, 0px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post4.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p4.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Cleaver <span>Free PSD, Illustration</span>--}}
								{{--</h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item music isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 204px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post5.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p5.jpg" alt="">--}}
							{{--<div class="da-animate da-slideFromLeft" style="display: block; overflow: hidden;">--}}
								{{--<h5>Birthday Reminder--}}
									{{--<span>IOS Icon, Birthday</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item video isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(261px, 204px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post6.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p6.jpg" alt="">--}}
							{{--<div class="da-animate da-slideFromBottom" style="display: block; overflow: hidden;">--}}
								{{--<h5>Cookies <span>Icon, Christmas</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item artwork isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(522px, 204px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post1.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p7.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Skateboard <span>Sk8, Playoff</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item graphic isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(783px, 204px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post2.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p8.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Cartoon Boat--}}
									{{--<span>Vector, Illustration</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item graphic isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 408px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post4.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p9.jpg" alt="">--}}
							{{--<div class="da-animate da-slideFromTop" style="display: block; overflow: hidden;">--}}
								{{--<h5>Web Icons <span>Calendar, Contact</span>--}}
								{{--</h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item video isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(261px, 408px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post6.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p10.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Seafood <span>Logo, Corporate</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item artwork isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(522px, 408px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post3.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p11.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Lump Sugar--}}
									{{--<span>Illustration, Character</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li class="item music isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(783px, 408px);">--}}
						{{--<a href="#" data-contenturl="portfolio-post5.html" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="/assets/themes/longwave/images/art/p12.jpg" alt="">--}}
							{{--<div>--}}
								{{--<h5>Radio Rabbit <span>Icon, Leather</span></h5>--}}
							{{--</div>--}}
						{{--</a>--}}
					{{--</li>--}}
				{{--</ul>--}}


				{{--<ul class="filter aligncenter" style="margin:40px 0px 0px 0px;">--}}
					{{--<li><a class="js-folios-infinite" href="javascript:void(0)">More results</a></li>--}}
				{{--</ul>--}}


			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
	<div class="light-wrapper">
		<div class="inner">
			<h2 class="colored">{!! trans('frontend/home.tweets_title') !!}</h2>
			<div class="grid-wrapper">
				<div class="grid">
					@foreach ($tweets as $tweet)
						<div class="post">
							<div class="frame alignleft">
								<a href="https://twitter.com/{{ $tweet->user->screen_name }}" target="_blank" rel="noopener">
									@if (!is_null($tweet->open_graph) && isset($tweet->open_graph->image))
										<img src="{{ $tweet->open_graph->image }}" alt="{{ $tweet->open_graph->title ?: '' }}" width="114" height="114"/>
									@else
										<img src="/apple-touch-icon-114x114-precomposed.png" alt="{{ config('app.name') }}" width="114" height="114"/>
									@endif
									<div></div>
								</a>
							</div>
							<div class="post-content">
								<h5>
									<a href="https://twitter.com/{{ $tweet->user->screen_name }}" target="_blank" rel="noopener">{!! '@' . $tweet->user->screen_name !!}</a>
								</h5>
								<div class="meta">
									<span class="date">{{ $tweet->created_at }}</span>
									{{--<span class="sep">|</span> <span class="comments"><a href="#">3 Comments</a></span>--}}
								</div>
								{!! $tweet->text !!}
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="dark-wrapper">
		<div class="inner">
			@include('frontend.partials.longwave.share_inline')
		</div>
	</div>
@endsection
