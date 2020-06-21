<?php

use App\Models\Role;
use App\Models\Scope;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->defineAdmin();
        $this->defineUser();
    }

    private function defineAdmin()
    {
        Role::create([
            'name' => 'admin',
            'scopes' => Scope::select(['name'])
                             ->get()
                             ->pluck('name')
        ]);
    }

    public function defineUser()
    {
        Role::create([
            'name' => 'user',
            'scopes' => Scope::select(['name'])
                             ->where('name', 'LIKE', '%read%')
                             ->get()
                             ->pluck('name')
        ]);
    }
}
