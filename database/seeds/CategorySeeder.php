<?php

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            'description' => 'Chiesa',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Category::insert([
            'description' => 'Piazza',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Category::insert([
            'description' => 'Monumento',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Category::insert([
            'description' => 'Edificio',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
