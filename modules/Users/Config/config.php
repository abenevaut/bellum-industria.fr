<?php

return [
	'name'                    => 'Users',
	'admin'                   => [
		'sidebar'   => [
			'shortcuts' => [
				'route' => 'admin.users.create',
				'icon'  => 'fa fa-user-plus',
			],
			'menu'      => [
				'route' => 'admin.users.index',
				'icon'  => 'fa fa-users',
			],
			'settings'  => [
				'route' => 'admin.users.settings.index',
				'icon'  => 'fa fa-users',
			]
		],
		'dashboard' => [
			'widgets' => [
				'count_users',
				'export_users',
			]
		]
	],
	'is_registration_allowed' => true,
	'social'                  => [
		'login' => []
	],
	'front'                   => [
		'users' => [
			'dashboard' => [
				'widgets' => [
					'count_users'
				]
			]
		]
	],
];
