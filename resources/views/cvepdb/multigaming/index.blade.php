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


            <div class="row">

                <div class="one-third">
                    <div class="layout__body-wrapper__content-wrapper__inner__widget-clients-list">
                        <ul class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list">
                            @foreach ($team_bot as $team)

                                @foreach ($team->users as $teammate)
                                    <li class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame"
                                        style="opacity: 0.7;">

                                        {!! $teammate->first_name !!} {!! $teammate->last_name !!}

                                        <a href="#"><img
                                                    src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/92/92ae6811171704d99e1e53562a7fa4dd66fbe96a_full.jpg"
                                                    alt=""></a>


                                        <ul style="list-style-type: none;">
                                            <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                                <a href="#" class="gwi-thumbs" original-title="En ligne sur Steam">
                                                    <i class="icon-light-up"></i>
                                                </a>
                                            </li>
                                            <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                                <a href="http://steamcommunity.com/profiles/{!! $teammate->steam_token !!}/" class="gwi-thumbs"
                                                   original-title="Profile Steam" target="_blank">
                                                    <i class="icon-user"></i>
                                                </a>
                                            </li>
                                            <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                                <a href="steam://friends/add/{!! $teammate->steam_token !!}" class="gwi-thumbs"
                                                   original-title="Ajouté comme Steam ami" target="_blank">
                                                    <i class="icon-user-add"></i>
                                                </a>
                                            </li>
                                        </ul>

                                    </li>
                                @endforeach

                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="one-third">

                    <h2 class="colored">Game server</h2>


                </div>

                <div class="one-third last">
                    <h2 class="colored">Teamspeak</h2>
                    <iframe allowtransparency="true"
                            src="http://ts.cvepdb.fr/tsviewpub.php?skey=0&sid=1&showicons=right&bgcolor=ffffff&fontcolor=000000"
                            style="height:100%;width:100%"
                            scrolling="auto"
                            frameborder="0">Your Browser will not show Iframes</iframe>
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

            <h4 class="colored">Bellum Industria</h4>


            <div class="row">
                <div class="layout__body-wrapper__content-wrapper__inner__widget-clients-list">
                    <ul class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list">






                        @foreach ($team->users as $teammate)
                        <li class="layout__body-wrapper__content-wrapper__inner__widget-clients-list__list__frame"
                            style="opacity: 0.7;">

                            {!! $teammate->first_name !!} {!! $teammate->last_name !!}

                            <a href="#"><img
                                        src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/92/92ae6811171704d99e1e53562a7fa4dd66fbe96a_full.jpg"
                                        alt=""></a>


                            <ul style="list-style-type: none;">
                                <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                    <a href="#" class="gwi-thumbs" original-title="En ligne sur Steam">
                                        <i class="icon-light-up"></i>
                                    </a>
                                </li>
                                <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                    <a href="http://steamcommunity.com/profiles/{!! $teammate->steam_token !!}/" class="gwi-thumbs"
                                       original-title="Profile Steam" target="_blank">
                                        <i class="icon-user"></i>
                                    </a>
                                </li>
                                <li style="margin: 10px; list-style: none; display: inline-block !important; opacity: 0.7;">
                                    <a href="steam://friends/add/{!! $teammate->steam_token !!}" class="gwi-thumbs"
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
    <!-- End White Wrapper -->

    <!-- Begin White Wrapper -->
    <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
        <!-- Begin Inner -->
        <div class="layout__body-wrapper__content-wrapper__inner">


            <h2 class="colored">From journal</h2>


            <div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
                <div class="grid">


                    @foreach ($threads as $thread)

                        <div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
                            <div class="frame alignleft">
                                <a href="{{ $thread['url'] }}" target="_blank">
                                    <img src="/dist/images/multigaming/logo.png" alt="Ca va ENCORE parler de bits!" width="142" height="100" />
                                    <div></div>
                                </a>
                            </div>
                            <div class="post-content">
                                <h5><a href="{{ $thread['url'] }}" target="_blank">{{ $thread['title'] }}</a></h5>

                                <div class="meta">
                                    <span class="date">{{-- date($thread['created']) --}}</span>
                                </div>
                                {!! $thread['intro'] !!}
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
            <div class="clear"></div>

            <hr>


            <h4 class="alignleft">Share this page :</h4>

            <ul class="layout__body-wrapper__content-wrapper__inner__widget-share js-layout__body-wrapper__content-wrapper__inner__widget-share alignright">

                <li><a href="https://www.facebook.com/sharer.php?u=http://site.cvepdb.local/home/services"
                       target="_blank" class="like" style="opacity: 1;"><i class="icon-s-facebook"></i>&nbsp;Like</a>
                </li>
                <li><a href="https://twitter.com/share?url=http://site.cvepdb.local/home/services" target="_blank"
                       class="tweet" style="opacity: 1;"><i class="icon-s-twitter"></i>&nbsp;Tweet</a></li>
                <li><a href="https://plus.google.com/share?url=http://site.cvepdb.local/home/services" target="_blank"
                       class="google" style="opacity: 1;"><i class="icon-gplus"></i>&nbsp;+1</a></li>
                <li><a href="http://pinterest.com/pin/create/link/?url=http://site.cvepdb.local/home/services"
                       target="_blank" class="pinterest" style="opacity: 1;"><i class="icon-s-pinterest"></i>&nbsp;Pin
                        It</a></li>
            </ul>
            <div class="clear"></div>


        </div>
        <!-- Begin Inner -->
    </div>
    <!-- End White Wrapper -->

@stop