@extends('cvepdb.multigaming.layouts.default')

@section('content')

        <!-- Begin Gray Wrapper -->
<div
        class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
        <p>
            In position, <em>storms my go</em>. <strong>Go! Go! Go!</strong>
        </p>
    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->


<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">


    <!-- Begin Revolution Slider -->
    <div class="slider-wrapper">
        <div class="bannercontainer bannercontainer--fullsize">
            <div class="banner banner--fullsize">
                <ul class="">

                    <li data-transition="fade">
                        <!--<img src="../images/art/slider-black.jpg" alt="" />-->
                        <div class="caption lft" data-x="0" data-y="0" data-speed="900" data-start="500"
                             data-easing="easeOutExpo">

                            <div id="static_video"></div>


                            <script type="text/javascript">
                                function showVideo(response) {
                                    if (response.items) {

                                        var items = response.items;

                                        if (items.length > 0) {

                                            var item = items[0];
                                            var videoid = "http://www.youtube.com/embed/" + item.id.videoId;
                                            //console.log("Latest ID: '" + videoid + "'");
                                            var video =
                                                    "<iframe width='100%' height='200' class='js-call-fitvids video' src='"
                                                    + videoid
                                                    + "' frameborder='0' allowfullscreen></iframe>";
                                            document.getElementById('static_video').innerHTML = video;
                                            //$('#static_video').html(video);
                                        }
                                    }
                                }
                            </script>

                            <script type="text/javascript"
                                    src="https://www.googleapis.com/youtube/v3/search?channelId=UCSBq3Ozx_nY6eQ4RJDvxSCA&part=snippet,id&order=date&maxResults=20&key=AIzaSyBvcEen5Zv3tDTvrTBkF2exD-eI5onw9Hg&callback=showVideo"></script>


                        </div>
                    </li>

                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    </div>
    <!-- End Revolution Slider -->


    <div class="clear"></div>


    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">

        <h2 class="colored">Annonces</h2>


        <div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
            <div class="grid">


                @foreach ($announcements as $item)

                    <div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
                        <div class="frame alignleft">
                            <a href="{!! $item->get_link() !!}" target="_blank">
                                <img src="/assets/images/multigaming/logo.png" alt="{!! $item->get_title() !!}"
                                     width="142" height="142"/>

                                <div></div>
                            </a>
                        </div>
                        <div class="post-content">
                            <h5><a href="{!! $item->get_link() !!}" target="_blank">{!! $item->get_title() !!}</a></h5>

                            <div class="meta">
                                <span class="date">{!! $item->get_date() !!}</span>
                            </div>
                            {!! str_limit(strip_tags($item->get_description()), 120, ' ..') !!}
                        </div>
                    </div>

                @endforeach


            </div>
        </div>
        <div class="clear"></div>

        <h2 class="colored">Steam community</h2>


        <div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
            <div class="grid">


                @foreach ($threads as $thread)

                    <div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
                        <div class="frame alignleft">
                            <a href="{{ $thread['url'] }}" target="_blank">
                                <img src="/assets/images/multigaming/logo.png" alt="Ca va ENCORE parler de bits!"
                                     width="142" height="142"/>

                                <div></div>
                            </a>
                        </div>
                        <div class="post-content">
                            <h5><a href="{{ $thread['url'] }}" target="_blank">{{ $thread['title'] }}</a></h5>

                            <div class="meta">
                                <span class="date">{{-- date($thread['created']) --}}</span>
                            </div>
                            {!! str_limit($thread['intro'], 120, ' ..') !!}
                        </div>
                    </div>

                @endforeach


            </div>
        </div>
        <div class="clear"></div>



    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->

