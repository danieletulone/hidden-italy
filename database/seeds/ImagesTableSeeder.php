<?php

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Image::class, 10)->create();

        Image::insert([
        'title' => '',
        'description' => '',
        'url' => '',
        'monument_id' => '',
        'user_id' => ''
        ]);
        }
}
