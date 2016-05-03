<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => env('MAILGUN_DOMAIN'),
		'secret' => env('MAILGUN_SECRET'),
	],

	'mandrill' => [
		'secret' => env('MANDRILL_SECRET'),
	],

	'ses' => [
		'key' => env('SES_KEY'),
		'secret' => env('SES_SECRET'),
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model' => Core\Domain\Users\Entities\User::class,
		'key' => env('STRIPE_KEY'),
		'secret' => env('STRIPE_SECRET'),
	],

	'raven' => [
		'dsn' => env('CORE_SENTRY_DSN'),
		'level' => env('CORE_SENTRY_LEVEL'),
	],

	'bitbucket' => [
		'client_id' => env('BITBUCKET_APP_ID', 'your-bitbucket-app-id'),
		'client_secret' => env('BITBUCKET_APP_SECRET', 'your-bitbucket-app-secret'),
		'redirect' => env('CORE_URL') . '/login/callback/bitbucket',
	],

	'facebook' => [
		'client_id' => env('FACEBOOK_APP_ID', 'your-facebook-app-id'),
		'client_secret' => env('FACEBOOK_APP_SECRET', 'your-facebook-app-secret'),
		'redirect' => env('CORE_URL') . '/login/callback/facebook',
	],

	'github' => [
		'client_id' => env('GITHUB_APP_ID', 'your-github-app-id'),
		'client_secret' => env('GITHUB_APP_SECRET', 'your-github-app-secret'),
		'redirect' => env('CORE_URL') . '/login/callback/github',
	],

	'google' => [
		'client_id' => env('GOOGLE_APP_ID', 'your-google-app-id'),
		'client_secret' => env('GOOGLE_APP_SECRET', 'your-google-app-secret'),
		'redirect' => env('CORE_URL') . '/login/callback/google',
	],

	'linkedin' => [
		'client_id' => env('LINKEDIN_APP_ID', 'your-linkedin-app-id'),
		'client_secret' => env('LINKEDIN_APP_SECRET', 'your-linkedin-app-secret'),
		'redirect' => env('CORE_URL') . '/login/callback/linkedin',
	],

	'twitter' => [
		'client_id' => env('TWITTER_APP_ID', 'your-twitter-app-id'),
		'client_secret' => env('TWITTER_APP_SECRET', 'your-twitter-app-secret'),
		'redirect' => env('CORE_URL') . '/login/callback/twitter',
	],

];
