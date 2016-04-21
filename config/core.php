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
    ]
];