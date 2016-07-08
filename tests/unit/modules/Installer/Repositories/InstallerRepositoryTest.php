<?php namespace modules\Installer\Repositories;

use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Filesystem\FileException;
use Illuminate\Filesystem\FileNotFoundException;

/**
 * Class InstallerRepositoryTest
 * @package modules\Installer\Repositories
 *
 * @env installer
 * @group installer
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
        parent::_before();
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

        parent::_after();
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
//            env('CORE_DB_HOST'),
//            env('CORE_DB_DATABASE'),
//            env('CORE_DB_USERNAME'),
//            env('CORE_DB_PASSWORD'),
//            env('CORE_DB_SOCKET')
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
            env('CORE_DB_HOST'),
            env('CORE_DB_DATABASE'),
            env('CORE_DB_USERNAME'),
            env('CORE_DB_PASSWORD'),
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

        $this->assertEquals(true, preg_match("#CORE_DB_HOST=" . env('CORE_DB_HOST') . "\n#", $generated_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_DATABASE=" . env('CORE_DB_DATABASE') . "\n#", $generated_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_USERNAME=" . env('CORE_DB_USERNAME') . "\n#", $generated_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_PASSWORD=" . env('CORE_DB_PASSWORD') . "\n#", $generated_file_content));

        $this->assertEquals(true, preg_match("#CORE_SITE_NAME=\"\#CVEPDB\"\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_SITE_DESCRIPTION=\"Mon super blog\"\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_URL=\"http://cvepdb.fr\"\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_HOST=" . env('CORE_DB_HOST') . "\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_DATABASE=" . env('CORE_DB_DATABASE') . "\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_USERNAME=" . env('CORE_DB_USERNAME') . "\n#", $generated_production_file_content));
        $this->assertEquals(true, preg_match("#CORE_DB_PASSWORD=" . env('CORE_DB_PASSWORD') . "\n#", $generated_production_file_content));
    }

    /**
     * @env installer
     */
    public function testInstallerRepositoryMigrate()
    {
        $r_installer = \App::make('Modules\Installer\Repositories\InstallerRepository');

        try {
            $r_installer->migrate(
                [
                    'CORE_URL' => 'localhost:8000',
                    'CORE_SITE_NAME' => '#CVEPDB'
                ],
                ['--force' => true, '--database' => 'testing'],
                ['--force' => true, '--database' => 'testing']
            );
            $this->tester->seeNumRecords(0, 'users', []);
            $this->tester->seeNumRecords(240, 'countries', []);
            $this->tester->seeNumRecords(120, 'states', []);
        } catch (FileException $e) {
            $this->assertEquals(true, false);
        } catch (PDOException $e) {
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
        } catch (FileException $e) {
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
        } catch (FileException $e) {
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

            /*
             * User
             */

            $this->tester->seeRecord('users', [
                'id' => 1,
                'first_name' => 'Antoine',
                'last_name' => 'Benevaut',
                'email' => 'antoine@cvepdb.fr',
            ]);

            /*
             * Roles
             */

            $this->tester->seeRecord('roles', [
                'id' => 1,
                'name' => RoleRepositoryEloquent::USER,
                'display_name' => 'roles.' . RoleRepositoryEloquent::USER . ':display_name',
                'description' => 'roles.' . RoleRepositoryEloquent::USER . ':description',
                'unchangeable' => true
            ]);
            $this->tester->seeRecord('roles', [
                'id' => 2,
                'name' => RoleRepositoryEloquent::ADMIN,
                'display_name' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':display_name',
                'description' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':description',
                'unchangeable' => true
            ]);
            $this->tester->seeRecord('role_user', [
                'user_id' => 1,
                'role_id' => 1
            ]);
            $this->tester->seeRecord('role_user', [
                'user_id' => 1,
                'role_id' => 2
            ]);

        } catch (FileException $e) {
            $this->assertEquals(true, false);
        }
    }
}
