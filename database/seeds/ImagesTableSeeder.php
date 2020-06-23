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

				Image::insert([
				'title' => 'Arco della pace',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/arco1.jpg',
				'monument_id' => '1',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Arco della pace',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/arco2.jpg',
				'monument_id' => '1',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Triennale di Milano',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/triennale1.jpg',
				'monument_id' => '2',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Triennale di Milano',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/triennale2.jpg',
				'monument_id' => '2',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Triennale di Milano',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/triennale3.jpg',
				'monument_id' => '2',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Bosco Verticale',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/bosco1.jpg',
				'monument_id' => '3',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Bosco Verticale',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/bosco2.jpg',
				'monument_id' => '3',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Duomo di Milano',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/duomo1.jpg',
				'monument_id' => '4',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Duomo di Milano',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/duomo2.jpg',
				'monument_id' => '4',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Colonne di San Lorenzo',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/colonne1.jpg',
				'monument_id' => '5',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Colonne di San Lorenzo',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/colonne2.jpg',
				'monument_id' => '5',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Piazza Affari',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/affari1.jpg',
				'monument_id' => '6',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Piazza Affari',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/affari2.jpg',
				'monument_id' => '6',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Chiesa di Santa Maria presso San Satiro',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/chiesa1.jpg',
				'monument_id' => '7',
				'user_id' => '1',
				]);

				Image::insert([
				'title' => 'Chiesa di Santa Maria presso San Satiro',
				'description' => 'Questa è l\'immagine del monumento',
				'url' => 'seedImage/chiesa2.jpg',
				'monument_id' => '7',
				'user_id' => '1',
				]);
		}

}
