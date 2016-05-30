@extends('longwave::layouts.default')

@section('content')
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
			<p>{!! trans('cvepdb/vitrine/index.slogan') !!}</p>
		</div>
		<!-- End Inner -->
	</div>
	<!-- End Gray Wrapper -->
	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			<h4 class="aligncenter">{!! trans('cvepdb/vitrine/index.web_crafter') !!}</h4>
			<hr/>
			<div class="layout__body-wrapper__content-wrapper__inner__widget-services">
				<div class="one-fourth"> <i class="icon-lamp special blue"></i>
					<h5>{!! trans('cvepdb/vitrine/index.services_your_idea') !!}</h5>
					<p>{!! trans('cvepdb/vitrine/index.services_your_idea_desc') !!}</p>
				</div>
				<div class="one-fourth"> <i class="icon-chat-1 special red"></i>
					<h5>{!! trans('cvepdb/vitrine/index.services_talk_define') !!}</h5>
					<p>{!! trans('cvepdb/vitrine/index.services_talk_define_desc') !!}</p>
				</div>
				<div class="one-fourth"> <i class="icon-wrench special orange"></i>
					<h5>{!! trans('cvepdb/vitrine/index.services_work_together') !!}</h5>
					<p>{!! trans('cvepdb/vitrine/index.services_work_together_desc') !!}</p>
				</div>
				<div class="one-fourth last"> <i class="icon-key special purple"></i>
					<h5>{!! trans('cvepdb/vitrine/index.services_gain_control') !!}</h5>
					<p>{!! trans('cvepdb/vitrine/index.services_gain_control_desc') !!}</p>
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
			<div class="layout__body-wrapper__content-wrapper__inner__widget-services">
				<div class="one-fourth">
					<i class="icon-webmobile-hand special green"></i>
					<h5>{!! trans('cvepdb/vitrine/index.pages_more_info') !!}</h5>
				</div>
				<div class="one-fourth">
					<i class="icon-window special"></i>
					<h5><a href="{{  url('/about') }}" class="button">{!! trans('cvepdb/vitrine/index.pages_my_activity') !!}</a></h5>
				</div>
				<div class="one-fourth">
					<i class="icon-doc-text special"></i>
					<h5><a href="{{  url('/services') }}" class="button">{!! trans('cvepdb/vitrine/index.pages_my_services') !!}</a></h5>
				</div>
				<div class="one-fourth last">
					<i class="icon-mail-1 special"></i>
					<h5><a href="{{  url('/contact') }}" class="button">{!! trans('cvepdb/vitrine/index.pages_contact_me') !!}</a></h5>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->

	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			<h3 class="colored">{{ trans('cvepdb/vitrine/portfolio.title') }}</h3>

			<div class="info-box">
				{{ trans('cvepdb/vitrine/portfolio.maintenance') }}
			</div>

			{{--<hr>--}}
			{{----}}
			{{--<h3 class="colored">{{ trans('cvepdb/vitrine/blog.title') }}</h3>--}}

			{{--<div class="info-box">--}}
			{{--{{ trans('cvepdb/vitrine/blog.maintenance') }}--}}
			{{--</div>--}}

		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->

	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">

			<h3 class="colored">{{ trans('cvepdb/vitrine/index.blog_title') }}</h3>

			@if (count($blog_articles) > 0)
				<div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
					<div class="grid">

						@foreach($blog_articles as $item)

							<div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
								<div class="frame alignleft" style="padding:31px 0 31px 0;">
									<a href="{!! $item->get_link() !!}">
										<img src="/assets/images/cvepdb/logo.png" alt="{!! $item->get_title() !!}"
											 width="142" height="80" class="js-call-lazyload"/>

										<div></div>
									</a>
								</div>
								<div class="post-content">
									<h5><a href="{!! $item->get_link() !!}">
											{!! str_limit($item->get_title(), 55, ' ..') !!}
										</a></h5>

									<div class="meta">
										<span class="date">{!! $item->get_date() !!}</span>
									</div>
									{!! str_limit(strip_tags($item->get_description()), 120, ' ..') !!}
								</div>
							</div>

						@endforeach

					</div>
				</div>
			@else
				<div class="info-box">
					{{ trans('cvepdb/vitrine/index.blog_no_article') }}
				</div>
			@endif
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->



	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
{{--			@include('cvepdb.vitrine.partials.longwave_share_inline')--}}
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->
@endsection
