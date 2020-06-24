<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 250)->create();

        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@hiddenitaly.it',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => now(),
            'role_id' => Role::where('name', 'super-admin')->first()->id
        ]);
    }
}
