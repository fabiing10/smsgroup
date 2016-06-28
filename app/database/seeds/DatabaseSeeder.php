<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GeneralTableSeeder');
        $this->command->info('Se ha realizado la migracion satisfactoriamente');
	}

}
