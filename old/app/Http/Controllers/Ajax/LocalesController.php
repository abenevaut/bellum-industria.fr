<?php namespace bellumindustria\Http\Controllers\Ajax;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Infrastructure\Interfaces\Domain\Locale\LocalesInterface;

class LocalesController extends ControllerAbstract
{

	/**
	 * LocalesController constructor.
	 */
	public function __construct()
	{
		$this->before();
	}

	/**
	 * Get an times zones list.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$localeList = LocalesInterface::LOCALES;

		return response()->json($localeList);
	}
}
