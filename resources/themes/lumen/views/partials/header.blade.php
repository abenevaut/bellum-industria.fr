<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="../" class="navbar-brand">Bootswatch</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">

                <li>
                    <a href="../help/">Help</a>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">
                        Users <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="download">

                        @if (Auth::check())

                            @if (Auth::user()->hasRole('admin'))

                                <li><a href="{{ url('admin') }}">Admin dashboard</a></li>
                                <li class="divider"></li>

                            @endif


                            <li><a href="{{ url('logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ url('login') }}">login</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('register') }}">register</a></li>
                        @endif

                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>