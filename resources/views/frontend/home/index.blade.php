@extends('frontend.layouts.default')

@section('content')

	<section class="border-bottom-1 border-grey-300 padding-10">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="{{ route('frontend.home') }}">Home</a></li>
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

@endsection
