<?php

return [

    'default' => 'lumen',

    'path' => base_path('resources/themes'),

    'config' => [
        'file' => storage_path('app/modules/themes/config.json'),
    ],

    'cache' => [
        'enabled' => false,
        'key' => 'pingpong.themes',
        'lifetime' => 86400,
    ],

];
