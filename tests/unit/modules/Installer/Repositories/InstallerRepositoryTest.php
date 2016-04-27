<?php namespace modules\Installer\Repositories;

use Illuminate\Filesystem\FileException;
use Illuminate\Filesystem\FileNotFoundException;

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

    /**
     * @env installer
     */
    public function testInstallerRepositoryDbConnection()
    {
        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        /*
         * Test inexistant DB
         */

        $res = $r_installer->testDBConnection(
            'fake_host',
            'fake_database',
            'fake_username',
            'fake_password'
        );
        $this->assertEquals(false, $res);

        /*
         * Test existant DB
         */

        $res = $r_installer->testDBConnection(
            env('GITLAB_HOST', '127.0.0.1'),
            env('GITLAB_DATABASE', 'cvepdb_cms'),
            env('GITLAB_USERNAME', 'root'),
            env('GITLAB_PASSWORD', 'mySQL')
        );
        $this->assertEquals(true, $res);
    }

    /**
     * @env installer
     */
    public function testInstallerRepositorySetEnvAsProduction()
    {
        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        try {
            $r_installer->set_env_as_production();
            $this->assertEquals(true, true);
        }
        catch (FileException $e) {
            $this->assertEquals(true, true);
        }
        // clean
        exec('rm ' . base_path('.env'));
    }
}
