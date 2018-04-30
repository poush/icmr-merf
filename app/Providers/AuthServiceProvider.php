<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Equipment' => 'App\Policies\Equipment',
        'App\Institute' => 'App\Policies\Institute',
        'App\User'      => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-equipments', function ($user) {
            return in_array($user->role, [ 'super-admin', 'institute', 'editor' ] );
        });

        Gate::define('manage-users', function ($user) {
            return in_array($user->role, [ 'super-admin', 'institute' ] );
        });

        Gate::define('manage-institutes', function ($user) {
            return in_array($user->role, [ 'super-admin' ] );
        });

        Gate::define('manage-categories', function ($user) {
            return in_array($user->role, [ 'super-admin' ] );
        });
    }
}
