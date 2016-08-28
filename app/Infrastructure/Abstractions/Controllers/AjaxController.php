<?php namespace cms\Infrastructure\Abstractions\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

/**
 * Class AjaxController
 * @package cms\Infrastructure\Abstractions\Controllers
 */
class AjaxController extends ControllerAbstract
{

	/**
	 * DRY before method.
	 *
	 * - check if request is an ajax request, else 403 forbiden access returned.
	 */
	protected function _before()
	{
		if (!Request::ajax())
		{
			abort(403);
		}
	}

	/**
	 * DRY after method.
	 *
	 * - output data as JSON.
	 *
	 * @param array $data Data to output
	 *
	 * @return mixed
	 */
	protected function _after(array $data)
	{
		return Response::json($data);
	}

}
