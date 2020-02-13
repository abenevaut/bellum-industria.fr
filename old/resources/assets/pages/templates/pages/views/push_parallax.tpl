 <div class="view-port clearfix" id="chat">
        <div class="view bg-white">
            <!-- BEGIN View Header !-->
            <div class="navbar navbar-default">
                <div class="navbar-inner">
                    <!-- BEGIN Header Controler !-->
                    <a href="javascript:;" class="inline action p-l-10 link text-master">
                        <i class="pg-plus fs-12 v-align-middle"></i>
                    </a>
                    <!-- END Header Controler !-->
                    <div class="view-heading">
                        Push Parallax
                        <div class="fs-11">Demo</div>
                    </div>
                    <!-- BEGIN Header Controler !-->
                    <a href="#" class="inline action p-r-10 pull-right link text-master">
                        <i class="pg-more fs-12 v-align-middle"></i>
                    </a>
                    <!-- END Header Controler !-->
                </div>
            </div>
            <!-- END View Header !-->
             <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                <div class="list-view-group-container">
                    <div class="list-view-group-header text-uppercase">
                        Transitions</div>
                    <ul>
                        <!-- BEGIN Chat User List Item  !-->
                        <li class="chat-user-list clearfix">
                            <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" data-toggle-view="#subView1" class="" href="#">
                                <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                                    Lavona Erpelding
                                </p>
                            </a>
                        </li>
                        <!-- END Chat User List Item  !-->
                        <!-- BEGIN Chat User List Item  !-->
                        <li class="chat-user-list clearfix">
                            <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" data-toggle-view="#subView1" class="" href="#">
                                <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                                    Eugena Braig
                                </p>
                            </a>
                        </li>
                        <!-- END Chat User List Item  !-->
                        <!-- BEGIN Chat User List Item  !-->
                        <li class="chat-user-list clearfix">
                            <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" data-toggle-view="#subView1" class="" href="#">
                                <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                                   Aaron Shimmin
                                </p>
                            </a>
                        </li>
                        <!-- END Chat User List Item  !-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- BEGIN Conversation View  !-->
        <div class="view chat-view bg-white clearfix">
            <div class="view chat-view bg-white clearfix" id="subView1">
                <div class="view-port clearfix" id="nestedView">
                    <div class="view chat-view bg-white clearfix">
                        <!-- BEGIN Header  !-->
                        <div class="navbar navbar-default">
                            <div class="navbar-inner">
                                <a href="javascript:;" class="link text-master inline action p-l-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                                    <i class="pg-arrow_left fs-12 v-align-middle"></i>
                                </a>
                                <div class="view-heading">
                                    Level 1
                                </div>
                                <a href="#" class="link text-master inline action p-r-10 pull-right ">
                                    <i class="pg-more fs-12 v-align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END Header  !-->
                        <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                            <div class="list-view-group-container">
                                <div class="list-view-group-header text-uppercase">
                                    Nested Navigation</div>
                                <ul>
                                    <!-- BEGIN Chat User List Item  !-->
                                    <li class="chat-user-list clearfix">
                                        <a data-view-animation="push-parrallax" data-view-port="#nestedView" data-navigate="view" class="" href="#">
                                            <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                                                Go Further
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="view chat-view bg-white clearfix">
                        <!-- BEGIN Header  !-->
                        <div class="navbar navbar-default">
                            <div class="navbar-inner">
                                <a href="javascript:;" class="link text-master inline action p-l-10" data-navigate="view" data-view-port="#nestedView" data-view-animation="push-parrallax">
                                    <i class="pg-arrow_left fs-12 v-align-middle"></i>
                                </a>
                                <div class="view-heading">
                                    Level 2
                                </div>
                                <a href="#" class="link text-master inline action p-r-10 pull-right ">
                                    <i class="pg-more fs-12 v-align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END Header  !-->
                        <p class="text-center m-t-20">
                            Unlimted Levels
                        </p>
                    </div>
                </div>
            </div>
          
        </div>
        <!-- END Conversation View  !-->
    </div>