<div class=" card no-border m-b-10 widget-loader-circle todolist-widget flex-1 d-flex flex-column sales-map-widget">
    <div class="card-header  clearfix p-l-30">
        <div class="row">
            <div class="clearfix full-width">
                <div class="pull-left img-holder"><img class="p-t-10" src="{# ASSETS #}/img/revox-logo.svg" alt=""></div>
                <div class="pull-left col-xs-10 col-sm-5 col-sm-5 p-l-10">
                    <p class="no-margin p-l-5">Generate Map</p><select class="full-width" data-init-plugin="select2">
                        <option>
                            Sales for Revox admin
                        </option>
                        <option>
                            Sales for Web-arch
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-master-light no-padding">
     <div class="map-body">
        <div class="full-height full-width" id="salesMapWidget"></div>
        <div class="pull-bottom m-l-20 m-b-35">
            <div class="btn-group btn-group-vertical" data-toggle="buttons-radio">
                <button class="btn btn-default btn-xs" id="map-zoom-in"><i class="fa fa-plus"></i></button>
                 <button class="btn btn-default btn-xs" id="map-zoom-out"><i class="fa fa-minus"></i></button>
            </div>
        </div>                                     
     </div>

    </div>
</div>