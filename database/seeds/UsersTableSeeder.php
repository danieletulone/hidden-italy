<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('users')->insert([
					'name' => 'admin',
					'surname' => 'admin',
					'nickname' => 'admin',
					//'points' => 0,
					'email' => 'admin@ied.edu',
					'email_verified_at' => now(),
					'password' => '1234',
					'remember_token' => Str::random(10),
					'role_id' => 2, //DA COLLEGARE A DB
			]);

			// factory(User::class, 1)->create(); //NON FUNZIONA IL FACORIES DEL USER
    }
}
