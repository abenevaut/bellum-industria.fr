<?php

return [

	// flags that can be linked to addresses ['primary', 'billing', 'shipping']
	'flags'           => [
		'primary',
		'billing',
		'shipping',
	],

	// whether or not to show country on address view/edit
	'show_country'    => true,

	// two letter code for the default country you want
	'default_country' => 'FR',

	'address' => [
		// address model class
		'model' => 'CVEPDB\Addresses\Domain\Addresses\Addresses\Address'
	],

	// if this is true, two things happen ..
	// 1. latitude and longitude will be saved into the address table
	// 2. saves run a bit slower because we have to hit google servers
	'geocode' => false,

];