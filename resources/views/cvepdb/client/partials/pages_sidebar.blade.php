<!-- BEGIN SIDEBAR HEADER -->
<div class="sidebar-header">

    <a href="{{ url('clients') }}">
        <img src="/assets/images/cvepdb/logo.png" alt="logo" class="brand" data-src="/assets/images/cvepdb/logo.png" data-src-retina="/assets/images/cvepdb/logo.png" width="50" height="20">
    </a>

    <div class="sidebar-header-controls">

        {{--<button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button">--}}
            {{--<i class="fa fa-angle-down fs-16"></i>--}}
        {{--</button>--}}

        <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button">
            <i class="fa fs-12"></i>
        </button>

    </div>
</div>
<!-- END SIDEBAR HEADER -->
<!-- BEGIN SIDEBAR MENU -->
<div class="sidebar-menu">
    <ul class="menu-items">




        <li class="m-t-30">
            <a href="{{ url('clients') }}" class="">
                <span class="title">Dashboard</span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-dashboard"></i></span>
        </li>





        <li class="m-t-30
        @if (in_array(Request::path(), ['clients/projects']))
                open active
            @endif">
            <a href="{{ url('clients/projects') }}" class="detailed">
                <span class="title">Mes projets</span>
                <span class="details">X projects en cours</span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-terminal"></i></span>
        </li>




        <li class="m-t-30

            @if (
                Request::is('clients/bankaccounts')
                || Request::is('clients/bankaccounts/*')
            )
                open active
            @endif ">
            <a href="javascript:;">
                <span class="title">Settings</span>
                <span class=" arrow

                    @if (
                        Request::is('clients/bankaccounts')
                        || Request::is('clients/bankaccounts/*')
                    )
                        open active
                    @endif "></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-settings"></i></span>
            <ul class="sub-menu">

                {{--<li class="">--}}
                    {{--<a href="{{ url('clients/bankaccounts') }}">Comptes bancaires</a>--}}
                    {{--<span class="icon-thumbnail"><i class="pg-credit_card"></i></span>--}}
                {{--</li>--}}

            </ul>
        </li>





    </ul>
    <div class="clearfix"></div>
</div>
<!-- END SIDEBAR MENU -->
