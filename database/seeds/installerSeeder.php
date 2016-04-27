<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class installerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('Modules\Users\Database\Seeders\CountryTableSeeder');
        $this->call('Modules\Users\Database\Seeders\StateTableSeeder');
        Model::reguard();
    }
}
