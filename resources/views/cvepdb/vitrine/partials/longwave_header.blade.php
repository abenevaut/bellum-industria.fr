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
                    <a href="{{ url('/services') }}">{{ trans('cvepdb/vitrine/services.title') }}</a>
                </li>
                <li>
                    <a href="{{ url('/boutique') }}">{{ trans('cvepdb/vitrine/boutique.title') }}</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}">{!! trans('cvepdb/vitrine/contact.title') !!}</a>
                </li>
                <li>
                    @if (Auth::check())
                        <a href="#">{{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}</a>
                        <ul>
                            @if (Auth::check() && Auth::user()->hasRole('admin'))
                                <li>
                                    <a href="{{ url('admin/dashboard') }}">Espace d'administration</a>
                                </li>
                            @elseif (Auth::check() && Auth::user()->hasRole('client'))
                                <li>
                                    <a href="{{ url('clients/dashboard') }}">Espace client</a>
                                </li>
                            @endif
                            <li><a href="{{ url('auth/logout') }}">{!! trans('cvepdb/global.logout') !!}</a></li>
                        </ul>
                    @else
                        <a href="{{ url('auth/login') }}">{!! trans('cvepdb/global.login') !!}</a>
                        <ul>
                            <li><a href="{{ url('auth/login') }}">{!! trans('cvepdb/global.login') !!}</a></li>
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