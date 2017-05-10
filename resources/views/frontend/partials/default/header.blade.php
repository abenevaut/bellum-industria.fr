<header>
	<div class="container">
		<span class="bar hide"></span>
		<a href="{{ route('frontend.home') }}" class="logo"><img src="/img/logo.png" alt=""></a>
		<nav>
			<div class="nav-control">
				<ul>
					<li>
						<a href="{{ route('frontend.home') }}">
							Bellum Industria
						</a>
					</li>
					<li>
						<a href="{{ route('frontend.contacts.index') }}">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="nav-right">
			<div class="nav-profile dropdown"></div>
			<div class="nav-dropdown dropdown"></div>
			{{--<a href="#" data-toggle="modal-search"><i class="fa fa-search"></i></a>--}}
		</div>
	</div>
</header>

{{--<div class="modal-search">--}}
	{{--<div class="container">--}}
		{{--<input type="text" class="form-control" placeholder="Type to search...">--}}
		{{--<i class="fa fa-times close"></i>--}}
	{{--</div>--}}
{{--</div>--}}
