<aside class="control-sidebar control-sidebar-dark">

    {!! $settings['menu'] !!}


    <div class="tab-content">
        @foreach ($settings['modules'] as $slug => $modules)
            <div class="tab-pane" id="control-sidebar-{{ $slug }}-tab">
                <div class="pull-right">
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-times-circle-o"></i></a>
                </div>
                <h3 class="control-sidebar-heading">{{ $modules['title'] }}</h3>
                @foreach ($modules['widgets'] as $widget)
                    {!! Widget::get($widget) !!}
                @endforeach
            </div>
        @endforeach

        <div class="tab-pane active" id="control-sidebar-stats-tab">
            <div class="pull-right">
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-times-circle-o"></i></a>
            </div>
            <h3 class="control-sidebar-heading">Settings</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-info bg-blue"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Select wich module you want setup</h4>
                            <p>Use the sidebar up</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
<div class="control-sidebar-bg"></div>