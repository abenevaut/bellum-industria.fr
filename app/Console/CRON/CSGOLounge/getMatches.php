<?php

namespace App\Console\CRON\CSGOLounge;

use Illuminate\Console\Command;
use App\Admin\Repositories\SMWA\CSGOLoungeTeamsRepositoryEloquent;
use App\Admin\Repositories\SMWA\CSGOLoungeMatchesRepositoryEloquent;
use App\Admin\Repositories\SMWA\CSGOLoungeVictoriesRepositoryEloquent;

class getMatches extends Command
{
    private $r_teams = null;
    private $r_matches = null;
    private $r_victories = null;

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        App\Console\CRON\CSGOLounge\getMatches::class,
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csgolounge:matches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete DB with CSGOLounge data';

    public function __construct(
        CSGOLoungeTeamsRepositoryEloquent $r_teams,
        CSGOLoungeMatchesRepositoryEloquent $r_matches,
        CSGOLoungeVictoriesRepositoryEloquent $r_victories
    ) {
        parent::__construct();

        $this->r_teams = $r_teams;
        $this->r_matches = $r_matches;
        $this->r_victories = $r_victories;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment(PHP_EOL.$this->signature.' > Starting'.PHP_EOL);

        $res = json_decode(file_get_contents('http://csgolounge.com/api/matches'));

        foreach ($res as $match) {

            $this->comment($match->match.' ['.$match->when.'] > Analyzing');

            // StdObj :: {"match":"352","when":"2014-01-27 21:00:00","a":"RCTIC","b":"Wizards","winner":"b","closed":"1","event":"ESEA","format":"1"}

            if (!$this->r_matches->findWhere(['csgolounge_match_id' => $match->match])->count())
            {
                /*
                 * Creation des equipes
                 */

                if ( !($team_a = $this->r_teams->findWhere(['name' => $match->a])->first()) )
                {
                    $team_a = $this->r_teams->create(['name' => $match->a]);
                }

                if ( !($team_b = $this->r_teams->findWhere(['name' => $match->b])->first()) )
                {
                    $team_b = $this->r_teams->create(['name' => $match->b]);
                }

                /*
                 * Creation du match
                 */

                $created_match = $this->r_matches->create([
                    'csgolounge_match_id' => $match->match,
                    'date' => $match->when,
                    'format' => $match->format,
                    'event' => $match->event,
                    'ended' => $match->closed,
                ]);

                /*
                 * Creation du resultat du match
                 */

                if (!empty($match->winner)) {
                    $this->r_victories->create([
                        'match_id' => $created_match->id,
                        'team_winner' => ($match->winner == 'a') ? $team_a->id : $team_b->id,
                        'team_defeat' => ($match->winner == 'a') ? $team_b->id : $team_a->id,
                    ]);
                }

                $this->comment($match->match.' ['.$match->when.'] >>>> New match');

            }
            else if (
                ($thismatch = $this->r_matches->findWhere(['csgolounge_match_id' => $match->match, 'ended' => 0])->first())
                && $thismatch->count()
                && $match->closed = 1
            ) {
                /*
                 * Recuperation des teams
                 */
                $team_a = $this->r_teams->findWhere(['name' => $match->a])->first();
                $team_b = $this->r_teams->findWhere(['name' => $match->b])->first();

                /*
                 * Mise a jour du match apres reception des scores
                 */
                $created_match = $this->r_matches->update(['ended' => 1], $thismatch->id);

                /*
                 * Creation du resultat du match
                 */

                if (!empty($match->winner)) {
                    $this->r_victories->create([
                        'match_id' => $created_match->id,
                        'team_winner' => ($match->winner == 'a') ? $team_a->id : $team_b->id,
                        'team_defeat' => ($match->winner == 'a') ? $team_b->id : $team_a->id,
                    ]);
                }

                $this->comment($match->match.' ['.$match->when.'] >>>> Update match');

            }
        }

        $this->comment(PHP_EOL.$this->signature.' > End'.PHP_EOL);
    }
}
