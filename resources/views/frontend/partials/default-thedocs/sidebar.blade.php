<!-- Sidebar -->
<aside class="col-sm-3 sidebar">
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
	@show
</aside>
<!-- END Sidebar -->
