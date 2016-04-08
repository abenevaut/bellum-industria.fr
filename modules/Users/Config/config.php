<?php

return [
    'name' => 'Users',
    'admin' => [
        'sidebar' => [
            // Admin entry point
            'route' => 'admin.users.index',
            // Admin menu icon
            'icon' => 'fa fa-users',
        ],
        'settings' => [
            // Settings menu icon
            'icon' => 'fa fa-users',
            // All settings widgets
            'widgets' => [
                'count_users',
            ]
        ],
        'dashboard' => [
            // All dashboard widgets
            'widgets' => [
                'count_users',
            ]
        ]
    ],


    /**
     * addresses package tmp cfg
     */


    // flags that can be linked to addresses
    'flags' => array('primary', 'billing', 'shipping'),

    // whether or not to show country on address view/edit
    'show_country' => true,

    // Function to fetch currently logged in user. And $callback  to call_user_func is valid.
    'current_user_func' => '\Auth::user',

    // two letter code for the default country you want
    'default_country' => 'FR',

    // full name of the default country
    'default_country_name' => 'France',

    // if this is true, two things happen ..
    // 1. latitude and longitude will be saved into the address table
    // 2. saves run a bit slower because we have to hit google servers
    'geocode' => false,

    'user' => array(

        // user model class
        'model' => 'Modules\Users\Entities\User',

        // Function to fetch currently logged in user. Any valid $callback to call_user_func works here
        'current' => '\Auth::user',

    ),


];