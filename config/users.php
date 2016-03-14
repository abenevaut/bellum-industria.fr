<?php

return [
    'name' => 'Users',
    'view' => [
        // Prefix to lookup to find resources
        'prefix' => 'users'
    ],
    'admin' => [
        // Admin entry point
        'route' => 'admin.users',
        // Admin menu icon
        'icon' => 'fa fa-users'
    ]
];