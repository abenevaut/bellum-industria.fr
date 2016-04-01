<?php

return [
    'name' => 'Pages',
    'view' => [
        // True use module views else use resources/views/modules/<module_name>/
        'use_namespace' => true // Todo : Have to be overloadable by a "Theme" or "Template"
    ],
    'admin' => [
        'sidebar' => [
            // Admin entry point
            'route' => 'admin.pages.index',
            // Admin menu icon
            'icon' => 'fa fa-file-text-o'
        ]
    ],
    'route_pattern' => 'admin|themes|assets|modules|uploads'
];