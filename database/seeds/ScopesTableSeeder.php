<?php

use App\Models\Scope;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ScopesTableSeeder extends Seeder
{ 

    /**
     * List crud actions.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    private array $crudActions = [
        'create', 
        'read', 
        'update', 
        'delete'
    ];

    /**
     * List of all resource of app.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    private array $resources = [
        'categories', 
        'comments',
        'monuments', 
        'roles', 
        'scopes', 
    ];

    /**
     * Scopes to add.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    private array $scopes = [
        'use-admin-dashboard' => 'Allow to enter into admin dashboard',
    ];

    /**
     * Run the database seeds.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function run(): void
    {
        Scope::truncate();

        $this->seedCrudScopes();

        $this->seedScopes();
    }

    /**
     * Create the scopes for crud actions.
     *
     * @return void
     */
    private function seedCrudScopes(): void
    {
        $crossedScopes = Arr::crossJoin($this->crudActions, $this->resources);

        foreach ($crossedScopes as $crossedScope) {
            $scopeName = implode('-', $crossedScope);

            Scope::create([
                'name' => $scopeName,
                'description' => "Allow to $crossedScope[0] a " . Str::singular($crossedScope[1])
            ]);
        }
    }

    /**
     * Seed the setted scopes.
     * 
     * 1@author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    private function seedScopes(): void
    {
        foreach ($this->scopes as $key => $value) {
            Scope::create([
                'name' => $key,
                'description' => $value
            ]);
        }
    }
}
