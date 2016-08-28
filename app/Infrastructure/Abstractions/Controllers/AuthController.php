<?php namespace cms\Infrastructure\Abstractions\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class AuthController
 * @package cms\Infrastructure\Abstractions\Controllers
 */
class AuthController extends ControllerAbstract
{

	use AuthorizesRequests;
	use DispatchesJobs;
	use ValidatesRequests;

}
