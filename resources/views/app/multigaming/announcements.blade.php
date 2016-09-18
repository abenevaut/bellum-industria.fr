@extends('longwave::layouts.default')

@section('content')

	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
			<p>Annonces</p>
		</div>
		<!-- End Inner -->
	</div>
	<!-- End Gray Wrapper -->

	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner js-call-hoverdir">


			<!-- Begin Blog -->
			<div class="layout__body-wrapper__content-wrapper__inner__content">




				@foreach ($announcements as $item)

					<div class="layout__body-wrapper__content-wrapper__inner__content__post">

						<div class="layout__body-wrapper__content-wrapper__inner__content__post__frame alignleft">
							<a href="{!! $item->get_link() !!}" target="_blank" alt="{!! $item->get_title() !!}">
								<img src="/themes/longwave/images/multigaming/logo.png" alt="{!! $item->get_title() !!}"  width="200" height="200">
								<div class="da-animate da-slideFromRight" style="display: block; overflow: hidden;"></div>
							</a>
						</div>

						<div class="layout__body-wrapper__content-wrapper__inner__content__post__post-content">
							<h2><a href="{!! $item->get_link() !!}">{!! $item->get_title() !!}</a></h2>

							<div class="meta">
								<span class="date">{!! $item->get_date() !!}</span>
								{{--<span class="sep">|</span>--}}
								{{--<span class="comments"><a href="#">Calendar</a>, <a href="#">Icon</a></span>--}}
								{{--<span class="sep">|</span> <span class="comments"><a href="#">3 Comments</a></span>--}}
							</div>

							<p>{!! str_limit(strip_tags($item->get_description()), 120, ' ..') !!}</p>

							<a href="{!! $item->get_link() !!}" class="more">Continuer la lecture →</a>
						</div>

						<div class="clear"></div>
					</div>
				@endforeach






			</div>
			<!-- End Blog -->

			<!-- Begin Sidebar -->
			<div class="layout__body-wrapper__content-wrapper__inner__sidebar">
				<div class="layout__body-wrapper__content-wrapper__inner__sidebar__sidebox">


					<h3>Youtube</h3>


					<ul class="post-list">



						<li>
							<div class="frame"> <a href="blog-post.html"><img src="style/images/art/a1.jpg" alt="">
									<div></div>
								</a> </div>
							<div class="meta">
								<h6><a href="blog-post.html">Magna Mollis Ultricies</a></h6>
								<em>3th Oct 2012</em> </div>
						</li>





					</ul>
				</div>
			</div>
			<!-- End Sidebar -->

			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			@include('longwave::partials.share_inline')
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->
@endsection
