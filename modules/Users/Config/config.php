<?php

return [
    'name' => 'Users',
    'view' => [
        // True use module views else use resources/views/modules/<module_name>/
        'use_namespace' => true // Todo : Have to be overloadable by a "Theme" or "Template"
    ],
    'admin' => [
        'sidebar' => [
            // Admin entry point
            'route' => 'admin.users.index',
            // Admin menu icon
            'icon' => 'fa fa-users',
            // All dashboard widgets
            'widgets' => [
                'count_users',
            ]
        ],
        'settings' => [
            // Settings menu icon
            'icon' => 'fa fa-users',
            // All settings widgets
            'widgets' => [
                'count_users',
            ]
        ]
    ]
];