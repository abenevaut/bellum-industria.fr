<?php

return [
	'name'    => 'steam::admin.meta_title',
	'admin'   => [
		'sidebar' => [
			'menu'     => [
				//'route' => 'admin.steam.index',
				//'icon' => 'fa fa-steam'
			],
			'settings' => [
				'route' => 'admin.steam.settings.index',
				'icon'  => 'fa fa-steam',
			]
		]
	],
	'api_key' => null,
	'login'   => false,
	'route'   => 'steam.login',
	'front'   => [
		'users' => [
			'dashboard' => [
				'widgets' => [
				]
			]
		]
	],
];
