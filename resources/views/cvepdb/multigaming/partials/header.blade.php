<!-- Begin Header Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--header">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--header">
        <div class="layout__body-wrapper__content-wrapper__inner__logo">
            <a href="{{ url() }}">
                <img src="/dist/images/multigaming/logo.png" alt="Ca va ENCORE parler de bits!" width="200" height="200" />
            </a>
        </div>
        <!-- Begin Menu -->
        <div id="js-layout__body-wrapper__content-wrapper__inner__menu" class="layout__body-wrapper__content-wrapper__inner__menu clearfix js-call-selectnav js-call-ddsmoothmenu js-layout__body-wrapper__content-wrapper__inner__menu">
            <ul id="js-layout__body-wrapper__content-wrapper__inner__menu__list" class="layout__body-wrapper__content-wrapper__inner__menu__list">
                <li>
                    <a href="{{ url('boutique') }}">Boutique</a>
                </li>
                <li>
                    @if (Auth::check())
                        <a href="#">{{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}</a>
                        <ul>
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        </ul>
                    @else
                        <a href="{{ url('auth/login') }}"><img src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_small.png" alt="Login"></a>
                    @endif
                </li>
                @if (Auth::check() && Auth::user()->hasRole('admin'))
                    <li>
                        <a href="#">Admin</a>
                        <ul>
                            <li><a href="{{ url('teams') }}">Teams</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Menu -->
        <div class="clear"></div>
    </div>
    <!-- End Inner -->
</div>
<!-- End Header Wrapper -->