@extends('frontend.layouts.homepage-thedocs')

@section('banner')
	<div class="container text-center">
		<h1>Documentations techniques</h1>
		<h5>Retrouvez <strong>les documentations techniques</strong> des services et packages que j'ai crée ou que j'utilise.</h5>
		<br><br><br><br>
		<p><a class="btn btn-white btn-xl btn-outline" href="#getting_started" role="button">Getting started</a></p>
	</div>
	<ul class="social-icons">
		<li><a href="https://twitter.com/bellumindustria" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li><a href="https://www.facebook.com/bellumindustria" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href="https://github.com/42antoine" target="_blank"><i class="fa fa-github"></i></a></li>
		<li><a href="https://www.linkedin.com/in/antoine-benevaut-53a39b36/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	</ul>
@endsection

@section('sidebar')
	<ul class="sidenav dropable sticky">


		<li><a href="#getting_started">Getting started</a></li>


		<li>
			<a href="#">Layouts</a>
			<ul>
				<li><a href="layout_boxed_left-sidebar.html">Boxed - Left sidebar</a></li>
				<li><a href="layout_boxed_right-sidebar.html">Boxed - Right sidebar</a></li>
				<li><a href="layout_boxed_no-sidebar.html">Boxed - No sidebar</a></li>
				<li><a href="layout_full_left-sidebar.html">Fullwidth - Left sidebar</a></li>
				<li><a href="layout_full_right-sidebar.html">Fullwidth - Right sidebar</a></li>
				<li><a href="layout_full_no-sidebar.html">Fullwidth - No sidebar</a></li>
				<li><a href="layout_single-page-1.html">Single page - Sample 1</a></li>
				<li><a href="layout_single-page-2.html">Single page - Sample 2</a></li>
				<li><a href="layout_single-page-3.html">Single page - Sample 3</a></li>
				<li><a href="layout_sidebar_boxed.html">Boxed sidebar</a></li>
				<li><a href="layout_skin.html">Skins</a></li>
			</ul>
		</li>

	</ul>
@endsection

@section('content')

			<header>
				<h1>Documentations techniques</h1>
				<p>Retrouvez <strong>les documentations techniques</strong> des services et packages que j'ai crée ou que j'utilise.</p>

				<ol class="toc">
					<li><a href="#getting_started">Getting started</a></li>
				</ol>
			</header>



			<section>

				<h2 id="getting_started">Getting started</h2>
				<p>It's time to see and read other pages of this documentation to learn how you can use different elements for you own documentation. Don't worry about reading time, you can check each element in a couple of minutes and come back to the documentation page once you want to use them. You can use them by just make a copy and paste.</p>

				<ul class="categorized-view view-col-3">
					<li>
						<h5>Components</h5>
						<a href="component_navbar.html">Navbar</a>
						<a href="component_banner.html">Banner</a>
						<a href="component_banner_sample1.html">Banner - Sample 1</a>
						<a href="component_banner_sample2.html">Banner - Sample 2</a>
						<a href="component_banner_sample3.html">Banner - Sample 3</a>
						<a href="component_sidebar.html">Sidebar - default</a>
						<a href="component_sidebar_line.html">Sidebar - line</a>
						<a href="component_sidebar_icon.html">Sidebar - icon</a>
						<a href="component_footer.html">Footer</a>
					</li>

					<li>
						<h5>Basic Styling</h5>
						<a href="css_typography.html">Typography</a>
						<a href="css_button.html">Buttons</a>
						<a href="css_label.html">Labels</a>
						<a href="css_table.html">Tables</a>
						<a href="css_alert.html">Alerts</a>
						<a href="css_icon.html">Icons</a>
					</li>

					<li>
						<h5>Elements</h5>
						<a href="element_toc.html">Table of contents</a>
						<a href="element_code.html">Code view</a>
						<a href="element_view.html">Views</a>
						<a href="element_promo.html">Promo</a>
						<a href="element_files.html">Included files</a>
						<a href="element_requirement.html">Requirements</a>
						<a href="element_tab.html">Tabs</a>
						<a href="element_step.html">Steps</a>
						<a href="element_media.html">Media</a>
						<a href="element_color.html">Color palette</a>
						<a href="element_jumbotron.html">Jumbotron</a>
						<a href="element_carousel.html">Carousel</a>
						<a href="element_faq.html">FAQ</a>
						<a href="element_mix.html">Mix</a>
					</li>

				</ul>
			</section>


@endsection
