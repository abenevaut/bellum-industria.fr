<?php

return [
    'name' => 'Files',
    'admin' => [
        'sidebar' => [
            // Admin entry point
            'route' => 'admin.files.index',
            // Admin menu icon
            'icon' => 'fa fa-folder'
        ],
        'settings' => [
            // Settings menu icon
            'icon' => 'fa fa-folder',
            // All dashboard widgets
            'widgets' => [
                'setup_files'
            ]
        ]
    ]
];