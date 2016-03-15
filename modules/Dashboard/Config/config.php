<?php

return [
	'name' => 'Dashboard',
	'view' => [
		// True use module views else use resources/views/modules/<module_name>/
		'use_namespace' => true // Todo : Have to be overloadable by a "Theme" or "Template"
	],
	'admin' => [
		// Admin entry point
		'route' => 'admin.dashboard.index',
		// Admin menu icon
		'icon' => 'fa fa-dashboard'
	]
];