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
            @if (Request::is('clients/projects/*/show'))
                open active
            @endif ">
            <a href="javascript:;">
                <span class="title">Projets</span>
                <span class=" arrow
                    @if (Request::is('clients/projects/*/show'))
                        open active
                    @endif "></span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-terminal"></i></span>
            <ul class="sub-menu">

                @foreach ($sidebar['projects'] as $project)

                    <li class="">
                        <a href="{{ url('clients/projects/' . $project->id . '/show') }}">{{ $project->name }}</a>
                        <span class="icon-thumbnail ">{{ strtoupper(substr($project->name, 0, 2)) }}</span>
                    </li>

                @endforeach

            </ul>
        </li>






    </ul>
    <div class="clearfix"></div>
</div>
<!-- END SIDEBAR MENU -->
