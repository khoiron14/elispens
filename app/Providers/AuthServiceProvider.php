<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // For role check on blade
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->hasRole(User::ADMIN);
        });

        Blade::if('lecturer', function () {
            return auth()->check() && auth()->user()->hasRole(User::LECTURER);
        });

        Blade::if('student', function () {
            return auth()->check() && auth()->user()->hasRole(User::STUDENT);
        });
    }
}
