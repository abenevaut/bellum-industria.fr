<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => bellumindustria\Domain\Users\Users\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

	\bellumindustria\Infrastructure\Interfaces\Domain\Providers\ProvidersInterface::FACEBOOK => [
		'client_id' => env('FACEBOOK_CONSUMER_KEY'),
		'client_secret' => env('FACEBOOK_CONSUMER_SECRET'),
		'redirect' => env('FACEBOOK_CALLBACK_URL'),
	],

	\bellumindustria\Infrastructure\Interfaces\Domain\Providers\ProvidersInterface::TWITTER => [
		'client_id' => env('TWITTER_CONSUMER_KEY'),
		'client_secret' => env('TWITTER_CONSUMER_SECRET'),
		'redirect' => env('TWITTER_CALLBACK_URL'),
	],

	\bellumindustria\Infrastructure\Interfaces\Domain\Providers\ProvidersInterface::GOOGLE => [
		'client_id' => env('GOOGLE_CLIENT_ID'),
		'client_secret' => env('GOOGLE_CLIENT_SECRET'),
		'redirect' => env('GOOGLE_CALLBACK_URL'),
	],

	'google_api' => [
		'key' => env('GOOGLE_API_KEY')
	],

	'youtube' => [
		'key' => env('YOUTUBE_CHANNEL_ID')
	],

];
