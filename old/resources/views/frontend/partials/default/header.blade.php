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
					{{--<li>--}}
						{{--<a href="{{ route('forum.index') }}">Forum</a>--}}
					{{--</li>--}}
					<li>
						<a href="{{ route('frontend.contact.index') }}">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="nav-right">
			@if (Auth::check())
				<div class="nav-profile dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="assets/images/user/avatar.png" alt=""> <span>{{ Auth::user()->full_name }}</span>
					</a>
					<ul class="dropdown-menu">
						@if (Gate::allows(\bellumindustria\Domain\Users\Users\User::ROLE_ADMINISTRATOR, Auth::user()))
							<li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i> Administration</a></li>
							<li class="divider"></li>
						@endif
						{{--<li><a href="#"><i class="fa fa-heart"></i> Likes <span class="label label-info">32</span></a></li>--}}
						{{--<li><a href="#"><i class="fa fa-gamepad"></i> Games</a></li>--}}
						{{--<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>--}}
						{{--<li class="divider"></li>--}}
						<li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Se déconnecter</a></li>
						@impersonating
						<li class="divider"></li>
						<li>
							<a href="{{ route('impersonate.leave') }}">
								<i class="fa fa-user-times"></i> {{ trans('global.stop_impersonation') }}
							</a>
						</li>
						@endImpersonating
					</ul>
				</div>
			@else
				<div class="nav-profile dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="assets/images/user/avatar.png" alt=""> <span>Mon espace</span></a>
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
