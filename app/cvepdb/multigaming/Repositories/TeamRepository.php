<?php

namespace App\CVEPDB\Multigaming\Repositories;

//use CVEPDB\Repositories\RepositoryInterface;

use App\CVEPDB\Multigaming\Models\User as UserModel;
use App\CVEPDB\Multigaming\Models\Team as TeamModel;

class TeamRepository //implements RepositoryInterface
{
    public function all(array $columns = array('*'))
    {
        return TeamModel::all($columns)->load('users');
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return TeamModel::paginate($perPage)->load('users');
    }

    public function create(array $data)
    {
        return TeamModel::create($data);
    }

    public function update(TeamModel $team, array $data)
    {
        return $team->update($data);
    }

    public function delete(TeamModel $team)
    {
        // Delete pivot table entries
        $team->users()->detach();
        return $team->delete();
    }

    public function find($id, $columns = array('*'))
    {
        return TeamModel::findOrFail($id)->load('users');
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        return TeamModel::where($field, $value)->get($columns)->load('users');
    }
}