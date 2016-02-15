<?php

namespace App\Api\Controllers;

use CVEPDB\Repositories\Users\User;
use App\CVEPDB\Api\Transformers\UserTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class UserController extends ApiGuardController
{
    protected $apiMethods = [
        'show' => [
            'keyAuthentication' => false,
            'level' => 10,
            'limits' => [
                'key' => [
                    'increment' => '1 hour',
                    'limit' => 100
                ],
                'method' => [
                    'increment' => '1 day',
                    'limit' => 1000
                ]
            ]
        ],
        'all' => [
            'logged' => true
        ]
    ];

    public function initialize()
    {
        // Get API key
        $this->apiKey;

        // Get user associated
        // Login user
        // Use Auth::user();

        // dd(Auth::user());
    }

    /**
     * curl --header "X-Authorization: e278c3a9cef3c4e8f1152bb255d3f5c6803d9a52" http://api.site.cvepdb.local/v1/users
     *
     * @return mixed
     */
    public function index()
    {
        $users = User::all();
        return $this->response->withCollection($users, new UserTransformer);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $users = User::findOrFail($id);
            return $this->response->withItem($users, new UserTransformer);
        } catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }
}