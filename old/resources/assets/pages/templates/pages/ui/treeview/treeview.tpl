      {% if breadcrumb == 'breadcrumb-alt' %}
<div class="bg-white">
  <div class="container">
    <ol class="breadcrumb breadcrumb-alt">
      <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
      <li class="breadcrumb-item active">Tree View</li>
    </ol>
  </div>
</div>
{% endif %} <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax" {% if mode =='horizontal_menu' %} data-scroll-element=".page-container" {% endif %}>
          <div class="{% if mode =='horizontal_menu' %} container  p-l-0 p-r-0 {% else %} container-fluid {% endif %}  container-fixed-lg">
            <div class="inner">
              <!-- START BREADCRUMB -->
              {% if breadcrumb != 'breadcrumb-alt' %} <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                <li class="breadcrumb-item active">Tree View</li>
              </ol>
              <!-- END BREADCRUMB --> {% endif %}
              <div class="row">
                <div class="col-xl-7 col-lg-6 ">
                  <!-- START card -->
                  <div class="card card-transparent">
                    <div class="card-header ">
                      <div class="card-title">Getting started
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="default-tree" class="m-b-20">
                        <ul id="treeData" class="hidden">
                          <li id="id1" title="Look, a tool tip!">item1 with key and tooltip </li>
                          <li id="id2">item2</li>
                          <li id="id3" class="folder">Folder with some children
                            <ul>
                              <li id="id3.1">Sub-item 3.1
                                <ul>
                                  <li id="id3.1.1">Sub-item 3.1.1</li>
                                  <li id="id3.1.2">Sub-item 3.1.2</li>
                                </ul>
                              </li>
                              <li id="id3.2">Sub-item 3.2
                                <ul>
                                  <li id="id3.2.1">Sub-item 3.2.1 </li>
                                  <li id="id3.2.2">Sub-item 3.2.2 </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li id="id4" class="expanded">Document with some children (expanded on init)
                            <ul>
                              <li id="id4.1" class="active focused">Sub-item 4.1 (active and focus on init)
                                <ul>
                                  <li id="id4.1.1">Sub-item 4.1.1</li>
                                  <li id="id4.1.2">Sub-item 4.1.2</li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-6 ">
                  <!-- START card -->
                  <div class="card card-transparent">
                    <div class="card-body">
                      <h3 class="">
                                          Tree view
                                      </h3>
                      <p>This is powered by jquery dynatree, most extensively used tree view plugin which is easy use and customize, for further more we have explained how to set up you tree view on pages
                      </p>
                      <br>
                      <a href="http://wwwendt.de/tech/dynatree/doc/dynatree-doc.html" target="_blank" class="btn btn-complete">See Plugin</a>
                      <p class="small hinted-text inline v-align-middle m-l-10">see the plugin for
                        <br> http://wwwendt.de/tech/dynatree/
                      </p>
                    </div>
                  </div>
                  <!-- END card -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class="{% if mode =='horizontal_menu' %} container  {% else %} container-fluid {% endif %}  container-fixed-lg">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-default">
                <div class="card-header ">
                  <div class="card-title">Tree View
                  </div>
                </div>
                <div class="card-body">
                  <p>A simple tree styled to pages color palette, Please refer the documentation for more details or dynatree documentation
                  </p>
                  <div id="drag-tree">
                    <ul id="dragTreeData" class="hidden">
                      <li id="idt1" title="Look, a tool tip!">item1 with key and tooltip
                      </li>
                      <li id="idt2">item2</li>
                      <li class="folder" id="idt3">Folder with some children
                        <ul>
                          <li id="idt3.1">Sub-item 3.1
                            <ul>
                              <li id="idt3.1.1">Sub-item 3.1.1</li>
                              <li id="idt3.1.2">Sub-item 3.1.2</li>
                            </ul>
                          </li>
                          <li id="idt3.2">Sub-item 3.2
                            <ul>
                              <li id="idt3.2.1">Sub-item 3.2.1</li>
                              <li id="idt3.2.2">Sub-item 3.2.2</li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="expanded" id="idt4">Document with some children (expanded on init)
                        <ul>
                          <li class="active focused expanded" id="idt4.1">
                            Sub-item 4.1 (active and focus on init)
                            <ul>
                              <li id="idt4.1.1">Sub-item 4.1.1</li>
                              <li id="idt4.1.2">Sub-item 4.1.2</li>
                            </ul>
                          </li>
                          <li class="expanded" id="idt4.2">Sub-item 4.2
                            <ul>
                              <li id="idt4.2.1">Sub-item 4.2.1</li>
                              <li id="idt4.2.2">Sub-item 4.2.2</li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-default">
                <div class="card-header ">
                  <div class="card-title">Check Tree
                  </div>
                </div>
                <div class="card-body">
                  <p>You can make all the items to checkbox or even mix them up with radio controls, Please refer the documentation for more details or dynatree documentation</p>
                  <div id="check-tree">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card card-default">
                <div class="card-header ">
                  <div class="card-title">Radio Tree
                  </div>
                </div>
                <div class="card-body">
                  <p>You can make all the items to checkbox or even mix them up with radio controls, Please refer the documentation for more details or dynatree documentation</p>
                  <div id="radio-tree">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>
        <!-- END CONTAINER FLUID -->
