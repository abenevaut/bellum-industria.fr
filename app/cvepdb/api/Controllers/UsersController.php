<?php

namespace App\CVEPDB\Api\Controllers;

use Mail;
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