<?php

namespace App\CVEPDB\Multigaming\Repositories;

use DB;

//use CVEPDB\Repositories\RepositoryInterface;

use App\CVEPDB\Multigaming\Models\User as UserModel;

/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class UserRepository //implements RepositoryInterface
{
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
        return UserModel::where($field, $value)->get($columns)->load('users');
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