<?php

namespace App\Providers;

use App\Role;
use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Languages
        Gate::define('language_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('language_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('language_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('language_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('language_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Category
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tags
        Gate::define('tag_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tag_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tag_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tag_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tag_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Ingredients
        Gate::define('ingredient_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('ingredient_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('ingredient_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('ingredient_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('ingredient_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Meals
        Gate::define('meal_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('meal_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('meal_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('meal_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('meal_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
