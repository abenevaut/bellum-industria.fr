<!-- BEGIN SIDEBAR HEADER -->
<div class="sidebar-header">

    <a href="{{ url('admin') }}">
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
            <a href="{{ url('admin') }}" class="">
                <span class="title">Dashboard</span>
            </a>
            <span class="icon-thumbnail "><i class="fa-dashboard"></i></span>
        </li>





        <li class="m-t-30
        @if (in_array(Request::path(), ['admin/projects']))
                open active
            @endif">
            <a href="{{ url('admin/projects') }}" class="detailed">
                <span class="title">Mes projets</span>
                <span class="details">X projects en cours</span>
            </a>
            <span class="icon-thumbnail "><i class="fa-terminal"></i></span>
        </li>





        <li class="m-t-30
            @if (in_array(Request::path(), ['admin/entites', 'admin/bills', 'admin/payments']))
                open active
            @endif">
            <a href="javascript:;">
                <span class="title">Clients</span>
                <span class=" arrow @if (in_array(Request::path(), ['admin/entites', 'admin/bills', 'admin/payments'])) open active @endif"></span>
            </a>
            <span class="icon-thumbnail"><i class="sl-user"></i></span>
            <ul class="sub-menu">

                <li class="">
                    <a href="{{ url('admin/entites') }}" class="detailed">Mes entites</a>
                    <span class="icon-thumbnail">U</span>
                </li>

                <li class="">
                    <a href="{{ url('admin/bills') }}" class="detailed">Mes factures</a>
                    <span class="icon-thumbnail">U</span>
                </li>

                <li class="">
                    <a href="{{ url('admin/payments') }}" class="detailed">Mes paiements</a>
                    <span class="icon-thumbnail">U</span>
                </li>

            </ul>
        </li>






        <li class="m-t-30
            @if (in_array(Request::path(), ['admin/contacts']))
                open active
            @endif">
            <a href="javascript:;">
                <span class="title">Prospections</span>
                <span class=" arrow @if (in_array(Request::path(), ['admin/contacts'])) open active @endif"></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-search"></i></span>
            <ul class="sub-menu">

                <li class="">
                    <a href="{{ url('admin/contacts') }}">Prises de contacts</a>
                    <span class="icon-thumbnail"><i class="pg-mail"></i></span>
                </li>

            </ul>
        </li>










        <li class="m-t-30

            @if (
                Request::is('admin/users') || Request::is('admin/roles') || Request::is('admin/permissions')
                || Request::is('admin/users/*') || Request::is('admin/roles/*') || Request::is('admin/permissions/*')
            )
                open active
            @endif ">
            <a href="javascript:;">
                <span class="title">Utilisateurs</span>
                <span class=" arrow

                    @if (
                        Request::is('admin/users') || Request::is('admin/roles') || Request::is('admin/permissions')
                        || Request::is('admin/users/*') || Request::is('admin/roles/*') || Request::is('admin/permissions/*')
                    )
                        open active
                    @endif "></span>
            </a>
            <span class="icon-thumbnail"><i class="fa-users"></i></span>
            <ul class="sub-menu">

                <li class="">
                    <a href="{{ url('admin/users') }}">Users</a>
                    <span class="icon-thumbnail"><i class="fa-users"></i></span>
                </li>

                <li class="">
                    <a href="{{ url('admin/roles') }}">Roles</a>
                    <span class="icon-thumbnail"><i class="fa-group"></i></span>
                </li>

                <li class="">
                    <a href="{{ url('admin/permissions') }}">Permissions</a>
                    <span class="icon-thumbnail"><i class="fa-key"></i></span>
                </li>

            </ul>
        </li>

        <li class="m-t-30

            @if (
                Request::is('admin/bankaccounts')
                || Request::is('admin/bankaccounts/*')
            )
                open active
            @endif ">
            <a href="javascript:;">
                <span class="title">Settings</span>
                <span class=" arrow

                    @if (
                        Request::is('admin/bankaccounts')
                        || Request::is('admin/bankaccounts/*')
                    )
                        open active
                    @endif "></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-settings"></i></span>
            <ul class="sub-menu">

                <li class="">
                    <a href="{{ url('admin/bankaccounts') }}">Comptes bancaires</a>
                    <span class="icon-thumbnail"><i class="pg-credit_card"></i></span>
                </li>

            </ul>
        </li>





    </ul>
    <div class="clearfix"></div>
</div>
<!-- END SIDEBAR MENU -->
