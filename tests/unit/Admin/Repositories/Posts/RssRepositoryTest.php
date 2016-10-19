<?php
namespace RssRepository;

use Helper\Factory;
use App\Admin\Repositories\Posts\RssRepository;

class RssRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $r_rss = null;

    protected function _before() {

        $this->r_rss = new RssRepository();

    }

    protected function _after() {
    }

    /**
     *
     */
    public function testget_cvepdb_blog_items()
    {
        $items = $this->r_rss->get_cvepdb_blog_items();
        $this->assertEquals(4, count($items));
    }

}