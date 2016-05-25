<?php

return [
	'name' => 'Pages',
	'admin' => [
		'sidebar' => [
			'shortcuts' => [
				'route' => 'admin.pages.create',
				'icon' => 'fa fa-newspaper-o',
			],
			'menu' => [
				'route' => 'admin.pages.index',
				'icon' => 'fa fa-file-text-o'
			],
			'settings' => [
				'route' => null,
				'icon' => null,
			]
		]
	]
];
