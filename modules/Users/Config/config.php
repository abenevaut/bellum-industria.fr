<?php

return [
    'name' => 'Users',
    'admin' => [
        'sidebar' => [
            // Admin entry point
            'route' => 'admin.users.index',
            // Admin menu icon
            'icon' => 'fa fa-users',
        ],
        'settings' => [
            // Settings menu icon
            'icon' => 'fa fa-users',
            // All settings widgets
            'widgets' => [
                'count_users',
            ]
        ],
        'dashboard' => [
            // All dashboard widgets
            'widgets' => [
                'count_users',
            ]
        ]
    ]
];
