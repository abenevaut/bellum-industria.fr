<!-- START JUMBOTRON -->
          <div class="jumbotron lg vertical center bg-warning column-w4 vertical-bottom no-margin" data-pages="parallax" {% if mode =='horizontal_menu' %} data-scroll-element=".page-container" {% endif %}>
            <div class="market-hero">
              <div class="container-fluid container container-fixed-lg sm-p-l-0 sm-p-r-0 full-height">
                <div class="inner full-height">
                  <div class="container-xs-height full-height">
                    <div class="col-xs-height col-middle  ">
                      <p class="font-montserrat bold hint-text">PAGES WIDGET MARKET</p>
                      <div class="m-b-50">
                        <h2 class="text-black inline">Experience free widget<br>Every week</h2>
                        <h5 class="hint-text">Exclusive with only with Pages UI framework </h5>
                      </div>
                      <div class="input-group p-b-10 p-l-0 transparent col-md-5 b-b b-transparent ">
                        <input type="text" class="form-control no-border p-l-0" placeholder="Search widget market: Finance, Charts, Weather etc" id="widget-filter" name="widget-filter">
                        <span class="input-group-addon no-border">
                                      <i class="pg-search"></i>
                                  </span>
                      </div>
                      <div class="m-t-20 m-b-40 ">
                        <p class="small hint-text">Only for purchased customers. See <a href="#">Terms &amp; Conditions</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <nav class="navbar navbar-default bg-white no-border sm-padding-10" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub-nav">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="sub-nav">
                <div class="row">
                  <div class="col-sm-10">
                    <ul class="nav navbar-nav" data-filters="widgets">
                      <li><a href="#" class="all-caps font-montserrat fs-11" data-filter="all">All</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-sm-2">
                    <ul class="nav navbar-nav navbar-right">
                      <li>
                        <a href="http://help.revox.io" class="btn btn-default btn-sm padding-5 m-t-15">Suggest a widget
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
          </nav>
          <div class="container-fluid sm-p-l-0 sm-p-r-0">
            <!-- START CATEGORY -->
            <div class="widgets-container">
            </div>
            <!-- END CATEGORY -->
          </div>
          <!-- END CONTAINER FLUID -->
          {% include PATH + "pages/widgets/_widget_detail.tpl"%}
