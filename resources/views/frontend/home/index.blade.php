@extends('frontend.layouts.default')

@section('css')
	<link href="{{ mix('assets/css/frontend/home/index.css') }}" rel="stylesheet">
@endsection

@section('js')
	<script src="{{ mix('assets/js/frontend/home/index.js') }}"></script>
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

		{{--@include('frontend.partials.default.alerts')--}}

		<div class="container">
			<div class="headline">
				<h1><i class="fa fa-twitter"></i> Tweets</h1>
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
		<div>
			<div class="col-lg-1 col-md-1 hidden-sm hidden-xs">&nbsp;</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="text-align: left;">
				<a href="#" class="prev carousel-btn"><i class="fa fa-angle-left"></i> Vidéo précedente</a>
			</div>
			<div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="text-align: center;">
				<a href="https://www.youtube.com/channel/UCSBq3Ozx_nY6eQ4RJDvxSCA" class="carousel-btn" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Youtube"><i class="fa fa-youtube-square"></i></a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="text-align: right;">
				<a href="#" class="next carousel-btn">Vidéo suivante <i class="fa fa-angle-right"></i></a>
			</div>
			<div class="col-lg-1 col-md-1 hidden-sm hidden-xs">&nbsp;</div>
		</div>
	</section>

@endsection
