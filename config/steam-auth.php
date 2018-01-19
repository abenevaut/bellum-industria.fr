<?php

return [

    /*
     * Redirect URL after login
     */
    'redirect_url' => env('STEAM_CALLBACK_URL'),

	/*
     * API Key (http://steamcommunity.com/dev/apikey)
     */
    'api_key' => env('STEAM_API_KEY'),

    /*
     * Is using https ?
     */
    'https' => env('STEAM_API_USE_HTTPS'),
];
