<?php namespace Modules\Installer\Http\Controllers;

use Artisan;
use DB;
use Config;
use Redirect;
use File;
use Hash;
use Illuminate\Http\Request;
use CVEPDB\Controllers\AbsBaseController as Controller;
use Modules\Installer\Requests\InstallerFormRequest;
use Mockery\CountValidator\Exception;
use Modules\Users\Entities\User;
use \Illuminate\Filesystem\FileException;
use \Illuminate\Filesystem\FileNotFoundException;
use CVEPDB\Repositories\Users\UserRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;
use Modules\Users\Entities\ApiKey;

class InstallerController extends Controller
{
    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_user = null;

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

    private $m_apikey = null;

    /**
     * @param UserRepositoryEloquent $r_user
     * @param RoleRepositoryEloquent $r_role
     * @param ApiKey $m_apikey
     */
    public function __construct(
        UserRepositoryEloquent $r_user,
        RoleRepositoryEloquent $r_role,
        ApiKey $m_apikey
    )
    {
        $this->r_user = $r_user;
        $this->r_role = $r_role;
        $this->m_apikey = $m_apikey;
    }

    /**
     * Installer form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return cmsview(
            'index',
            [
                'header' => [
                    'title' => 'Installer #CVEPDB CMS',
                    'description' => '#CVEPDB CMS installation process',
                ],
                'breadcrumbs' => null,
                'footer' => [
                    'version' => Config::get('app.version'),
                    'title' => Config::get('app.title'),
                    'url' => Config::get('app.url'),
                ]
            ],
            'installer::',
            'installer::'
        );
    }

    /**
     * Step 1
     *
     * If we can connect to the database with form credential we run the install process
     *
     * @param InstallerFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, InstallerFormRequest $formRequest)
    {
        try {

            if ($this->testDBConnection($formRequest)) {
                // Write DB config in .env.installer
                $this->generateConfig($formRequest);
                // Store admin user in session
                $request->session()->put('installer_user_admin', [
                    'first_name' => $formRequest->get('first_name'),
                    'last_name' => $formRequest->get('last_name'),
                    'email' => $formRequest->get('email'),
                    'password' => $formRequest->get('password'),
                ]);
            } else {
                return Redirect::to('installer')
                    ->withErrors('installer.error:db_connection')
                    ->withInput();
            }
        } catch (FileNotFoundException $exception) {
            die ("The file doesn't exist");
        } catch (FileException $exception) {
            die ("Impossible to write in file");
        }
        return redirect('installer/migration');
    }

    /**
     * Step 2
     *
     * Run migration based on installer env and set the production env as main env
     *
     * @return Redirect
     */
    public function runMigration()
    {
        //Artisan::call('module:publish-migration', ['--force' => true]);
        Artisan::call('migrate', ['--force' => true]);
        //Artisan::call('module:migrate');
        return redirect('installer/initialisation');
    }

    /**
     * Step 3
     *
     * Run post migration and configuration actions
     *
     * - add admin user and roles
     *
     * @return Redirect
     */
    public function initialiseProduction(Request $request)
    {
        try {
            $this->addUserAdmin($request);

            $bytes_written = File::put(base_path('.env'), 'production' . PHP_EOL);
            if ($bytes_written === false) {
                throw new FileException;
            }

        } catch (FileException $exception) {
            File::delete(base_path('.env'));
            File::delete(base_path('.env.production'));
            die ("Impossible to write in file");
        }
        return redirect('/');
    }

    /**
     * Try the DB connection with form credentials
     *
     * @param InstallerFormRequest $request
     * @return bool
     */
    private function testDBConnection(InstallerFormRequest $formRequest)
    {
        $isConnected = false;

        try {
            Config::set('database.connections.installer', [
                'driver'    => 'mysql',
                'host'      => $formRequest->get('DB_HOST'),
                'database'  => $formRequest->get('DB_DATABASE'),
                'username'  => $formRequest->get('DB_USERNAME'),
                'password'  => $formRequest->get('DB_PASSWORD'),
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => false,
                'engine'    => null,
                'unix_socket' => null,
            ]);

            DB::connection('installer')->select(DB::raw("SELECT 1"));

            $isConnected = true;

        } catch (\Exception $e) {
            $isConnected = false;
        }
        return $isConnected;
    }

