<?php

if (!function_exists('encrypt_tripledes'))
{
	/**
	 * Encrypt text - MCRYPT_TRIPLEDES
	 *
	 * @param string $text Text to encrypt
	 * @param string $key 24 bit Key
	 * @param string $iv 8 bit IV
	 * @param int    $bit_check bit amount for diff algo.
	 *
	 * @return string
	 */
	function encrypt_tripledes($text, $key, $iv, $bit_check)
	{
		$text_num = str_split($text, $bit_check);
		$text_num = $bit_check - strlen($text_num[count($text_num) - 1]);

		for ($i = 0; $i < $text_num; $i++)
		{
			$text = $text . chr($text_num);
		}

		$cipher = mcrypt_module_open(MCRYPT_TRIPLEDES, '', 'cbc', '');
		mcrypt_generic_init($cipher, $key, $iv);
		$decrypted = mcrypt_generic($cipher, $text);
		mcrypt_generic_deinit($cipher);

		return base64_encode($decrypted);
	}
}

if (!function_exists('decrypt_tripledes'))
{
	/**
	 * Decrypt text - MCRYPT_TRIPLEDES
	 *
	 * @param string $encrypted_text Text to decrypt
	 * @param string $key 24 bit Key
	 * @param string $iv 8 bit IV
	 * @param int    $bit_check bit amount for diff algo.
	 *
	 * @return string
	 */
	function decrypt_tripledes($encrypted_text, $key, $iv, $bit_check)
	{
		$cipher = mcrypt_module_open(MCRYPT_TRIPLEDES, '', 'cbc', '');
		mcrypt_generic_init($cipher, $key, $iv);
		$decrypted = mdecrypt_generic($cipher, base64_decode($encrypted_text));
		mcrypt_generic_deinit($cipher);
		$last_char = substr($decrypted, -1);

		for ($i = 0; $i < $bit_check - 1; $i++)
		{
			if (chr($i) == $last_char)
			{

				$decrypted = substr($decrypted, 0, strlen($decrypted) - $i);
				break;
			}
		}

		return $decrypted;
	}
}
