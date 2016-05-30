@extends('cvepdb.client.layouts.social')

@section('content')

        <!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax" data-social="cover">
    <div class="cover-photo">
        <img alt="Cover photo" src="/assets/images/admin/back2.png"/>
    </div>
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
            <div class="pull-bottom bottom-left m-b-40">
                <h5 class="text-white no-margin">Entreprises</h5>

                <h1 class="text-white no-margin"><span class="semi-bold">{{ $entite->name }}</span></h1>
            </div>
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->


<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
    <div class="feed">
        <!-- START DAY -->
        <div class="day" data-social="day">


            <!-- START ITEM -->
            <div class="card no-border bg-transparent full-width" data-social="item">
                <!-- START CONTAINER FLUID -->
                <div class="container-fluid p-t-30 p-b-30 ">
                    <div class="row">


                        <div class="col-md-4">
                            <div class="container-xs-height">
                                <div class="row-xs-height">
                                    <div class="social-user-profile col-xs-height text-center col-top">
                                        <div class="thumbnail-wrapper d48 circular bordered b-white">
                                            <img alt="Avatar" width="55" height="55"
                                                 data-src-retina="/assets/images/cvepdb/apple-touch-icon-precomposed.png"
                                                 data-src="/assets/images/cvepdb/apple-touch-icon-precomposed.png"
                                                 src="/assets/images/cvepdb/apple-touch-icon-precomposed.png">
                                        </div>
                                        <br>


                                        <i class="fa fa-check-circle text-success fs-16 m-t-10"></i>
                                        {{--<i class="fa fa-warning text-warning fs-16 m-t-10"></i>--}}
                                        {{--<i class="fa fa-bug text-danger fs-16 m-t-10"></i>--}}


                                    </div>
                                    <div class="col-xs-height p-l-20">
                                        <h3 class="no-margin">{{ $entite->name }}</h3>

                                        {{--<p class="no-margin fs-16">--}}
                                        {{--is excited about the new pages design framework--}}
                                        {{--</p>--}}

                                        <p class="hint-text m-t-5 small">
                                            SIRET : {{ $entite->siret }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <p class="no-margin fs-16">
                                {{ $entite->address }}<br/>
                                {{ $entite->zipcode }} {{ $entite->city }} {{ $entite->country }}<br/>
                            </p>

                            <p class="hint-text m-t-5 small">
                                Courriel : <a href="mailto:{{ $entite->email }}">{{ $entite->email }}</a><br/>
                                Téléphone : {{ $entite->phone ? $entite->phone : 'N/A' }}
                            </p>
                        </div>


                        <div class="col-md-4">
                            <p class="m-b-5 small">{{ $entite->users()->count() }}
                                colaborateur{{ $entite->users()->count() > 1 ? 's' : '' }}</p>
                            <ul class="list-unstyled ">

                                @foreach ($entite->users as $user)
                                    <li class="m-r-10">
                                        <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white tip"
                                             data-placement="bottom" title="" data-toggle="tooltip"
                                             data-original-title="{{ $user->full_name }}">
                                            <img width="35" height="35"
                                                 data-src-retina="/assets/images/cvepdb/apple-touch-icon-precomposed.png"
                                                 data-src="/assets/images/cvepdb/apple-touch-icon-precomposed.png"
                                                 alt="Profile Image"
                                                 src="/assets/images/cvepdb/apple-touch-icon-precomposed.png">
                                        </div>
                                    </li>
                                @endforeach

                                @if ($entite->users()->count() > 7)
                                    <li>
                                        <div class="thumbnail-wrapper d32 circular b-white">
                                            <div class="bg-master text-center text-white">
                                                <span>+{{ $entite->users()->count() - 7 }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                            </ul>
                            <br>

                            @if ($entite->users()->count() > 7)
                                <p class="m-t-5 small">Voir tous les utilisateurs attachés à l'entreprise</p>
                            @endif
                        </div>


                    </div>


                </div>
                <!-- END CONTAINER FLUID -->
            </div>
            <!-- END ITEM -->


            <!-- START ITEM -->
            <div class="card no-border bg-transparent full-width" data-social="item">
                @if ($entite->projects->count())
                @foreach ($entite->projects as $project)

                        <!-- START CONTAINER FLUID -->
                <div class="container-fluid p-t-10 p-b-10 ">
                    <div class="row">
                        <div class="col-md-12">


                            <!-- START WIDGET widget_graphTile-->
                            <div class="widget-users panel no-border  no-margin widget-loader-bar">
                                <div class="container-sm-height full-height">
                                    <div class="row-sm-height">
                                        <div class="col-sm-height col-top">
                                            <div class="panel-heading ">
                                                <div class="panel-title text-black hint-text">
                                                  <span class="font-montserrat fs-11 all-caps">
                                                      {{ $project->name }}
                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row-sm-height">
                                        <div class="m-l-50 m-r-50">
                                            <ul>
                                                <li>status : {{ $project->status }}</li>
                                            </ul>
                                        </div>
                                        <div class="m-l-50 m-r-50 m-b-25">
                                            {{ $project->description }}
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- END WIDGET -->


                        </div>
                    </div>
                </div>
                <!-- END CONTAINER FLUID -->
                @endforeach
                @else
                    <div class="">
                        Aucun projet
                    </div>
                @endif


            </div>
            <!-- END ITEM -->


            {{--<!-- START ITEM -->--}}
            {{--<div class="card status col3" data-social="item">--}}
            {{--<div class="circle" data-toggle="tooltip" title="Information" data-container="body">--}}
            {{--</div>--}}


            {{--<h5>#CVEPDB notes & information <span class="hint-text">few seconds ago</span></h5>--}}


            {{--<h2>Aucune note ou information.</h2>--}}


            {{--<ul class="reactions">--}}
            {{--<li><a href="#">5,345 <i class="fa fa-comment-o"></i></a>--}}
            {{--</li>--}}
            {{--<li><a href="#">23K <i class="fa fa-heart-o"></i></a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- END ITEM -->--}}


            {{--<!-- START ITEM -->--}}
            {{--<div class="card share share-other col1" data-social="item">--}}
            {{--<div class="circle" data-toggle="tooltip" title="Label" data-container="body">--}}
            {{--</div>--}}
            {{--<div class="card-content">--}}
            {{--<ul class="buttons ">--}}
            {{--<li>--}}
            {{--<a href="#"><i class="fa fa-expand"></i>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#"><i class="fa fa-heart-o"></i>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--<img alt="Yoda advices" src="/assets/images/admin/yoda.jpg">--}}
            {{--</div>--}}
            {{--<div class="card-description">--}}
            {{--<p><a href="#">Be the force be with you</a> :D</p>--}}
            {{--</div>--}}
            {{--<div class="card-footer clearfix">--}}
            {{--<div class="time">few seconds ago</div>--}}
            {{--<ul class="reactions">--}}
            {{--<li><a href="#">yoda quotes <i class="fa fa-rebel"></i></a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="card-header clearfix">--}}
            {{--<div class="user-pic">--}}
            {{--<img alt="Avatar" width="33" height="33"--}}
            {{--data-src-retina="/assets/images/cvepdb/apple-touch-icon-precomposed.png"--}}
            {{--data-src="/assets/images/cvepdb/apple-touch-icon-precomposed.png"--}}
            {{--src="/assets/images/cvepdb/apple-touch-icon-precomposed.png">--}}
            {{--</div>--}}
            {{--<h5>#CVEPDB</h5>--}}
            {{--<h6>Shared a quotes on your wall</h6>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<!-- END ITEM -->--}}


            {{--<!-- START ITEM -->--}}
            {{--<div class="card share  col1" data-social="item">--}}
            {{--<div class="card-header clearfix">--}}
            {{--<h5 class="text-success pull-left fs-12">--}}
            {{--<i class="fa fa-circle text-success fs-11"></i> Stock Market--}}
            {{--</h5>--}}

            {{--<div class="pull-right small hint-text">--}}
            {{--5,345 <i class="fa fa-comment-o"></i>--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            {{--<div class="card-description">--}}
            {{--<h5 class='hint-text no-margin'>Apple Inc.</h5>--}}
            {{--<h5 class="small hint-text no-margin">NASDAQ: AAPL - Nov 13 8:37 AM ET</h5>--}}

            {{--<h3>111.25 <span class="text-success"><i class="fa fa-sort-up small text-success"></i> 0.15 (0.13%)</span>--}}
            {{--</h3>--}}
            {{--</div>--}}
            {{--<div class="card-footer clearfix">--}}
            {{--<div class="pull-left">by <span class="text-success">John Smith</span>--}}
            {{--</div>--}}
            {{--<div class="pull-right hint-text">--}}
            {{--Apr 23--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<!-- END ITEM -->--}}


        </div>
        <!-- END DAY -->
    </div>
    <!-- END FEED -->
</div>
<!-- END CONTAINER FLUID -->
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/users/validation.js"></script>
@endsection
