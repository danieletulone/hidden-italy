<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Monument;
use App\Models\Categories;
use App\Models\MonumentCategory;

class MonumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        CATEGORIES
        1 : Chiesa
        2 : Piazza
        3 : Monumento
        4 : Edificio
        5 : Parco
        6 : Evento
        7 : Museo

        */

        /*
        MONUMENT
        1 : Arco della pace
        2 : Triennale di Milano
        3 : Bosco Verticale
        4 : Duomo di Milano
        5 : Colonne di San Lorenzo
        6 : Piazza Affari
        7 : Chiesa di Santa Maria presso San Satiro
        */

        MonumentCategory::insert([
            'category_id' => '3',
            'monument_id' => '1',
        ]);

        MonumentCategory::insert([
            'category_id' => '4',
            'monument_id' => '2',
        ]);

        MonumentCategory::insert([
            'category_id' => '3',
            'monument_id' => '3',
        ]);

        MonumentCategory::insert([
            'category_id' => '2',
            'monument_id' => '4',
        ]);

        MonumentCategory::insert([
            'category_id' => '1',
            'monument_id' => '4',
        ]);

        MonumentCategory::insert([
            'category_id' => '4',
            'monument_id' => '4',
        ]);

        MonumentCategory::insert([
            'category_id' => '3',
            'monument_id' => '5',
        ]);

        MonumentCategory::insert([
            'category_id' => '2',
            'monument_id' => '6',
        ]);

        MonumentCategory::insert([
            'category_id' => '4',
            'monument_id' => '6',
        ]);

        MonumentCategory::insert([
            'category_id' => '4',
            'monument_id' => '7',
        ]);
    }
}
