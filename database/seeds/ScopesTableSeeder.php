<?php

use App\Models\Scope;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ScopesTableSeeder extends Seeder
{

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
        $crossedScopes = Arr::crossJoin(Scope::$crudActions, Scope::$resources);

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
        foreach (Scope::$scopes as $key => $value) {
            Scope::create([
                'name' => $key,
                'description' => $value
            ]);
        }
    }
}
