@extends('longwave::layouts.' . Environments::current())

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


		{!! Widget::steam_community_group_announcements() !!}

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
			@include('longwave::partials.multigaming.share_inline')
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->
@endsection
