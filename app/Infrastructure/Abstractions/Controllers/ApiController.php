<?php namespace cms\Infrastructure\Abstractions\Controllers;

use Chrisbjr\ApiGuard\Facades\ApiGuardAuth;
use Chrisbjr\ApiGuard\Builders\ApiResponseBuilder;
use EllipseSynergie\ApiResponse\Laravel\Response;

/**
 * Class ApiController
 * @package cms\Infrastructure\Abstractions\Controllers
 * @seealso \Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController
 */
class ApiController extends ControllerAbstract
{

	/**
	 * @var Response
	 */
	public $response;

	/**
	 * @var User The authenticated user
	 */
	public $user;

	/**
	 * @var array
	 */
	protected $apiMethods;

	/**
	 * CoreApiController constructor.
	 */
	public function __construct()
	{
		$serializedApiMethods = serialize($this->apiMethods);

		// Launch middleware
		$this->middleware('apiguard:' . $serializedApiMethods);

		// Attempt to get an authenticated user.
		$this->user = ApiGuardAuth::getUser();

		$this->response = ApiResponseBuilder::build();
	}

}