    /**
     * Complete the installer env file with DB info and create the production env file
     *
     * @param InstallerFormRequest $request
     * @return bool
     * @throws FileException
     */
    private function generateConfig(InstallerFormRequest $formRequest)
    {
        /*
         * Add DB info in installer config for migration
         */

        $contents = File::get(base_path('.env.installer'));
        $contents .= PHP_EOL;
        $contents .= 'DB_HOST=' . $formRequest->get('DB_HOST') . PHP_EOL;
        $contents .= 'DB_DATABASE=' . $formRequest->get('DB_DATABASE') . PHP_EOL;
        $contents .= 'DB_USERNAME=' . $formRequest->get('DB_USERNAME') . PHP_EOL;
        $contents .= 'DB_PASSWORD=' . $formRequest->get('DB_PASSWORD') . PHP_EOL;

        $bytes_written = File::put(base_path('.env.installer'), $contents);
        if ($bytes_written === false) {
            throw new FileException;
        }

        /*
         * Create production env file
         */

        $contents = 'APP_ENV=production'. PHP_EOL;
        $contents .= 'APP_DEBUG=true'. PHP_EOL;
        $contents .= 'APP_KEY=' . hash('md5', time().date('Y-m-d', time())) . PHP_EOL;
        $contents .= 'APP_INSTALLED=true'. PHP_EOL;
        $contents .= 'APP_SITE_NAME="' . $formRequest->get('APP_SITE_NAME') . '"' . PHP_EOL;
        $contents .= 'APP_SITE_DESCRIPTION="' . $formRequest->get('APP_SITE_DESCRIPTION') . '"' . PHP_EOL;
        $contents .= 'APP_URL=' . $formRequest->get('APP_URL') . PHP_EOL;
        $contents .= 'APP_CONTACT_MAIL=' . $formRequest->get('email') . PHP_EOL;
        $contents .= PHP_EOL;
        $contents .= 'CACHE_DRIVER=array' . PHP_EOL;
        $contents .= PHP_EOL;
        $contents .= 'DB_HOST=' . $formRequest->get('DB_HOST') . PHP_EOL;
        $contents .= 'DB_DATABASE=' . $formRequest->get('DB_DATABASE') . PHP_EOL;
        $contents .= 'DB_USERNAME=' . $formRequest->get('DB_USERNAME') . PHP_EOL;
        $contents .= 'DB_PASSWORD=' . $formRequest->get('DB_PASSWORD') . PHP_EOL;

        $bytes_written = File::put(base_path('.env.production'), $contents);
        if ($bytes_written === false) {
            throw new FileException;
        }

        return true;
    }

    /**
     * Record first roles [user,admin] and the admin user
     *
     * @return bool
     * @throws \Exception
     */
    private function addUserAdmin(Request $request)
    {
        $this->r_role->create([
            'name' => RoleRepositoryEloquent::USER,
            'display_name' => 'roles.' . RoleRepositoryEloquent::USER . ':display_name',
            'description' => 'roles.' . RoleRepositoryEloquent::USER . ':description'
        ]);

        $this->r_role->create([
            'name' => RoleRepositoryEloquent::ADMIN,
            'display_name' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':display_name',
            'description' => 'roles.' . RoleRepositoryEloquent::ADMIN . ':description'
        ]);

        // Retrieve data from the session
        $session_installer = $value = $request->session()->get('installer_user_admin');
        // Reset session
        $request->session()->put('installer_user_admin', []);

        $user = User::create([
            'first_name' => $session_installer['first_name'],
            'last_name' => $session_installer['last_name'],
            'email' => $session_installer['email'],
            'password' => Hash::make($session_installer['password']),
        ]);

        $role = $this->r_role->role_exists(RoleRepositoryEloquent::USER);
        $user->attachRole($role);

        $role = $this->r_role->role_exists(RoleRepositoryEloquent::ADMIN);
        $user->attachRole($role);

        $this->m_apikey->create([
            'user_id' => $user->id,
            'key' => $this->m_apikey->generateKey(),
            'level' => 10,
            'ignore_limits' => 0,
        ]);

        return true;
    }
}