{% if not mapWidget_bg%}
{% set mapWidget_bg ='success'%}
{% endif %}
<div class="widget-13 card no-border  no-margin widget-loader-circle">
  <div class="card-header  pull-up top-right ">
    <div class="card-controls">
      <ul>
        <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="container-sm-height no-overflow">
    <div class="row row-sm-height">
      <div class="col-sm-5 col-lg-4 col-xlg-3 col-sm-height col-top no-padding">
        <div class="card-header  ">
          <div class="card-title">Menu clipping
          </div>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills m-t-5 m-b-15" role="tablist">
            <li class="active">
              <a href="#tab1" data-toggle="tab" role="tab" class="b-a b-grey text-master">
                                            fb
                                        </a>
            </li>
            <li>
              <a href="#tab2" data-toggle="tab" role="tab" class="b-a b-grey text-master">
                                            js
                                        </a>
            </li>
            <li>
              <a href="#tab3" data-toggle="tab" role="tab" class="b-a b-grey text-master">
                                            sa
                                        </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <h3>Facebook</h3>
              <p class="hint-text all-caps font-montserrat small no-margin ">Views</p>
              <p class="all-caps font-montserrat  no-margin text-success ">14,256</p>
              <br>
              <p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
              <p class="all-caps font-montserrat  no-margin text-warning ">24</p>
              <br>
              <p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
              <p class="all-caps font-montserrat  no-margin text-success ">56</p>
            </div>
            <div class="tab-pane " id="tab2">
              <h3>Google</h3>
              <p class="hint-text all-caps font-montserrat small no-margin ">Views</p>
              <p class="all-caps font-montserrat  no-margin text-success ">14,256</p>
              <br>
              <p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
              <p class="all-caps font-montserrat  no-margin text-warning ">24</p>
              <br>
              <p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
              <p class="all-caps font-montserrat  no-margin text-success ">56</p>
            </div>
            <div class="tab-pane" id="tab3">
              <h3>Amazon</h3>
              <p class="hint-text all-caps font-montserrat small no-margin ">Views</p>
              <p class="all-caps font-montserrat  no-margin text-success ">14,256</p>
              <br>
              <p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
              <p class="all-caps font-montserrat  no-margin text-warning ">24</p>
              <br>
              <p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
              <p class="all-caps font-montserrat  no-margin text-success ">56</p>
            </div>
          </div>
        </div>
        <div class="bg-master-light p-l-20 p-r-20 p-t-10 p-b-10 pull-bottom full-width hidden-xs">
          <p class="no-margin">
            <a href="#"><i class="fa fa-arrow-circle-o-down text-success"></i></a>
            <span class="hint-text">Super secret options</span>
          </p>
        </div>
      </div>
      <div class="col-sm-7 col-lg-8 col-xlg-9 col-sm-height col-top no-padding relative">
        <div class="bg-{# mapWidget_bg #} widget-13-map">
        </div>
      </div>
    </div>
  </div>
</div>