<?php

namespace bellumindustria\Infrastructure\Interfaces\Domain\Providers;

interface ProvidersInterface
{
	const FACEBOOK = 'facebook';
	const TWITTER = 'twitter';
	const GOOGLE = 'google';
	const STEAM = 'steam';
	const PROVIDERS = [
		self::FACEBOOK,
		self::TWITTER,
		self::GOOGLE,
		self::STEAM,
	];
}
