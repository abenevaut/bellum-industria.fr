<?php

namespace App\Multigaming\Repositories;

use GuzzleHttp\Client as GuzzleHttpClient;

use Steam\Configuration;
use Steam\Runner\GuzzleRunner;
use Steam\Runner\DecodeJsonStringRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class SteamRepository //implements RepositoryInterface
{
    /**
     * @var null|Steam
     */
    private $steam = null;

    public function __construct()
    {
        $this->steam = new Steam(new Configuration([Configuration::STEAM_KEY => env('STEAM_APIKEY')]));
        $this->steam->addRunner(new GuzzleRunner(new GuzzleHttpClient(), new GuzzleUrlBuilder()));
        $this->steam->addRunner(new DecodeJsonStringRunner());
    }

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
        $client = new GuzzleHttpClient();
        $group_page = $client->request('GET', 'http://steamcommunity.com/groups/' . $group_name . '/discussions', []);

        $html = $group_page->getBody();

        $doc = new \DOMDocument('1.0', 'UTF-8');
        $doc->loadHTML(trim(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')));

        $divs = $doc->getElementsByTagName('div');

        $index = 0;
        $threads = array();
        while ($div = $divs->item($index++)) {
            $class_node = $div->attributes->getNamedItem('class');

            if ($class_node && 'forum_topics' === $div->attributes->getNamedItem('class')->value)
            {
                foreach ($div->childNodes as $child)
                {
                    $html_tmp = $child->ownerDocument->saveHTML($child);

                    if (empty(trim($html_tmp))) continue;

                    $doc2 = new \DOMDocument('1.0', 'UTF-8');
                    $doc2->loadHTML(
                        mb_convert_encoding(
                            $child->ownerDocument->saveHTML($child),
                            'HTML-ENTITIES',
                            'UTF-8'
                        )
                    );

                    $divs_content = $doc2->getElementsByTagName('div');

                    $i = 0;
                    while ($div_content = $divs_content->item($i++))
                    {
                        $div_content_class_node = $div_content->attributes->getNamedItem('class');

                        if (
                            $div_content_class_node
                            && !strncmp(
                                'forum_topic ',
                                $div_content->attributes->getNamedItem('class')->value,
                                strlen('forum_topic ')
                            )
                        ) {
                            $doc3 = new \DOMDocument('1.0', 'UTF-8');
                            $doc3->loadHTML(
                                mb_convert_encoding(
                                    $div_content->attributes->getNamedItem('data-tooltip-content')->value,
                                    'HTML-ENTITIES',
                                    'UTF-8'
                                )
                            );

                            $divs_toggle = $doc3->getElementsByTagName('div');

                            $i = 0;
                            while ($div_toggle = $divs_toggle->item($i++))
                            {
                                $div_toggle_class_node = $div_toggle->attributes->getNamedItem('class');

                                if (
                                    $div_toggle_class_node
                                    && 'topic_hover_text' === $div_toggle->attributes->getNamedItem('class')->value
                                ) {
                                    foreach ($div_toggle->childNodes as $div_content_child)
                                    {
                                        $threads[$index]['intro'] = trim(
                                            $div_content_child->ownerDocument->saveHTML($div_content_child)
                                        );
                                        substr(
                                            $threads[$index]['intro'],
                                            0,
                                            strpos(wordwrap($threads[$index]['intro'], 10), "...")
                                        );
                                    }
                                }
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_lastpost' === $div_content->attributes->getNamedItem('class')->value
                        ) {
                            foreach ($div_content->childNodes as $div_content_child) {
                                $time = explode('@', trim($div_content_child->ownerDocument->saveHTML($div_content_child)));
                                $threads[$index]['created'] = strtotime(trim($time[0]));
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_name ' === $div_content->attributes->getNamedItem('class')->value
                        ) {
                            foreach ($div_content->childNodes as $div_content_child) {
                                $threads[$index]['title'] = trim($div_content_child->ownerDocument->saveHTML($div_content_child));
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_op' === $div_content->attributes->getNamedItem('class')->value
                        ) {
                            foreach ($div_content->childNodes as $div_content_child) {
                                $threads[$index]['author'] = trim($div_content_child->ownerDocument->saveHTML($div_content_child));
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_reply_count' === $div_content->attributes->getNamedItem('class')->value
                        ) {

                            foreach ($div_content->childNodes as $div_content_child)
                            {
                                if (is_numeric(trim($div_content_child->ownerDocument->saveHTML($div_content_child)))) {
                                    $threads[$index]['nb_answers'] = trim($div_content_child->ownerDocument->saveHTML($div_content_child));
                                }
                            }
                        }
                    }

                    $divs_content = $doc2->getElementsByTagName('a');

                    $i = 0;
                    while ($div_content = $divs_content->item($i++))
                    {
                        $div_content_class_node = $div_content->attributes->getNamedItem('class');

                        if (
                            $div_content_class_node
                            && 'forum_topic_overlay' === $div_content->attributes->getNamedItem('class')->value
                        ) {
                            $threads[$index]['url'] = trim($div_content->attributes->getNamedItem('href')->value);
                        }
                    }

                    $index++;
                }
            }
        }

        if (is_numeric($perPage) && $perPage > 0) {
            $threads = array_slice($threads, 0, $perPage);
        }
        return $threads;
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

    /**
     * @param array|int $steam_id
     */
    public function playerSummaries($steam_id)
    {
        $is_array = true;

        if (!($is_array = is_array($steam_id))) {
            $steam_id = [$steam_id];
        }

        $result = $this->steam->run(new \Steam\Command\User\GetPlayerSummaries($steam_id));

        return $is_array ? $result : $result['response']['players'][0];
    }

    public function test()
    {
        /** @var array $result */
//        $result = $this->steam->run(new \Steam\Command\Apps\GetAppList());
//        $result = $this->steam->run(new \Steam\Command\Apps\GetServersAtAddress('62.210.71.164:27015'));
        $result = $this->steam->run(new \Steam\Command\CSGOServers\GetGameServersStatus());

        dd($result); exit;
    }
}