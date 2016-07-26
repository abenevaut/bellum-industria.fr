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
	'dir' => [],

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
	'disks' => [],

	/*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    | @seealso https://github.com/Studio-42/elFinder/wiki/Logging
    |
    */

	'options' => array(
//        'bind' => [
//            'mkdir mkfile rename duplicate upload rm paste' => [
//                $myLogger,
//                'log'
//            ],
//        ]
	),

	/*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    | ABE : Used in class ElfinderServiceProvider
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
    | ABE : Allow to exclude files and/or directories to be displayed by checking base name.
    | In this filter, we exclure files and directories starting name with '.' to be displayed.
    |
    */

	'access' => 'Core\Domain\Files\Access\DontShowFilesStartingWithDot::checkAccess',

	/*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    | ABE : This variable overwrite previous var dirs and disks.
    | @seealso Modules\Files\Http\Controllers\Admin\FilesController::showConnector()
    | @seealso https://github.com/Studio-42/elFinder/wiki/Multiple-Roots
    |
    */

	'roots' => null,
);
