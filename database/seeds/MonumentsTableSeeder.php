<?php

use Illuminate\Database\Seeder;
use App\Models\Monument;

class MonumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Monument::class, 50)->create();
    }
}
