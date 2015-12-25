<!-- Begin Header Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--header">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--header">
        <div class="layout__body-wrapper__content-wrapper__inner__logo">
            <a href="{{ url('/') }}">
                <img src="/dist/images/cvepdb/logo.png" alt="Ca va ENCORE parler de bits!" width="200" height="80" />
            </a>
        </div>
        <!-- Begin Menu -->
        <div id="js-layout__body-wrapper__content-wrapper__inner__menu" class="layout__body-wrapper__content-wrapper__inner__menu clearfix js-call-selectnav js-call-ddsmoothmenu js-layout__body-wrapper__content-wrapper__inner__menu">
            <ul id="js-layout__body-wrapper__content-wrapper__inner__menu__list" class="layout__body-wrapper__content-wrapper__inner__menu__list">
                <li>
                    <a href="{{ url('/services') }}">Services</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}">Contact</a>
                </li>
                <li>
                    @if (Auth::check())
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul>
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        </ul>
                    @else
                        <a href="{{ url('auth/login') }}">Login</a>
                        <ul>
                            <li><a href="{{ url('auth/login') }}">Login</a></li>
                            <li><a href="{{ url('auth/register') }}">Registration</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
        <!-- End Menu -->
        <div class="clear"></div>
    </div>
    <!-- End Inner -->
</div>
<!-- End Header Wrapper -->