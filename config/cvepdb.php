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

    'sms_user' => env('SMS_USER'),
    'sms_password' => env('SMS_PASSWORD'),

];
