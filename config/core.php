<?php

return [
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
    ],
    'settings' => [
        'default_from_env' => [
            'APP_SITE_NAME',
            'APP_SITE_DESCRIPTION',
            'APP_CONTACT_MAIL',
            'APP_CONTACT_DISPLAY_NAME',
        ]
    ]
];