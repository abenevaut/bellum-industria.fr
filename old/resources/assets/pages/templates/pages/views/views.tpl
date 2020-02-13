          {% if breadcrumb == 'breadcrumb-alt' %}
<div class="bg-white">
  <div class="container">
    <ol class="breadcrumb breadcrumb-alt">
      <li><a href="#" class="active">Views</a>
      </li>
    </ol>
  </div>
</div>
{% endif %} <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax" {% if mode =='horizontal_menu' %} data-scroll-element=".page-container" {% endif %}>
            <div class="{% if mode =='horizontal_menu' %} container p-l-0 p-r-0 {% else %} container-fluid {% endif %}  container-fixed-lg">
              <div class="inner">
                <!-- START BREADCRUMB -->
                {% if breadcrumb != 'breadcrumb-alt' %} <ul class="breadcrumb">
                  <li><a href="#" class="active">Views</a>
                  </li>
                </ul>
                <!-- END BREADCRUMB --> {% endif %}
                <div class="container-md-height m-b-20">
                  <div class="row">
                    <div class="col-xl-7 col-lg-6 bg-white">
                      <!-- START card -->
                      <div class="full-height">
                        <div class="card-body text-center">
                          <img class="demo-mw-500" src="{# ASSETS #}/img/
demo/views_animation.gif" alt="">
                        </div>
                      </div>
                      <!-- END card -->
                    </div>
                    <div class="col-xl-5 col-lg-6 col-top">
                      <!-- START card -->
                      <div class="card card-transparent">
                        <div class="card-header ">
                          <div class="card-title">Getting started
                          </div>
                        </div>
                        <div class="card-body">
                          <h3>Sometimes small things matter the most in life!</h3>
                          <p>Views are pre-made view ports which comes in handy for HTML5 mobile hybrid apps, These elements help in the navigation of your app with a touch of some cool pre-built animations, see the demo below
                          </p>
                          <br>
                          <div>
                            <div class="profile-img-wrapper m-t-5 inline">
                              <img width="35" height="35" src="{# ASSETS #}/img/
profiles/avatar_small.jpg" alt="" data-src="{# ASSETS #}/img/
profiles/avatar_small.jpg" data-src-retina="{# ASSETS #}/img/
profiles/avatar_small2x.jpg">
                              <div class="chat-status available">
                              </div>
                            </div>
                            <div class="inline m-l-10">
                              <p class="small hint-text m-t-5">VIA senior product manage
                                <br> for UI/UX at REVOX</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END card -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="{% if mode =='horizontal_menu' %} container  {% else %} container-fluid {% endif %}  container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">Getting started
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <!-- START card -->
                    <div class="card card-transparent">
                      <div class="card-body no-padding">
                        <div class="view-iframe-wrapper">
                          <iframe class="no-border" src="views_push_parallax.html">Iframes are not supported. </iframe>
                        </div>
                        <h5 class="font-montserrat text-uppercase hint-text fs-12 m-t-35">Push with Paralax</h5>
                        <p>Set <code>data-view-animation</code> property to <code>push-parrallax</code> to simulate the native push-segue animation available in iOS. <a href="https://docs.pages.revox.io/~/edit/primary/views">More info</a></p>
                      </div>
                    </div>
                    <!-- END card -->
                  </div>
                  <div class="col-md-4">
                    <!-- START card -->
                    <div class="card card-transparent">
                      <div class="card-body no-padding">
                        <div class="view-iframe-wrapper">
                          <iframe class="no-border" src="views_push.html">Iframes are not supported. </iframe>
                        </div>
                        <h5 class="font-montserrat  text-uppercase hint-text fs-12 m-t-35">Push screen</h5>
                        <p>Set <code>data-view-animation</code> property to <code>push</code> to simulate the native push-segue animation available in iOS. <a href="https://docs.pages.revox.io/~/edit/primary/views">More info</a></p>
                      </div>
                    </div>
                    <!-- END card -->
                  </div>
                  <div class="col-md-4">
                    <!-- START card -->
                    <div class="card card-transparent">
                      <div class="card-body no-padding">
                        <div class="view-iframe-wrapper">
                          <iframe class="no-border" src="views_from_top.html">Iframes are not supported. </iframe>
                        </div>
                        <h5 class="font-montserrat text-uppercase hint-text fs-12 m-t-35">Screen on top</h5>
                        <p>Set <code>data-view-animation</code> property to <code>from-top</code> to simulate the native push-segue animation available in iOS. <a href="https://docs.pages.revox.io/~/edit/primary/views">More info</a></p>
                      </div>
                    </div>
                    <!-- END card -->
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
