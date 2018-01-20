<nav class="page-sidebar" data-pages="sidebar">

	{{--<div class="sidebar-overlay-slide from-top" id="appMenu">--}}
		{{--<div class="row">--}}
			{{--<div class="col-xs-6 no-padding">--}}
				{{--<a href="#" class="p-l-40"><img src="/img/demo/social_app.svg" alt="socail">--}}
				{{--</a>--}}
			{{--</div>--}}
			{{--<div class="col-xs-6 no-padding">--}}
				{{--<a href="#" class="p-l-10"><img src="/img/demo/email_app.svg" alt="socail">--}}
				{{--</a>--}}
			{{--</div>--}}
		{{--</div>--}}

		{{--<div class="row">--}}
			{{--<div class="col-xs-6 m-t-20 no-padding">--}}
				{{--<a href="#" class="p-l-40"><img src="/img/demo/calendar_app.svg" alt="socail">--}}
				{{--</a>--}}
			{{--</div>--}}
			{{--<div class="col-xs-6 m-t-20 no-padding">--}}
				{{--<a href="#" class="p-l-10"><img src="/img/demo/add_more.svg" alt="socail">--}}
				{{--</a>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}

	<div class="sidebar-header">
		<img src="/assets/images/logo-pages.png" alt="logo" class="brand" data-src="/assets/images/logo-pages.png" data-src-retina="/assets/images/logo-pages_2x.png" width="50" height="40">
		<div class="sidebar-header-controls">
			<button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
				{{--<i class="fa fa-angle-down fs-16"></i>--}}
			</button>
			<button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i></button>
		</div>
	</div>
	<div class="sidebar-menu">
		<ul class="menu-items">
			<li class="m-t-30 ">
				<a href="{{ route('backend.dashboard.index') }}" class="detailed">
					<span class="title">Dashboard</span>
					<span class="details">0 New Update(s)</span>
				</a>
				<span class="@if (Route::currentRouteNamed('backend.dashboard.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-dashboard"></i></span>
			</li>

			<li class="@if (
			Route::currentRouteNamed('backend.posts.index')
			|| Route::currentRouteNamed('backend.posts.create')
			|| Route::currentRouteNamed('backend.posts.edit')
			|| Route::currentRouteNamed('backend.posts.show')
			|| Route::currentRouteNamed('backend.posts.categories.index')
			|| Route::currentRouteNamed('backend.posts.categories.create')
			|| Route::currentRouteNamed('backend.posts.categories.edit')
			|| Route::currentRouteNamed('backend.posts.categories.show')
			) open active @endif">
				<a href="javascript:void(0);">
					<span class="title">{{ trans('posts.title') }}</span><span class="arrow @if (
			Route::currentRouteNamed('backend.posts.index')
			|| Route::currentRouteNamed('backend.posts.create')
			|| Route::currentRouteNamed('backend.posts.edit')
			|| Route::currentRouteNamed('backend.posts.show')
			|| Route::currentRouteNamed('backend.posts.categories.index')
			|| Route::currentRouteNamed('backend.posts.categories.create')
			|| Route::currentRouteNamed('backend.posts.categories.edit')
			|| Route::currentRouteNamed('backend.posts.categories.show')
			) open active @endif"></span>
				</a>
				<span class="@if (
			Route::currentRouteNamed('backend.posts.index')
			|| Route::currentRouteNamed('backend.posts.create')
			|| Route::currentRouteNamed('backend.posts.edit')
			|| Route::currentRouteNamed('backend.posts.show')
			|| Route::currentRouteNamed('backend.posts.categories.index')
			|| Route::currentRouteNamed('backend.posts.categories.create')
			|| Route::currentRouteNamed('backend.posts.categories.edit')
			|| Route::currentRouteNamed('backend.posts.categories.show')
			) bg-primary @endif icon-thumbnail"><i class="fa fa-newspaper-o"></i></span>
				<ul class="sub-menu">
					<li class="@if (
					Route::currentRouteNamed('backend.posts.index')
					|| Route::currentRouteNamed('backend.posts.create')
					|| Route::currentRouteNamed('backend.posts.edit')
					|| Route::currentRouteNamed('backend.posts.show')
					) active @endif">
						<a href="{{ route('backend.posts.index') }}">{{ trans('posts.title') }}</a>
						<span class="@if (Route::currentRouteNamed('backend.posts.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-newspaper-o"></i></span>
					</li>
					<li class="@if (
					Route::currentRouteNamed('backend.posts.categories.index')
					|| Route::currentRouteNamed('backend.posts.categories.create')
					|| Route::currentRouteNamed('backend.posts.categories.edit')
					|| Route::currentRouteNamed('backend.posts.categories.show')
					) active @endif">
						<a href="{{ route('backend.posts.categories.index') }}">{{ trans('posts_categories.title') }}</a>
						<span class="@if (Route::currentRouteNamed('backend.posts.categories.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-list"></i></span>
					</li>
				</ul>
			</li>

			<li class="@if (
			Route::currentRouteNamed('backend.projects.index')
			|| Route::currentRouteNamed('backend.projects.create')
			|| Route::currentRouteNamed('backend.projects.edit')
			|| Route::currentRouteNamed('backend.projects.show')
			|| Route::currentRouteNamed('backend.folios.index')
			|| Route::currentRouteNamed('backend.folios.create')
			|| Route::currentRouteNamed('backend.folios.edit')
			|| Route::currentRouteNamed('backend.folios.show')
			) open active @endif">
				<a href="javascript:void(0);">
					<span class="title">{{ trans('projects.title') }}</span><span class="arrow @if (
			Route::currentRouteNamed('backend.projects.index')
			|| Route::currentRouteNamed('backend.projects.create')
			|| Route::currentRouteNamed('backend.projects.edit')
			|| Route::currentRouteNamed('backend.projects.show')
			|| Route::currentRouteNamed('backend.folios.index')
			|| Route::currentRouteNamed('backend.folios.create')
			|| Route::currentRouteNamed('backend.folios.edit')
			|| Route::currentRouteNamed('backend.folios.show')
			) open active @endif"></span>
				</a>
				<span class="@if (
			Route::currentRouteNamed('backend.projects.index')
			|| Route::currentRouteNamed('backend.projects.create')
			|| Route::currentRouteNamed('backend.projects.edit')
			|| Route::currentRouteNamed('backend.projects.show')
			|| Route::currentRouteNamed('backend.folios.index')
			|| Route::currentRouteNamed('backend.folios.create')
			|| Route::currentRouteNamed('backend.folios.edit')
			|| Route::currentRouteNamed('backend.folios.show')
			) bg-primary @endif icon-thumbnail"><i class="fa fa-code"></i></span>
				<ul class="sub-menu">
					<li class="@if (
					Route::currentRouteNamed('backend.projects.index')
					|| Route::currentRouteNamed('backend.projects.create')
					|| Route::currentRouteNamed('backend.projects.edit')
					|| Route::currentRouteNamed('backend.projects.show')
					) active @endif">
						<a href="{{ route('backend.projects.index') }}">{{ trans('projects.title') }}</a>
						<span class="@if (Route::currentRouteNamed('backend.projects.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-code"></i></span>
					</li>
					<li class="@if (
					Route::currentRouteNamed('backend.folios.index')
					|| Route::currentRouteNamed('backend.folios.create')
					|| Route::currentRouteNamed('backend.folios.edit')
					|| Route::currentRouteNamed('backend.folios.show')
					) active @endif">
						<a href="{{ route('backend.folios.index') }}">{{ trans('folios.title') }}</a>
						<span class="@if (Route::currentRouteNamed('backend.folios.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-file-code-o"></i></span>
					</li>
				</ul>
			</li>

			{{--<li class="">--}}
				{{--<a href="{{ route('backend.files.index') }}" class="detailed">--}}
					{{--<span class="title">Customers</span>--}}
				{{--</a>--}}
				{{--<span class="@if (Route::currentRouteNamed('backend.files.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-building"></i></span>--}}
			{{--</li>--}}

			<li class="@if (
			Route::currentRouteNamed('backend.users.index')
			|| Route::currentRouteNamed('backend.users.create')
			|| Route::currentRouteNamed('backend.users.edit')
			|| Route::currentRouteNamed('backend.users.show')
			|| Route::currentRouteNamed('backend.leads.index')
			) open active @endif">
				<a href="javascript:void(0);">
					<span class="title">{{ trans('users.title') }}</span><span class="arrow @if (
			Route::currentRouteNamed('backend.users.index')
			|| Route::currentRouteNamed('backend.users.create')
			|| Route::currentRouteNamed('backend.users.edit')
			|| Route::currentRouteNamed('backend.users.show')
			|| Route::currentRouteNamed('backend.leads.index')
			) open active @endif"></span>
				</a>
				<span class="@if (
			Route::currentRouteNamed('backend.users.index')
			|| Route::currentRouteNamed('backend.users.create')
			|| Route::currentRouteNamed('backend.users.edit')
			|| Route::currentRouteNamed('backend.users.show')
			|| Route::currentRouteNamed('backend.leads.index')
			) bg-primary @endif icon-thumbnail"><i class="fa fa-users"></i></span>
				<ul class="sub-menu">
					<li class="@if (Route::currentRouteNamed('backend.leads.index')) active @endif">
						<a href="{{ route('backend.leads.index') }}">{{ trans('leads.title') }}</a>
						<span class="@if (Route::currentRouteNamed('backend.leads.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-user-circle-o"></i></span>
					</li>
					<li class="@if (
					Route::currentRouteNamed('backend.users.index')
					|| Route::currentRouteNamed('backend.users.create')
					|| Route::currentRouteNamed('backend.users.edit')
					|| Route::currentRouteNamed('backend.users.show')
					) active @endif">
						<a href="{{ route('backend.users.index') }}">{{ trans('users.title') }}</a>
						<span class="@if (Route::currentRouteNamed('backend.users.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-users"></i></span>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="{{ route('backend.files.index') }}">
					<span class="title">{{ trans('files.title') }}</span>
				</a>
				<span class="@if (Route::currentRouteNamed('backend.files.index')) bg-primary @endif icon-thumbnail"><i class="fa fa-folder-open"></i></span>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</nav>
