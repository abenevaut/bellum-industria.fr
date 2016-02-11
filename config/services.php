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
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => CVEPDB\Repositories\Users\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'raven' => [
        'dsn'   => env('SENTRY_DSN'),
        'level' => env('SENTRY_LEVEL')
    ],

//    'github' => [
//        'client_id' => 'your-github-app-id',
//        'client_secret' => 'your-github-app-secret',
//        'redirect' => 'http://your-callback-url',
//    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_APP_ID'),
        'client_secret' => env('FACEBOOK_APP_SECRET'),
        'redirect' => env('FACEBOOK_URL_CALLBACK'),
    ],

    'twitter' => [
        'client_id' => env('TWITTER_APP_ID'),
        'client_secret' => env('TWITTER_APP_SECRET'),
        'redirect' => env('TWITTER_URL_CALLBACK'),
    ],

//    'google' => [
//        'client_id' => 'your-google-app-id',
//        'client_secret' => 'your-google-app-secret',
//        'redirect' => 'http://your-callback-url',
//    ],
//
//    'linkedin' => [
//        'client_id' => 'your-linkedin-app-id',
//        'client_secret' => 'your-linkedin-app-secret',
//        'redirect' => 'http://your-callback-url',
//    ],
//
//    'bitbucket' => [
//        'client_id' => 'your-bitbucket-app-id',
//        'client_secret' => 'your-bitbucket-app-secret',
//        'redirect' => 'http://your-callback-url',
//    ],

];
