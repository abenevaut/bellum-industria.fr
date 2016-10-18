<?php

return [
	'keys' => [
		'media' => [
			/*
			 * 24 bit Key pour l'authetifications des utilisateurs qui recoivent les mails d'evaluations de la plateforme
			 */
			'encrypt_key' => env('MCRYPT_TRIPLEDES_MEDIAS_ENCRYPT_KEY'),
			/*
			 * 8 bit IV pour l'authetifications des utilisateurs qui recoivent les mails d'evaluations de la plateforme
			 */
			'iv'          => env('MCRYPT_TRIPLEDES_MEDIAS_IV'),
			/*
			 * Bit amount for diff algo. pour l'authetifications des utilisateurs qui recoivent les mails d'evaluations de la plateforme
			 */
			'bit_check'   => env('MCRYPT_TRIPLEDES_MEDIAS_BIT_CHECK', 8),
		]
	]
];
