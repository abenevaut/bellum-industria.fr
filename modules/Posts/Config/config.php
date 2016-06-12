<?php

return [
	'name'  => 'Posts',
	'admin' => [
		'sidebar' => [
			'shortcuts' => [
				'route' => null,
				'icon'  => null,
			],
			'menu'      => [
				'route' => 'admin.posts.index',
				'icon'  => 'fa fa-newspaper-o'
			],
			'settings'  => [
				'route' => null,
				'icon'  => null,
			]
		]
	],
	'front' => [
		'users' => [
			'dashboard' => [
				'widgets' => [
				]
			]
		]
	],
];