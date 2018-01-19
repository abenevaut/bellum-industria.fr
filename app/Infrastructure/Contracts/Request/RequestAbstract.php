<?php namespace abenevaut\Infrastructure\Contracts\Request;

use Illuminate\Foundation\Http\FormRequest;

abstract class RequestAbstract extends FormRequest
{

	/**
	 * {inherit}
	 *
	 * @param string $key
	 * @param null $default
	 *
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		return parent::get($key, $default);
	}

	/**
	 * {inherit}
	 *
	 * @param array|string $key
	 *
	 * @return bool
	 */
	public function has($key)
	{
		return parent::has($key);
	}
}
