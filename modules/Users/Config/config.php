<?php

return [
    'name' => 'Users',
    'admin' => [
        'sidebar' => [
            'menu' => [
                'route' => 'admin.users.index',
                'icon' => 'fa fa-users',
            ],
            'settings' => [
                'route' => null,
                'icon' => null,
            ]
        ],
        'settings' => [
            // Settings menu icon
            'icon' => 'fa fa-users',
            // All settings widgets
            'widgets' => [
            ]
        ],
        'dashboard' => [
            'widgets' => [
                'count_users',
                'export_users',
            ]
        ]
    ]
];
