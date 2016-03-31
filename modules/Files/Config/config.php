<?php

return [
	'name' => 'Files',
	'view' => [
		// True use module views else use resources/views/modules/<module_name>/
		'use_namespace' => true // Todo : Have to be overloadable by a "Theme" or "Template"
	],
	'admin' => [
		// Admin entry point
		'route' => 'admin.files.index',
		// Admin menu icon
		'icon' => 'fa fa-folder'
	]
];