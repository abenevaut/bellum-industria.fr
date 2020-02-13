<?php

return [

	'matchs-bot' => [

		/**
		 * Class handler
		 */
		'handler' => \bellumindustria\App\Websockets\Handlers\DefaultHandler::class,

		/**
		 * Host
		 * @var string
		 */
		'host' => '0.0.0.0',

		/**
		 * Port
		 * @var int
		 */
		'port' => 2083,

		/**
		 * Count of workers
		 * @var int
		 */
		'worker_count' => 1,

		/**
		 * Secure connection
		 * @var bool
		 */
		'use_ssl' => false,

		/**
		 * PEM certificate
		 * @var string
		 */
		'cert' => null,

		/**
		 * PEM certificate pass phrase
		 * @var string
		 */
		'cert_pass_phrase' => 'bellumindustria',
	],
];
