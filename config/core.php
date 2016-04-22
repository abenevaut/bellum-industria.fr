<?php

return [
    'title' => '#CVEPDB CMS',
    'version' => '0.1.0',
    'site' => [
        'name' => env('CORE_SITE_NAME'),
        'description' => env('CORE_SITE_DESCRIPTION'),
    ],
    'uri' => [
        'backend' => env('CORE_URI_BACKEND', 'admin'),
        'installer' => env('CORE_URI_INSTALLER', 'installer'),
    ],
    'pagination' => 15,
    'backend' => [
        'menus' => [
            'header' => [
                // Presenter to display admin CMS header menu
                'presenters' => 'Core\Http\Presenters\Menus\adminlteHeaderMenuPresenter',
            ],
            'sidebar' => [
                // Presenter to display admin CMS sidebar
                'presenters' => 'Core\Http\Presenters\Menus\adminlteSidebarPresenter',
            ]
        ]
    ]
];