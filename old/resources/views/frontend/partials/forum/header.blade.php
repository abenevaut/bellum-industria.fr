<header>
	<div class="container">
		<span class="bar hide"></span>
		<a href="{{ route('frontend.home') }}" class="logo"><img src="/assets/images/logo.png" alt=""></a>
		<nav>
			<div class="nav-control">
				<ul>
					<li>
						<a href="{{ route('frontend.home') }}">
							Bellum Industria
						</a>
					</li>
					<li>
						<a href="{{ route('forum.index') }}">Forum</a>
					</li>
					<li>
						<a href="{{ route('frontend.contact.index') }}">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="nav-right">
			@if (Auth::check())
				<div class="nav-profile dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="/assets/images/user/avatar.png" alt=""> <span>Nathan Drake</span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
						<li><a href="#"><i class="fa fa-heart"></i> Likes <span class="label label-info">32</span></a></li>
						<li><a href="#"><i class="fa fa-gamepad"></i> Games</a></li>
						<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="login.html"><i class="fa fa-power-off"></i> Sign Out</a></li>
					</ul>
				</div>
				<div class="nav-dropdown dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i> <span class="label label-danger">3</span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header"><i class="fa fa-bell"></i> You have 5 new games</li>
						<li><a href="#">Alien Isolation</a></li>
						<li><a href="#">Witcher 3 <span class="label label-success">XBOX</span></a></li>
						<li><a href="#">Last of Us</a></li>
						<li><a href="#">Uncharted 4 <span class="label label-primary">PS4</span></a></li>
						<li><a href="#">GTA 5 <span class="label label-warning">PC</span></a></li>
						<li class="dropdown-footer"><a href="#">View all games</a></li>
					</ul>
				</div>
			@else
				<div class="nav-profile dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="/assets/images/user/avatar.png" alt=""> <span>Mon espace</span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Connexion</a></li>
						<li><a href="{{ route('register') }}"><i class="fa fa-pencil-square-o"></i> Créer un compte</a></li>
					</ul>
				</div>
			@endif
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
