<?php

namespace App\CVEPDB\Multigaming\Repositories;

//use CVEPDB\Repositories\RepositoryInterface;

use App\CVEPDB\Multigaming\Models\Team as TeamModel;

/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class TeamRepository //implements RepositoryInterface
{
    /**
     * @param array $columns
     * @return $this
     */
    public function all(array $columns = array('*'))
    {
        return TeamModel::all($columns)->load('users');
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return TeamModel::paginate($perPage)->load('users');
    }

    /**
     * @param array $data
     * @return static
     */
    public function create(array $data)
    {
        return TeamModel::create($data);
    }

    /**
     * @param TeamModel $team
     * @param array $data
     * @return bool|int
     */
    public function update(TeamModel $team, array $data)
    {
        return $team->update($data);
    }

    /**
     * @param TeamModel $team
     * @return bool|null
     * @throws \Exception
     */
    public function delete(TeamModel $team)
    {
        // Delete pivot table entries
        $team->users()->detach();
        return $team->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return TeamModel::findOrFail($id)->load('users');
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = array('*'))
    {
        return TeamModel::where($field, $value)->get($columns)->load('users');
    }

    /**
     * @param $team_id
     * @return bool|null
     */
    public function deleteById($team_id)
    {
        $team = $this->find($team_id);
        return $this->delete($team);
    }

    /**
     * @param $team_id
     * @param $user_id
     * @return mixed
     */
    public function addTeamMember($team_id, $user_id) {
        $team = $this->find($team_id);
        return $team->users()->attach($user_id);
    }

    /**
     * @param $team_id
     * @param $user_id
     * @return mixed
     */
    public function removeTeamMember($team_id, $user_id) {
        $team = $this->find($team_id);
        return $team->users()->detach($user_id);
    }
}