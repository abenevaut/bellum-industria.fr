<?php

return [
    'name' => 'Users',
    'admin' => [
        'sidebar' => [
            'shortcuts' => [
                'route' => 'admin.users.create',
                'icon' => 'fa fa-user-plus',
            ],
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
//            'icon' => 'fa fa-users',
//            'widgets' => [],
        ],
        'dashboard' => [
            'widgets' => [
                'count_users',
                'export_users',
            ]
        ]
    ]
];
