<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Helpers\ScopeHelper;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan($this->getScopes());
    }

    /**
     * Get scopes from db or cache.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return array
     */
    private function getScopes(): array
    {
        return ScopeHelper::forPassport();
    }
}
