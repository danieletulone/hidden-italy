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
        $this->call(RolesTableSeeder::class);
				$this->call(ImagesTableSeeder::class);
				$this->call(UsersTableSeeder::class);
                $this->call(MonumentsTableSeeder::class);
                $this->call(MonumentsCategoriesSeeder::class);
                $this->call(MonumentsCategoriesIntSeeder::class);
				//$this->call(CommentsTableSeeder::class);

    }
}
