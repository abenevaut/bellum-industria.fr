<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();
        $this->call('CountryTableSeeder');
        $this->call('StateTableSeeder');
        $this->call('cms\Modules\Users\Database\Seeders\DatabaseSeeder');
        Model::reguard();
    }
}
