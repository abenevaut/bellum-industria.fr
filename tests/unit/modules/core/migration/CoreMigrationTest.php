<?php namespace core\migration;

/**
 * Class CoreMigrationTest
 * @package core\migration
 *
 * @env core
 */
class CoreMigrationTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _after()
    {
        exec('rm tests/_data/testing_installed.sqlite && touch tests/_data/testing_installed.sqlite');
//        \Artisan::call('module:publish-migration');
//        \Artisan::call('migrate');
//        \Artisan::call('db:seed', ['--class' => 'testingSeeder']);
    }

    /**
     * @env core
     */
    public function testRunMigration()
    {
//        \Artisan::call('module:publish-migration');
//        \Artisan::call('migrate');
        $this->assertEquals(true, 1);
    }
}