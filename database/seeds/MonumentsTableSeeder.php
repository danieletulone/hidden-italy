<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Monument;
use Illuminate\Support\Str;

class MonumentsTableSeeder extends Seeder
{

    /**
     * Define category.
     * 
     * CATEGORIES
     * -------------
     *  1: Chiesa
     *  2: Piazza
     *  3: Monumento
     *  4: Edificio
     *  5: Parco
     *  6: Evento
     *  7: Museo
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param array $monument
     * @return integer
     */
    public function defineCategory($monument): int
    {
        $type = Str::lower($monument["ctipo"]);
        
        if (Str::contains($type, "sacrario")) {
            return 1;
        }

        if (Str::contains($type, "monumento")) {
            return 3;
        }

        return Category::all()->random()->id;
    }

    /**
     * Run the database seeds.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function run()
    {
        $this->seedHardCoded();

        $this->seedFromJson();
    }

    public function seedHardCoded()
    {
        Monument::insert([
            'name' => 'Arco della Pace',
            'description' => 'Arco trionfale con bassorilievi e statue, commissionato da Napoleone a Luigi Cagnola.',
            'lat' => doubleval(45.47569195),
            'lon' => doubleval(9.1724278),
            'visible' => '1',
            'user_id' => '1',
            'category_id' => '3',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Triennale Milano',
            'description' => 'Museo con esibizioni di design permanenti e temporanee su temi che spaziano dall\'architettura all\'arredamento.',
            'lat' => doubleval(45.4717818),
            'lon' => doubleval(9.1735438),
            'visible' => '1',
            'user_id' => '1',
            'category_id' => '7',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Bosco Verticale',
            'description' => 'Complesso di due palazzi',
            'lat' => doubleval(45.48570495),
            'lon' => doubleval(9.1905374),
            'visible' => '1',
            'user_id' => '1',
            'category_id' => '4',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Duomo di Milano',
            'description' => 'Il Duomo di Milano, ufficialmente Basilica Cattedrale Metropolitana della Natività della Beata Vergine Maria, è la cattedrale dell\' arcidiocesi di Milano. Simbolo del capoluogo lombardo, e situato nell\'omonima piazza al centro della metropoli, è dedicata a Santa Maria Nascente. È la chiesa più grande d\'Italia (la Basilica di San Pietro, più grande, è infatti nel territorio della Città del Vaticano), la quarta nel mondo per superficie, la sesta per volume. È sede della parrocchia di Santa Tecla nel Duomo di Milano.',
            'lat' => doubleval(45.4641684),
            'lon' => doubleval(9.1916211),
            'user_id' => '1',
            'visible' => '1',
            'category_id' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Colonne di San Lorenzo',
            'description' => 'Sito archeologico composto da 16 colonne romane in marmo, accanto ai resti di un anfiteatro e delle terme.',
            'lat' => doubleval(45.4582299),
            'lon' => doubleval(9.1810449),
            'user_id' => '1',
            'visible' => '1',
            'category_id' => '3',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Monument::insert([
            'name' => 'Piazza Affari',
            'description' => 'Simbolo non solo dell\'economia milanese ma anche delle attività finanziarie italiane, la piazza è principalmente conosciuta per la presenza della Borsa di Milano, sede del mercato finanziario nazionale',
            'lat' => doubleval(45.4650407),
            'lon' => doubleval(9.1835323),
            'user_id' => '1',
            'visible' => '0',
            'category_id' => '2',
            'created_at' => date('Y-m-d H:i:s')

        ]);
        
        Monument::insert([
            'name' => 'Chiesa di Santa Maria presso San Satiro',
            'description' => 'Elegante chiesa risalente al XV secolo con celebrazioni regolari e ricercati interni dorati.',
            'lat' => doubleval(45.462703),
            'lon' => doubleval(9.1877460),
            'user_id' => '1',
            'visible' => '0',
            'category_id' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Seed monuments from json files.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function seedFromJson()
    {
        $monumentsJSON = file_get_contents(base_path('database/seeds/json/monuments.json'));

        $monuments = json_decode(str_replace(array("\n","\r"), "", $monumentsJSON), true);

        $count = 0;

        foreach ($monuments as $monument) {
            
            $categoryId = $this->defineCategory($monument);

            if ($monument["cnome"] != "") {
                Monument::insert([
                    'name' => $monument["cnome"],
                    'description' => $monument["cnome"],
                    'lat' => doubleval($monument["clatitudine"]),
                    'lon' => doubleval($monument["clongitudine"]),
                    'visible' => '1',
                    'user_id' => 251,
                    'category_id' => Category::all()->random()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                $count++;
            }
        }     

        echo "Ho messo $count monumenti. \n";
    }
}