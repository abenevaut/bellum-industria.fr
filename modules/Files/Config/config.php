<?php

return [
    'name' => 'Files',
    'admin' => [
        'sidebar' => [
            'shortcuts' => [
                'route' => null,
                'icon' => null,
            ],
            'menu' => [
                'route' => 'admin.files.index',
                'icon' => 'fa fa-folder',
            ],
            'settings' => [
                'route' => 'admin.files.settings.index',
                'icon' => 'fa fa-folder',
            ]
        ]
    ]
];
