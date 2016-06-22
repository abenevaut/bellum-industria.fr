<?php namespace core\migration;

/**
 * Class CoreMigrationTest
 * @package core\migration
 *
 * @group core
 */
class CoreMigrationTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @env core
     * @group migration
     */
    public function testRunMigration()
    {
        \Artisan::call('module:publish-migration');
        \Artisan::call('migrate');
        $this->assertEquals(true, 1);
    }
}
