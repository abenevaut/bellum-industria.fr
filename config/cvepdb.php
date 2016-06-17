<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Generic e-mails
	|--------------------------------------------------------------------------
	|
	|
	|
	*/

	'emails' => [
		'from' => [
			'contact' => 'contact@cvepdb.fr'
		],
		'copy' => [
			'mailwatch' => 'mailwatch@cavaencoreparlerdebits.fr'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Generic sms
	|--------------------------------------------------------------------------
	|
	|
	|
	*/

	'sms_user'     => env('SMS_USER'),
	'sms_password' => env('SMS_PASSWORD'),

	/*
	|--------------------------------------------------------------------------
	| Generic languages
	|--------------------------------------------------------------------------
	|
	|
	|
	*/

	'languages' => [
		'fr',
		'en'
	],

];
