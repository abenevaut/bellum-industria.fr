<?php

namespace bellumindustria\Infrastructure\Interfaces\Domain\Providers;

interface ProvidersInterface
{
	const FACEBOOK = 'facebook';
	const TWITTER = 'twitter';
	const LINKEDIN = 'linkedin';
	const GOOGLE = 'google';
	const PROVIDERS = [
		self::FACEBOOK,
		self::TWITTER,
		self::LINKEDIN,
		self::GOOGLE,
	];
}
