<?php

namespace App\Api\Controllers;

use CVEPDB\Repositories\Users\User;
use App\CVEPDB\Api\Transformers\UserTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class UserController extends ApiGuardController
{
    private $current_user_id = 0;

    private $current_user_level = 0;

    private $obj_userTransformer = UserTransformer::class;

    protected $apiMethods = [
        'all' => [
            'logged' => true,
            'keyAuthentication' => true,
            'level' => 10
        ],
        'show' => [
            'logged' => true,
            'keyAuthentication' => true,
            'level' => 10
        ],
        'userProfile' => [
            'logged' => true,
            'keyAuthentication' => true,
            'level' => 1
        ],
    ];

    public function initialize()
    {
        $this->current_user_id = $this->apiKey->user_id;
        $this->current_user_level = $this->apiKey->level;

        switch ($this->current_user_level)
        {
            case 10:
            case 9:
            case 8:
            case 7:
            case 6:
            case 5:
            case 4:
            case 3:
            case 2:
            case 1:
            default:
                $this->obj_userTransformer = UserTransformer::class;
        }
    }

    /**
     * curl --header "X-Authorization: 24fd920af000948412f3b6cd1e0176ff7f327b11" http://api.site.cvepdb.local/v1/users
     *
     * @return mixed
     */
    public function index()
    {
        $users = User::all();
        return $this->response->withCollection($users, new $this->obj_userTransformer);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $users = User::findOrFail($id);
            return $this->response->withItem($users, new $this->obj_userTransformer);
        } catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /**
     * Return profile of current user
     *
     * curl --header "X-Authorization: 24fd920af000948412f3b6cd1e0176ff7f327b11" http://api.site.cvepdb.local/v1/users/profile
     */
    public function userProfile()
    {
        return $this->show($this->current_user_id);
    }
}