<?php namespace App\Http\Front\Controllers;

use Artisan;
use DB;
use Config;
use CVEPDB\Controllers\AbsBaseController as Controller;
use App\Http\Front\Requests\InstallerFormRequest;
use Mockery\CountValidator\Exception;
use Modules\Users\Entities\User;

class InstallerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'installer.index',
            [
                'footer' => [
                    'version' => Config::get('app.version'),
                    'title' => Config::get('app.title'),
                    'url' => Config::get('app.url'),
                ]
            ]
        );
    }

    /**
     * @param InstallerFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(InstallerFormRequest $request)
    {
        try {
            $contents = \File::get(base_path('.env.installer'));

            $contents .= PHP_EOL;
            $contents .= 'DB_HOST=' . $request->get('DB_HOST') . PHP_EOL;
            $contents .= 'DB_DATABASE=' . $request->get('DB_DATABASE') . PHP_EOL;
            $contents .= 'DB_USERNAME=' . $request->get('DB_USERNAME') . PHP_EOL;
            $contents .= 'DB_PASSWORD=' . $request->get('DB_PASSWORD') . PHP_EOL;

            $bytes_written = \File::put(base_path('.env.installer'), $contents);
            if ($bytes_written === false) {
                throw new \Illuminate\Filesystem\FileException;
            }

        } catch (\Illuminate\Filesystem\FileNotFoundException $exception) {
            die ("The file doesn't exist");
        } catch (\Illuminate\Filesystem\FileException $exception) {
            die ("Impossible to write in file");
        }

        dd($request->all());




        // Record admin



        return redirect('/');
    }

    public function runMigration() {
        Artisan::call('cache:clear');
        Artisan::call('migrate');
    }

    public function addUserAdmin() {
        $user = User::create(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );
//
//        $this->r_apikey->generate_api_key($user);
//
//        $roles = $request->only('user_role_id');
//
//        if (count($roles['user_role_id']) > 0) {
//            $user->roles()->attach($roles['user_role_id']);
//        }

        return redirect('/');
    }

    public function testDBConnection(InstallerFormRequest $request)
    {
        $isConnected = false;

        try {
            Config::set('database.default', 'mysql');
            Config::set('database.connections.mysql.host', $request->get('DB_HOST'));
            Config::set('database.connections.mysql.database', $request->get('DB_DATABASE'));
            Config::set('database.connections.mysql.username', $request->get('DB_USERNAME'));
            Config::set('database.connections.mysql.hospasswordt', $request->get('DB_PASSWORD'));

            $isConnected = DB::connection()->getDatabaseName() == $request->get('DB_DATABASE');
        }
        catch (\Exception $e) {
            // Todo send to sentry

            $isConnected = false;
        }
        return ['result' => $isConnected];
    }
}