<?php

return [
	// flags that can be linked to addresses ['primary', 'billing', 'shipping']
	'flags'                => ['primary', 'billing', 'shipping'],

	// whether or not to show country on address view/edit
	'show_country'         => true,

	// Function to fetch currently logged in user. And $callback  to call_user_func is valid.
	'current_user_func'    => '\Auth::user',

	// two letter code for the default country you want
	'default_country'      => 'FR',

	// full name of the default country
	'default_country_name' => 'France',

	// if this is true, two things happen ..
	// 1. latitude and longitude will be saved into the address table
	// 2. saves run a bit slower because we have to hit google servers
	'geocode'              => false,

	'user' => array(
		// user model class
		'model'   => 'Core\Domain\Users\Entities\User',
		// Function to fetch currently logged in user. Any valid $callback to call_user_func works here
		'current' => '\Auth::user',
	),
];
