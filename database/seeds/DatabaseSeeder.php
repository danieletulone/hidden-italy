<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
	/**
	* Seed the application's database.
	*
	* @return void
	*/
	public function run()
	{
		Artisan::call('migrate:reset', ['--force' => true]);
		Artisan::call('migrate');

		$this->call(CategorySeeder::class);
		$this->call(ScopesTableSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(MonumentsTableSeeder::class);
		$this->call(MonumentCategorySeeder::class);
		$this->call(ImagesTableSeeder::class);
		$this->call(CommentsTableSeeder::class);
	}
}
