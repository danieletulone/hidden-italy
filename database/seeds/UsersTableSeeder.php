<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


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
					'points' => 0,
					'email' => 'admin@ied.edu',
					'email_verified_at' => now(),
					'password' => '12345678',
					'remember_token' => Str::random(10),
					'role_id' => 2, //DA COLLEGARE A DB
					'image_id' => 1,
			]);

			DB::table('users')->insert([
					'name' => 'user1',
					'surname' => 'user1',
					'nickname' => 'user1',
					'points' => 0,
					'email' => 'user@ied.edu',
					'email_verified_at' => now(),
					'password' => '12345678',
					'remember_token' => Str::random(10),
					'role_id' => 2,
					'image_id' => 1, //DA COLLEGARE A DB
			]);

			//factory(User::class, 20)->create(); //NON FUNZIONA IL FACORIES DEL USER

    }
}
