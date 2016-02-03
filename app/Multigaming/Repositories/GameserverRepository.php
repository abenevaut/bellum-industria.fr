<?php

namespace App\CVEPDB\Multigaming\Repositories;

//use CVEPDB\Repositories\RepositoryInterface;

use xPaw\SourceQuery\SourceQuery as SourceQuery;

/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class GameServerRepository //implements RepositoryInterface
{
    /**
     * @param array $columns
     * @return $this
     */
    public function all(array $columns = array('*'))
    {
        return null;
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($group_name, $perPage = 15, $columns = array('*'))
    {
        return null;
    }

    /**
     * @param array $data
     * @return static
     */
    public function create(array $data)
    {
        return null;
    }

    /**
     * @param TeamModel $team
     * @param array $data
     * @return bool|int
     */
    public function update(TeamModel $team, array $data)
    {
        return null;
    }

    /**
     * @param TeamModel $team
     * @return bool|null
     * @throws \Exception
     */
    public function delete(TeamModel $team)
    {
        return null;
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {


        // Edit this ->
        define( 'SQ_SERVER_ADDR', '62.210.71.164' );
        define( 'SQ_SERVER_PORT', 27015 );
        define( 'SQ_TIMEOUT',     3 );
        define( 'SQ_ENGINE',      SourceQuery::SOURCE );
        // Edit this <-

        $Timer = MicroTime( true );

        $Query = new SourceQuery( );

        $Info    = Array( );
        $Rules   = Array( );
        $Players = Array( );

        try
        {
            $Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
            //$Query->SetUseOldGetChallengeMethod( true ); // Use this when players/rules retrieval fails on games like Starbound

            $Info    = $Query->GetInfo( );
            $Players = $Query->GetPlayers( );
            $Rules   = $Query->GetRules( );
        }
        catch( Exception $e )
        {
            $Exception = $e;
        }
        finally
        {
            $Query->Disconnect( );
        }

        $Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );

        dd($Info);

        return null;
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = array('*'))
    {
        return null;
    }

    /**
     * @param $team_id
     * @return bool|null
     */
    public function deleteById($team_id)
    {
        return null;
    }
}