<!-- Begin Evil Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even-evil">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">

        @foreach ($team_bellumindustria as $team)

            <h4 class="colored">{!! $team['name'] !!}</h4>


            <div class="row">
                <div class="layout__body-wrapper__content-wrapper__inner__widget-clients-list">
                    <ul class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list">


                        @foreach ($team['users'] as $teammate)
                            <li class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame"
                                style="opacity: 0.7;">

                                {!! str_limit($teammate['steam_token']['personaname'], 18, ' ..') !!}

                                <a href="{!! $teammate['steam_token']['profileurl'] !!}" target="_blank">
                                    <img src="{!! $teammate['steam_token']['avatarfull'] !!}"
                                         alt="{!! $teammate['steam_token']['personaname'] !!}">
                                </a>

                                <ul style="list-style-type: none;">
                                    {{--<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">--}}
                                        {{--<a href="javascript:void(0);" class="gwi-thumbs"--}}
                                           {{--original-title="En ligne sur Steam ?">--}}
                                            {{--@if ($teammate['steam_token']['profilestate'] == 1)--}}
                                                {{--<i class="icon-light-up"></i>--}}
                                            {{--@else--}}
                                                {{--<i class="icon-moon"></i>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                        <a href="http://steamcommunity.com/profiles/{!! $teammate['steam_token']['steamid'] !!}/"
                                           class="gwi-thumbs"
                                           original-title="Profile Steam" target="_blank">
                                            <i class="icon-user"></i>
                                        </a>
                                    </li>
                                    <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                        <a href="steam://friends/add/{!! $teammate['steam_token']['steamid'] !!}"
                                           class="gwi-thumbs"
                                           original-title="Ajouté comme Steam ami" target="_blank">
                                            <i class="icon-user-add"></i>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>

            <div class="clear"></div>
        @endforeach


    </div>
    <!-- Begin Inner -->
</div>
<!-- End Evil Wrapper -->

<!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">


        <h2 class="colored">Servers</h2>


        <div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
            <div class="grid">

                @foreach ($game_servers as $server)


                    <div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
                        <div class="frame alignleft">
                            <a href="steam://connect/cvepdb.fr:{{$server['info']['GamePort']}}">
                                <img src="/assets/images/multigaming/csgo/maps/{{ $server['info']['Map'] }}.jpg" alt="Ca va ENCORE parler de bits!"
                                     width="142" height="100"/>

                                <div></div>
                            </a>
                        </div>
                        <div class="post-content">
                            <h5><a href="steam://connect/cvepdb.fr:{{$server['info']['GamePort']}}">cvepdb.fr:{{$server['info']['GamePort']}}</a></h5>

                            <div class="meta">
                                <span class="date">{{$server['info']['ModDesc']}}</span>
                            </div>
                            <div>
                                {{ $server['info']['HostName'] }}
                            </div>
                            <div>
                                <strong>{{ $server['info']['Map'] }}</strong> ({{ $server['info']['Players'] }}/{{ $server['info']['MaxPlayers'] }})
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="clear"></div>


    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->

<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">

        <div class="row">


            <div class="one-third ">
                <iframe
                        src="https://discordapp.com/widget?id=146321755433074688&theme=light"
                        width="100%"
                        height="400"
                        allowtransparency="true" frameborder="0">

                </iframe>
            </div>

            <div class="one-third ">
                <h2 class="colored">Teamspeak</h2>
                <iframe allowtransparency="true"
                        src="http://ts.cvepdb.fr/tsviewpub.php?skey=0&sid=1&showicons=right&bgcolor=ffffff&fontcolor=000000"
                        style="height:100%;width:100%"
                        scrolling="auto"
                        frameborder="0">Your Browser will not show Iframes
                </iframe>
            </div>

            <div class="one-third last">
                <div class="layout__body-wrapper__content-wrapper__inner__widget-clients-list">
                    <ul class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list">
                        @foreach ($team_bot as $team)

                            @foreach ($team['users'] as $teammate)
                                <li class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame
                                 layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame--tradebot">

                                    {!! $teammate['steam_token']['personaname'] !!}

                                    <a href="{!! $teammate['steam_token']['profileurl'] !!}" target="_blank">
                                        <img src="{!! $teammate['steam_token']['avatarfull'] !!}"
                                             alt="{!! $teammate['steam_token']['personaname'] !!}">
                                    </a>


                                    <ul style="list-style-type: none;">
                                        {{--<li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">--}}
                                        {{--<a href="javascript:void(0);" class="gwi-thumbs" original-title="En ligne sur Steam ?">--}}
                                        {{--@if ($teammate['steam_token']['personastateflags'] == 1)--}}
                                        {{--<i class="icon-light-up"></i>--}}
                                        {{--@else--}}
                                        {{--<i class="icon-light-up"></i>--}}
                                        {{--@endif--}}
                                        {{--</a>--}}
                                        {{--</li>--}}
                                        <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                            <a href="steam://friends/add/{!! $teammate['steam_token']['steamid'] !!}"
                                               class="gwi-thumbs"
                                               original-title="Ajouté comme Steam ami" target="_blank">
                                                <i class="icon-user-add"></i>
                                            </a>
                                        </li>
                                        <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7; font-size:10px;">
                                            <a href="steam://friends/add/{!! $teammate['steam_token']['steamid'] !!}"
                                               class="gwi-thumbs"
                                               original-title="Profile Steam" target="_blank" style="opacity: 1;">
                                                Add me & send me <span style="font-size:12px;">!help</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                            @endforeach

                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
            </div>

        </div>
        <div class="clear"></div>


    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->

<!-- Begin Evil Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--cocsushido">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">

        <img src="/assets/images/multigaming/coc/Sans_titre-1422709806.png" width="140" height="140" style="float: right" alt="">

        <h2 class="colored">{{ $coc_clan->name() }}</h2>


        <?php //dd($coc_clan); ?>

        <p>
            Niveau : {{ $coc_clan->clanLevel() }} - Point{{ $coc_clan->clanPoints() > 1 ? 's' : '' }} : {{ $coc_clan->clanPoints() }} - Victoire{{ $coc_clan->warWins() > 1 ? 's' : '' }} : {{ $coc_clan->warWins() }}
        </p>
        <p>
            {{ $coc_clan->description() }}
        </p>

        <div class="grid-wrapper">
            <ul class="retina-icons">
                @foreach ($coc_clan->memberList()->all() as $member)

                <li style="margin-bottom: 15px;">
                    <div class="alignleft">
                        <img src="{{ $member->league()->icon()->small() }}" alt="rank">
                    </div>
                    <div class="alignleft" style="padding-left: 8px;">
                        <strong>{{ $member->name() }}</strong> ({{ $member->role() }})<br>
                        Trophies : {{ $member->trophies() }}<br>
                        Don : {{ $member->donations() }} / {{ $member->donationsReceived() }}

                    </div>

                    <div class="clear"></div>
                </li>

                @endforeach

            </ul>
        </div>

    </div>
    <!-- Begin Inner -->
</div>
<!-- End Evil Wrapper -->

<!-- Begin Grey Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">



        @include('cvepdb.multigaming.partials.share_inline')


    </div>
    <!-- Begin Inner -->
</div>
<!-- End Grey Wrapper -->

@stop