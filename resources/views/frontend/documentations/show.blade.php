@extends('frontend.layouts.default-thedocs')

@section('banner')
	<div class="container text-white">
		<h1><strong>Single page</strong> documentation</h1>
		<h5>You can see an example of a banner in top of this page. Following code is the code for this banner.</h5>
	</div>
@endsection

@section('sidebar')
	<ul class="nav sidenav dropable sticky">
		<li><a href="#html-structure">HTML Structure</a></li>
		<li><a href="#variations">Variations</a></li>

		<li>
			<a href="#title1">Title</a>
			<ul>
				<li><a href="#subtitle1">Subtitle 1</a></li>
				<li>
					<a href="#subtitle2">Subtitle 2</a>
					<ul>
						<li><a href="#subtitle2-1">Sub subtitle 1</a></li>
						<li><a href="#subtitle2-2">Sub subtitle 2</a></li>
					</ul>
				</li>
				<li><a href="#subtitle3">Subtitle 3</a></li>
				<li><a href="#subtitle4">Subtitle 4</a></li>
			</ul>
		</li>
		<li><a href="#title2">Second Title</a></li>
	</ul>
@endsection

@section('content')


			<p class="lead">Maybe you want to have a single page documentation
				and use sidebar navigation for navigating inside the page. So
				this sample layouts are for you. Even maybe you'd like to use
				top navigation bar for navigating between your pages.</p>

			<section>
				<h2 id="html-structure">HTML Structure</h2>
				<p>While this page is enough to see through its code and get
					start with it, but you can see the page code structure in
					below. Make sure you'll have <code>data-spy=&quot;scroll&quot;
						data-target=&quot;.sidebar&quot; data-offset=&quot;200&quot;</code>
					attribute in <code>&lt;body&gt;</code> tag.</p>

				<pre class="line-numbers"><code class="language-markup">
&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
  &lt;head&gt;
    ...
  &lt;/head&gt;

  &lt;body data-spy=&quot;scroll&quot; data-target=&quot;.sidebar&quot; data-offset=&quot;200&quot;&gt;

    &lt;header class=&quot;site-header navbar-transparent&quot;&gt;
      ...
    &lt;/header&gt;


    &lt;main class=&quot;container&quot;&gt;
      &lt;div class=&quot;row&quot;&gt;

        &lt;!-- Sidebar --&gt;
        &lt;aside class=&quot;col-sm-3 sidebar&quot;&gt;

          &lt;ul class=&quot;nav sidenav dropable sticky&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;#sec1&quot;&gt;Section 1&lt;/a&gt;&lt;/li&gt;

            &lt;li&gt;
              &lt;a href=&quot;#sec2&quot;&gt;Section 2&lt;/a&gt;
              &lt;ul&gt;
                &lt;li&gt;&lt;a href=&quot;#sec2-1&quot;&gt;Section 2-1&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href=&quot;#sec2-2&quot;&gt;Section 2-2&lt;/a&gt;&lt;/li&gt;
              &lt;/ul&gt;
            &lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;#sec3&quot;&gt;Section 3&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;

        &lt;/aside&gt;
        &lt;!-- END Sidebar --&gt;


        &lt;!-- Main content --&gt;
        &lt;article class=&quot;col-sm-9 main-content&quot; role=&quot;main&quot;&gt;

          &lt;section&gt;
            &lt;h2 id=&quot;sec1&quot;&gt;Section 1&lt;/h2&gt;
            ...
          &lt;/section&gt;


          &lt;section&gt;
            &lt;h2 id=&quot;sec2&quot;&gt;Section 2&lt;/h2&gt;
            ...
            &lt;h3 id=&quot;sec2-1&quot;&gt;Section 2-1&lt;/h3&gt;
            ...
            &lt;h3 id=&quot;sec2-2&quot;&gt;Section 2-2&lt;/h3&gt;
            ...
          &lt;/section&gt;


          &lt;section&gt;
            &lt;h2 id=&quot;sec3&quot;&gt;Section 3&lt;/h2&gt;
            ...
          &lt;/section&gt;

        &lt;/article&gt;
        &lt;!-- END Main content --&gt;
      &lt;/div&gt;
    &lt;/main&gt;


    &lt;!-- Footer --&gt;
    &lt;footer class=&quot;site-footer&quot;&gt;
      ...
    &lt;/footer&gt;
    &lt;!-- END Footer --&gt;

    &lt;!-- Scripts --&gt;

  &lt;/body&gt;
