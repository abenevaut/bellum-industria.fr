<?php

namespace App\Api\Controllers;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use App\Admin\Repositories\SMWA\CSGOLoungeTeamsRepositoryEloquent;
use App\Admin\Repositories\SMWA\CSGOLoungeMatchesRepositoryEloquent;
use App\Admin\Repositories\SMWA\CSGOLoungeVictoriesRepositoryEloquent;

class CSGOLoungeStatisticsController extends ApiGuardController
{
    private $r_teams = null;
    private $r_matches = null;
    private $r_victories = null;

    protected $apiMethods = [
        'get_csgoloung_matches_stats' => [
            'keyAuthentication' => false,
        ]
    ];

    public function __construct(
        CSGOLoungeTeamsRepositoryEloquent $r_teams,
        CSGOLoungeMatchesRepositoryEloquent $r_matches,
        CSGOLoungeVictoriesRepositoryEloquent $r_victories
    ) {
        $this->r_teams = $r_teams;
        $this->r_matches = $r_matches;
        $this->r_victories = $r_victories;
    }

    /**
     * @param $year
     * @return mixed
     */
    public function get_csgoloung_matches_stats()
    {
        //file_get_contents('http://csgolounge.com/api/matches_stats');

        $res = json_decode(file_get_contents('http://csgolounge.com/api/matches'));

//        foreach ($res as $match) {
//
//
//            // {"match":"352","when":"2014-01-27 21:00:00","a":"RCTIC","b":"Wizards","winner":"b","closed":"1","event":"ESEA","format":"1"}
//
//
//            if (!$this->r_matches->findWhere(['csgolounge_match_id' => $match->match])->count())
//            {
//                /*
//                 * Creation des equipes
//                 */
//
//                if (!($team_a = $this->r_teams->findWhere(['name' => $match->a])->first()) || !$team_a->count())
//                {
//                    $team_a = $this->r_teams->create(['name' => $match->a]);
//                }
//
//                if (!($team_b = $this->r_teams->findWhere(['name' => $match->b])->first()) || !$team_b->count())
//                {
//                    $team_b = $this->r_teams->create(['name' => $match->b]);
//                }
//
//                /*
//                 * Creation du match
//                 */
//
//                $created_match = $this->r_matches->create([
//                    'csgolounge_match_id' => $match->match,
//                    'date' => $match->when,
//                    'format' => $match->format,
//                    'event' => $match->event,
//                    'ended' => $match->closed,
//                ]);
//
//                /*
//                 * Creation du resultat du match
//                 */
//
//                if (!empty($match->winner)) {
//                    $this->r_victories->create([
//                        'match_id' => $created_match->id,
//                        'team_winner' => ($match->winner == 'a') ? $team_a->id : $team_b->id,
//                        'team_defeat' => ($match->winner == 'a') ? $team_b->id : $team_a->id,
//                    ]);
//                }
//
//            }
//            else if (
//                ($thismatch = $this->r_matches->findWhere(['csgolounge_match_id' => $match->match, 'ended' => 0])->first())
//                && $thismatch->count()
//                && $match->closed = 1
//            ) {
//                /*
//                 * Recuperation des teams
//                 */
//                $team_a = $this->r_teams->findWhere(['name' => $match->a])->first();
//                $team_b = $this->r_teams->findWhere(['name' => $match->b])->first();
//
//                /*
//                 * Mise a jour du match apres reception des scores
//                 */
//                $created_match = $this->r_matches->update(['ended' => 1], $thismatch->id);
//
//                /*
//                 * Creation du resultat du match
//                 */
//
//                if (!empty($match->winner)) {
//                    $this->r_victories->create([
//                        'match_id' => $created_match->id,
//                        'team_winner' => ($match->winner == 'a') ? $team_a->id : $team_b->id,
//                        'team_defeat' => ($match->winner == 'a') ? $team_b->id : $team_a->id,
//                    ]);
//                }
//            }
//
//        }

        return $res;
    }
}
