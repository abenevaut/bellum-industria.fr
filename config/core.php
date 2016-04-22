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
            'CORE_SITE_NAME',
            'CORE_SITE_DESCRIPTION',
            'CORE_CONTACT_MAIL',
            'CORE_CONTACT_DISPLAY_NAME',
            'CORE_MAILWATCH_MAIL',
            'CORE_MAIL_HOST',
            'CORE_MAIL_USERNAME',
            'CORE_MAIL_PASSWORD',
            'CORE_MAIL_PORT',
            'CORE_MAIL_DRIVER',
            'CORE_MAIL_ENCRYPTION',
        ]
    ]
];