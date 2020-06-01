<?php

use Illuminate\Database\Seeder;
use App\Models\Monument;
use Phaza\LaravelPostgis\Geometries\Point;

class MonumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Monument::class, 50)->create();

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

        Monument::insert([
            'name' => 'Arco della Pace',
            'description' => 'Arco trionfale con bassorilievi e statue, commissionato da Napoleone a Luigi Cagnola.',
            'lat' => '45.4641839',
            'lon' => '9.1707071',
            // 'position' => (new Point(51.16257,-0.58042))->toWKT(),
            // 'position' => ('45.4641839, 9.1707071'),
            'visible' => '1',
            'user_id' => '1',
            'category_id' => '3',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Triennale Milano',
            'description' => 'Museo con esibizioni di design permanenti e temporanee su temi che spaziano dall\'architettura all\'arredamento.',
            'lat' => '45.4692148',
            'lon' => '9.1755992',
            'visible' => '1',
            'user_id' => '1',
            'category_id' => '7',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Bosco Verticale',
            'description' => 'Complesso di due palazzi',
            'lat' => '45.4640976',
            'lon' => '9.1897378',
            'visible' => '1',
            'user_id' => '1',
            'category_id' => '4',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Duomo di Milano',
            'description' => 'Il Duomo di Milano, ufficialmente Basilica Cattedrale Metropolitana della Natività della Beata Vergine Maria, è la cattedrale dell\' arcidiocesi di Milano. Simbolo del capoluogo lombardo, e situato nell\'omonima piazza al centro della metropoli, è dedicata a Santa Maria Nascente. È la chiesa più grande d\'Italia (la Basilica di San Pietro, più grande, è infatti nel territorio della Città del Vaticano), la quarta nel mondo per superficie, la sesta per volume. È sede della parrocchia di Santa Tecla nel Duomo di Milano.',
            'lat' => '45.4885364992',
            'lon' => '9.1873',
            'user_id' => '1',
            'visible' => '1',
            'category_id' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Colonne di San Lorenzo',
            'description' => 'Sito archeologico composto da 16 colonne romane in marmo, accanto ai resti di un anfiteatro e delle terme.',
            'lat' => '45.4564312',
            'lon' => '9.1807165',
            'user_id' => '1',
            'visible' => '1',
            'category_id' => '3',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Piazza Affari',
            'description' => 'Simbolo non solo dell\'economia milanese ma anche delle attività finanziarie italiane, la piazza è principalmente conosciuta per la presenza della Borsa di Milano, sede del mercato finanziario nazionale',
            'lat' => '45.4646165',
            'lon' => '9.1833044',
            'user_id' => '1',
            'visible' => '0',
            'category_id' => '2',
            'created_at' => date('Y-m-d H:i:s')

        ]);Monument::insert([
            'name' => 'Chiesa di Santa Maria presso San Satiro',
            'description' => 'Elegante chiesa risalente al XV secolo con celebrazioni regolari e ricercati interni dorati.',
            'lat' => '45.4627778',
            'lon' => '9.1877778',
            'user_id' => '1',
            'visible' => '0',
            'category_id' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
