<?php

return array(

    /*
   |--------------------------------------------------------------------------
   | Upload dir
   |--------------------------------------------------------------------------
   |
   | The dir where to store the images (relative from public)
   |
   */
    'dir' => [
        'uploads'
    ],

    /*
    |--------------------------------------------------------------------------
    | Filesystem disks (Flysytem)
    |--------------------------------------------------------------------------
    |
    | Define an array of Filesystem disks, which use Flysystem.
    | You can set extra options, example:
    |
    | 'my-disk' => [
    |        'URL' => url('to/disk'),
    |        'alias' => 'Local storage',
    |    ]
    */
    'disks' => [
//        'local' => [
//            'glideUrl' => url('glide'),
//            'tmbUrl' => url('thumbnails')
//        ],
//        's3' => [
//            'URL' => 'https://s3.eu-central-1.amazonaws.com/cvepdb-test/',
//            'url' => 'https://s3.eu-central-1.amazonaws.com/cvepdb-test/',
//            'alias' => 'AWS',
//            //'glideUrl' => url('glide'),
//            //'tmbUrl' => url('thumbnails')
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    */

    'route' => [
        'prefix' => null,
        'middleware' => null, //Set to null to disable middleware filter
    ],

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots' => null,

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    */

    'options' => array(),

);
