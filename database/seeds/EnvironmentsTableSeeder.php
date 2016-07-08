<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Core\Domain\Environments\Entities\Environment;

/**
 * Class EnvironmentsTableSeeder
 */
class EnvironmentsTableSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        //DB::table('environments')->truncate();

        Environment::create([
            'name' => 'Default',
            'reference' => 'default',
            'domain' => 'localhost'
        ]);

        Model::reguard();
    }
}
