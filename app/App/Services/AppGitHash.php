<?php

namespace bellumindustria\App\Services;

class AppGitHash
{

	/**
	 * @param $with_date
	 *
	 * @return string
	 */
	public static function get($with_date) {

		$commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));

		$commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
		$commitDate->setTimezone(new \DateTimeZone('UTC'));

		if ($with_date)
		{
			return sprintf(
				'v%s.%s.%s-dev.%s (%s)',
				config('version.major'),
				config('version.minor'),
				config('version.patch'),
				$commitHash,
				$commitDate->format('Y-m-d H:m')
			);
		}

		return sprintf(
			'v%s.%s.%s-dev.%s',
			config('version.major'),
			config('version.minor'),
			config('version.patch'),
			$commitHash
		);
	}
}
