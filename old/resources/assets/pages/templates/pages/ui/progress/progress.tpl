{% if breadcrumb == 'breadcrumb-alt' %}
<div class="bg-white">
  <div class="container">
    <ol class="breadcrumb breadcrumb-alt">
      <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
      <li class="breadcrumb-item active">Progress Bars</li>
    </ol>
  </div>
</div>
{% endif %} <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax" {% if mode =='horizontal_menu' %} data-scroll-element=".page-container" {% endif %}>
            <div class="{% if mode =='horizontal_menu' %} container p-l-0 p-r-0 {% else %} container-fluid {% endif %}  container-fixed-lg">
              <div class="inner">
                <!-- START BREADCRUMB -->
                {% if breadcrumb != 'breadcrumb-alt' %} <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                  <li class="breadcrumb-item active">Progress Bars</li>
                </ol>
                <!-- END BREADCRUMB --> {% endif %}
                <div class="m-b-20">
                  <div class="row m-0">
                    <div class="col-xl-5 col-lg-6">
                      <!-- START card -->
                      <div class="card card-transparent">
                        <div class="card-header ">
                          <div class="card-title">Getting started
                          </div>
                        </div>
                        <div class="card-body">
                          <h3>Custom built for anyone, anywhere.</h3>
                          <p>As always, in keeping with our policy of making UX easier and more user-friendly, we have customized this feature with a lightwieight SVG indicator. Also this is highly adaptable and offers a range of progress bar options to suit your preference. </p>
                          <br>
                          <div>
                            <div class="profile-img-wrapper m-t-5 inline">
                              <img width="35" height="35" src="{# ASSETS #}/img/profiles/avatar_small.jpg" alt="Avatar" data-src="{# ASSETS #}/img/profiles/avatar_small.jpg" data-src-retina="{# ASSETS #}/img/profiles/avatar_small2x.jpg">
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
                    <div class="col-xl-7 col-lg-6 bg-white">
                      <!-- START card -->
                      <div class="full-height d-flex justify-content-center align-items-center">
                        <div class="card-body text-center">
                          <img class="image-responsive-height demo-mw-50" src="{# ASSETS #}/img/demo/progress.svg" alt="Progress">
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
                <div class="card-title">Linear progress
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <p>A progress bar is a visual way of showing how much of a curtain task has being completed. We made it light weighted and simple as possible just for a better user experience.A progress can be indeterminate or determinate according to the length of a task. </p>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-lg-6">
                        <p class="small hint-text">Indeterminate progress</p>
                        <div class="progress">
                          <div class="progress-bar-indeterminate"></div>
                        </div>
                        <br>
                        <p class="small hint-text">Determinate progress</p>
                        <div class="progress">
                          <div class="progress-bar" style="width:45%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card card-default">
                      <div class="card-body text-center no-padding">
                        <img alt="Determinate bar" src="{# ASSETS #}/img/demo/determinate_bar.gif">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card card-default">
                      <div class="card-body text-center no-padding">
                        <img alt="Indeterminate bar" src="{# ASSETS #}/img/demo/indeterminate_bar.gif">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
          <!-- START CONTAINER FLUID -->
          <div class="{% if mode =='horizontal_menu' %} container  {% else %} container-fluid {% endif %}  container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">Linear progress options
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <h5>Indeterminate progress bar</h5>
                    <p>This progress is used when the length of the task is unknown. Thus shows a repetitive cycle. With the use of a scalable vector graphic we made it light weighted and simple for a better UX.
                    </p>
                    <h5>Determinate progress bar</h5>
                    <p>This progress is used when the length of the task can be measured and visually shown.Thus for linear progress determinate is used frequently. To use simply use .progress-bar-determinate</p>
                  </div>
                  <div class="col-lg-4">
                    <h5>Colour options</h5>
                    <p>You can also apply any colour suited according to the nature of the task. </p>
                    <br>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-primary" style="width:35%"></div>
                        </div>
                        <div class="progress ">
                          <div class="progress-bar progress-bar-complete" style="width:45%"></div>
                        </div>
                        <div class="progress ">
                          <div class="progress-bar progress-bar-success" style="width:55%"></div>
                        </div>
                        <div class="progress ">
                          <div class="progress-bar progress-bar-warning" style="width:65%"></div>
                        </div>
                        <div class="progress ">
                          <div class="progress-bar progress-bar-danger" style="width:75%"></div>
                        </div>
                      </div>
                    </div>
                    <p class="small hint-text">All the colours included in pages color pallete is applicable.</p>
                  </div>
                  <div class="col-lg-4">
                    <h5>Bar sizes</h5>
                    <p>You can also use a thinner version of the default progress by simple changing .progress-small </p>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="progress progress-small ">
                          <div class="progress-bar progress-bar-success" style="width:45%"></div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-success" style="width:45%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
          <!-- START CONTAINER FLUID -->
          <div class="{% if mode =='horizontal_menu' %} container  {% else %} container-fluid {% endif %}  container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">Circular progress
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <p>Circular progress is frequently used to show a repetitive cycle for its shape. But breaking convention a circular progress can be indeterminate or determinate according to a task.We developed it mainly for a better UX. </p>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-6 text-center">
                        <div class="progress-circle-indeterminate m-t-45">
                        </div>
                        <br>
                        <p class="small hint-text">Indeterminate Progress</p>
                      </div>
                      <div class="col-md-6 text-center">
                        <div class="m-t-45">
                          <input class="progress-circle" data-pages-progress="circle" value="40" type="hidden">
                        </div>
                        <br>
                        <p class="small hint-text">Determinate Progress</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card card-default">
                      <div class="card-body text-center no-padding">
                        <img alt="Determinate circle" src="{# ASSETS #}/img/demo/determinate_circle.gif">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card card-default">
                      <div class="card-body text-center no-padding">
                        <img alt="Indeterminate circle" src="{# ASSETS #}/img/demo/indeterminate_circle.gif">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
          <!-- START CONTAINER FLUID -->
          <div class="{% if mode =='horizontal_menu' %} container  {% else %} container-fluid {% endif %}  container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">Circular progress options
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4">
                    <h5>Indeterminate progress</h5>
                    <p>This is mostly used for its repetitive circular shape for tasks which the time cannot be measured. With the use of SVG the size can be scaled to any preferred amount by the user without any quality loss. We developed a custom animation with different timescales for a better user experience. </p>
                    <br>
                    <h5>Determinate progress</h5>
                    <p>Similar to the determinate progress bar, circular progress can also be used to show the length of a task. The determinate circular progress indicator can be initialised without writing a single line of Javascript code. </p>
                  </div>
                  <div class="col-lg-4">
                    <h5>Color options</h5>
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <input class="progress-circle" data-pages-progress="circle" value="75" type="hidden" data-color="complete">
                      </div>
                      <div class="col-md-8">
                        <p>Complete Progress bar color</p>
                        <p class="small hint-text">
                          Set data attribute <code>data-color</code> to "complete"
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <input class="progress-circle" data-pages-progress="circle" value="75" type="hidden" data-color="primary">
                      </div>
                      <div class="col-md-8">
                        <p>Complete Progress bar color</p>
                        <p class="small hint-text">
                          Set data attribute <code>data-color</code> to "primary"
                        </p>
                      </div>
                    </div>
                    <p class="small hint-text">All the colours included in pages color pallete is applicable</p>
                    <br>
                    <button class="btn btn-success">See color palette</button>
                  </div>
                  <div class="col-lg-4">
                    <h5>Circular progress sizes</h5>
                    <p>In circular progress you can change the stroke width</p>
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <input class="progress-circle" data-pages-progress="circle" value="75" type="hidden">
                      </div>
                      <div class="col-md-8">
                        <p class="small hint-text">Default progress with a stroke of 3px</p>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <input class="progress-circle" data-pages-progress="circle" value="75" type="hidden" data-thick="true">
                      </div>
                      <div class="col-md-8">
                        <p class="small hint-text">Progress with a stroke of 3px</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
