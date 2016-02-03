<?php

namespace App\Multigaming\Repositories;

use DB;
use CVEPDB\Repositories\Users\UserRepositoryEloquent;
use App\Multigaming\Repositories\RoleRepository;
use App\Multigaming\Models\User as UserModel;

/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class UserRepository extends UserRepositoryEloquent
{

//    /**
//     * Create a new user with role RoleRepository::USER
//     *
//     * @param $new_user ['first_name', 'last_name', 'email']
//     */
//    public function create_gamer($new_user)
//    {
//        $user = User::create([
//            'first_name' => $new_user['first_name'],
//            'last_name' => $new_user['last_name'],
//            'email' => $new_user['email'],
//        ]);
//        $this->attach_user_to_role($user, RoleRepository::GAMER_USER);
//    }
//
//    /**
//     * Create a new user with role RoleRepository::CLIENT
//     *
//     * @param $new_user ['first_name', 'last_name', 'email']
//     */
//    public function create_gamer_admin($new_user)
//    {
//        $user = User::create([
//            'first_name' => $new_user['first_name'],
//            'last_name' => $new_user['last_name'],
//            'email' => $new_user['email'],
//        ]);
//        $this->attach_user_to_role($user, RoleRepository::GAMER_ADMIN);
//    }
//
//    protected function attach_user_to_role($user, $role)
//    {
//        $client = RoleRepository::role_exists($role);
//        $user->attachRole($client);
//    }
//
//    /**
//     * @param array $columns
//     * @return $this
//     */
//    public function all(array $columns = array('*'))
//    {
//        return UserModel::all($columns)->load('teams');
//    }
//
//    /**
//     * @param array $columns
//     * @return $this
//     */
//    public function dropdown()
//    {
//        return UserModel::select('id', DB::raw('CONCAT(last_Name, " ", first_Name) AS full_name'))
//            ->orderBy('last_name', 'asc')
//            ->lists('full_name', 'id');
//    }
}