<?php

return [
    'name' => 'Dashboard',
    'admin' => [
        'sidebar' => [
            // Admin entry point
            'route' => 'admin.dashboard.index',
            // Admin menu icon
            'icon' => 'fa fa-dashboard'
        ],
        'settings' => [
            // Settings menu icon
            'icon' => 'fa fa-dashboard',
            // All settings widgets
            'widgets' => [
                'setup_dashboard',
            ]
        ]
    ]
];