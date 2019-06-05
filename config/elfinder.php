<?php

return [

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
	'disks' => [
		\bellumindustria\Domain\Users\Users\User::ROLE_ADMINISTRATOR => [
			'backups' => [
				'alias' => 'Backups',
				'accessControl' => 'bellumindustria\Domain\Files\Files\Access\ReadOnly::checkAccess'
			],
			'documentations' => [
				'alias' => 'Documentations',
				'accessControl' => 'Barryvdh\Elfinder\Elfinder::checkAccess'
			],
			'public' => [
				'alias' => 'Public',
				'accessControl' => 'Barryvdh\Elfinder\Elfinder::checkAccess',
				'URL' => 'medias/documents',
				'tmbURL' => env('APP_URL'),
				'glideURL' => 'medias/thumbnails',
			],
			'users' => [
				'alias' => 'Users',
				'accessControl' => 'Barryvdh\Elfinder\Elfinder::checkAccess',
			],
		],
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
		'prefix' => 'files',
		'middleware' => null,
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

	'roots' => [],

	/*
	|--------------------------------------------------------------------------
	| Options
	|--------------------------------------------------------------------------
	|
	| These options are merged, together with 'roots' and passed to the Connector.
	| See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
	|
	*/

	'options' => [],

	/*
	|--------------------------------------------------------------------------
	| Root Options
	|--------------------------------------------------------------------------
	|
	| These options are merged, together with every root by default.
	| See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1#root-options
	|
	*/
	'root_options' => [],
];
