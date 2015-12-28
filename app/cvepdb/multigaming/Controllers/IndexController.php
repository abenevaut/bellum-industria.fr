<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App\CVEPDB\Interfaces\Controllers\AbsBaseController as BaseController;


use GuzzleHttp\Client;
use Steam\Configuration;
use Steam\Runner\GuzzleRunner;
use Steam\Runner\DecodeJsonStringRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

class IndexController extends BaseController
{
    public function __construct() {
        parent::__construct();

        $this->breadcrumbs->removeAll();
        $this->breadcrumbs->addCrumb('Home', 'multigaming/');
    }

    public function index()
    {





        $steam = new Steam(new Configuration([Configuration::STEAM_KEY => 'C884A1B1B3EEDABFCFDB889C17FFEE10']));
        $steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));
        $steam->addRunner(new DecodeJsonStringRunner());

        /** @var array $result */
//        $result = $steam->run(new \Steam\Command\Apps\GetAppList());
//        $result = $steam->run(new \Steam\Command\Apps\GetServersAtAddress('62.210.71.164:27015'));
//        $result = $steam->run(new \Steam\Command\CSGOServers\GetGameServersStatus());
        $result = $steam->run(new \Steam\Command\User\GetPlayerSummaries([76561197987229786]));

        dd($result); exit;











        /***/


        $limit = 4;
        $group_name = 'Bellum-Industria';

        $client = new \GuzzleHttp\Client();
        $group_page = $client->request('GET', 'http://steamcommunity.com/groups/' . $group_name . '/discussions', []);

//        echo $group_page->getStatusCode();
//        echo $group_page->getHeader('content-type');
//        echo $group_page->getBody();

        $html = $group_page->getBody();

        $doc = new \DOMDocument('1.0', 'UTF-8');
        $doc->loadHTML(trim(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')));

        $divs = $doc->getElementsByTagName('div');

        $index   = 0;
        $threads = array();
        while ($div = $divs->item($index++)) {
            $class_node = $div->attributes->getNamedItem('class');

            if ($class_node && 'forum_topics' === $div->attributes->getNamedItem('class')->value) {
//				echo "Class is : " . $div->attributes->getNamedItem('class')->value . PHP_EOL;

//				echo 'forum_topic_overlay : '
//				  . trim($div->attributes->getNamedItem('href')->value)
//				  . PHP_EOL;


                foreach ($div->childNodes as $child) {
                    //var_dump($child->ownerDocument->saveHTML($child));

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

                    $i       = 0;
                    while ($div_content = $divs_content->item($i++)) {
//						echo "Class is : "
//						  . $div_content->attributes->getNamedItem('class')->value
//						  . PHP_EOL;

                        $div_content_class_node = $div_content->attributes->getNamedItem('class');

                        if (
                            $div_content_class_node
                            && !strncmp(
                                'forum_topic ',
                                $div_content->attributes->getNamedItem('class')->value,
                                strlen('forum_topic ')
                            )
                        ) {

                            //echo $div_content->attributes->getNamedItem('data-tooltip-content')->value;

                            $doc3 = new \DOMDocument('1.0', 'UTF-8');
                            $doc3->loadHTML(
                                mb_convert_encoding(
                                    $div_content->attributes->getNamedItem('data-tooltip-content')->value,
                                    'HTML-ENTITIES',
                                    'UTF-8'
                                )
                            );

                            $divs_toggle = $doc3->getElementsByTagName('div');

                            $i       = 0;
                            while ($div_toggle = $divs_toggle->item($i++)) {

                                $div_toggle_class_node = $div_toggle->attributes->getNamedItem('class');

                                if (
                                    $div_toggle_class_node
                                    && 'topic_hover_text' === $div_toggle->attributes->getNamedItem('class')->value
                                ) {


                                    foreach ($div_toggle->childNodes as $div_content_child) {

                                        //var_dump($div_content_child->ownerDocument->saveHTML($div_content_child)); exit;


                                        $threads[$index]['intro'] = trim(
                                            $div_content_child->ownerDocument->saveHTML($div_content_child)
                                        );

                                        //$threads[$index]['intro'] = mb_convert_encoding($threads[$index]['intro'], 'ISO-8859-1', 'UTF-8');

                                       // dd($threads[$index]['intro']);

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
//								echo 'forum_topic_lastpost : '
//								  . trim($div_content_child->ownerDocument->saveHTML($div_content_child))
//								  . PHP_EOL;
//
//								echo 'forum_topic_lastpost : '
//								  . strtotime(
//									str_replace('@', '', trim($div_content_child->ownerDocument->saveHTML($div_content_child)))
//								  )
//								  . PHP_EOL;

                                $time = explode('@', trim($div_content_child->ownerDocument->saveHTML($div_content_child)));
                                $threads[$index]['created'] = strtotime(trim($time[0]));
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_name ' === $div_content->attributes->getNamedItem('class')->value
                        ) {

                            foreach ($div_content->childNodes as $div_content_child) {
//								echo 'forum_topic_name  : '
//								  . trim($div_content_child->ownerDocument->saveHTML($div_content_child))
//								  . PHP_EOL;

                                $threads[$index]['title'] = trim($div_content_child->ownerDocument->saveHTML($div_content_child));
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_op' === $div_content->attributes->getNamedItem('class')->value
                        ) {

                            foreach ($div_content->childNodes as $div_content_child) {
//								echo 'forum_topic_op  : '
//								  . trim($div_content_child->ownerDocument->saveHTML($div_content_child))
//								  . PHP_EOL;

                                $threads[$index]['author'] = trim($div_content_child->ownerDocument->saveHTML($div_content_child));
                            }
                        } else if (
                            $div_content_class_node
                            && 'forum_topic_reply_count' === $div_content->attributes->getNamedItem('class')->value
                        ) {

                            foreach ($div_content->childNodes as $div_content_child) {
                                if (is_numeric(trim($div_content_child->ownerDocument->saveHTML($div_content_child)))) {
//									echo 'forum_topic_reply_count  : '
//									  . trim($div_content_child->ownerDocument->saveHTML($div_content_child))
//									  . PHP_EOL;

                                    $threads[$index]['nb_answers'] = trim($div_content_child->ownerDocument->saveHTML($div_content_child));
                                }
                            }
                        }

                    }

                    $divs_content = $doc2->getElementsByTagName('a');

                    $i       = 0;
                    while ($div_content = $divs_content->item($i++)) {
//						echo "Class is : "
//						  . $div_content->attributes->getNamedItem('class')->value
//						  . PHP_EOL;

                        $div_content_class_node = $div_content->attributes->getNamedItem('class');

                        if (
                            $div_content_class_node
                            && 'forum_topic_overlay' === $div_content->attributes->getNamedItem('class')->value
                        ) {

//							echo 'forum_topic_overlay : '
//							  . trim($div_content->attributes->getNamedItem('href')->value)
//							  . PHP_EOL;

                            $threads[$index]['url'] = trim($div_content->attributes->getNamedItem('href')->value);

                        }

                    }

                    $index++;
                }
            }
        }

        //var_dump($threads); exit;

        if (is_numeric($limit) && $limit > 0) {
            $threads = array_slice($threads, 0, $limit);
        }


        return view('cvepdb.multigaming.index', ['breadcrumbs' => $this->breadcrumbs, 'threads' => $threads]);
    }

    public function boutique()
    {
        $this->breadcrumbs->addCrumb('Boutique', 'multigaming/boutique');
        return view('cvepdb.multigaming.boutique', ['breadcrumbs' => $this->breadcrumbs]);
    }
}