&lt;/html&gt;

</code></pre>

			</section>


			<section>
				<h2 id="variations">Variations</h2>
				<p>Checkout different variation of sidebars that you have for
					single page documentation.</p>

				<div class="row">
					<div class="col-md-4">
						<div class="promo">
							<img class="bordered" src="assets/img/layout-single1.png" alt="sample1">
							<h3>Default</h3>
							<a class="btn btn-teal" href="layout_single-page-1.html">Demo</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="promo">
							<img class="bordered" src="assets/img/layout-single2.png" alt="sample2">
							<h3>Side line</h3>
							<a class="btn btn-teal" href="layout_single-page-2.html">Demo</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="promo">
							<img class="bordered" src="assets/img/layout-single3.png" alt="sample3">
							<h3>Boxed sidebar</h3>
							<a class="btn btn-teal" href="layout_single-page-3.html">Demo</a>
						</div>
					</div>
				</div>

			</section>


			<section>
				<h2 id="title1">Title</h2>
				<p>Ut vitae sagittis ex. In porttitor ante in nunc ultrices
					malesuada. Praesent iaculis odio vitae volutpat tempus.
					Nullam a sodales lorem, nec pellentesque odio. Praesent
					ullamcorper nisl commodo justo imperdiet dignissim. Duis
					purus magna, congue sit amet varius condimentum, dapibus
					tristique urna. Aliquam congue molestie tempor. Curabitur
					vel arcu vel nibh euismod porttitor. Sed a dolor maximus ex
					tempus pharetra rhoncus et nulla. Integer dolor ex, lobortis
					ac leo non, dapibus cursus ligula. Fusce sed ultrices urna,
					vel tincidunt mi. Nullam neque dolor, tempor nec lorem
					vitae, scelerisque consectetur quam.</p>
				<p>Fusce porttitor diam mauris, in fringilla elit euismod non.
					Aliquam non justo suscipit, pellentesque felis quis, egestas
					ante. Nunc quis imperdiet mauris, vitae cursus ante. Aenean
					vel efficitur ante, ullamcorper tempus massa. Integer ornare
					urna vitae quam semper fermentum. Mauris in dolor tempus,
					ultricies quam ac, lacinia nisl. Donec vitae ante sem.</p>

				<h3 id="subtitle1">Subtitle 1</h3>
				<p>Nulla nec leo sit amet enim vestibulum imperdiet. Interdum et
					malesuada fames ac ante ipsum primis in faucibus. Integer ac
					purus ac nisl scelerisque feugiat. Sed ultricies rhoncus
					congue. Vivamus sagittis, ligula vitae ornare pretium,
					lectus tellus mattis leo, non ultricies urna odio eu justo.
					Suspendisse euismod varius ante sed vehicula. Phasellus
					dignissim hendrerit auctor. Nulla et vulputate ipsum. Aenean
					ultricies sed libero ac finibus. Donec ornare vestibulum
					orci, non porta dui pharetra quis. Maecenas luctus risus
					velit. Ut in aliquam urna. Ut luctus lorem in massa egestas,
					a mollis diam auctor. Maecenas mollis dui eu ipsum dictum
					fringilla. Nunc nisl magna, vestibulum vel purus eu, feugiat
					luctus elit.</p>
				<p>Phasellus dictum magna eget enim suscipit ornare. Sed in
					mollis nibh. Quisque odio tortor, molestie eget ullamcorper
					a, aliquam faucibus nisi. Sed mi risus, semper tincidunt
					ultrices ac, aliquet vel elit. Class aptent taciti sociosqu
					ad litora torquent per conubia nostra, per inceptos
					himenaeos. Sed at mi bibendum, congue risus ac, eleifend ex.
					Sed malesuada eros eget purus varius molestie. Pellentesque
					aliquet sapien nec turpis tincidunt vehicula. Vestibulum
					nisi nulla, vulputate ac nibh quis, feugiat rhoncus nunc.
					Nullam et magna tempus lacus tincidunt laoreet non in ex.
					Donec auctor accumsan iaculis. Duis cursus eleifend
					efficitur. Cras placerat nisi magna, at varius sem bibendum
					sed.</p>

				<h3 id="subtitle2">Subtitle 2</h3>
				<p>Ut vitae sagittis ex. In porttitor ante in nunc ultrices
					malesuada. Praesent iaculis odio vitae volutpat tempus.
					Nullam a sodales lorem, nec pellentesque odio. Praesent
					ullamcorper nisl commodo justo imperdiet dignissim. Duis
					purus magna, congue sit amet varius condimentum, dapibus
					tristique urna. Aliquam congue molestie tempor. Curabitur
					vel arcu vel nibh euismod porttitor. Sed a dolor maximus ex
					tempus pharetra rhoncus et nulla. Integer dolor ex, lobortis
					ac leo non, dapibus cursus ligula. Fusce sed ultrices urna,
					vel tincidunt mi. Nullam neque dolor, tempor nec lorem
					vitae, scelerisque consectetur quam.</p>
				<p id="subtitle2-1">Integer egestas ante id justo mollis feugiat
					ac vel metus. Nunc pulvinar scelerisque faucibus. Aenean at
					libero hendrerit, feugiat felis suscipit, facilisis justo.
					Praesent laoreet rutrum velit vitae facilisis. Fusce ac
					consectetur leo. Praesent dapibus interdum arcu, et
					hendrerit mi imperdiet eget. Morbi volutpat, leo id interdum
					aliquet, massa justo vestibulum nisl, eget posuere velit
					diam ac nibh. Duis tellus enim, porttitor id lectus vitae,
					tristique congue odio. Duis elementum porttitor nibh et
					porta. Suspendisse potenti.</p>
				<p id="subtitle2-2">Ut vitae sagittis ex. In porttitor ante in
					nunc ultrices malesuada. Praesent iaculis odio vitae
					volutpat tempus. Nullam a sodales lorem, nec pellentesque
					odio. Praesent ullamcorper nisl commodo justo imperdiet
					dignissim. Duis purus magna, congue sit amet varius
					condimentum, dapibus tristique urna. Aliquam congue molestie
					tempor. Curabitur vel arcu vel nibh euismod porttitor. Sed a
					dolor maximus ex tempus pharetra rhoncus et nulla. Integer
					dolor ex, lobortis ac leo non, dapibus cursus ligula. Fusce
					sed ultrices urna, vel tincidunt mi. Nullam neque dolor,
					tempor nec lorem vitae, scelerisque consectetur quam.</p>

				<h3 id="subtitle3">Subtitle 3</h3>
				<p>Fusce porttitor diam mauris, in fringilla elit euismod non.
					Aliquam non justo suscipit, pellentesque felis quis, egestas
					ante. Nunc quis imperdiet mauris, vitae cursus ante. Aenean
					vel efficitur ante, ullamcorper tempus massa. Integer ornare
					urna vitae quam semper fermentum. Mauris in dolor tempus,
					ultricies quam ac, lacinia nisl. Donec vitae ante sem.</p>
				<p>Ut vitae sagittis ex. In porttitor ante in nunc ultrices
					malesuada. Praesent iaculis odio vitae volutpat tempus.
					Nullam a sodales lorem, nec pellentesque odio. Praesent
					ullamcorper nisl commodo justo imperdiet dignissim. Duis
					purus magna, congue sit amet varius condimentum, dapibus
					tristique urna. Aliquam congue molestie tempor. Curabitur
					vel arcu vel nibh euismod porttitor. Sed a dolor maximus ex
					tempus pharetra rhoncus et nulla. Integer dolor ex, lobortis
					ac leo non, dapibus cursus ligula. Fusce sed ultrices urna,
					vel tincidunt mi. Nullam neque dolor, tempor nec lorem
					vitae, scelerisque consectetur quam.</p>

				<h3 id="subtitle4">Subtitle 4</h3>
				<p>Phasellus dictum magna eget enim suscipit ornare. Sed in
					mollis nibh. Quisque odio tortor, molestie eget ullamcorper
					a, aliquam faucibus nisi. Sed mi risus, semper tincidunt
					ultrices ac, aliquet vel elit. Class aptent taciti sociosqu
					ad litora torquent per conubia nostra, per inceptos
					himenaeos. Sed at mi bibendum, congue risus ac, eleifend ex.
					Sed malesuada eros eget purus varius molestie. Pellentesque
					aliquet sapien nec turpis tincidunt vehicula. Vestibulum
					nisi nulla, vulputate ac nibh quis, feugiat rhoncus nunc.
					Nullam et magna tempus lacus tincidunt laoreet non in ex.
					Donec auctor accumsan iaculis. Duis cursus eleifend
					efficitur. Cras placerat nisi magna, at varius sem bibendum
					sed.</p>
				<p>Donec lacinia ultrices venenatis. Duis id aliquam velit, a
					vehicula quam. Proin iaculis bibendum ex, hendrerit
					fringilla augue finibus ut. Aliquam sodales turpis vel ex
					cursus scelerisque. In feugiat justo quis viverra suscipit.
					Vivamus hendrerit aliquam purus, sit amet ultrices felis. Ut
					ac nisl pulvinar, tempor odio vel, feugiat ex. Phasellus
					consequat, leo eget lacinia sagittis, eros tellus pretium
					tortor, id congue purus augue eu orci. Fusce non eros
					iaculis, aliquet nulla quis, facilisis mi. Vivamus dictum
					justo non diam ultricies, sit amet eleifend erat efficitur.
					Ut porta diam ut dolor tincidunt, interdum placerat odio
					commodo. Suspendisse egestas sapien erat, et tincidunt magna
					fermentum sit amet. Donec vitae mi efficitur, tempus nisi
					ut, lacinia libero. Maecenas auctor odio mi, ac facilisis
					nisi vehicula efficitur. Ut hendrerit nulla ut nisl
					porttitor maximus. Pellentesque feugiat bibendum est, ut
					aliquam velit consequat eu.</p>
			</section>

			<section>
				<h2 id="title2">Title2</h2>
				<p>Integer egestas ante id justo mollis feugiat ac vel metus.
					Nunc pulvinar scelerisque faucibus. Aenean at libero
					hendrerit, feugiat felis suscipit, facilisis justo. Praesent
					laoreet rutrum velit vitae facilisis. Fusce ac consectetur
					leo. Praesent dapibus interdum arcu, et hendrerit mi
					imperdiet eget. Morbi volutpat, leo id interdum aliquet,
					massa justo vestibulum nisl, eget posuere velit diam ac
					nibh. Duis tellus enim, porttitor id lectus vitae, tristique
					congue odio. Duis elementum porttitor nibh et porta.
					Suspendisse potenti.</p>
				<p>Ut vitae sagittis ex. In porttitor ante in nunc ultrices
					malesuada. Praesent iaculis odio vitae volutpat tempus.
					Nullam a sodales lorem, nec pellentesque odio. Praesent
					ullamcorper nisl commodo justo imperdiet dignissim. Duis
					purus magna, congue sit amet varius condimentum, dapibus
					tristique urna. Aliquam congue molestie tempor. Curabitur
					vel arcu vel nibh euismod porttitor. Sed a dolor maximus ex
					tempus pharetra rhoncus et nulla. Integer dolor ex, lobortis
					ac leo non, dapibus cursus ligula. Fusce sed ultrices urna,
					vel tincidunt mi. Nullam neque dolor, tempor nec lorem
					vitae, scelerisque consectetur quam.</p>
			</section>
@endsection