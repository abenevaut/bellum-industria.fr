<?php

namespace App\Multigaming\Repositories;

use DB;
use Illuminate\Container\Container as Application;
use CVEPDB\Repositories\Users\UserRepositoryEloquent;
use App\Multigaming\Repositories\RoleRepository;
use App\Multigaming\Models\User;


/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class UserRepository extends UserRepositoryEloquent
{
    /**
     * @var null RoleRepositoryEloquent
     */
    private $r_roles = null;

    public function __construct(Application $app, RoleRepository $r_roles)
    {
        parent::__construct($app, $r_roles);

        $this->r_roles = $r_roles;
    }

    /**
     * Create a new user with role RoleRepository::USER
     *
     * @param $new_user ['first_name', 'last_name', 'email']
     */
    public function create_gamer($new_user)
    {
        $user = User::create([
            'first_name' => $new_user['first_name'],
            'last_name' => $new_user['last_name'],
            'steam_token' => $new_user['steam_token'],
        ]);
        $this->attach_user_to_role($user, RoleRepository::GAMER_USER);
        return $user;
    }

    /**
     * Create a new user with role RoleRepository::CLIENT
     *
     * @param $new_user ['first_name', 'last_name', 'email']
     */
//    public function create_gamer_admin($new_user)
//    {
//        $user = User::create([
//            'first_name' => $new_user['first_name'],
//            'last_name' => $new_user['last_name'],
//            'email' => $new_user['email'],
//            'steam_token' => $new_user['steam_token'],
//        ]);
//        $this->attach_user_to_role($user, RoleRepository::GAMER_ADMIN);
//        return $user;
//    }

    protected function attach_user_to_role($user, $role)
    {
        $client = $this->r_roles->role_exists($role);
        $user->attachRole($client);
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function dropdown()
    {
        return User::all()->lists('full_name', 'id');
    }
}