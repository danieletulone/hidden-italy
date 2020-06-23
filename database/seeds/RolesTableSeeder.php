<?php

use App\Models\Role;
use App\Models\Scope;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Create a role called __admin__ with all scopes without 'manage'.
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
                             ->where('name', 'NOT LIKE', '%manage%')
                             ->get()
                             ->pluck('name')
        ]);
    }

    /**
     * Create a role called __super-admin__ with all scopes.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    private function defineSuperAdmin()
    {
        Role::create([
            'name' => 'super-admin',
            'scopes' => Scope::select(['name'])
                             ->get()
                             ->pluck('name')
        ]);
    }

    /**
     * Create a role that user role.
     * 
     * - Can read all resources.
     * - Cannot use admin dashbaord.
     * - Cannot delete or update resource of another user.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function defineUser()
    {
        $scopes = Scope::select(['name'])
                       ->where('name', 'LIKE', '%read%')
                       ->get()
                       ->toArray();

        $userScopes = Scope::$scopes;
        unset($userScopes['use-admin-dashboard']);

        $scopes = array_merge(array_keys($userScopes), Arr::pluck($scopes, 'name'));

        Role::create([
            'name' => 'user',
            'scopes' => $scopes
        ]);
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
        $this->defineAdmin();

        $this->defineSuperAdmin();

        $this->defineUser();
    }
}
