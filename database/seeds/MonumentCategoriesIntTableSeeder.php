<?php

use Illuminate\Database\Seeder;
use App\Models\MonumentCategoryInt;

class MonumentCategoriesIntTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MonumentCategoriesInt::class, 50)->create();
    }
}
