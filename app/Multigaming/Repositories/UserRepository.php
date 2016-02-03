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
            'email' => $new_user['email'],
        ]);
        $this->attach_user_to_role($user, RoleRepository::GAMER_USER);
    }

    /**
     * Create a new user with role RoleRepository::CLIENT
     *
     * @param $new_user ['first_name', 'last_name', 'email']
     */
    public function create_gamer_admin($new_user)
    {
        $user = User::create([
            'first_name' => $new_user['first_name'],
            'last_name' => $new_user['last_name'],
            'email' => $new_user['email'],
        ]);
        $this->attach_user_to_role($user, RoleRepository::GAMER_ADMIN);
    }

    protected function attach_user_to_role($user, $role)
    {
        $client = RoleRepository::role_exists($role);
        $user->attachRole($client);
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function all(array $columns = array('*'))
    {
        return UserModel::all($columns)->load('teams');
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function dropdown()
    {
        return UserModel::select('id', DB::raw('CONCAT(last_Name, " ", first_Name) AS full_name'))
            ->orderBy('last_name', 'asc')
            ->lists('full_name', 'id');
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return UserModel::paginate($perPage)->load('teams');
    }

    /**
     * @param array $data
     * @return static
     */
    public function create(array $data)
    {
        return UserModel::create($data);
    }

    /**
     * @param UserModel $team
     * @param array $data
     * @return bool|int
     */
    public function update(UserModel $user, array $data)
    {
        return $user->update($data);
    }

    /**
     * @param UserModel $team
     * @return bool|null
     * @throws \Exception
     */
    public function delete(UserModel $user)
    {
        // Delete pivot table entries
        $user->teams()->detach();
        return $user->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return UserModel::findOrFail($id)->load('users');
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = array('*'))
    {
        return UserModel::where($field, $value)->get($columns)->load('teams');
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findUniqueBy($field, $value, $columns = array('*'))
    {
        return UserModel::where($field, $value)->get($columns)->load('teams')->first();
    }

    /**
     * @param $team_id
     * @return bool|null
     */
    public function deleteById($user_id)
    {
        $user = $this->find($user_id);
        return $this->delete($user);
    }

    /**
     * @param $user_id
     * @param $team_id
     * @return mixed
     */
    public function addTeamMember($user_id, $team_id) {
        $user = $this->find($user_id);
        return $user->teams()->attach($team_id);
    }

    /**
     * @param $team_id
     * @param $user_id
     * @return mixed
     */
    public function removeTeamMember($user_id, $team_id) {
        $user = $this->find($user_id);
        return $user->teams()->detach($team_id);
    }
}