<?php

namespace abenevaut\App\Traits;

use Illuminate\Support\Facades\Crypt;

trait SecurityHashTrait
{

	/**
	 * @param $data
	 *
	 * @return string
	 */
	protected function createHash($data)
	{
		$data = serialize($data);

		$hash = Crypt::encryptString($data);

		return base64_encode($hash);
	}

	/**
	 * @param $hash
	 *
	 * @return mixed
	 */
	protected function readHash($hash)
	{
		$hash = base64_decode($hash);

		$str_decrypt = Crypt::decryptString($hash);

		return unserialize($str_decrypt);
	}
}
