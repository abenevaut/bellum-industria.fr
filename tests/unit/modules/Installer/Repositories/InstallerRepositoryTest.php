<?php namespace modules\Installer\Repositories;

use Doctrine\DBAL\Driver\PDOException;
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

    protected $_env_installer_content = null;

    protected function _before()
    {

        //            dd($this->getModule('Laravel5')->app);

        $this->_env_installer_content = file_get_contents(base_path('.env.installer'));
    }

    protected function _after()
    {
        file_put_contents(base_path('.env.installer'), $this->_env_installer_content);

        if (file_exists(base_path('.env'))) {
            unlink(base_path('.env'));
        }

        if (file_exists(base_path('.env.production'))) {
            unlink(base_path('.env.production'));
        }
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

//        $res = $r_installer->testDBConnection(
//            env('GITLAB_DB_HOST', 'localhost'),
//            env('GITLAB_DB_DATABASE', 'cvepdb_cms'),
//            env('GITLAB_DB_USERNAME', 'root'),
//            env('GITLAB_DB_PASSWORD', 'mySQL'),
//            env('GITLAB_DB_SOCKET', '/Applications/MAMP/tmp/mysql/mysql.sock')
//        );
//        $this->assertEquals(true, $res);
    }

    /**
     * @env installer
     */
    public function testInstallerRepositoryGenerateConfigs()
    {
        /*
         * Check default file - .env.installer
         */

        $default_file = base_path('.env.installer');
        $default_production_file = base_path('.env.production');

        $this->assertEquals(true, file_exists($default_file));
        $this->assertEquals(false, file_exists($default_production_file));

        /*
         * Generate configs
         */

        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        $r_installer->generateConfigs(
            '#CVEPDB',
            'Mon super blog',
            'http://cvepdb.fr',
            env('GITLAB_HOST', '127.0.0.1'),
            env('GITLAB_DATABASE', 'cvepdb_cms'),
            env('GITLAB_USERNAME', 'root'),
            env('GITLAB_PASSWORD', 'mySQL'),
            'Antoine',
            'Benevaut',
            'antoine@cvepdb.fr'
        );

        $this->assertEquals(true, file_exists($default_file));
        $this->assertEquals(true, file_exists($default_production_file));

        $generated_file_content = file_get_contents($default_file);
        $generated_production_file_content = file_get_contents($default_production_file);

        /*
         * Check content
         */

        $this->assertEquals(true, preg_match("#CORE_DB_HOST=127.0.0.1\n#", $generated_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_DATABASE=cvepdb_cms\n#", $generated_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_USERNAME=root\n#", $generated_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_PASSWORD=mySQL\n#", $generated_file_content));

        $this->assertEquals(true, preg_match("#CORE_SITE_NAME=\"\#CVEPDB\"\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_SITE_DESCRIPTION=\"Mon super blog\"\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_URL=\"http://cvepdb.fr\"\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_HOST=127.0.0.1\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_DATABASE=cvepdb_cms\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_USERNAME=root\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_PASSWORD=mySQL\n#", $generated_production_file_content));
    }

    /**
     * @env installer
     */
    public function testInstallerRepositoryMigrate()
    {
        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        try {

            // DB already seeded by artisan before tests
            $r_installer->migrate(
                ['--force' => true, '--database' => 'testing'],
                ['--force' => true, '--database' => 'testing', '--class' => 'installerSeeder']
            );

            $this->tester->seeNumRecords(0, 'users', []);
            $this->tester->seeNumRecords(240, 'countries', []);
            $this->tester->seeNumRecords(120, 'states', []);
        }
        catch (FileException $e) {
            $this->assertEquals(true, false);
        }
        catch (PDOException $e) {
            $this->assertEquals(true, false);
        }
    }

    /**
     * @env installer
     */
    public function testInstallerRepositorySetEnvAsProduction()
    {
        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        try {
            $this->assertEquals(false, file_exists(base_path('.env')));

            $r_installer->set_env_as_production();

            $this->assertEquals(true, file_exists(base_path('.env')));
            $this->assertEquals('production' . PHP_EOL, file_get_contents(base_path('.env')));
        }
        catch (FileException $e) {
            $this->assertEquals(true, true);
        }
    }

    /**
     * @env installer
     */
    public function testInstallerRepositoryRevertEnvToInstaller()
    {
        touch(base_path('.env'));
        touch(base_path('.env.production'));

        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        try {
            $this->assertEquals(true, file_exists(base_path('.env')));
            $this->assertEquals(true, file_exists(base_path('.env.production')));

            $r_installer->revert_env_to_installer();

            $this->assertEquals(false, file_exists(base_path('.env')));
            $this->assertEquals(false, file_exists(base_path('.env.production')));
        }
        catch (FileException $e) {
            $this->assertEquals(true, false);
        }
    }

    /**
     * @env installer
     */
    public function testInstallerRepositoryAddUserAdmin()
    {
        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        try {
            $r_installer->addUserAdmin([
                'first_name' => 'Antoine',
                'last_name' => 'Benevaut',
                'email' => 'antoine@cvepdb.fr',
                'password' => 'myPassword',
            ]);


            // Todo tests


        }
        catch (FileException $e) {
            $this->assertEquals(true, false);
        }
    }
}
