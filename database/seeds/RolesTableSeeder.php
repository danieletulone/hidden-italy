<?php

use App\Models\Role;
use App\Models\Scope;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
        $this->defineAdmin();

        $this->defineUser();
    }

    /**
     * Create a role called admin with all scopes.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    private function defineAdmin()
    {
        Role::create([
            'name' => 'admin',
            'scopes' => Scope::select(['name'])
                             ->get()
                             ->pluck('name')
        ]);
    }

    /**
     * Create a role that cannot create, delete or update resources.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
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
