<?php

use Illuminate\Database\Seeder;
use App\Models\MonumentCategory;

class MonumentCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MonumentCategories::class, 50)->create();
    }
}
