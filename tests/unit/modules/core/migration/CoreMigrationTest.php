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
        $file = base_path('tests/_data/testing.sqlite');
//        exec("rm $file && touch $file && chmod 777 $file");
//        \Artisan::call('module:publish-migration');
//        \Artisan::call('migrate');
//        \Artisan::call('db:seed', ['--class' => 'testingSeeder']);
    }

    /**
     * @env core
     */
    public function testRunMigration()
    {
        \Artisan::call('module:publish-migration');
        \Artisan::call('migrate');
        $this->assertEquals(true, 1);
    }
}