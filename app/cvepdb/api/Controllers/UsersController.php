<?php

namespace App\CVEPDB\Api\Controllers;

use App\User;
use App\CVEPDB\Api\Transformers\UserTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class UsersController extends ApiGuardController
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
    }

    /**
     * curl --header "X-Authorization: 6f4ef411098fbb37743f27c4990a69ba4b5cb653" http://api.site.cvepdb.local/v1/users
     *
     * @return mixed
     */
    public function all()
    {
        $users = User::all();
        return $this->response->withCollection($users, new UserTransformer);
    }

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