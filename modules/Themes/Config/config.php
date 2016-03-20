<?php

return [
	'name' => 'Themes',
	'view' => [
		// True use module views else use resources/views/modules/<module_name>/
		'use_namespace' => true // Todo : Have to be overloadable by a "Theme" or "Template"
	],
	'admin' => [
		// Admin entry point
		'route' => 'admin.themes.index',
		// Admin menu icon
		'icon' => 'fa fa-paint-brush',
		// All dashboard widgets
		'widgets' => [
		]
	]
];