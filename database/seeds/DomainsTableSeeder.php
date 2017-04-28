<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use cms\Domain\Domains\Domains\Domain;

/**
 * Class DomainsTableSeeder
 */
class DomainsTableSeeder extends Seeder
{

	public function run()
	{
		Model::unguard();

		//DB::table('environments')->truncate();

		Domain::create([
			'name'      => 'Default',
			'reference' => 'default',
			'domain'    => 'localhost'
		]);

		Model::reguard();
	}
}
