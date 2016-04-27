<?php namespace modules\Installer\Repositories;

/**
 * Class InstallerRepositoryTest
 * @package modules\Installer\Repositories
 *
 * @env installer
 */
class InstallerRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * @env installer
     */
    public function testMe()
    {
        $this->assertEquals(true, 1);
    }
}
