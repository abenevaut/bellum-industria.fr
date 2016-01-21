<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
    <div id="appMenu" class="sidebar-overlay-slide from-top"></div>
    <!-- BEGIN SIDEBAR HEADER -->
    <div class="sidebar-header">


        <img src="/dist/images/cvepdb/logo.png" alt="logo" class="brand" data-src="/dist/images/cvepdb/logo.png" data-src-retina="/dist/images/cvepdb/logo.png" width="50" height="20">


        <div class="sidebar-header-controls">

            {{--<button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button">--}}
                {{--<i class="fa fa-angle-down fs-16"></i>--}}
            {{--</button>--}}

            {{--<button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button">--}}
                {{--<i class="fa fs-12"></i>--}}
            {{--</button>--}}

        </div>
    </div>
    <!-- END SIDEBAR HEADER -->
    <!-- BEGIN SIDEBAR MENU -->
    <div class="sidebar-menu">
        <ul class="menu-items">


            <li class="m-t-30">
                <a href="#" class="detailed">
                    <span class="title">Mes projets</span>
                </a>
                <span class="icon-thumbnail "><i class="pg-mail"></i></span>
            </li>


            <li class="">
                <a href="#">
                    <span class="title">Mes factures</span>
                    <span class="details">X en attente de reglement</span>
                </a>
                <span class="icon-thumbnail "><i class="pg-social"></i></span>
            </li>

            <li class="m-t-30">
                <a href="{{ url('admin/entites') }}" class="detailed">
                    <span class="title">Mes entites</span>
                </a>
                <span class="icon-thumbnail "><i class="pg-mail"></i></span>
            </li>


            <li class="">
                <a href="javascript:;">
                    <span class="title">Settings</span>
                    <span class=" arrow"></span>
                </a>
                <span class="icon-thumbnail"><i class="pg-grid"></i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{ url('admin/users') }}">Users</a>
                        <span class="icon-thumbnail">U</span>
                    </li>
                    <li class="">
                        <a href="{{ url('admin/contacts') }}">Contacts logs</a>
                        <span class="icon-thumbnail">C</span>
                    </li>
                    <li class="">
                        <a href="{{ url('admin/roles') }}">Roles</a>
                        <span class="icon-thumbnail">R</span>
                    </li>
                </ul>
            </li>


        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->