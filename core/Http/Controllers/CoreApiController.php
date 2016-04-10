<?php namespace Core\Http\Controllers;

use Chrisbjr\ApiGuard\Facades\ApiGuardAuth;
use Chrisbjr\ApiGuard\Builders\ApiResponseBuilder;
use EllipseSynergie\ApiResponse\Laravel\Response;

/**
 * Copy of Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
 *
 * Class CoreApiController
 * @package Modules\Core\Http\Controllers
 */
class CoreApiController extends CoreController
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