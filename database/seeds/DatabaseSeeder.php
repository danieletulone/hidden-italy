<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	* Seed the application's database.
	*
	* @return void
	*/
	public function run()
	{
		$this->call(CategorySeeder::class);
		$this->call(MonumentsTableSeeder::class);
		$this->call(ImagesTableSeeder::class);
		$this->call(MonumentCategorySeeder::class);
		$this->call(CommentsTableSeeder::class);
	}
}
